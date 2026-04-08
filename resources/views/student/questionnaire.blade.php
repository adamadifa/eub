<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Kuesioner - {{ $courseClass->course->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .gradient-brand { background: linear-gradient(135deg, #F97316 0%, #EA580C 100%); }
        .card-shadow { box-shadow: 0 10px 40px -10px rgba(0,0,0,0.05); }
        .likert-radio:checked + div {
            background-color: #F97316;
            color: white;
            border-color: #F97316;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 md:px-6 lg:px-8">
            <div class="flex justify-between h-16 md:h-20">
                <div class="flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-xl transition">
                        <i data-lucide="arrow-left" class="w-5 h-5 md:w-6 md:h-6"></i>
                    </a>
                    <div class="overflow-hidden">
                        <h2 class="text-xs md:text-sm font-bold text-gray-800 leading-none truncate">Form Evaluasi</h2>
                        <p class="text-[8px] md:text-[10px] text-gray-400 font-medium mt-1 uppercase tracking-tight truncate">{{ $courseClass->course->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 md:px-6 lg:px-8 py-8 md:py-10">
        <div class="mb-10 text-center px-2">
            <h1 class="text-xl md:text-3xl font-black text-gray-900 tracking-tight leading-tight">{{ $activeTemplate->title }}</h1>
            <p class="text-gray-500 mt-3 text-sm md:text-base max-w-2xl mx-auto leading-relaxed">{{ $activeTemplate->description }}</p>
        </div>

        <form action="{{ route('student.questionnaire.store', $courseClass) }}" method="POST" id="questionnaireForm">
            @csrf
            
            @foreach($activeTemplate->questions->groupBy('group') as $group => $questions)
                <div class="mb-10 md:mb-14">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="h-px bg-gray-200 flex-1"></div>
                        <h3 class="px-5 py-1.5 bg-indigo-50 text-indigo-700 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] whitespace-nowrap">{{ $group }}</h3>
                        <div class="h-px bg-gray-200 flex-1"></div>
                    </div>

                    <div class="space-y-6 md:space-y-8">
                        @foreach($questions as $question)
                            <div class="bg-white p-6 md:p-10 rounded-[2rem] border border-gray-100 card-shadow transition-all duration-300 hover:shadow-lg hover:shadow-gray-100">
                                <p class="text-base md:text-xl font-bold text-gray-800 leading-snug mb-8">
                                    <span class="text-orange-500 mr-2 opacity-50">{{ $loop->parent->index * 10 + $loop->iteration }}.</span>
                                    {{ $question->content }}
                                </p>

                                @if($question->type === 'likert')
                                    <div class="grid grid-cols-5 gap-2 md:gap-4 lg:gap-6">
                                        @foreach([1, 2, 3, 4, 5] as $val)
                                            <label class="cursor-pointer group relative">
                                                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $val }}" class="hidden likert-radio" required>
                                                <div class="aspect-square md:aspect-auto md:py-8 flex flex-col items-center justify-center border-2 border-gray-50 bg-gray-50/50 rounded-2xl md:rounded-3xl text-gray-400 font-bold transition-all duration-300 group-hover:bg-gray-100 group-hover:border-gray-200 group-active:scale-95">
                                                    <span class="text-lg md:text-3xl block">{{ $val }}</span>
                                                    @if($val == 1) <span class="hidden md:block text-[9px] uppercase tracking-tighter opacity-60 mt-1 px-1">Sangat Buruk</span> @endif
                                                    @if($val == 5) <span class="hidden md:block text-[9px] uppercase tracking-tighter opacity-60 mt-1 px-1">Sangat Baik</span> @endif
                                                </div>
                                                @if($val == 1 || $val == 5)
                                                    <span class="md:hidden absolute -bottom-6 left-1/2 -translate-x-1/2 text-[8px] font-bold text-gray-300 uppercase tracking-tighter whitespace-nowrap">
                                                        {{ $val == 1 ? 'Buruk' : 'Baik' }}
                                                    </span>
                                                @endif
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="md:hidden mt-8"></div> {{-- Spacer for absolute labels --}}
                                @else
                                    <textarea name="answers[{{ $question->id }}]" rows="5" 
                                        class="w-full p-5 md:p-6 bg-gray-50 border-2 border-transparent rounded-2xl md:rounded-3xl focus:ring-4 focus:ring-orange-500/10 focus:border-orange-500 transition-all font-medium text-gray-700 placeholder:text-gray-300 leading-relaxed text-sm md:text-base outline-none"
                                        placeholder="Tuliskan saran atau komentar Anda di sini..." required></textarea>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="mt-16 md:mt-24 p-8 md:p-14 bg-gray-900 rounded-[2.5rem] md:rounded-[3.5rem] text-center text-white relative overflow-hidden shadow-2xl shadow-gray-200">
                <div class="relative z-10 flex flex-col items-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-orange-500/20 rounded-full flex items-center justify-center mb-6">
                        <i data-lucide="check-check" class="w-8 h-8 md:w-10 md:h-10 text-orange-500"></i>
                    </div>
                    <h3 class="text-xl md:text-3xl font-black tracking-tight">Kirim Jawaban Anda?</h3>
                    <p class="text-gray-400 text-sm md:text-base mt-2 max-w-sm mx-auto leading-relaxed">Pastikan semua data sudah terisi dengan benar. Jawaban yang sudah dikirim tidak dapat diubah.</p>
                    
                    <button type="submit" class="mt-10 w-full md:w-auto px-12 py-4 md:py-5 bg-orange-600 text-white rounded-2xl md:rounded-3xl font-bold text-base md:text-lg hover:bg-orange-500 transition shadow-xl shadow-orange-900/20 flex items-center justify-center gap-3 group active:scale-95 duration-300">
                        <i data-lucide="send" class="w-5 h-5 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i> Kirim Evaluasi
                    </button>
                    
                    <a href="{{ route('dashboard') }}" class="mt-6 md:mt-8 text-gray-500 hover:text-white text-sm font-bold tracking-widest uppercase transition duration-300">Nanti Saja</a>
                </div>
                <!-- Decorative effects -->
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-orange-600/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -left-10 -top-10 w-40 h-40 bg-indigo-500/10 rounded-full blur-2xl pointer-events-none"></div>
            </div>
        </form>
    </main>

    <script>
        lucide.createIcons();

        // Radio button visual feedback
        const radios = document.querySelectorAll('.likert-radio');
        radios.forEach(radio => {
            radio.addEventListener('change', () => {
                const parent = radio.closest('.group');
                const allSiblings = radio.closest('.grid').querySelectorAll('.group div');
                
                allSiblings.forEach(sib => {
                    sib.classList.remove('bg-orange-500', 'border-orange-500', 'text-white', 'shadow-lg', 'shadow-orange-200');
                    sib.classList.add('bg-gray-50/50', 'border-gray-50', 'text-gray-400');
                });

                if (radio.checked) {
                    const target = parent.querySelector('div');
                    target.classList.remove('bg-gray-50/50', 'border-gray-50', 'text-gray-400');
                    target.classList.add('bg-orange-500', 'border-orange-500', 'text-white', 'shadow-lg', 'shadow-orange-200');
                }
            });
        });
    </script>
</body>
</html>
