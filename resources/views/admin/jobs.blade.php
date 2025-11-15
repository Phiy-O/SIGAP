<x-app-layout>
    <x-slot name="title">Kelola Pekerjaan</x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-8">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-sigap-blue">Kelola Pekerjaan</h1>
                <p class="text-gray-600 mt-1">Daftar semua pekerjaan pekerjaan</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="text-sigap-orange hover:underline">← Kembali</a>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Budget</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pelamar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dibuat</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($jobs as $job)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ Str::limit($job->title, 40) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $job->user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-xs px-2 py-1 bg-sigap-blue/10 text-sigap-blue rounded-full">{{ $job->category }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-sigap-orange">
                                    Rp {{ number_format($job->budget, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.jobs.show', $job) }}" class="text-sm font-medium text-sigap-blue hover:text-sigap-orange">
                                        {{ $job->applications->count() }} Pelamar
                                    </a>
                                    @if($job->applications->where('status', 'pending')->count() > 0)
                                        <span class="ml-2 px-2 py-0.5 text-xs bg-yellow-100 text-yellow-800 rounded-full">
                                            {{ $job->applications->where('status', 'pending')->count() }} Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $job->status == 'open' ? 'bg-green-100 text-green-800' : ($job->status == 'in_progress' ? 'bg-blue-100 text-blue-800' : ($job->status == 'completed' ? 'bg-gray-100 text-gray-800' : 'bg-red-100 text-red-800')) }}">
                                        {{ ucfirst(str_replace('_', ' ', $job->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $job->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.jobs.show', $job) }}" class="text-sigap-blue hover:text-blue-900 mr-3">Detail</a>
                                    <a href="{{ route('admin.jobs.edit', $job) }}" class="text-sigap-orange hover:text-orange-600 mr-3">Edit</a>
                                    <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" class="inline" onsubmit="return confirm('Yakin hapus pekerjaan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>

