<x-app-layout>
    <x-slot name="title">Edit Pekerjaan</x-slot>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-sigap-blue">Edit Pekerjaan</h1>
            <p class="text-gray-600 mt-2">Perbarui informasi pekerjaan pekerjaan</p>
        </div>

        <div class="card">
            <form method="POST" action="{{ route('jobs.update', $job) }}">
                @csrf
                @method('patch')

                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Judul Pekerjaan <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" name="title" required
                            class="input-field @error('title') border-red-500 @enderror"
                            value="{{ old('title', $job->title) }}">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select id="category" name="category" required
                            class="input-field @error('category') border-red-500 @enderror">
                            <option value="">Pilih kategori</option>
                            <option value="Bersih-bersih" {{ old('category', $job->category) == 'Bersih-bersih' ? 'selected' : '' }}>Bersih-bersih</option>
                            <option value="Pindahan" {{ old('category', $job->category) == 'Pindahan' ? 'selected' : '' }}>Pindahan</option>
                            <option value="Tukang" {{ old('category', $job->category) == 'Tukang' ? 'selected' : '' }}>Tukang</option>
                            <option value="Delivery" {{ old('category', $job->category) == 'Delivery' ? 'selected' : '' }}>Delivery</option>
                            <option value="Lainnya" {{ old('category', $job->category) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="6" required
                            class="input-field @error('description') border-red-500 @enderror">{{ old('description', $job->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                Lokasi <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="location" name="location" required
                                class="input-field @error('location') border-red-500 @enderror"
                                value="{{ old('location', $job->location) }}">
                            @error('location')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">
                                Budget (Rp) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="budget" name="budget" required min="0" step="1000"
                                class="input-field @error('budget') border-red-500 @enderror"
                                value="{{ old('budget', $job->budget) }}">
                            @error('budget')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="deadline" class="block text-sm font-medium text-gray-700 mb-2">
                            Deadline (Opsional)
                        </label>
                        <input type="datetime-local" id="deadline" name="deadline"
                            class="input-field @error('deadline') border-red-500 @enderror"
                            value="{{ old('deadline', $job->deadline ? $job->deadline->format('Y-m-d\TH:i') : '') }}">
                        @error('deadline')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select id="status" name="status" required
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
    </div>
</x-app-layout>

