<x-app-layout>
    <x-slot name="title">Detail Pekerjaan</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}" class="text-sigap-orange hover:underline">← Kembali ke Dashboard</a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Job Details -->
            <div class="lg:col-span-2">
                <div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="text-xs font-semibold px-3 py-1 bg-sigap-blue/10 text-sigap-blue rounded-full">{{ $job->category }}</span>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $job->status == 'open' ? 'bg-green-100 text-green-800' : ($job->status == 'in_progress' ? 'bg-blue-100 text-blue-800' : ($job->status == 'completed' ? 'bg-gray-100 text-gray-800' : 'bg-red-100 text-red-800')) }}">
                                    {{ ucfirst(str_replace('_', ' ', $job->status)) }}
                                </span>
                            </div>
                            <h1 class="text-3xl font-bold text-sigap-blue mb-4">{{ $job->title }}</h1>
                        </div>
                        <a href="{{ route('admin.jobs.edit', $job) }}" class="btn-outline text-sm">
                            Edit
                        </a>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Diposting oleh: <strong class="ml-1">{{ $job->user->name }}</strong>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ $job->location }}
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <strong class="text-sigap-orange text-lg">Rp {{ number_format($job->budget, 0, ',', '.') }}</strong>
                        </div>
                        @if($job->deadline)
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Deadline: {{ $job->deadline->format('d M Y, H:i') }}
                            </div>
                        @endif
                    </div>

                    <div class="border-t pt-6">
                        <h2 class="text-xl font-semibold text-sigap-blue mb-3">Deskripsi Pekerjaan</h2>
                        <p class="text-gray-700 whitespace-pre-line">{{ $job->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Applications Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white border border-gray-200 rounded-lg p-6 sticky top-20">
                    <h3 class="text-lg font-semibold text-sigap-blue mb-4">Statistik Pelamar</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Total Pelamar</span>
                            <span class="text-lg font-bold text-sigap-blue">{{ $job->applications->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Pending</span>
                            <span class="text-lg font-bold text-yellow-600">{{ $job->applications->where('status', 'pending')->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Diterima</span>
                            <span class="text-lg font-bold text-green-600">{{ $job->applications->where('status', 'accepted')->count() }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Ditolak</span>
                            <span class="text-lg font-bold text-red-600">{{ $job->applications->where('status', 'rejected')->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Applications List -->
        <div class="bg-white border border-gray-200 rounded-lg p-6 mt-6">
            <h2 class="text-2xl font-bold text-sigap-blue mb-6">Daftar Pelamar</h2>
            
            @if($job->applications->count() > 0)
                <div class="space-y-4">
                    @foreach($job->applications as $application)
                        <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <div class="w-12 h-12 bg-sigap-orange rounded-full flex items-center justify-center text-white font-bold text-lg">
                                            {{ strtoupper(substr($application->pekerja->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-sigap-blue">{{ $application->pekerja->name }}</h3>
                                            <p class="text-sm text-gray-500">{{ $application->pekerja->email }}</p>
                                            @if($application->pekerja->phone)
                                                <p class="text-sm text-gray-500">{{ $application->pekerja->phone }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    @if($application->message)
                                        <div class="bg-gray-50 rounded-lg p-4 mt-3">
                                            <p class="text-sm text-gray-700">{{ $application->message }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4 text-right">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full mb-2 block {{ $application->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : ($application->status == 'accepted' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                    @if($application->status == 'pending' && $job->status == 'open')
                                        <form method="POST" action="{{ route('admin.applications.accept', $application) }}" class="mt-2">
                                            @csrf
                                            <button type="submit" 
                                                class="bg-sigap-orange hover:bg-orange-600 text-white font-semibold py-2 px-4 rounded-lg text-sm transition"
                                                onclick="return confirm('Terima pelamar ini? Status pekerjaan akan berubah menjadi sedang berjalan.')">
                                                Terima
                                            </button>
                                        </form>
                                    @elseif($application->status == 'accepted')
                                        <p class="text-xs text-green-600 mt-2 font-medium">✓ Diterima</p>
                                    @endif
                                </div>
                            </div>
                            <div class="text-xs text-gray-500 mt-3">
                                Melamar pada: {{ $application->created_at->format('d M Y, H:i') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="text-gray-600">Belum ada pelamar untuk pekerjaan ini</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

