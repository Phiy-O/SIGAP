<x-app-layout>
    <x-slot name="title">Edit User</x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-6">
            <a href="{{ route('admin.users') }}" class="text-sigap-orange hover:underline">← Kembali</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <h2 class="text-2xl font-bold text-sigap-blue mb-6">Edit User</h2>
            
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PATCH')

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="input-field @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="input-field @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="input-field @error('phone') border-red-500 @enderror">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                        <select name="role" required
                            class="input-field @error('role') border-red-500 @enderror"
                            {{ $user->isSuperAdmin() ? 'disabled' : '' }}>
                            <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                            <option value="pekerja" {{ old('role', $user->role) == 'pekerja' ? 'selected' : '' }}>Pekerja</option>
                            @if(auth()->user()->isSuperAdmin())
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                            @endif
                        </select>
                        @if($user->isSuperAdmin())
                            <p class="mt-1 text-sm text-gray-500">Super Admin tidak dapat diubah</p>
                        @endif
                        @error('role')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                        <textarea name="address" rows="3"
                            class="input-field @error('address') border-red-500 @enderror">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="btn-primary flex-1">Simpan Perubahan</button>
                        <a href="{{ route('admin.users') }}" class="btn-outline flex-1 text-center">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

