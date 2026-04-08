<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'EUB Premium Dashboard' }}</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar-active {
            color: #008444;
            background-color: #f0fdf4;
            border-left: 4px solid #008444;
        }
        .sidebar-item {
            transition: all 0.2s;
        }
        .sidebar-item:hover:not(.sidebar-active) {
            background-color: #f3f4f6;
        }
        .card-shadow {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }
        
        /* Global Rebranding Overrides */
        .bg-orange-500, .bg-brand-orange, .bg-indigo-500, .bg-indigo-600 {
            background-color: #008444 !important;
        }
        .hover\:bg-orange-600:hover, .hover\:bg-brand-orange:hover, .hover\:bg-indigo-700:hover {
            background-color: #006b35 !important;
        }
        .bg-orange-50, .bg-indigo-50 {
            background-color: #f0fdf4 !important; /* light green */
        }
        .hover\:bg-orange-50:hover, .hover\:bg-indigo-50:hover {
            background-color: #dcfce7 !important;
        }
        .text-orange-500, .text-orange-600, .text-indigo-600 {
            color: #008444 !important;
        }
        .border-orange-500, .border-indigo-500, .border-orange-100, .border-indigo-100 {
            border-color: #00844433 !important; /* low opacity green */
        }
        .focus\:ring-orange-500:focus, .focus\:ring-indigo-500:focus {
            --tw-ring-color: #008444 !important;
        }
        .shadow-orange-200, .shadow-orange-100, .shadow-indigo-100 {
            --tw-shadow-color: rgba(0, 132, 68, 0.1) !important;
            --tw-shadow: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color) !important;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            green: '#008444',
                            yellow: '#FFD700',
                            dark: '#1f2937',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 overflow-x-hidden">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white border-r border-gray-100 z-50 transition-transform transform lg:translate-x-0 -translate-x-full">
        <div class="p-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-[#008444] rounded-lg flex items-center justify-center">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo UNSIL" class="w-7 h-7">
            </div>
            <span class="text-2xl font-bold text-gray-800">EUB<span class="text-[#008444]">System</span></span>
        </div>

        <div class="mt-4 px-3 overflow-y-auto h-[calc(100%-80px)]">
            <div class="mb-6">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Main Menu</p>
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'sidebar-active' : 'text-gray-600' }}">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="{{ route('admin.semesters.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 {{ request()->routeIs('admin.semesters.*') ? 'sidebar-active' : '' }}">
                        <i data-lucide="calendar" class="w-5 h-5"></i>
                        <span class="font-medium">Semester</span>
                    </a>
                    <a href="{{ route('admin.courses.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 {{ request()->routeIs('admin.courses.*') ? 'sidebar-active' : '' }}">
                        <i data-lucide="book-open" class="w-5 h-5"></i>
                        <span class="font-medium">Mata Kuliah</span>
                    </a>
                    <a href="{{ route('admin.lecturers.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 {{ request()->routeIs('admin.lecturers.*') ? 'sidebar-active' : '' }}">
                        <i data-lucide="users" class="w-5 h-5"></i>
                        <span class="font-medium">Dosen</span>
                    </a>
                    <a href="{{ route('admin.students.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 {{ request()->routeIs('admin.students.*') ? 'sidebar-active' : '' }}">
                        <i data-lucide="user-square" class="w-5 h-5"></i>
                        <span class="font-medium">Mahasiswa</span>
                    </a>
                    <div class="h-px bg-gray-50 mx-4 my-2"></div>
                    <a href="{{ route('admin.classes.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 {{ request()->routeIs('admin.classes.*') ? 'sidebar-active' : '' }}">
                        <i data-lucide="layers" class="w-5 h-5"></i>
                        <span class="font-medium">Manajemen Kelas</span>
                    </a>
                    <a href="{{ route('admin.enrollments.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 {{ request()->routeIs('admin.enrollments.*') ? 'sidebar-active' : '' }}">
                        <i data-lucide="user-plus" class="w-5 h-5"></i>
                        <span class="font-medium">Plotting Mahasiswa</span>
                    </a>
                    <div class="h-px bg-gray-50 mx-4 my-2"></div>
                    <div class="space-y-1">
                        <button onclick="toggleDropdown('ques-dropdown', 'ques-chevron')" class="w-full sidebar-item flex items-center justify-between px-4 py-3 rounded-lg text-gray-600 {{ request()->routeIs('admin.questionnaires.*') ? 'bg-gray-50' : '' }}">
                            <div class="flex items-center gap-3">
                                <i data-lucide="clipboard-list" class="w-5 h-5"></i>
                                <span class="font-medium">Kuesioner</span>
                            </div>
                            <i id="ques-chevron" data-lucide="chevron-down" class="w-4 h-4 transition-transform {{ request()->routeIs('admin.questionnaires.*') ? 'rotate-180' : '' }}"></i>
                        </button>
                        <div id="ques-dropdown" class="{{ request()->routeIs('admin.questionnaires.*') ? '' : 'hidden' }} pl-12 space-y-1 mt-1">
                            <a href="{{ route('admin.questionnaires.index') }}" class="block py-2 text-sm font-medium {{ request()->routeIs('admin.questionnaires.index') ? 'text-[#008444]' : 'text-gray-500 hover:text-[#008444]' }} transition">Daftar Template</a>
                            <a href="{{ route('admin.questionnaires.create') }}" class="block py-2 text-sm font-medium {{ request()->routeIs('admin.questionnaires.create') ? 'text-[#008444]' : 'text-gray-500 hover:text-[#008444]' }} transition">Buat Baru</a>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="mb-6">
                <p class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Laporan & Hasil</p>
                <nav class="space-y-1">
                    <a href="#" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600">
                        <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
                        <span class="font-medium">Statistik Dosen</span>
                    </a>
                    <a href="{{ route('admin.reports.index') }}" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 {{ request()->routeIs('admin.reports.*') ? 'sidebar-active' : '' }}">
                        <i data-lucide="file-text" class="w-5 h-5"></i>
                        <span class="font-medium">Hasil Evaluasi</span>
                    </a>
                </nav>
            </div>

            <div class="mt-10 mb-6 border-t border-gray-50 pt-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-item flex items-center gap-3 px-4 py-3 rounded-lg text-red-500 hover:bg-red-50 transition w-full">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span class="font-bold">Keluar Sistem</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Content Area -->
    <main class="lg:ml-64 min-h-screen transition-all">
        <!-- Top Navbar -->
        <header class="bg-white/80 backdrop-blur-md sticky top-0 z-40 border-b border-gray-100 flex items-center justify-between px-6 py-3">
            <div class="flex items-center gap-4">
                <button id="sidebarToggle" class="lg:hidden p-2 text-gray-500 hover:bg-gray-100 rounded-lg">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div class="relative hidden md:block">
                    <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 w-4 h-4"></i>
                    <input type="text" placeholder="Search data... (CTRL + K)" class="pl-10 pr-4 py-2 bg-gray-100 border-none rounded-full text-sm w-80 focus:ring-2 focus:ring-[#008444] transition-all">
                </div>
            </div>

            <div class="flex items-center gap-2 md:gap-4">
                <button class="p-2 text-gray-500 hover:bg-gray-100 rounded-full relative">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-[#FFD700] rounded-full border-2 border-white"></span>
                </button>
                <button class="p-2 text-gray-500 hover:bg-gray-100 rounded-full hidden sm:block">
                    <i data-lucide="grid-3x3" class="w-5 h-5"></i>
                </button>
                <div class="h-8 w-[1px] bg-gray-200 mx-2"></div>
                <div class="flex items-center gap-3 ml-2">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-400 uppercase tracking-tighter">Administrator</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=008444&color=fff" alt="Profile" class="h-9 w-9 rounded-full border-2 border-green-100 shadow-sm">
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-full transition-colors" title="Logout">
                                <i data-lucide="log-out" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <div class="p-6 md:p-8">
            {{ $slot }}
        </div>
    </main>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Dropdown Toggle
        function toggleDropdown(id, chevronId) {
            const dropdown = document.getElementById(id);
            const chevron = document.getElementById(chevronId);
            
            dropdown.classList.toggle('hidden');
            chevron.classList.toggle('rotate-180');
        }

        // Sidebar Toggle for Mobile
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        
        if(sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });
        }
    </script>
</body>
</html>
