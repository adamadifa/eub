<x-admin-premium-layout>
    <x-slot name="title">Tambah Kelas Baru</x-slot>

    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('admin.classes.index') }}" class="p-2.5 text-gray-400 hover:text-gray-600 hover:bg-white rounded-xl transition border border-transparent hover:border-gray-100 shadow-sm">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Tambah Kelas</h1>
            <p class="text-gray-500 mt-1">Petakan mata kuliah, dosen pengampu, dan semester.</p>
        </div>
    </div>

    <div class="max-w-3xl">
        <div class="bg-white rounded-[2rem] border border-gray-100 card-shadow p-8 md:p-10">
            <form action="{{ route('admin.classes.store') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Nama / Grup Kelas</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Kelas A, IF-01, Regular"
                            class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                        @error('name') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Mata Kuliah</label>
                        <select name="course_id" required class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 appearance-none">
                            <option value="">Pilih Mata Kuliah</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>[{{ $course->code }}] {{ $course->name }}</option>
                            @endforeach
                        </select>
                        @error('course_id') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Dosen Pengampu</label>
                        <select name="lecturer_id" required class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 appearance-none">
                            <option value="">Pilih Dosen</option>
                            @foreach($lecturers as $lecturer)
                                <option value="{{ $lecturer->id }}" {{ old('lecturer_id') == $lecturer->id ? 'selected' : '' }}>{{ $lecturer->user->name }} ({{ $lecturer->title }})</option>
                            @endforeach
                        </select>
                        @error('lecturer_id') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Semester</label>
                        <select name="semester_id" required class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 appearance-none">
                            <option value="">Pilih Semester</option>
                            @foreach($semesters as $semester)
                                <option value="{{ $semester->id }}" {{ old('semester_id') == $semester->id ? 'selected' : '' }} {{ $semester->is_active ? 'selected' : '' }}>
                                    {{ $semester->name }} {{ $semester->is_active ? '(Aktif)' : '' }}
                                </option>
                            @endforeach
                        </select>
                        @error('semester_id') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="pt-6 flex items-center gap-4">
                    <button type="submit" class="flex-1 md:flex-none px-10 py-4 bg-brand-orange text-white rounded-2xl font-bold shadow-lg shadow-orange-100 hover:bg-orange-600 transition flex items-center justify-center gap-2 group">
                        Simpan Kelas <i data-lucide="chevron-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    <a href="{{ route('admin.classes.index') }}" class="flex-1 md:flex-none px-10 py-4 bg-gray-100 text-gray-600 rounded-2xl font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-premium-layout>
