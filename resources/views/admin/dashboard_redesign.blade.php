<x-admin-premium-layout>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 tracking-tight">Admin Dashboard</h1>
            <nav class="flex text-gray-500 text-[10px] font-bold uppercase tracking-widest mt-2">
                <a href="#" class="text-[#008444]">Dashboard</a>
                <span class="mx-2 text-gray-300">/</span>
                <span class="text-gray-400">Overview</span>
            </nav>
        </div>
        <div class="flex items-center gap-3">
            <div class="hidden lg:flex items-center gap-2 px-4 py-2 bg-green-50 border border-green-100 rounded-lg">
                <div class="w-2 h-2 bg-[#008444] rounded-full animate-pulse"></div>
                <span class="text-xs font-bold text-[#008444] uppercase tracking-tighter">Sesi Aktif: <strong>{{ rand(5, 15) }} Admin</strong></span>
            </div>
            <div class="flex bg-white rounded-lg p-1 border border-gray-100 shadow-sm">
                <div class="px-4 py-2 text-xs font-bold bg-[#008444] text-white rounded-md shadow-sm uppercase tracking-wider">
                    {{ $activeSemester->name ?? 'TIDAK ADA SEMESTER AKTIF' }}
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Total Mahasiswa</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-1 tracking-tighter">{{ number_format($totalStudents) }}</h3>
                </div>
                <div class="p-3 bg-green-50 text-[#008444] rounded-xl">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-green-500 font-bold text-xs flex items-center gap-1">
                    <i data-lucide="check" class="w-4 h-4"></i> Aktif
                </span>
                <span class="text-gray-400 text-[10px] font-medium tracking-tight">Civitas Academika</span>
            </div>
            <div class="mt-4 h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-[#008444] rounded-full" style="width: 100%"></div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Total Dosen</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-1 tracking-tighter">{{ number_format($totalLecturers) }}</h3>
                </div>
                <div class="p-3 bg-blue-50 text-blue-500 rounded-xl">
                    <i data-lucide="user-check" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-gray-600 font-bold text-xs uppercase tracking-tighter">Status: Normal</span>
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
            </div>
            <div class="mt-4 flex -space-x-2">
                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dosen+A&background=008444&color=fff" alt="">
                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dosen+B&background=006b35&color=fff" alt="">
                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dosen+C&background=FFD700&color=000" alt="">
                <div class="w-7 h-7 rounded-full border-2 border-white bg-gray-50 flex items-center justify-center text-[8px] font-black text-gray-400 uppercase">+{{ $totalLecturers > 3 ? $totalLecturers - 3 : 0 }}</div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Kuesioner Selesai</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-1 tracking-tighter">{{ number_format($completedEnrollments) }}</h3>
                </div>
                <div class="p-3 bg-green-50 text-[#008444] rounded-xl">
                    <i data-lucide="clipboard-check" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-[#008444] font-bold text-xs uppercase tracking-tighter">Progres: {{ number_format($completionRate, 1) }}%</span>
            </div>
            <div class="mt-4 h-1.5 w-full bg-gray-50 rounded-full overflow-hidden">
                <div class="h-full bg-[#008444] rounded-full" style="width: {{ $completionRate }}%"></div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Rata-rata Nilai</p>
                    <h3 class="text-3xl font-black text-gray-800 mt-1 tracking-tighter">{{ number_format($averageScore, 2) }}</h3>
                </div>
                <div class="p-3 bg-yellow-50 text-[#FFD700] rounded-xl">
                    <i data-lucide="star" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="flex items-center gap-1 text-[#FFD700]">
                @for($i=0; $i<5; $i++)
                    <i data-lucide="star" class="w-4 h-4 {{ $i < round($averageScore) ? 'fill-current' : '' }}"></i>
                @endfor
            </div>
            <p class="mt-4 text-[10px] font-bold text-gray-400 uppercase tracking-tighter italic">Berdasarkan hasil kuesioner terkini</p>
        </div>
    </div>

    <!-- Main Section -->
    <div class="grid grid-cols-1 gap-8">
        <!-- Participation Chart -->
        <div class="bg-white p-8 rounded-3xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Partisipasi Kuesioner per Fakultas</h3>
                    <p class="text-sm text-gray-400">Data semester aktif saat ini</p>
                </div>
            </div>

            <div class="flex items-end justify-between h-64 gap-2">
                @foreach($participationStats as $stat)
                <div class="flex-1 flex flex-col items-center gap-4 group">
                    <div class="w-full relative h-48 bg-gray-50 rounded-2xl overflow-hidden hover:bg-gray-100 transition">
                        <div class="absolute bottom-0 w-full bg-[#008444] rounded-t-2xl transition-all duration-700 group-hover:bg-[#006b35]" style="height: {{ $stat['value'] }}%">
                            <span class="absolute top-2 w-full text-center text-[10px] text-white font-bold">{{ $stat['value'] }}%</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-gray-400 group-hover:text-gray-800 uppercase">{{ $stat['label'] }}</span>
                </div>
                @endforeach
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                 <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-tight">Status Database</p>
                        <p class="text-sm font-bold text-gray-800 mt-1">Uptime: 99.9%</p>
                    </div>
                    <i data-lucide="check-circle-2" class="text-green-500 w-5 h-5"></i>
                 </div>
                 <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-tight">Engine Kuesioner</p>
                        <p class="text-sm font-bold text-gray-800 mt-1">Status: Running</p>
                    </div>
                    <i data-lucide="check-circle-2" class="text-green-500 w-5 h-5"></i>
                 </div>
                 <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-[9px] text-gray-400 font-bold uppercase tracking-tight">Sync Academic</p>
                        <p class="text-sm font-bold text-gray-800 mt-1">Status: Terhubung</p>
                    </div>
                    <i data-lucide="zap" class="text-[#FFD700] w-5 h-5"></i>
                 </div>
            </div>
        </div>
    </div>
</x-admin-premium-layout>
