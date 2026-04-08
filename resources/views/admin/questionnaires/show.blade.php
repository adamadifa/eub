<x-admin-premium-layout>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Detail Kuesioner</h1>
            <nav class="flex text-gray-500 text-sm mt-1">
                <a href="{{ route('dashboard') }}" class="hover:text-orange-500 transition">Dashboard</a>
                <span class="mx-2">/</span>
                <a href="{{ route('admin.questionnaires.index') }}" class="hover:text-orange-500 transition">Kuesioner</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Pertanyaan</span>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.questionnaires.index') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-orange-500 font-bold transition">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                Kembali
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-100 text-green-700 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Add New Question Form -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-3xl border border-gray-100 card-shadow overflow-hidden sticky top-24">
                <div class="p-8 border-b border-gray-50 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 text-lg">Tambah Pertanyaan</h3>
                    <p class="text-xs text-gray-400 mt-1 uppercase tracking-tight">Template: {{ $questionnaire->title }}</p>
                </div>
                <div class="p-8">
                    <form action="{{ route('admin.questionnaires.questions.store', $questionnaire) }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 tracking-wide">Kategori</label>
                            <select name="group" class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700" required>
                                <option value="Pedagogik">Pedagogik</option>
                                <option value="Profesional">Profesional</option>
                                <option value="Kepribadian">Kepribadian</option>
                                <option value="Sosial">Sosial</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 tracking-wide">Tipe Jawaban</label>
                            <div class="flex gap-4">
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="type" value="likert" class="hidden peer" checked>
                                    <div class="p-3 text-center rounded-xl bg-gray-50 text-gray-400 font-bold border-2 border-transparent peer-checked:border-orange-500 peer-checked:text-orange-500 peer-checked:bg-orange-50 transition text-xs">Likert 1-5</div>
                                </label>
                                <label class="flex-1 cursor-pointer">
                                    <input type="radio" name="type" value="essay" class="hidden peer">
                                    <div class="p-3 text-center rounded-xl bg-gray-50 text-gray-400 font-bold border-2 border-transparent peer-checked:border-orange-500 peer-checked:text-orange-500 peer-checked:bg-orange-50 transition text-xs">Essay</div>
                                </label>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 tracking-wide">Isi Pertanyaan</label>
                            <textarea name="content" rows="4" class="w-full px-4 py-3 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300" placeholder="Ketik pertanyaan di sini..." required></textarea>
                        </div>
                        <button type="submit" class="w-full bg-brand-dark hover:bg-black text-white font-bold py-4 rounded-2xl transition shadow-lg flex items-center justify-center gap-2">
                            <i data-lucide="plus" class="w-5 h-5"></i> Tambah ke Daftar
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Question List -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-3xl border border-gray-100 card-shadow min-h-[600px]">
                <div class="p-8 border-b border-gray-50 flex items-center justify-between">
                    <div>
                        <h3 class="font-bold text-gray-800 text-lg">Bank Pertanyaan</h3>
                        <p class="text-sm text-gray-400">{{ $questionnaire->questions->count() }} pertanyaan terdaftar</p>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    @forelse($questionnaire->questions->groupBy('group') as $group => $questions)
                        <div class="mb-8">
                            <h4 class="px-4 py-2 bg-indigo-50 text-indigo-700 inline-block rounded-lg text-xs font-bold uppercase tracking-widest mb-4">{{ $group }}</h4>
                            <div class="space-y-3">
                                @foreach($questions as $question)
                                    <div class="p-6 bg-white border border-gray-100 rounded-2xl flex items-center justify-between gap-4 group hover:border-orange-200 hover:shadow-sm transition">
                                        <div class="flex items-center gap-4 flex-1">
                                            <div class="w-8 h-8 flex-shrink-0 bg-gray-50 text-gray-400 rounded-lg flex items-center justify-center text-xs font-bold">{{ $loop->iteration }}</div>
                                            <div class="flex-1">
                                                <p class="text-sm font-bold text-gray-700 leading-relaxed">{{ $question->content }}</p>
                                                <div class="flex items-center gap-2 mt-2">
                                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">Tipe: {{ strtoupper($question->type) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{ route('admin.questionnaires.questions.destroy', $question) }}" method="POST" onsubmit="return confirm('Hapus pertanyaan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-gray-300 hover:text-red-500 hover:bg-red-50 rounded-lg transition opacity-0 group-hover:opacity-100">
                                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="flex flex-col items-center justify-center py-20 text-center opacity-40">
                            <i data-lucide="inbox" class="w-12 h-12 mb-4"></i>
                            <p class="font-bold">Belum ada pertanyaan</p>
                            <p class="text-sm">Gunakan form di samping untuk mulai menambahkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-admin-premium-layout>
