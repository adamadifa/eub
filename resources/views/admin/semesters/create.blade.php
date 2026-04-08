<x-admin-premium-layout>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Tambah Semester</h1>
            <nav class="flex text-gray-500 text-sm mt-1">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-500 transition">Dashboard</a>
                <span class="mx-2">/</span>
                <a href="{{ route('admin.semesters.index') }}" class="hover:text-orange-500 transition">Semester</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Tambah Baru</span>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.semesters.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-orange-500 font-bold transition">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="max-w-3xl">
        <div class="bg-white rounded-3xl border border-gray-100 card-shadow overflow-hidden">
            <div class="p-8 border-b border-gray-50">
                <h3 class="font-bold text-gray-800 text-lg">Form Semester Baru</h3>
                <p class="text-sm text-gray-400">Masukkan detail informasi untuk semester akademik baru.</p>
            </div>
            <div class="p-8">
                <form action="{{ route('admin.semesters.store') }}" method="POST" class="space-y-8">
                    @csrf
                    
                    <div class="space-y-2">
                        <label for="name" class="text-sm font-bold text-gray-700 tracking-wide">Nama Semester</label>
                        <div class="relative">
                            <i data-lucide="tag" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                            <input id="name" name="name" type="text" 
                                class="w-full pl-12 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium placeholder:text-gray-300"
                                placeholder="Contoh: Ganjil 2024/2025" 
                                value="{{ old('name') }}" 
                                required autofocus>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="p-6 bg-orange-50/50 rounded-2xl border border-orange-100/50 flex items-center justify-between group cursor-pointer" onclick="document.getElementById('is_active').click()">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-orange-500">
                                <i data-lucide="toggle-right" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Set sebagai Semester Aktif</p>
                                <p class="text-xs text-orange-600/70">Semester ini akan menjadi acuan kuesioner saat ini.</p>
                            </div>
                        </div>
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} 
                            class="w-6 h-6 rounded-lg border-gray-200 text-orange-500 focus:ring-orange-500">
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-8 rounded-2xl transition shadow-lg shadow-orange-200 flex items-center gap-2">
                            <i data-lucide="save" class="w-5 h-5"></i>
                            Simpan Semester
                        </button>
                        <a href="{{ route('admin.semesters.index') }}" class="text-gray-400 hover:text-gray-600 font-bold transition px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-premium-layout>
