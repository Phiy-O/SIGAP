<x-app-layout>
    <x-slot name="title">Dashboard Admin</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-sigap-blue">Dashboard Admin</h1>
            <p class="text-gray-600 mt-2">Kelola platform SIGAP</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total User</p>
                        <p class="text-3xl font-bold text-sigap-blue mt-2">{{ $stats['total_users'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-sigap-blue/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-sigap-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total Pekerja</p>
                        <p class="text-3xl font-bold text-sigap-orange mt-2">{{ $stats['total_pekerja'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-sigap-orange/10 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total Pekerjaan</p>
                        <p class="text-3xl font-bold text-green-600 mt-2">{{ $stats['total_jobs'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Pekerjaan Aktif</p>
                        <p class="text-3xl font-bold text-blue-600 mt-2">{{ $stats['open_jobs'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Total Lamaran</p>
                        <p class="text-3xl font-bold text-purple-600 mt-2">{{ $stats['total_applications'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Lamaran Pending</p>
                        <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $stats['pending_applications'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <a href="{{ route('admin.users') }}" class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition text-center">
                <h3 class="font-semibold text-sigap-blue mb-2">Kelola User</h3>
                <p class="text-sm text-gray-600">Lihat dan kelola semua user</p>
            </a>
            <a href="{{ route('admin.jobs') }}" class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition text-center">
                <h3 class="font-semibold text-sigap-blue mb-2">Kelola Pekerjaan</h3>
                <p class="text-sm text-gray-600">Lihat dan kelola semua pekerjaan</p>
            </a>
            <a href="{{ route('admin.applications') }}" class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition text-center">
                <h3 class="font-semibold text-sigap-blue mb-2">Kelola Lamaran</h3>
                <p class="text-sm text-gray-600">Lihat dan kelola semua lamaran</p>
            </a>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Jobs -->
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h3 class="font-semibold text-sigap-blue mb-4">Pekerjaan Terbaru</h3>
                <div class="space-y-3">
                    @foreach($recentJobs->take(5) as $job)
                        <div class="border-b border-gray-100 pb-3 last:border-0">
                            <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $job->title }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $job->user->name }} • {{ $job->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Users -->
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h3 class="font-semibold text-sigap-blue mb-4">User Terbaru</h3>
                <div class="space-y-3">
                    @foreach($recentUsers->take(5) as $user)
                        <div class="border-b border-gray-100 pb-3 last:border-0">
                            <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ ucfirst($user->role) }} • {{ $user->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Recent Applications -->
            <div class="bg-white border border-gray-200 rounded-lg p-6">
                <h3 class="font-semibold text-sigap-blue mb-4">Lamaran Terbaru</h3>
                <div class="space-y-3">
                    @foreach($recentApplications->take(5) as $app)
                        <div class="border-b border-gray-100 pb-3 last:border-0">
                            <p class="text-sm font-medium text-gray-900 line-clamp-1">{{ $app->job->title }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $app->pekerja->name }} • 
                                <span class="px-2 py-0.5 rounded text-xs {{ $app->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : ($app->status == 'accepted' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($app->status) }}
                                </span>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

