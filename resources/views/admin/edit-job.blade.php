<x-app-layout>
    <x-slot name="title">Edit Pekerjaan</x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-6">
            <a href="{{ route('admin.dashboard') }}" class="text-sigap-orange hover:underline">← Kembali</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <h2 class="text-2xl font-bold text-sigap-blue mb-6">Edit Pekerjaan</h2>
            
            <form method="POST" action="{{ route('admin.jobs.update', $job) }}">
                @csrf
                @method('PATCH')

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $job->title) }}" required
                            class="input-field @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <input type="text" name="category" value="{{ old('category', $job->category) }}" required
                            class="input-field @error('category') border-red-500 @enderror">
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="description" rows="6" required
                            class="input-field @error('description') border-red-500 @enderror">{{ old('description', $job->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                            <input type="text" name="location" value="{{ old('location', $job->location) }}" required
                                class="input-field @error('location') border-red-500 @enderror">
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Budget</label>
                            <input type="number" name="budget" value="{{ old('budget', $job->budget) }}" required min="0"
                                class="input-field @error('budget') border-red-500 @enderror">
                            @error('budget')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" required
                            class="input-field @error('status') border-red-500 @enderror">
                            <option value="open" {{ old('status', $job->status) == 'open' ? 'selected' : '' }}>Aktif</option>
                            <option value="in_progress" {{ old('status', $job->status) == 'in_progress' ? 'selected' : '' }}>Sedang Berjalan</option>
                            <option value="completed" {{ old('status', $job->status) == 'completed' ? 'selected' : '' }}>Selesai</option>
                            <option value="cancelled" {{ old('status', $job->status) == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="btn-primary flex-1">Simpan Perubahan</button>
                        <a href="{{ route('admin.jobs') }}" class="btn-outline flex-1 text-center">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

