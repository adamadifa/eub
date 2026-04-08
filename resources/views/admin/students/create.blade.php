<x-admin-premium-layout>
    <x-slot name="title">Tambah Mahasiswa Baru</x-slot>

    <div class="mb-8 flex items-center gap-4">
        <a href="{{ route('admin.students.index') }}" class="p-2.5 text-gray-400 hover:text-gray-600 hover:bg-white rounded-xl transition border border-transparent hover:border-gray-100 shadow-sm">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Tambah Mahasiswa</h1>
            <p class="text-gray-500 mt-1">Silakan lengkapi data mahasiswa di bawah ini.</p>
        </div>
    </div>

    <div class="max-w-3xl">
        <div class="bg-white rounded-[2rem] border border-gray-100 card-shadow p-8 md:p-10 relative overflow-hidden">
            <!-- Decorative circle -->
            <div class="absolute -right-10 -top-10 w-32 h-32 bg-orange-50 rounded-full blur-2xl"></div>

            <form action="{{ route('admin.students.store') }}" method="POST" class="relative z-10 space-y-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Budi Setiawan"
                            class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                        @error('name') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">NIM / Nomor Induk</label>
                        <input type="text" name="nim" value="{{ old('nim') }}" required placeholder="Contoh: 2024001"
                            class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300 uppercase">
                        @error('nim') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@mahasiswa.ac.id"
                            class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                        @error('email') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="md:col-span-2 p-6 bg-indigo-50/50 rounded-2xl border border-indigo-100 flex gap-4 items-start mb-2">
                        <div class="p-2 bg-white rounded-lg text-indigo-500 shadow-sm shrink-0">
                            <i data-lucide="shield-check" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-indigo-900 leading-tight">Password & Username Default</h4>
                            <p class="text-xs text-indigo-600/70 mt-1 leading-relaxed">
                                Secara default, password akan diset sama dengan **NIM/NIK** mahasiwa tersebut. Anda bisa mengisi password custom jika diperlukan.
                            </p>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Password (Opsional)</label>
                        <input type="password" name="password" placeholder="Kosongkan untuk default NIM"
                            class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                        @error('password') <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-gray-700 ml-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" placeholder="Ulangi password (jika diisi)"
                            class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300">
                    </div>
                </div>

                <div class="pt-6 flex items-center gap-4">
                    <button type="submit" class="flex-1 md:flex-none px-10 py-4 bg-brand-orange text-white rounded-2xl font-bold shadow-lg shadow-orange-100 hover:bg-orange-600 transition flex items-center justify-center gap-2 group">
                        Simpan Data <i data-lucide="chevron-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    </button>
                    <a href="{{ route('admin.students.index') }}" class="flex-1 md:flex-none px-10 py-4 bg-gray-100 text-gray-600 rounded-2xl font-bold hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin-premium-layout>
