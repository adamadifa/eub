<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .gradient-brand { background: linear-gradient(135deg, #008444 0%, #006b35 100%); }
        .card-shadow { box-shadow: 0 10px 40px -10px rgba(0,0,0,0.05); }
    </style>
</head>
<body class="bg-gray-50 min-h-screen pb-24 md:pb-10">
    <!-- Top Nav -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
            <div class="flex justify-between h-16 md:h-20">
                <div class="flex items-center gap-3">
                    <div class="gradient-brand p-1.5 md:p-2 rounded-xl">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo UNSIL" class="w-5 h-5 md:w-6 md:h-6">
                    </div>
                    <div>
                        <span class="text-lg md:text-xl font-bold text-gray-800 tracking-tight">{{ config('app.name') }}</span>
                        <p class="text-[8px] md:text-[10px] font-bold text-[#008444] uppercase tracking-widest leading-none">Universitas Siliwangi</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 md:gap-4">
                    <div class="flex flex-col items-end">
                        <span class="text-xs md:text-sm font-bold text-gray-800">{{ explode(' ', auth()->user()->name)[0] }}</span>
                        <span class="hidden xs:block text-[10px] text-gray-400 font-medium tracking-tight">NIM: {{ auth()->user()->nim }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="hidden md:block">
                        @csrf
                        <button type="submit" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-xl transition">
                            <i data-lucide="log-out" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bottom Nav (Mobile Only) -->
    <div class="md:hidden fixed bottom-6 left-1/2 -translate-x-1/2 z-[60] w-[90%] max-w-[400px]">
        <div class="bg-gray-900/90 backdrop-blur-xl rounded-[2rem] p-2 flex items-center justify-between border border-white/10 shadow-2xl">
            <a href="#" class="flex-1 flex flex-col items-center gap-1 py-2 text-white">
                <i data-lucide="layout-grid" class="w-5 h-5"></i>
                <span class="text-[10px] font-bold uppercase tracking-tighter">Dashboard</span>
            </a>
            <a href="#" class="flex-1 flex flex-col items-center gap-1 py-2 text-gray-400">
                <i data-lucide="history" class="w-5 h-5"></i>
                <span class="text-[10px] font-bold uppercase tracking-tighter">History</span>
            </a>
            <div class="w-px h-8 bg-white/10"></div>
            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button type="submit" class="w-full flex flex-col items-center gap-1 py-2 text-gray-400 hover:text-red-400 transition">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                    <span class="text-[10px] font-bold uppercase tracking-tighter">Keluar</span>
                </button>
            </form>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8 py-8 md:py-10">
        <div class="mb-8 md:mb-10">
            <h1 class="text-2xl md:text-4xl font-bold text-gray-900 tracking-tight">Evaluasi Umpan Balik</h1>
            <p class="text-gray-500 mt-2 text-sm md:text-base leading-relaxed">Silakan isi kuesioner evaluasi untuk mata kuliah Anda di semester ini.</p>
        </div>

        @if(session('success'))
            <div class="mb-8 bg-emerald-50 border border-emerald-100 text-emerald-700 px-5 py-4 rounded-2xl flex items-center gap-3 shadow-sm animate-in fade-in slide-in-from-top-4 duration-500">
                <i data-lucide="check-circle" class="w-5 h-5 shrink-0"></i>
                <span class="text-sm font-semibold tracking-tight">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 bg-rose-50 border border-rose-100 text-rose-700 px-5 py-4 rounded-2xl flex items-center gap-3 shadow-sm animate-in fade-in slide-in-from-top-4 duration-500">
                <i data-lucide="alert-circle" class="w-5 h-5 shrink-0"></i>
                <span class="text-sm font-semibold tracking-tight">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Semester Card -->
        <div class="bg-[#008444] rounded-[2rem] p-6 md:p-12 mb-8 md:mb-12 text-white relative overflow-hidden shadow-2xl shadow-green-100">
            <div class="relative z-10 flex flex-col lg:flex-row lg:items-center justify-between gap-6 md:gap-8">
                <div class="text-center lg:text-left">
                    <span class="inline-flex px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-[9px] md:text-[10px] font-bold uppercase tracking-[0.2em]">Semester Aktif</span>
                    <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold mt-3 tracking-tight">{{ $activeSemester->name ?? 'Tidak Ada Semester Aktif' }}</h2>
                    <p class="text-green-100 mt-2 text-xs md:text-sm lg:text-base opacity-80">Evaluasi Umpan Balik Universitas Siliwangi.</p>
                </div>
                <div class="flex items-center justify-center lg:justify-end gap-3 md:gap-4">
                    <div class="flex-1 lg:flex-none text-center bg-white/10 backdrop-blur-md p-4 md:p-5 rounded-2xl border border-white/10 min-w-[100px] md:min-w-[120px]">
                        <p class="text-2xl md:text-3xl font-black text-[#FFD700]">{{ $enrollments->where('is_completed', true)->count() }}</p>
                        <p class="text-[9px] md:text-[10px] font-bold text-green-100 uppercase tracking-wider mt-1">Selesai</p>
                    </div>
                    <div class="flex-1 lg:flex-none text-center bg-white/10 backdrop-blur-md p-4 md:p-5 rounded-2xl border border-white/10 min-w-[100px] md:min-w-[120px]">
                        <p class="text-2xl md:text-3xl font-black text-[#FFD700]">{{ $enrollments->where('is_completed', false)->count() }}</p>
                        <p class="text-[9px] md:text-[10px] font-bold text-green-100 uppercase tracking-wider mt-1">Belum Isi</p>
                    </div>
                </div>
            </div>
            <!-- Decorative elements -->
            <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-white/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -left-10 -top-10 w-40 h-40 bg-[#FFD700]/20 rounded-full blur-2xl pointer-events-none"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 md:gap-8">
            @forelse($enrollments as $enrollment)
                <div class="bg-white rounded-[2rem] border border-gray-100 card-shadow overflow-hidden flex flex-col group transition-all duration-300 hover:shadow-xl hover:shadow-gray-200/50 @if(!$enrollment->is_completed) hover:-translate-y-1 @endif">
                    <div class="p-6 md:p-8 flex-1">
                        <div class="flex items-center gap-2 mb-5">
                            <span class="px-2 py-0.5 bg-indigo-50 text-indigo-600 rounded-lg text-[9px] md:text-[10px] font-bold border border-indigo-100 uppercase tracking-wider">{{ $enrollment->courseClass->course->code }}</span>
                            @if($enrollment->is_completed)
                                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded-lg text-[9px] md:text-[10px] font-bold border border-emerald-100 flex items-center gap-1 tracking-wider uppercase">
                                    <i data-lucide="check" class="w-2.5 h-2.5"></i> SELESAI
                                </span>
                            @else
                                <span class="px-2 py-0.5 bg-orange-50 text-orange-600 rounded-lg text-[9px] md:text-[10px] font-bold border border-orange-100 uppercase tracking-wider animate-pulse">BELUM ISI</span>
                            @endif
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-gray-800 line-clamp-2 leading-tight tracking-tight h-12 md:h-14">{{ $enrollment->courseClass->course->name }}</h3>
                        <div class="mt-6 flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-50 text-gray-400 rounded-2xl flex items-center justify-center shrink-0 border border-gray-100">
                                <i data-lucide="user" class="w-5 h-5"></i>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-[8px] md:text-[9px] font-bold text-gray-400 uppercase tracking-[0.1em] leading-none mb-1">Dosen Pengampu</p>
                                <p class="text-xs md:text-sm font-bold text-gray-700 truncate tracking-tight">{{ $enrollment->courseClass->lecturer->user->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:p-6 bg-gray-50/50 border-t border-gray-100">
                        @if($enrollment->is_completed)
                            <div class="w-full py-4 text-center text-emerald-500 font-bold text-sm flex items-center justify-center gap-2 opacity-60">
                                <i data-lucide="check-circle" class="w-4 h-4"></i> Sudah Diisi
                            </div>
                        @else
                            <a href="{{ route('student.questionnaire', $enrollment->courseClass) }}" class="w-full py-4 px-6 gradient-brand text-white rounded-[1.25rem] font-bold text-sm md:text-base flex items-center justify-center gap-2 shadow-lg shadow-green-100 hover:shadow-green-200 transition-all group active:scale-95 active:shadow-none duration-300">
                                Mulai Isi <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 bg-white rounded-[2.5rem] border-2 border-dashed border-gray-100 flex flex-col items-center justify-center text-center px-6">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-50 rounded-full flex items-center justify-center text-gray-200 mb-4 border border-gray-50 card-shadow">
                        <i data-lucide="book-open" class="w-8 h-8 md:w-10 md:h-10"></i>
                    </div>
                    <h4 class="text-lg md:text-xl font-bold text-gray-800">Tidak Ada Mata Kuliah</h4>
                    <p class="text-gray-400 max-w-xs mt-2 text-sm">Anda belum terdaftar di mata kuliah manapun untuk semester ini.</p>
                </div>
            @endforelse
        </div>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
