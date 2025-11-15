<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Algoritma Urgent: Budget tinggi + Deadline dekat
    $urgentJobs = \App\Models\Job::where('status', 'open')
        ->with('user')
        ->get()
        ->map(function ($job) {
            $budgetScore = ($job->budget / 1000000) * 0.6;
            $deadlineScore = 0;
            if ($job->deadline) {
                $daysUntilDeadline = now()->diffInDays($job->deadline, false);
                if ($daysUntilDeadline >= 0 && $daysUntilDeadline <= 7) {
                    $deadlineScore = 0.4;
                } elseif ($daysUntilDeadline <= 14) {
                    $deadlineScore = 0.2;
                } elseif ($daysUntilDeadline <= 30) {
                    $deadlineScore = 0.1;
                }
            }
            $job->urgency_score = $budgetScore + $deadlineScore;
            return $job;
        })
        ->sortByDesc('urgency_score')
        ->take(3)
        ->values();
    
    // 3 Pekerjaan terbaru biasa (calm)
    $latestJobs = \App\Models\Job::where('status', 'open')
        ->with('user')
        ->latest()
        ->take(3)
        ->get();
    
    return view('welcome', compact('urgentJobs', 'latestJobs'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Public Job Routes (tidak perlu login)
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::middleware(['auth', 'verified'])->group(function () {
    // Role Switching
    Route::post('/role/switch', [\App\Http\Controllers\RoleController::class, 'switch'])->name('role.switch');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Job Routes (perlu login)
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    Route::post('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');
    Route::get('/my-jobs', [JobController::class, 'myJobs'])->name('jobs.my');
    Route::get('/my-applications', [JobController::class, 'myApplications'])->name('jobs.applications');
    Route::post('/applications/{application}/accept', [JobController::class, 'acceptApplication'])->name('applications.accept');
    Route::post('/jobs/{job}/complete', [JobController::class, 'completeJob'])->name('jobs.complete');
    
    // Admin Routes (Protected)
    Route::prefix('admin')->name('admin.')->middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
        
        // Users CRUD
        Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');
        Route::get('/users/{user}/edit', [\App\Http\Controllers\AdminController::class, 'editUser'])->name('users.edit');
        Route::patch('/users/{user}', [\App\Http\Controllers\AdminController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{user}', [\App\Http\Controllers\AdminController::class, 'destroyUser'])->name('users.destroy');
        
        // Jobs CRUD
        Route::get('/jobs', [\App\Http\Controllers\AdminController::class, 'jobs'])->name('jobs');
        Route::get('/jobs/{job}', [\App\Http\Controllers\AdminController::class, 'showJob'])->name('jobs.show');
        Route::get('/jobs/{job}/edit', [\App\Http\Controllers\AdminController::class, 'editJob'])->name('jobs.edit');
        Route::patch('/jobs/{job}', [\App\Http\Controllers\AdminController::class, 'updateJob'])->name('jobs.update');
        Route::delete('/jobs/{job}', [\App\Http\Controllers\AdminController::class, 'destroyJob'])->name('jobs.destroy');
        Route::post('/applications/{application}/accept', [\App\Http\Controllers\AdminController::class, 'acceptApplication'])->name('applications.accept');
        
        // Applications CRUD
        Route::get('/applications', [\App\Http\Controllers\AdminController::class, 'applications'])->name('applications');
        Route::patch('/applications/{application}', [\App\Http\Controllers\AdminController::class, 'updateApplication'])->name('applications.update');
        Route::delete('/applications/{application}', [\App\Http\Controllers\AdminController::class, 'destroyApplication'])->name('applications.destroy');
    });
});

require __DIR__.'/auth.php';

