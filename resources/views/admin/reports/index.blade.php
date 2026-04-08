<x-admin-premium-layout>
    <x-slot name="title">Pilih Laporan Evaluasi Dosen</x-slot>

    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Hasil Evaluasi Dosen</h1>
        <p class="text-gray-500 mt-1">Pilih dosen dan semester untuk melihat laporan detail evaluasi.</p>
    </div>

    <div class="bg-white p-8 rounded-[2rem] border border-gray-100 card-shadow overflow-hidden">
        <form method="GET" action="{{ route('admin.reports.index') }}" id="filterForm" class="mb-10 flex flex-wrap gap-4 items-end">
            <div class="flex-1 min-w-[200px]">
                <label for="semester_id" class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Pilih Semester</label>
                <select name="semester_id" onchange="this.form.submit()" class="w-full bg-gray-50 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-orange-500 transition-all font-medium">
                    @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}" {{ $selectedSemesterId == $semester->id ? 'selected' : '' }}>
                            {{ $semester->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex-none">
                <button type="submit" class="px-6 py-3 bg-gray-900 text-white rounded-xl text-sm font-bold shadow-lg hover:bg-gray-800 transition">Refresh</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-gray-50">
                        <th class="px-4 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Dosen</th>
                        <th class="px-4 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">NIDN</th>
                        <th class="px-4 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lecturers as $lecturer)
                        <tr class="group hover:bg-gray-50 transition border-b border-gray-50">
                            <td class="px-4 py-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-orange-100/50 text-orange-600 rounded-xl flex items-center justify-center font-bold text-xs shrink-0">
                                        {{ substr($lecturer->user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800 leading-none">{{ $lecturer->user->name }}</p>
                                        <p class="text-[10px] text-gray-400 mt-1 uppercase">{{ $lecturer->title }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-6 text-sm font-medium text-gray-500">{{ $lecturer->nidn }}</td>
                            <td class="px-4 py-6 text-right">
                                <a href="{{ route('admin.reports.show', ['lecturer' => $lecturer->id, 'semester' => $selectedSemesterId]) }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-orange-500 text-white rounded-xl text-xs font-bold hover:bg-orange-600 transition shadow-lg shadow-orange-100 hover:shadow-orange-200">
                                    <i data-lucide="file-text" class="w-4 h-4"></i>
                                    Lihat Laporan
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-premium-layout>
