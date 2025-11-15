<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Redirect admin to admin dashboard
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        
        if ($user->isPekerja()) {
            // Dashboard untuk Pekerja SIGAP
            $availableJobs = Job::where('status', 'open')
                ->whereDoesntHave('applications', function($query) use ($user) {
                    $query->where('pekerja_id', $user->id);
                })
                ->latest()
                ->take(10)
                ->get();
            
            $myApplications = $user->applications()
                ->with('job')
                ->latest()
                ->take(5)
                ->get();
            
            return view('dashboard.pekerja', compact('availableJobs', 'myApplications'));
        } else {
            // Dashboard untuk User
            $myJobs = $user->jobs()
                ->latest()
                ->take(10)
                ->get();
            
            $pendingApplications = Job::whereHas('applications', function($query) {
                $query->where('status', 'pending');
            })
            ->where('user_id', $user->id)
            ->with('applications')
            ->get();
            
            return view('dashboard.user', compact('myJobs', 'pendingApplications'));
        }
    }
}

