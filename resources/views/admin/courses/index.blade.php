<x-admin-premium-layout>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Manajemen Mata Kuliah</h1>
            <nav class="flex text-gray-500 text-sm mt-1">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-500 transition">Dashboard</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Mata Kuliah</span>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.courses.create') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-bold py-2.5 px-5 rounded-xl transition shadow-lg shadow-orange-200">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                Tambah Mata Kuliah
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-100 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-gray-100 card-shadow overflow-hidden">
        <div class="p-8 border-b border-gray-50 flex flex-wrap items-center justify-between gap-4">
            <h3 class="font-bold text-gray-800 text-lg">Daftar Mata Kuliah</h3>
            <div class="flex items-center gap-3">
                <div class="relative">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                    <input type="text" placeholder="Cari kode atau nama..." class="pl-10 pr-4 py-2 bg-gray-50 border-none rounded-xl text-sm w-64 focus:ring-2 focus:ring-orange-500 transition-all">
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-100">
                <thead class="bg-gray-50/50">
                    <tr>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Kode MK</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">Nama Mata Kuliah</th>
                        <th class="px-8 py-4 text-left text-xs font-bold text-gray-400 uppercase tracking-widest">SKS</th>
                        <th class="px-8 py-4 text-right text-xs font-bold text-gray-400 uppercase tracking-widest">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($courses as $course)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-8 py-5 whitespace-nowrap">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-lg text-xs font-bold border border-indigo-100">{{ $course->code }}</span>
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap">
                                <span class="text-sm font-bold text-gray-700">{{ $course->name }}</span>
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-500">{{ $course->credits }} SKS</span>
                            </td>
                            <td class="px-8 py-5 whitespace-nowrap text-right">
                                <div class="flex justify-end items-center gap-2">
                                    <a href="{{ route('admin.courses.edit', $course) }}" class="p-2 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="Edit">
                                        <i data-lucide="edit-3" class="w-5 h-5"></i>
                                    </a>
                                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-12 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="w-16 h-16 bg-gray-50 rounded-2xl flex items-center justify-center text-gray-300">
                                        <i data-lucide="book-x" class="w-8 h-8"></i>
                                    </div>
                                    <p class="text-gray-400 font-medium">Belum ada data mata kuliah.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-8 bg-gray-50/30 border-t border-gray-50">
            <div class="flex items-center justify-between text-sm text-gray-400 font-medium">
                <p>Total: {{ $courses->count() }} Mata Kuliah</p>
            </div>
        </div>
    </div>
</x-admin-premium-layout>
