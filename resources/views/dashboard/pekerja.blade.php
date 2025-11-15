<x-app-layout>
    <x-slot name="title">Dashboard Pekerja SIGAP</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-sigap-blue">Dashboard Pekerja SIGAP</h1>
                    <p class="text-gray-600 mt-2">Temukan peluang kerja dan kelola lamaran Anda</p>
                </div>
                @if(auth()->user()->canSwitchRole())
                    <form method="POST" action="{{ route('role.switch') }}" class="inline">
                        @csrf
                        <button type="submit" name="role" value="user" 
                            class="text-sm bg-sigap-blue hover:bg-blue-900 text-white px-4 py-2 rounded-lg transition">
                            Switch ke User
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total Lamaran</p>
                        <p class="text-3xl font-bold text-sigap-blue mt-2">{{ $myApplications->count() }}</p>
                    </div>
                    <div class="w-12 h-12 bg-sigap-blue/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-sigap-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Lamaran Pending</p>
                        <p class="text-3xl font-bold text-yellow-600 mt-2">
                            {{ $myApplications->where('status', 'pending')->count() }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Diterima</p>
                        <p class="text-3xl font-bold text-green-600 mt-2">
                            {{ $myApplications->where('status', 'accepted')->count() }}
                        </p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Jobs -->
        <div class="card mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-sigap-blue">Pekerjaan Tersedia</h2>
                <a href="{{ route('jobs.index') }}" class="text-sigap-orange hover:underline text-sm font-medium">
                    Lihat Semua →
                </a>
            </div>
            @if($availableJobs->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($availableJobs as $job)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <h3 class="text-lg font-semibold text-sigap-blue mb-2">
                                <a href="{{ route('jobs.show', $job) }}" class="hover:text-sigap-orange transition">
                                    {{ $job->title }}
                                </a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($job->description, 80) }}</p>
                            <div class="flex flex-wrap gap-2 text-sm mb-3">
                                <span class="badge badge-secondary">{{ $job->category }}</span>
                                <span class="badge badge-primary">Rp {{ number_format($job->budget, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $job->location }}
                            </div>
                            <a href="{{ route('jobs.show', $job) }}" class="btn-primary text-sm py-2 px-4 inline-block">
                                Lihat Detail
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-600">Tidak ada pekerjaan tersedia saat ini</p>
                </div>
            @endif
        </div>

        <!-- My Applications -->
        <div class="card">
            <h2 class="text-2xl font-bold text-sigap-blue mb-6">Lamaran Saya</h2>
            @if($myApplications->count() > 0)
                <div class="space-y-4">
                    @foreach($myApplications as $application)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-sigap-blue mb-2">
                                        <a href="{{ route('jobs.show', $application->job) }}" class="hover:text-sigap-orange transition">
                                            {{ $application->job->title }}
                                        </a>
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($application->job->description, 100) }}</p>
                                    <div class="flex flex-wrap gap-2 text-sm">
                                        <span class="badge badge-secondary">{{ $application->job->category }}</span>
                                        <span class="badge badge-primary">Rp {{ number_format($application->job->budget, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <div class="ml-4 text-right">
                                    @if($application->status == 'pending')
                                        <span class="badge bg-yellow-100 text-yellow-800">Pending</span>
                                    @elseif($application->status == 'accepted')
                                        <span class="badge bg-green-100 text-green-800">Diterima</span>
                                    @else
                                        <span class="badge bg-red-100 text-red-800">Ditolak</span>
                                    @endif
                                    <div class="mt-2">
                                        <a href="{{ route('jobs.show', $application->job) }}" class="text-sm text-sigap-orange hover:underline">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-600 mb-4">Belum ada lamaran yang dikirim</p>
                    <a href="{{ route('jobs.index') }}" class="btn-primary inline-block">
                        Jelajahi Pekerjaan
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

