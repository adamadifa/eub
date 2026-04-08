<x-admin-premium-layout>
    <x-slot name="title">Tambah Dosen Baru</x-slot>

    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('admin.lecturers.index') }}" class="p-2.5 text-gray-400 hover:text-gray-600 hover:bg-white rounded-xl transition border border-transparent hover:border-gray-100 shadow-sm">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Tambah Dosen</h1>
            <p class="text-gray-500 mt-1">Lengkapi data dosen pengampu di bawah ini.</p>
        </div>
    </div>

    <div class="max-w-4xl">
        <div class="bg-white rounded-[2rem] border border-gray-100 card-shadow p-8 md:p-10 relative overflow-hidden">
            <!-- Decorative circle -->
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-orange-50 rounded-full blur-2xl"></div>

            <form action="{{ route('admin.lecturers.store') }}" method="POST" class="relative z-10 space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Academic Info -->
                    <div class="space-y-6">
                        <h3 class="text-sm font-bold text-orange-500 uppercase tracking-widest flex items-center gap-2">
                            <i data-lucide="book-open" class="w-4 h-4"></i>
                            Informasi Akademik
                        </h3>
                        
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">NIDN / NIP</label>
                            <input type="text" name="nidn" id="nidn_input" value="{{ old('nidn') }}" required placeholder="Contoh: 12345678"
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                            @error('nidn') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Tanpa gelar"
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                            @error('name') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Gelar Akademik</label>
                            <input type="text" name="title" value="{{ old('title') }}" required placeholder="S.Kom., M.T."
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                            @error('title') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Account Info -->
                    <div class="space-y-6">
                        <h3 class="text-sm font-bold text-indigo-500 uppercase tracking-widest flex items-center gap-2">
                            <i data-lucide="key" class="w-4 h-4"></i>
                            Akses Login
                        </h3>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="dosen@univ.ac.id"
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                            @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>

                        <div class="p-5 bg-indigo-50/50 rounded-2xl border border-indigo-100 flex gap-4 items-start">
                            <div class="p-2 bg-white rounded-lg text-indigo-500 shadow-sm shrink-0">
                                <i data-lucide="shield-check" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-indigo-900 leading-tight">Password Default</h4>
                                <p class="text-xs text-indigo-600/70 mt-1 leading-relaxed">
                                    Secara default, password akan diset sama dengan <b>NIDN/NIP</b> yang Anda masukkan. Anda bisa mengubahnya nanti.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-xs font-bold text-gray-400 uppercase tracking-wider ml-1">Custom Password (Opsional)</label>
                            <input type="password" name="password" placeholder="Kosongkan untuk default NIDN"
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                            @error('password') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-50 flex items-center gap-4">
                    <button type="submit" class="flex-1 md:flex-none px-10 py-4 bg-brand-orange text-white rounded-2xl font-bold shadow-lg shadow-orange-100 hover:bg-orange-600 transition flex items-center justify-center gap-2 group">
                        Simpan Dosen <i data-lucide="chevron-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    <a href="{{ route('admin.lecturers.index') }}" class="flex-1 md:flex-none px-10 py-4 bg-gray-100 text-gray-600 rounded-2xl font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-premium-layout>
