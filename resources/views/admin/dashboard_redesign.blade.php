<x-admin-premium-layout>
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <nav class="flex text-gray-500 text-sm mt-1">
                <a href="#" class="hover:text-orange-500 transition">Dashboard</a>
                <span class="mx-2">/</span>
                <span class="text-gray-400">Overview</span>
            </nav>
        </div>
        <div class="flex items-center gap-3">
            <div class="hidden lg:flex items-center gap-2 px-4 py-2 bg-green-50 border border-green-100 rounded-lg">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-sm font-medium text-green-700">Active Sessions: <strong>128</strong></span>
            </div>
            <div class="flex bg-white rounded-lg p-1 border border-gray-100 shadow-sm">
                <button class="px-4 py-2 text-sm font-medium bg-orange-500 text-white rounded-md shadow-sm">Production</button>
                <button class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-orange-500 transition">Staging</button>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-400 font-medium uppercase tracking-wider">Total Mahasiswa</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">2,436</h3>
                </div>
                <div class="p-3 bg-orange-50 text-orange-500 rounded-xl">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-green-500 font-semibold text-sm flex items-center gap-1">
                    <i data-lucide="trending-up" class="w-4 h-4"></i> +12%
                </span>
                <span class="text-gray-400 text-xs text-nowrap">vs bulan lalu</span>
            </div>
            <div class="mt-4 h-1.5 w-full bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-orange-500 rounded-full" style="width: 89%"></div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-400 font-medium uppercase tracking-wider">Total Dosen</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">142</h3>
                </div>
                <div class="p-3 bg-blue-50 text-blue-500 rounded-xl">
                    <i data-lucide="user-check" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-gray-600 font-semibold text-sm">Healthy Status</span>
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
            </div>
            <div class="mt-4 flex -space-x-2">
                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dosen+A" alt="">
                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dosen+B" alt="">
                <img class="w-7 h-7 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Dosen+C" alt="">
                <div class="w-7 h-7 rounded-full border-2 border-white bg-gray-100 flex items-center justify-center text-[10px] font-bold text-gray-500">+139</div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-400 font-medium uppercase tracking-wider">Kuesioner Selesai</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">1,820</h3>
                </div>
                <div class="p-3 bg-indigo-50 text-indigo-500 rounded-xl">
                    <i data-lucide="clipboard-check" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-orange-500 font-semibold text-sm">Target: 2,000</span>
            </div>
            <div class="mt-4 flex gap-1">
                <div class="h-6 w-1 bg-indigo-500 rounded-full anim-pulse"></div>
                <div class="h-4 w-1 bg-indigo-200 rounded-full"></div>
                <div class="h-8 w-1 bg-indigo-500 rounded-full"></div>
                <div class="h-5 w-1 bg-indigo-100 rounded-full"></div>
                <div class="h-7 w-1 bg-indigo-500 rounded-full"></div>
                <div class="h-3 w-1 bg-indigo-200 rounded-full"></div>
                <div class="h-9 w-1 bg-indigo-500 rounded-full"></div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-6 rounded-2xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-400 font-medium uppercase tracking-wider">Rata-rata Nilai</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-1">4.8</h3>
                </div>
                <div class="p-3 bg-purple-50 text-purple-500 rounded-xl">
                    <i data-lucide="star" class="w-6 h-6"></i>
                </div>
            </div>
            <div class="flex items-center gap-1 text-yellow-400">
                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
                <i data-lucide="star" class="w-4 h-4 fill-current"></i>
            </div>
            <p class="mt-4 text-xs text-gray-400 italic">"Mahasiswa puas dengan kinerja Dosen semester ini"</p>
        </div>
    </div>

    <!-- Main Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Storage Usage Simulation -->
        <div class="lg:col-span-2 bg-white p-8 rounded-3xl border border-gray-100 card-shadow">
            <div class="flex justify-between items-center mb-10">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Partisipasi Kuesioner per Fakultas</h3>
                    <p class="text-sm text-gray-400">Data semester aktif saat ini</p>
                </div>
                <div class="flex bg-gray-50 p-1 rounded-xl text-xs font-bold text-gray-500">
                    <button class="px-3 py-1 bg-white shadow-sm rounded-lg text-gray-800">1H</button>
                    <button class="px-3 py-1">1D</button>
                    <button class="px-3 py-1">1W</button>
                    <button class="px-3 py-1">1M</button>
                </div>
            </div>

            <div class="flex items-end justify-between h-64 gap-2">
                <!-- Bar 1 -->
                <div class="flex-1 flex flex-col items-center gap-4 group">
                    <div class="w-full relative h-48 bg-gray-50 rounded-2xl overflow-hidden hover:bg-gray-100 transition">
                        <div class="absolute bottom-0 w-full bg-brand-dark rounded-t-2xl transition-all duration-700 group-hover:bg-orange-600" style="height: 70%">
                            <span class="absolute top-2 w-full text-center text-[10px] text-white font-bold">280</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-gray-400 group-hover:text-gray-800">FTI</span>
                </div>
                <!-- Bar 2 -->
                <div class="flex-1 flex flex-col items-center gap-4 group">
                    <div class="w-full relative h-48 bg-gray-50 rounded-2xl overflow-hidden">
                        <div class="absolute bottom-0 w-full bg-brand-dark rounded-t-2xl transition-all duration-700" style="height: 60%">
                             <span class="absolute top-2 w-full text-center text-[10px] text-white font-bold">260</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-gray-400 group-hover:text-gray-800">FEB</span>
                </div>
                <!-- Bar 3 -->
                <div class="flex-1 flex flex-col items-center gap-4 group">
                    <div class="w-full relative h-48 bg-gray-50 rounded-2xl overflow-hidden">
                        <div class="absolute bottom-0 w-full bg-orange-500 rounded-t-2xl transition-all duration-700 shadow-lg shadow-orange-200" style="height: 40%">
                             <span class="absolute top-2 w-full text-center text-[10px] text-white font-bold">140</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-gray-400 group-hover:text-gray-800">FISIP</span>
                </div>
                <!-- Bar 4 -->
                <div class="flex-1 flex flex-col items-center gap-4 group">
                    <div class="w-full relative h-48 bg-gray-50 rounded-2xl overflow-hidden">
                        <div class="absolute bottom-0 w-full bg-brand-dark rounded-t-2xl transition-all duration-700" style="height: 20%">
                             <span class="absolute top-2 w-full text-center text-[10px] text-white font-bold">68</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-gray-400 group-hover:text-gray-800">FK</span>
                </div>
                <!-- Bar 5 -->
                <div class="flex-1 flex flex-col items-center gap-4 group">
                    <div class="w-full relative h-48 bg-gray-50 rounded-2xl overflow-hidden">
                        <div class="absolute bottom-0 w-full bg-brand-dark rounded-t-2xl transition-all duration-700" style="height: 35%">
                             <span class="absolute top-2 w-full text-center text-[10px] text-white font-bold">120</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-gray-400 group-hover:text-gray-800">FH</span>
                </div>
                <!-- Bar 6 -->
                <div class="flex-1 flex flex-col items-center gap-4 group">
                    <div class="w-full relative h-48 bg-gray-50 rounded-2xl overflow-hidden">
                        <div class="absolute bottom-0 w-full bg-brand-dark rounded-t-2xl transition-all duration-700" style="height: 75%">
                             <span class="absolute top-2 w-full text-center text-[10px] text-white font-bold">310</span>
                        </div>
                    </div>
                    <span class="text-xs font-bold text-gray-400 group-hover:text-gray-800">PPS</span>
                </div>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                 <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-tight">Status Database</p>
                        <p class="text-sm font-bold text-gray-800 mt-1">Uptime: 99.9%</p>
                    </div>
                    <i data-lucide="check-circle-2" class="text-green-500 w-5 h-5"></i>
                 </div>
                 <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-tight">Engine Kuesioner</p>
                        <p class="text-sm font-bold text-gray-800 mt-1">Status: Running</p>
                    </div>
                    <i data-lucide="check-circle-2" class="text-green-500 w-5 h-5"></i>
                 </div>
                 <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-gray-400 font-bold uppercase tracking-tight">Sync Academic</p>
                        <p class="text-sm font-bold text-gray-800 mt-1">Delay: 12ms</p>
                    </div>
                    <i data-lucide="zap" class="text-orange-500 w-5 h-5"></i>
                 </div>
            </div>
        </div>

        <!-- Sidebar Actions/Stats -->
        <div class="space-y-8">
            <!-- MFA Section -->
            <div class="bg-white p-8 rounded-3xl border border-gray-100 card-shadow">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-2 bg-orange-100/50 text-orange-600 rounded-lg">
                        <i data-lucide="shield-check" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Akun Terverifikasi</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4"><strong>2,168</strong> dari 2,436 User</p>
                <div class="flex gap-1 mb-6">
                    @for($i=0; $i<12; $i++)
                        <div class="w-full h-3 rounded-full {{ $i < 10 ? 'bg-orange-500' : 'bg-gray-100' }}"></div>
                    @endfor
                </div>
                <div class="flex justify-between items-center text-xs text-gray-400">
                    <span>Progres: 89%</span>
                    <a href="#" class="text-orange-500 font-bold hover:underline">Lihat Detail</a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white p-8 rounded-3xl border border-gray-100 card-shadow">
                <div class="flex items-center gap-3 mb-8">
                    <div class="p-2 bg-indigo-100/50 text-indigo-600 rounded-lg">
                        <i data-lucide="zap" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-bold text-gray-800">Quick IT Actions</h3>
                </div>
                <div class="grid grid-cols-2 gap-y-10 gap-x-4">
                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-100 group-hover:bg-brand-dark group-hover:text-white transition duration-300">
                            <i data-lucide="refresh-ccw" class="w-6 h-6"></i>
                        </div>
                        <span class="text-[11px] font-bold text-gray-400 mt-3 group-hover:text-gray-800">Restart Engine</span>
                    </div>
                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-100 group-hover:bg-brand-dark group-hover:text-white transition duration-300">
                            <i data-lucide="link-2" class="w-6 h-6"></i>
                        </div>
                        <span class="text-[11px] font-bold text-gray-400 mt-3 group-hover:text-gray-800">Sync Data</span>
                    </div>
                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-100 group-hover:bg-brand-dark group-hover:text-white transition duration-300">
                            <i data-lucide="database" class="w-6 h-6"></i>
                        </div>
                        <span class="text-[11px] font-bold text-gray-400 mt-3 group-hover:text-gray-800">Clear Cache</span>
                    </div>
                    <div class="flex flex-col items-center text-center group cursor-pointer">
                        <div class="w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-100 group-hover:bg-brand-dark group-hover:text-white transition duration-300">
                            <i data-lucide="hard-drive" class="w-6 h-6"></i>
                        </div>
                        <span class="text-[11px] font-bold text-gray-400 mt-3 group-hover:text-gray-800">Maintenance</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Access Grid -->
    <div class="mt-12 bg-white p-8 rounded-3xl border border-gray-100 card-shadow">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-xl font-bold text-gray-800">Audit Akses & Role Management</h3>
            <div class="flex items-center gap-2 text-xs font-bold text-gray-400 border border-gray-100 px-3 py-2 rounded-lg">
                <i data-lucide="calendar" class="w-4 h-4"></i>
                <span>Senin, 10 Mar 2026</span>
            </div>
        </div>
        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-12 gap-4">
             @for($i=9; $i<=21; $i++)
             <div class="flex flex-col items-center gap-2">
                <div class="w-full aspect-square bg-gray-50 rounded-xl flex items-center justify-center group relative cursor-help">
                    <div class="w-2 h-2 {{ $i % 2 == 0 ? 'bg-green-500' : 'bg-orange-400' }} rounded-full"></div>
                    <!-- Tooltip -->
                    <div class="absolute bottom-full mb-2 hidden group-hover:block bg-brand-dark text-white text-[10px] px-2 py-1 rounded-md z-10 whitespace-nowrap">
                        Akses: {{ rand(10, 100) }} users
                    </div>
                </div>
                <span class="text-[10px] font-bold text-gray-400">{{ $i }}:00</span>
             </div>
             @endfor
        </div>
        <div class="mt-8 flex flex-wrap gap-6 border-t border-gray-50 pt-8">
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-gray-200 rounded-full"></div>
                <span class="text-xs font-bold text-gray-400">Low (0-20%)</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-orange-400 rounded-full"></div>
                <span class="text-xs font-bold text-gray-400">Medium (21-70%)</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                <span class="text-xs font-bold text-gray-400">High (71-100%)</span>
            </div>
        </div>
    </div>
</x-admin-premium-layout>
