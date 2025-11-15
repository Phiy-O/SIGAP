<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index()
    {
        // Algoritma Urgent: Budget tinggi + Deadline dekat (jika ada)
        // Score = (budget / 1000000) * 0.6 + (deadline_urgency * 0.4)
        // deadline_urgency = 1 jika deadline < 7 hari, 0.5 jika < 14 hari, 0.2 jika < 30 hari, 0 jika tidak ada deadline
        
        $jobs = Job::where('status', 'open')
            ->get()
            ->map(function ($job) {
                // Calculate urgency score
                $budgetScore = ($job->budget / 1000000) * 0.6; // Normalize budget (1M = 0.6)
                
                $deadlineScore = 0;
                if ($job->deadline) {
                    $daysUntilDeadline = now()->diffInDays($job->deadline, false);
                    if ($daysUntilDeadline < 0) {
                        $deadlineScore = 0; // Deadline sudah lewat
                    } elseif ($daysUntilDeadline <= 7) {
                        $deadlineScore = 0.4; // Very urgent
                    } elseif ($daysUntilDeadline <= 14) {
                        $deadlineScore = 0.2; // Urgent
                    } elseif ($daysUntilDeadline <= 30) {
                        $deadlineScore = 0.1; // Somewhat urgent
                    }
                }
                
                $job->urgency_score = $budgetScore + $deadlineScore;
                return $job;
            })
            ->sortByDesc('urgency_score')
            ->values();
        
        // Paginate manually
        $perPage = 12;
        $currentPage = request()->get('page', 1);
        $items = $jobs->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedJobs = new \Illuminate\Pagination\LengthAwarePaginator(
            $items,
            $jobs->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        
        return view('jobs.index', ['jobs' => $paginatedJobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
            'deadline' => 'nullable|date|after:today',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'open';

        Job::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Pekerjaan pekerjaan berhasil dibuat!');
    }

    public function show(Job $job)
    {
        $job->load(['user', 'applications.pekerja']);
        
        $hasApplied = false;
        $myApplication = null;
        if (Auth::check() && Auth::user()->isPekerja()) {
            $myApplication = $job->applications()
                ->where('pekerja_id', Auth::id())
                ->first();
            $hasApplied = $myApplication !== null;
        }
        
        return view('jobs.show', compact('job', 'hasApplied', 'myApplication'));
    }

    public function edit(Job $job)
    {
        // Check if user owns the job
        if (Auth::id() !== $job->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit pekerjaan ini.');
        }
        
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // Check if user owns the job
        if (Auth::id() !== $job->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit pekerjaan ini.');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
            'deadline' => 'nullable|date|after:today',
            'status' => 'required|in:open,in_progress,completed,cancelled',
        ]);

        $job->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Pekerjaan pekerjaan berhasil diperbarui!');
    }

    public function destroy(Job $job)
    {
        // Check if user owns the job
        if (Auth::id() !== $job->user_id) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus pekerjaan ini.');
        }
        
        $job->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Pekerjaan pekerjaan berhasil dihapus!');
    }

    public function apply(Request $request, Job $job)
    {
        if (!Auth::user()->isPekerja()) {
            return redirect()->back()->with('error', 'Hanya Pekerja SIGAP yang dapat melamar pekerjaan.');
        }

        if ($job->applications()->where('pekerja_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'Anda sudah melamar pekerjaan ini.');
        }

        JobApplication::create([
            'job_id' => $job->id,
            'pekerja_id' => Auth::id(),
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Lamaran berhasil dikirim!');
    }

    public function myJobs()
    {
        $jobs = Auth::user()->jobs()->latest()->paginate(10);
        return view('jobs.my-jobs', compact('jobs'));
    }

    public function myApplications()
    {
        $applications = Auth::user()->applications()
            ->with('job')
            ->latest()
            ->paginate(10);
        
        return view('jobs.my-applications', compact('applications'));
    }

    public function acceptApplication(JobApplication $application)
    {
        // Check if user owns the job
        if ($application->job->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menerima lamaran ini.');
        }

        // Accept application
        $application->update(['status' => 'accepted']);
        
        // Reject other applications for the same job
        JobApplication::where('job_id', $application->job_id)
            ->where('id', '!=', $application->id)
            ->update(['status' => 'rejected']);
        
        // Update job status to in_progress
        $application->job->update(['status' => 'in_progress']);
        
        return redirect()->back()->with('success', 'Pelamar berhasil diterima dan status pekerjaan diubah menjadi sedang berjalan.');
    }

    public function completeJob(Request $request, Job $job)
    {
        // Check if user is pekerja and has accepted application
        if (!Auth::user()->isPekerja()) {
            return redirect()->back()->with('error', 'Hanya Pekerja SIGAP yang dapat menyelesaikan pekerjaan.');
        }

        $application = $job->applications()
            ->where('pekerja_id', Auth::id())
            ->where('status', 'accepted')
            ->first();

        if (!$application) {
            return redirect()->back()->with('error', 'Anda tidak memiliki pekerjaan yang diterima untuk pekerjaan ini.');
        }

        if ($job->status !== 'in_progress') {
            return redirect()->back()->with('error', 'Pekerjaan ini tidak sedang berjalan.');
        }

        $validated = $request->validate([
            'proof_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Max 5MB
        ]);

        // Upload foto
        $photoPath = $request->file('proof_photo')->store('proof-photos', 'public');

        // Update application with proof photo
        $application->update([
            'proof_photo' => $photoPath,
        ]);

        // Update job status to completed
        $job->update([
            'status' => 'completed',
        ]);

        return redirect()->back()->with('success', 'Bukti foto berhasil diunggah dan pekerjaan ditandai sebagai selesai!');
    }
}

