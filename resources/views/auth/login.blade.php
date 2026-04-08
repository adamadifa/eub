<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name') }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .mesh-gradient {
            background-color: #004d26;
            background-image: 
                radial-gradient(at 0% 0%, hsla(153,66%,7%,1) 0, transparent 50%), 
                radial-gradient(at 50% 0%, hsla(145,39%,30%,1) 0, transparent 50%), 
                radial-gradient(at 100% 0%, hsla(150,49%,40%,1) 0, transparent 50%), 
                radial-gradient(at 0% 100%, hsla(140,79%,25%,1) 0, transparent 50%), 
                radial-gradient(at 50% 100%, hsla(155,64%,35%,1) 0, transparent 50%), 
                radial-gradient(at 100% 100%, hsla(45,100%,35%,1) 0, transparent 50%);
        }
        .glass-card {
            background: white;
            border-radius: 3rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .premium-input {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .premium-input:focus {
            background: #ffffff;
            border-color: #008444;
            box-shadow: 0 0 0 4px rgba(0, 132, 68, 0.1);
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .blur-circle {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.4;
        }
    </style>
</head>
<body class="mesh-gradient min-h-screen flex items-center justify-center p-4 overflow-hidden relative">
    
    <!-- Background Animated Elements -->
    <div class="blur-circle w-96 h-96 bg-green-500 top-[-10%] left-[-10%] animate-float"></div>
    <div class="blur-circle w-80 h-80 bg-green-600 bottom-[-10%] right-[-10%] animate-float" style="animation-delay: -3s"></div>
    <div class="blur-circle w-64 h-64 bg-yellow-500 top-[40%] right-[10%] opacity-20"></div>

    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
        
        <!-- Left Side: Branding (Desktop Only) -->
        <div class="text-white p-8 hidden lg:block">
            <div class="flex items-center gap-4 mb-16 animate-in slide-in-from-left duration-700">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo UNSIL" class="w-14 h-14 drop-shadow-lg">
                <div>
                    <span class="text-3xl font-black tracking-tighter uppercase leading-none block">EUB<span class="text-[#FFD700]">System</span></span>
                    <span class="text-[10px] font-bold text-gray-400 tracking-[0.3em] uppercase">Universitas Siliwangi</span>
                </div>
            </div>
            
            <div class="space-y-6">
                <h1 class="text-7xl font-black mb-8 leading-[0.9] tracking-tighter animate-in slide-in-from-bottom duration-700 delay-100">
                    Empowering <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-green-400">Better Learning.</span>
                </h1>
                <p class="text-xl text-white/60 leading-relaxed max-w-md animate-in slide-in-from-bottom duration-700 delay-200">
                    Sistem Evaluasi Umpan Balik Mahasiswa yang transparan dan akurat untuk membangun standar akademik yang lebih tinggi.
                </p>
                
                <div class="flex items-center gap-6 pt-10 animate-in fade-in duration-1000 delay-500">
                    <div class="flex -space-x-3">
                        <img class="w-10 h-10 rounded-full border-2 border-indigo-900" src="https://ui-avatars.com/api/?name=U+M&background=f97316&color=fff" alt="">
                        <img class="w-10 h-10 rounded-full border-2 border-indigo-900" src="https://ui-avatars.com/api/?name=A+L&background=e11d48&color=fff" alt="">
                        <img class="w-10 h-10 rounded-full border-2 border-indigo-900" src="https://ui-avatars.com/api/?name=S+T&background=4f46e5&color=fff" alt="">
                    </div>
                    <span class="text-sm font-medium text-white/40">Dipercaya oleh ribuan civitas akademika</span>
                </div>
            </div>
        </div>

        <!-- Right Side: Login Form (Mobile Focused) -->
        <div class="glass-card rounded-[3rem] p-8 md:p-12 lg:p-16 max-w-lg w-full mx-auto shadow-2xl animate-in fade-in zoom-in duration-700">
            <!-- Mobile Logo -->
            <div class="lg:hidden flex justify-center mb-10">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/10 backdrop-blur-xl rounded-xl flex items-center justify-center border border-white/20">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo UNSIL" class="w-6 h-6">
                    </div>
                    <span class="text-xl font-bold text-white tracking-widest text uppercase">EUB System</span>
                </div>
            </div>

            <div class="text-center lg:text-left mb-12">
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 mb-3 tracking-tight">Selamat Datang</h2>
                <p class="text-gray-500 font-medium">Masuk untuk memberi atau mengelola evaluasi</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email" class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em] ml-2">Alamat Email</label>
                    <div class="relative group">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#008444] transition-colors">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                            placeholder="nama@kampus.ac.id"
                            class="w-full pl-14 pr-6 py-5 premium-input rounded-2xl md:rounded-3xl text-gray-800 focus:outline-none placeholder-gray-300" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-rose-500 px-2" />
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center ml-2">
                        <label for="password" class="text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] font-bold text-blue-600 hover:text-blue-800 uppercase tracking-widest transition">Lupa?</a>
                        @endif
                    </div>
                    <div class="relative group">
                        <div class="absolute left-6 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#008444] transition-colors">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full pl-14 pr-6 py-5 premium-input rounded-2xl md:rounded-3xl text-gray-800 focus:outline-none placeholder-gray-300" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-rose-500 px-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center px-2">
                    <label class="flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox" class="rounded bg-white/5 border-gray-200 text-[#008444] focus:ring-[#008444]/20 w-4 h-4 transition" name="remember">
                        <span class="ms-3 text-xs font-medium text-gray-500 group-hover:text-gray-700 transition">Ingat saya untuk sesi berikutnya</span>
                    </label>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-5 bg-[#008444] text-white font-black rounded-2xl md:rounded-3xl shadow-[0_20px_40px_-10px_rgba(0,132,68,0.3)] hover:shadow-[0_25px_50px_-12px_rgba(0,132,68,0.4)] transition-all duration-300 transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3">
                        Masuk Ke Sistem <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Divider -->
                <div class="relative py-4 flex items-center">
                    <div class="flex-grow border-t border-gray-100"></div>
                    <span class="flex-shrink mx-4 text-[9px] font-black text-gray-300 uppercase tracking-widest">Akses Civitas Academika</span>
                    <div class="flex-grow border-t border-gray-100"></div>
                </div>

                @if (Route::has('register'))
                    <div class="text-center text-sm text-gray-500 font-medium tracking-tight">
                        Belum memiliki akun? <a href="{{ route('register') }}" class="text-[#008444] hover:text-[#FFD700] transition font-bold underline decoration-gray-200 underline-offset-4">Daftar Sekarang</a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
