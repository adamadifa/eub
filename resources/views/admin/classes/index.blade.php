<x-admin-premium-layout>
    <x-slot name="title">Manajemen Kelas</x-slot>

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Manajemen Kelas</h1>
            <p class="text-gray-500 mt-1">Kelola pembagian kelas, dosen pengampu, dan semester.</p>
        </div>
        <a href="{{ route('admin.classes.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#008444] text-white rounded-xl font-semibold shadow-lg shadow-green-100 hover:bg-[#006b35] transition">
            <i data-lucide="plus" class="w-5 h-5"></i>
            Tambah Kelas
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-100 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-gray-100 card-shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Mata Kuliah / Kelas</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Dosen Pengampu</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-center">Semester</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($classes as $class)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-bold text-gray-800 tracking-tight">{{ $class->course->name }}</span>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">{{ $class->course->code }}</span>
                                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                        <span class="text-xs font-bold text-[#008444]">{{ $class->name }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-green-50 flex items-center justify-center text-[#008444]">
                                        <i data-lucide="user" class="w-4 h-4"></i>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold text-gray-700 leading-none">{{ $class->lecturer->user->name }}</span>
                                        <span class="text-[10px] text-gray-400 font-medium mt-1 uppercase tracking-tighter">{{ $class->lecturer->title }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-[10px] font-bold border border-gray-200 uppercase tracking-wider">
                                    {{ $class->semester->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.classes.edit', $class) }}" class="p-2 text-gray-400 hover:text-[#008444] hover:bg-green-50 rounded-lg transition">
                                        <i data-lucide="edit-3" class="w-5 h-5"></i>
                                    </a>
                                    <form action="{{ route('admin.classes.destroy', $class) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 mb-4">
                                        <i data-lucide="layers" class="w-8 h-8"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-800">Belum Ada Kelas</h3>
                                    <p class="text-gray-400 text-sm mt-1">Silakan tambah kelas baru untuk memetakan mata kuliah dan dosen.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($classes->hasPages())
            <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-100">
                {{ $classes->links() }}
            </div>
        @endif
    </div>
</x-admin-premium-layout>
