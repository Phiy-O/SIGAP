<x-app-layout>
    <x-slot name="title">Daftar Pekerjaan</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-sigap-blue">Daftar Pekerjaan</h1>
                    <p class="text-gray-600 mt-2">Temukan pekerjaan yang sesuai dengan dirimu</p>
                </div>
            </div>
        </div>

        @if($jobs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="card hover:scale-105 transition-transform duration-200 relative">
                        @if(isset($job->urgency_score) && $job->urgency_score > 0.5)
                            <div class="absolute top-4 right-4 z-10">
                                <span class="px-3 py-1 bg-red-500 text-white text-xs font-bold rounded-full">URGENT</span>
                            </div>
                        @endif
                        <div class="mb-4">
                            <span class="badge badge-secondary">{{ $job->category }}</span>
                            @if($job->status == 'open')
                                <span class="badge badge-primary ml-2">Aktif</span>
                            @endif
                        </div>
                        <h3 class="text-xl font-semibold text-sigap-blue mb-2">
                            <a href="{{ route('jobs.show', $job) }}" class="hover:text-sigap-orange transition">
                                {{ $job->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ Str::limit($job->description, 120) }}
                        </p>
                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-sigap-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $job->location }}
                            </div>
                            <div class="flex items-center text-sm font-bold {{ isset($job->urgency_score) && $job->urgency_score > 0.5 ? 'text-red-600' : 'text-sigap-orange' }}">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Rp {{ number_format($job->budget, 0, ',', '.') }}
                            </div>
                            @if($job->deadline)
                                <div class="flex items-center text-xs {{ isset($job->urgency_score) && $job->urgency_score > 0.5 ? 'text-red-600 font-semibold' : 'text-gray-500' }}">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Deadline: {{ $job->deadline->format('d M Y') }}
                                </div>
                            @endif
                        </div>
                        <a href="{{ route('jobs.show', $job) }}" class="btn-primary w-full text-center">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $jobs->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-2xl font-semibold text-gray-700 mb-2">Belum ada pekerjaan</h3>
                <p class="text-gray-600 mb-6">Jadilah yang pertama membuat pekerjaan pekerjaan</p>
                @auth
                    @if(auth()->user()->isUser())
                        <a href="{{ route('jobs.create') }}" class="btn-primary">
                            Buat Pekerjaan Pertama
                        </a>
                    @endif
                @else
                    <a href="{{ route('register') }}" class="btn-primary">
                        Daftar Sekarang
                    </a>
                @endauth
            </div>
        @endif
    </div>
</x-app-layout>

