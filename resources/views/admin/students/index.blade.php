<x-admin-premium-layout>
    <x-slot name="title">Daftar Mahasiswa</x-slot>

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Daftar Mahasiswa</h1>
            <p class="text-gray-500 mt-1">Daftar seluruh mahasiswa yang terdaftar di sistem.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="document.getElementById('importModal').classList.remove('hidden')" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-50 text-indigo-600 rounded-xl font-semibold hover:bg-indigo-100 transition border border-indigo-100">
                <i data-lucide="upload" class="w-5 h-5"></i>
                Import Excel
            </button>
            <a href="{{ route('admin.students.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-brand-orange text-white rounded-xl font-semibold shadow-lg shadow-orange-100 hover:bg-orange-600 transition">
                <i data-lucide="plus" class="w-5 h-5"></i>
                Tambah Mahasiswa
            </a>
        </div>
    </div>

    <!-- Import Modal -->
    <div id="importModal" class="hidden fixed inset-0 z-[60] overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-gray-500/20 backdrop-blur-sm transition-opacity" onclick="document.getElementById('importModal').classList.add('hidden')"></div>

            <div class="relative bg-white rounded-[2rem] card-shadow w-full max-w-lg overflow-hidden">
                <div class="p-8 border-b border-gray-50 flex items-center justify-between">
                    <h3 class="text-xl font-bold text-gray-800">Import Data Mahasiswa</h3>
                    <button onclick="document.getElementById('importModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>
                </div>
                
                <form action="{{ route('admin.students.import') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <div class="p-6 bg-orange-50 rounded-2xl border border-orange-100 flex gap-4 items-start">
                            <div class="p-2 bg-white rounded-lg text-orange-500 shadow-sm shrink-0">
                                <i data-lucide="info" class="w-5 h-5"></i>
                            </div>
                            <div class="text-xs text-orange-800 leading-relaxed font-medium">
                                <p class="font-bold mb-1">Panduan Kolom Excel:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <li><b>nama</b>: Nama lengkap mahasiswa</li>
                                    <li><b>email</b>: Email mahasiswa</li>
                                    <li><b>nim</b>: NIM mahasiswa</li>
                                </ul>
                                <p class="mt-2 text-[10px] opacity-70 italic">Sistem akan otomatis mengatur password default sama dengan NIM.</p>
                            </div>
                        </div>

                        <div class="relative group">
                            <input type="file" name="file" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="border-2 border-dashed border-gray-200 group-hover:border-orange-200 rounded-3xl p-10 text-center transition-all bg-gray-50/50 group-hover:bg-orange-50/30">
                                <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center mx-auto mb-4 text-gray-400 group-hover:text-orange-500 shadow-sm transition-colors">
                                    <i data-lucide="file-up" class="w-8 h-8"></i>
                                </div>
                                <p class="text-sm font-bold text-gray-600">Klik atau seret file Excel ke sini</p>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-widest font-bold">xlsx, xls, atau csv (Max 2MB)</p>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 bg-brand-orange text-white rounded-2xl font-bold shadow-lg shadow-orange-100 hover:bg-orange-600 transition flex items-center justify-center gap-2 group">
                        Mulai Import <i data-lucide="chevron-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </form>
            </div>
        </div>
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
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Mahasiswa</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">NIM</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($students as $student)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($student->name) }}&background=f3f4f6&color=6b7280" class="w-10 h-10 rounded-xl border border-gray-100">
                                    <span class="font-bold text-gray-700">{{ $student->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg text-xs font-bold border border-indigo-100">{{ $student->nim }}</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-sm font-medium">{{ $student->email }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.students.edit', $student) }}" class="p-2 text-gray-400 hover:text-brand-orange hover:bg-orange-50 rounded-lg transition">
                                        <i data-lucide="edit-3" class="w-5 h-5"></i>
                                    </a>
                                    <form action="{{ route('admin.students.destroy', $student) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">
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
                                        <i data-lucide="users" class="w-8 h-8"></i>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-800">Belum Ada Data</h3>
                                    <p class="text-gray-400 text-sm mt-1">Klik tombol Tambah untuk menambah mahasiswa baru.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($students->hasPages())
            <div class="px-6 py-4 bg-gray-50/50 border-t border-gray-100">
                {{ $students->links() }}
            </div>
        @endif
    </div>
</x-admin-premium-layout>
