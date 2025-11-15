<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::where('role', 'user')->count(),
            'total_pekerja' => User::where('role', 'pekerja')->count(),
            'total_jobs' => Job::count(),
            'open_jobs' => Job::where('status', 'open')->count(),
            'total_applications' => JobApplication::count(),
            'pending_applications' => JobApplication::where('status', 'pending')->count(),
        ];

        $recentJobs = Job::with('user')
            ->latest()
            ->take(10)
            ->get();

        $recentUsers = User::latest()
            ->take(10)
            ->get();

        $recentApplications = JobApplication::with(['job', 'pekerja'])
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentJobs', 'recentUsers', 'recentApplications'));
    }

    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function jobs()
    {
        $jobs = Job::with(['user', 'applications'])->latest()->paginate(20);
        return view('admin.jobs', compact('jobs'));
    }

    public function showJob(Job $job)
    {
        $job->load(['user', 'applications.pekerja']);
        return view('admin.job-detail', compact('job'));
    }

    public function acceptApplication(JobApplication $application)
    {
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

    public function applications()
    {
        $applications = JobApplication::with(['job', 'pekerja'])
            ->latest()
            ->paginate(20);
        return view('admin.applications', compact('applications'));
    }

    // CRUD Users
    public function editUser(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        // Prevent editing superadmin
        if ($user->isSuperAdmin() && !auth()->user()->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Tidak dapat mengedit Super Admin.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:superadmin,admin,user,pekerja',
            'address' => 'nullable|string|max:500',
        ]);

        // Prevent changing superadmin role
        if ($user->isSuperAdmin() && $validated['role'] !== 'superadmin') {
            return redirect()->back()->with('error', 'Tidak dapat mengubah role Super Admin.');
        }

        $user->update($validated);
        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui.');
    }

    public function destroyUser(User $user)
    {
        // Prevent deleting superadmin
        if ($user->isSuperAdmin()) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus Super Admin.');
        }

        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus.');
    }

    // CRUD Jobs
    public function editJob(Job $job)
    {
        return view('admin.edit-job', compact('job'));
    }

    public function updateJob(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'budget' => 'required|numeric|min:0',
            'status' => 'required|in:open,in_progress,completed,cancelled',
        ]);

        $job->update($validated);
        return redirect()->route('admin.jobs')->with('success', 'Pekerjaan berhasil diperbarui.');
    }

    public function destroyJob(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs')->with('success', 'Pekerjaan berhasil dihapus.');
    }

    // CRUD Applications
    public function updateApplication(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $application->update($validated);
        return redirect()->route('admin.applications')->with('success', 'Status lamaran berhasil diperbarui.');
    }

    public function destroyApplication(JobApplication $application)
    {
        $application->delete();
        return redirect()->route('admin.applications')->with('success', 'Lamaran berhasil dihapus.');
    }
}

