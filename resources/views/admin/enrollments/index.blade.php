<x-admin-premium-layout>
    <x-slot name="title">Plotting Mahasiswa (Batch)</x-slot>

    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Plotting Mahasiswa</h1>
            <p class="text-gray-500 mt-1">Kelola daftar mahasiswa per kelas dengan lebih cepat.</p>
        </div>
        
        <div class="flex items-center gap-3">
            <form action="{{ route('admin.enrollments.index') }}" method="GET" id="filterForm" class="flex items-center gap-3">
                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Semester</label>
                    <select name="semester_id" onchange="this.form.submit()" class="block w-48 px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 outline-none focus:ring-2 focus:ring-orange-500 transition-all">
                        @foreach($semesters as $sem)
                            <option value="{{ $sem->id }}" {{ $selectedSemesterId == $sem->id ? 'selected' : '' }}>
                                {{ $sem->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-1">Pilih Kelas</label>
                    <select name="class_id" onchange="this.form.submit()" class="block w-64 px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 outline-none focus:ring-2 focus:ring-orange-500 transition-all">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ $selectedClassId == $class->id ? 'selected' : '' }}>
                                [{{ $class->course->code }}] {{ $class->course->name }} - {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-100 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
            <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(!$selectedClassId)
        <div class="bg-white rounded-[2.5rem] border border-gray-100 p-20 text-center card-shadow">
            <div class="w-24 h-24 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <i data-lucide="layers" class="w-10 h-10 text-orange-500"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Pilih Kelas Terlebih Dahulu</h2>
            <p class="text-gray-400 mt-2 max-w-md mx-auto italic">Silakan pilih semester dan kelas pada dropdown di atas untuk mulai memploting mahasiswa ke dalam kelas tersebut.</p>
        </div>
    @else
        <div class="bg-white rounded-[2.5rem] border border-gray-100 card-shadow overflow-hidden">
            <div class="p-8 border-b border-gray-50 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-500 border border-indigo-100">
                        <i data-lucide="graduation-cap" class="w-7 h-7"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $selectedClass->course->name }}</h2>
                        <div class="flex items-center gap-2 mt-0.5">
                            <span class="text-xs font-bold text-indigo-500 uppercase tracking-widest">{{ $selectedClass->course->code }}</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span class="text-xs font-bold text-orange-500 uppercase tracking-widest">{{ $selectedClass->name }}</span>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                    <input type="text" id="studentSearch" placeholder="Cari nama atau NIM..." 
                        class="pl-11 pr-4 py-3 bg-gray-50 border-none rounded-2xl text-sm w-full md:w-80 focus:ring-2 focus:ring-orange-500 transition-all font-medium">
                </div>
            </div>

            <form action="{{ route('admin.enrollments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="course_class_id" value="{{ $selectedClassId }}">

                <div class="p-6 overflow-x-auto">
                    <table class="w-full text-left border-collapse" id="studentTable">
                        <thead>
                            <tr class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">
                                <th class="px-6 py-4 w-16">
                                    <div class="flex justify-center">
                                        <input type="checkbox" id="selectAll" class="w-5 h-5 rounded-lg border-gray-300 text-orange-500 focus:ring-orange-500">
                                    </div>
                                </th>
                                <th class="px-6 py-4">Informasi Mahasiswa</th>
                                <th class="px-6 py-4">NIM</th>
                                <th class="px-6 py-4">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($students as $student)
                                <tr class="student-row hover:bg-gray-50/50 transition group">
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center">
                                            <input type="checkbox" name="user_ids[]" value="{{ $student->id }}" 
                                                class="student-checkbox w-5 h-5 rounded-lg border-gray-300 text-orange-500 focus:ring-orange-500"
                                                {{ in_array($student->id, $enrolledUserIds) ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-9 h-9 rounded-xl bg-gray-100 flex items-center justify-center font-bold text-gray-400 text-xs uppercase">
                                                {{ substr($student->name, 0, 1) }}
                                            </div>
                                            <span class="text-sm font-bold text-gray-700 search-name">{{ $student->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-xs font-bold text-gray-500 tracking-wider search-nim">{{ $student->nim }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if(in_array($student->id, $enrolledUserIds))
                                            <span class="px-3 py-1 bg-green-50 text-green-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-green-100">Terdaftar</span>
                                        @else
                                            <span class="px-3 py-1 bg-gray-50 text-gray-400 rounded-full text-[10px] font-black uppercase tracking-widest border border-gray-100">Belum Ada</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-8 bg-gray-50/50 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                        Total Mahasiswa: <span id="selectedCount" class="text-orange-500">{{ count($enrolledUserIds) }}</span> / {{ count($students) }}
                    </p>
                    <button type="submit" class="px-10 py-4 bg-brand-orange text-white rounded-2xl font-bold shadow-lg shadow-orange-200 hover:bg-orange-600 transition flex items-center justify-center gap-2 group">
                        Simpan Perubahan <i data-lucide="save" class="w-5 h-5 group-hover:scale-110 transition-transform"></i>
                    </button>
                </div>
            </form>
        </div>
    @endif

    <script>
        // Checkbox logic
        const selectAll = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.student-checkbox');
        const countSpan = document.getElementById('selectedCount');

        if(selectAll) {
            selectAll.addEventListener('change', function() {
                checkboxes.forEach(cb => {
                    if(cb.closest('.student-row').style.display !== 'none') {
                        cb.checked = this.checked;
                    }
                });
                updateCount();
            });
        }

        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateCount);
        });

        function updateCount() {
            const checked = document.querySelectorAll('.student-checkbox:checked').length;
            countSpan.innerText = checked;
        }

        // Search logic
        const searchInput = document.getElementById('studentSearch');
        if(searchInput) {
            searchInput.addEventListener('keyup', function() {
                const term = this.value.toLowerCase();
                const rows = document.querySelectorAll('.student-row');
                
                rows.forEach(row => {
                    const name = row.querySelector('.search-name').innerText.toLowerCase();
                    const nim = row.querySelector('.search-nim').innerText.toLowerCase();
                    
                    if(name.includes(term) || nim.includes(term)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }
    </script>
</x-admin-premium-layout>
