<x-app-layout>
    <x-slot name="title">Edit Profil</x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-sigap-blue">Edit Profil</h1>
            <p class="text-gray-600 mt-2">Perbarui informasi profil Anda</p>
        </div>

        <div class="card">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text" id="name" name="name" required
                            class="input-field @error('name') border-red-500 @enderror"
                            value="{{ old('name', $user->name) }}">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" required
                            class="input-field @error('email') border-red-500 @enderror"
                            value="{{ old('email', $user->email) }}">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            No. Telepon
                        </label>
                        <input type="tel" id="phone" name="phone"
                            class="input-field @error('phone') border-red-500 @enderror"
                            value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                            Alamat
                        </label>
                        <textarea id="address" name="address" rows="3"
                            class="input-field @error('address') border-red-500 @enderror">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Peran
                        </label>
                        <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-lg">
                            <span class="font-medium text-sigap-blue">
                                {{ $user->role === 'pekerja' ? 'Pekerja SIGAP' : 'User' }}
                            </span>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="btn-primary flex-1">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn-outline flex-1 text-center">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Logout & Delete Account -->
        <div class="card mt-6 border-gray-200">
            <h2 class="text-xl font-semibold text-sigap-blue mb-4">Keluar dari Akun</h2>
            <p class="text-gray-600 text-sm mb-4">
                Keluar dari akun Anda. Anda dapat masuk kembali kapan saja.
            </p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                    class="bg-sigap-orange hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-lg transition-colors">
                    Keluar
                </button>
            </form>
        </div>

        <!-- Delete Account -->
        <div class="card mt-6 border-red-200">
            <h2 class="text-xl font-semibold text-red-600 mb-4">Hapus Akun</h2>
            <p class="text-gray-600 text-sm mb-4">
                Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. 
                Sebelum menghapus akun, harap unduh data atau informasi yang ingin Anda simpan.
            </p>
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <button type="submit" 
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.')">
                    Hapus Akun
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

