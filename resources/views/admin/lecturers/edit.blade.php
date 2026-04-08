<x-admin-premium-layout>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Edit Dosen</h1>
            <nav class="flex text-gray-500 text-sm mt-1">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-500 transition">Dashboard</a>
                <span class="mx-2">/</span>
                <a href="{{ route('admin.lecturers.index') }}" class="hover:text-orange-500 transition">Dosen</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Edit Profil</span>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.lecturers.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-orange-500 font-bold transition">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="max-w-4xl">
        <form action="{{ route('admin.lecturers.update', $lecturer) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Data Pribadi -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-3xl border border-gray-100 card-shadow overflow-hidden">
                        <div class="p-8 border-b border-gray-50">
                            <h3 class="font-bold text-gray-800 text-lg">Perbarui Informasi</h3>
                            <p class="text-sm text-gray-400">Kelola informasi akademik dan gelar dosen.</p>
                        </div>
                        <div class="p-8 space-y-6">
                            <div class="space-y-2">
                                <label for="nidn" class="text-sm font-bold text-gray-700 tracking-wide">NIDN / NIP</label>
                                <div class="relative">
                                    <i data-lucide="credit-card" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                    <input id="nidn" name="nidn" type="text" 
                                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium"
                                        value="{{ old('nidn', $lecturer->nidn) }}" required autofocus>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('nidn')" />
                            </div>

                            <div class="space-y-2">
                                <label for="name" class="text-sm font-bold text-gray-700 tracking-wide">Nama Lengkap (Tanpa Gelar)</label>
                                <div class="relative">
                                    <i data-lucide="user" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                    <input id="name" name="name" type="text" 
                                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium"
                                        value="{{ old('name', $lecturer->user->name) }}" required>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div class="space-y-2">
                                <label for="title" class="text-sm font-bold text-gray-700 tracking-wide">Gelar Akademik</label>
                                <div class="relative">
                                    <i data-lucide="award" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                    <input id="title" name="title" type="text" 
                                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium"
                                        value="{{ old('title', $lecturer->title) }}" required>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Keamanan Akun -->
                <div class="space-y-8">
                    <div class="bg-white rounded-3xl border border-gray-100 card-shadow overflow-hidden">
                        <div class="p-8 border-b border-gray-50 bg-gray-50/50">
                            <h3 class="font-bold text-gray-800 text-lg">Keamanan</h3>
                        </div>
                        <div class="p-8 space-y-6">
                            <div class="space-y-2">
                                <label for="email" class="text-sm font-bold text-gray-700 tracking-wide">Email</label>
                                <input id="email" name="email" type="email" 
                                    class="w-full px-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium"
                                    value="{{ old('email', $lecturer->user->email) }}" required>
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <div class="space-y-2">
                                <label for="password" class="text-sm font-bold text-gray-700 tracking-wide">Ubah Password</label>
                                <input id="password" name="password" type="password" 
                                    class="w-full px-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium placeholder:text-gray-300"
                                    placeholder="Kosongkan jika tidak diubah">
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <div class="space-y-2">
                                <label for="password_confirmation" class="text-sm font-bold text-gray-700 tracking-wide">Konfirmasi</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" 
                                    class="w-full px-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 pt-4">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-8 rounded-2xl transition shadow-lg shadow-indigo-100 flex items-center justify-center gap-2">
                            <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                            Perbarui Profil
                        </button>
                        <a href="{{ route('admin.lecturers.index') }}" class="w-full text-center text-gray-400 hover:text-gray-600 font-bold transition py-2">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin-premium-layout>
