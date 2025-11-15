<x-app-layout>
    <x-slot name="title">Masuk</x-slot>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/LOGO_SIGAP.png') }}" alt="SIGAP Logo" class="w-16 h-16 object-contain">
                </div>
                <h2 class="text-center text-3xl font-extrabold text-sigap-blue">
                    Masuk ke akun Anda
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Atau
                    <a href="{{ route('register') }}" class="font-medium text-sigap-orange hover:text-orange-600">
                        daftar akun baru
                    </a>
                </p>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="input-field @error('email') border-red-500 @enderror" 
                            value="{{ old('email') }}" 
                            placeholder="nama@email.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                            class="input-field @error('password') border-red-500 @enderror" 
                            placeholder="••••••••">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember" type="checkbox" 
                            class="h-4 w-4 text-sigap-orange focus:ring-sigap-orange border-gray-300 rounded">
                        <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                            Ingat saya
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-sigap-orange hover:text-orange-600">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center btn-primary">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

