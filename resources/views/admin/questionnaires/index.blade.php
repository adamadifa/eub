<x-admin-premium-layout>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Manajemen Kuesioner</h1>
            <nav class="flex text-gray-500 text-sm mt-1">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-500 transition">Dashboard</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Kuesioner</span>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.questionnaires.create') }}" class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white font-bold py-2.5 px-5 rounded-xl transition shadow-lg shadow-orange-200">
                <i data-lucide="plus-circle" class="w-5 h-5"></i>
                Buat Template Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-100 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($templates as $template)
            <div class="bg-white rounded-3xl border border-gray-100 card-shadow overflow-hidden flex flex-col group transition-all hover:-translate-y-1">
                <div class="p-8 border-b border-gray-50">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-indigo-50 text-indigo-500 rounded-2xl">
                            <i data-lucide="clipboard-list" class="w-6 h-6"></i>
                        </div>
                        @if($template->is_active)
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-bold border border-green-200 flex items-center gap-1">
                                <span class="w-1 h-1 bg-green-500 rounded-full animate-pulse"></span> AKTIF
                            </span>
                        @endif
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 line-clamp-1">{{ $template->title }}</h3>
                    <p class="text-sm text-gray-400 mt-2 line-clamp-2 h-10">{{ $template->description ?? 'Tidak ada deskripsi.' }}</p>
                </div>
                <div class="px-8 py-6 flex-1 bg-gray-50/30">
                    <div class="flex items-center gap-4 text-xs font-bold text-gray-400 uppercase tracking-widest">
                        <div class="flex items-center gap-1.5">
                            <i data-lucide="help-circle" class="w-4 h-4"></i>
                            {{ $template->questions_count }} Pertanyaan
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-t border-gray-50 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.questionnaires.show', $template) }}" class="p-2.5 text-indigo-600 bg-indigo-50 hover:bg-indigo-600 hover:text-white rounded-xl transition" title="Kelola Pertanyaan">
                            <i data-lucide="list" class="w-5 h-5"></i>
                        </a>
                        <a href="{{ route('admin.questionnaires.edit', $template) }}" class="p-2.5 text-gray-400 hover:text-orange-500 hover:bg-orange-50 rounded-xl transition" title="Edit Template">
                            <i data-lucide="edit-3" class="w-5 h-5"></i>
                        </a>
                    </div>
                    <form action="{{ route('admin.questionnaires.destroy', $template) }}" method="POST" onsubmit="return confirm('Hapus template ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2.5 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition" title="Hapus">
                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 bg-white rounded-3xl border-2 border-dashed border-gray-200 flex flex-col items-center justify-center text-center">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center text-gray-300 mb-4">
                    <i data-lucide="clipboard-x" class="w-10 h-10"></i>
                </div>
                <h4 class="text-lg font-bold text-gray-800">Tanpa Template</h4>
                <p class="text-gray-400 max-w-xs mt-2">Belum ada template kuesioner yang dibuat. Silakan buat yang pertama.</p>
                <a href="{{ route('admin.questionnaires.create') }}" class="mt-6 text-orange-500 font-bold hover:underline flex items-center gap-2">
                    Buat Template <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>
            </div>
        @endforelse
    </div>
</x-admin-premium-layout>
