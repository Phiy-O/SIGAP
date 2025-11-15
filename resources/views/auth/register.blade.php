<x-app-layout>
    <x-slot name="title">Daftar</x-slot>

    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/LOGO_SIGAP.png') }}" alt="SIGAP Logo" class="w-16 h-16 object-contain">
                </div>
                <h2 class="text-center text-3xl font-extrabold text-sigap-blue">
                    Buat akun baru
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Atau
                    <a href="{{ route('login') }}" class="font-medium text-sigap-orange hover:text-orange-600">
                        masuk ke akun yang sudah ada
                    </a>
                </p>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                        <input id="name" name="name" type="text" autocomplete="name" required 
                            class="input-field @error('name') border-red-500 @enderror" 
                            value="{{ old('name') }}" 
                            placeholder="Nama lengkap Anda">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

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
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                        <input id="phone" name="phone" type="tel" autocomplete="tel" 
                            class="input-field @error('phone') border-red-500 @enderror" 
                            value="{{ old('phone') }}" 
                            placeholder="08XX XXXX XXXX">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Daftar Sebagai</label>
                        <select id="role" name="role" required 
                            class="input-field @error('role') border-red-500 @enderror">
                            <option value="">Pilih peran</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User (Mencari Pekerja)</option>
                            <option value="pekerja" {{ old('role') == 'pekerja' ? 'selected' : '' }}>Pekerja SIGAP</option>
                        </select>
                        @error('role')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
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
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

