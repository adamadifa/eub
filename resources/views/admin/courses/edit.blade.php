<x-admin-premium-layout>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Edit Mata Kuliah</h1>
            <nav class="flex text-gray-500 text-sm mt-1">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-500 transition">Dashboard</a>
                <span class="mx-2">/</span>
                <a href="{{ route('admin.courses.index') }}" class="hover:text-orange-500 transition">Mata Kuliah</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Edit</span>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.courses.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-orange-500 font-bold transition">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                Kembali
            </a>
        </div>
    </div>

    <div class="max-w-3xl">
        <div class="bg-white rounded-3xl border border-gray-100 card-shadow overflow-hidden">
            <div class="p-8 border-b border-gray-50">
                <h3 class="font-bold text-gray-800 text-lg">Perbarui Mata Kuliah</h3>
                <p class="text-sm text-gray-400">Gunakan kode yang unik dan deskripsi yang jelas.</p>
            </div>
            <div class="p-8">
                <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="code" class="text-sm font-bold text-gray-700 tracking-wide">Kode Mata Kuliah</label>
                            <div class="relative">
                                <i data-lucide="hash" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                <input id="code" name="code" type="text" 
                                    class="w-full pl-12 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium uppercase"
                                    value="{{ old('code', $course->code) }}" 
                                    required autofocus>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('code')" />
                        </div>

                        <div class="space-y-2">
                            <label for="credits" class="text-sm font-bold text-gray-700 tracking-wide">Jumlah SKS</label>
                            <div class="relative">
                                <i data-lucide="layers" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                <input id="credits" name="credits" type="number" min="1" max="10"
                                    class="w-full pl-12 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium"
                                    value="{{ old('credits', $course->credits) }}" 
                                    required>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('credits')" />
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="name" class="text-sm font-bold text-gray-700 tracking-wide">Nama Mata Kuliah</label>
                        <div class="relative">
                            <i data-lucide="book-open" class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                            <input id="name" name="name" type="text" 
                                class="w-full pl-12 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-orange-500 transition-all text-gray-700 font-medium"
                                value="{{ old('name', $course->name) }}" 
                                required>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="flex items-center gap-4 pt-6">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-8 rounded-2xl transition shadow-lg shadow-indigo-100 flex items-center gap-2">
                            <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                            Perbarui Data
                        </button>
                        <a href="{{ route('admin.courses.index') }}" class="text-gray-400 hover:text-gray-600 font-bold transition px-4">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-premium-layout>
