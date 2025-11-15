<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIGAP') }} - {{ isset($title) ? $title : (isset($__env->yieldContent('title')) ? $__env->yieldContent('title') : 'Platform Layanan On-Demand') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        <!-- Navigation -->
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-sigap-orange rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <span class="text-2xl font-bold text-sigap-blue">SIGAP</span>
                            </a>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }} inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-sigap-orange' : 'border-transparent' }}">
                                Beranda
                            </a>
                            <a href="{{ route('jobs.index') }}" class="nav-link {{ request()->routeIs('jobs.*') ? 'nav-link-active' : '' }} inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('jobs.*') ? 'border-sigap-orange' : 'border-transparent' }}">
                                Pekerjaan
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                            <a href="{{ route('profile.edit') }}" class="nav-link">Profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link">Keluar</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                            <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
                        @endauth
                    </div>
                    <div class="sm:hidden flex items-center">
                        <button id="mobile-menu-button" type="button" class="text-gray-700 hover:text-sigap-orange focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu -->
            <div id="mobile-menu" class="sm:hidden hidden">
                <div class="pt-2 pb-3 space-y-1 bg-white border-t">
                    <a href="{{ route('home') }}" class="block px-4 py-2 nav-link">Beranda</a>
                    <a href="{{ route('jobs.index') }}" class="block px-4 py-2 nav-link">Pekerjaan</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 nav-link">Dashboard</a>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 nav-link">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 nav-link">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-4 py-2 nav-link">Masuk</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2 btn-primary mx-4">Daftar</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-400 p-4 m-4 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border-l-4 border-red-400 p-4 m-4 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-sigap-blue text-white mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="col-span-1 md:col-span-2">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 bg-sigap-orange rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <span class="text-2xl font-bold">SIGAP</span>
                        </div>
                        <p class="text-gray-300 mb-4">
                            Platform layanan on-demand yang menghubungkan pekerja dengan peluang kerja fleksibel. 
                            Mengubah waktu luang menjadi penghasilan tambahan.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Tautan</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-sigap-orange transition">Beranda</a></li>
                            <li><a href="{{ route('jobs.index') }}" class="text-gray-300 hover:text-sigap-orange transition">Pekerjaan</a></li>
                            @auth
                                <li><a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-sigap-orange transition">Dashboard</a></li>
                            @endauth
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                        <ul class="space-y-2 text-gray-300">
                            <li>Email: info@sigap.id</li>
                            <li>Phone: +62 XXX XXX XXXX</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-blue-800 mt-8 pt-8 text-center text-gray-300">
                    <p>&copy; {{ date('Y') }} SIGAP. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

