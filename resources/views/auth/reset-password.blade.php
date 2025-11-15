<x-app-layout>
    <x-slot name="title">Reset Password</x-slot>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="flex justify-center mb-4">
                    <div class="w-16 h-16 bg-sigap-orange rounded-xl flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-center text-3xl font-extrabold text-sigap-blue">
                    Reset Password
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Masukkan password baru untuk akun Anda
                </p>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                            class="input-field @error('email') border-red-500 @enderror" 
                            value="{{ old('email', $request->email) }}" 
                            readonly>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                        <input id="password" name="password" type="password" autocomplete="new-password" required 
                            class="input-field @error('password') border-red-500 @enderror" 
                            placeholder="Minimal 8 karakter">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                            class="input-field" 
                            placeholder="Ulangi password">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center btn-primary">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

