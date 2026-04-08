<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Login - {{ config('app.name') }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(to bottom, #008444, #006030);
            min-height: 100vh;
        }

        .unsil-green {
            background-color: #008444;
        }

        .unsil-yellow {
            color: #FFD700;
        }

        .unsil-bg-yellow {
            background-color: #FFD700;
        }

        .bottom-card {
            background-color: white;
            border-radius: 40px 40px 0 0;
            box-shadow: 0 -10px 25px rgba(0, 0, 0, 0.1);
        }

        .input-box {
            background-color: #f8fafc;
            border: 1.5px solid #f1f5f9;
            transition: all 0.3s;
        }

        .input-box:focus-within {
            border-color: #008444;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(0, 132, 68, 0.05);
        }

        .input-icon {
            color: #94a3b8;
        }

        .input-box:focus-within .input-icon {
            color: #008444;
        }

        /* Mobile App Feel: Disable scroll bounces */
        body,
        html {
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body class="flex flex-col">
    <!-- Top Section (Layout from Image 1) -->
    <div class="h-[40vh] flex flex-col justify-end p-8 pb-12 relative overflow-hidden">
        <!-- Abstract Background Waves (Inspired by Image 1) -->
        <div class="absolute top-0 right-0 w-full h-full opacity-20 pointer-events-none">
            <svg class="w-full h-full" viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M400 100C300 150 200 50 100 100C0 150 -100 0 -200 50" stroke="white" stroke-width="2" />
                <path d="M400 150C300 200 200 100 100 150C0 200 -100 50 -200 100" stroke="white" stroke-width="2" />
                <path d="M400 200C300 250 200 150 100 200C0 250 -100 100 -200 150" stroke="white" stroke-width="2" />
            </svg>
        </div>

        <div class="relative z-10 animate-in fade-in slide-in-from-bottom-4 duration-700">
            <!-- UNSIL Logo at Top Right -->
            <div class="absolute -top-16 right-0">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo UNSIL" class="h-20 w-auto drop-shadow-md">
            </div>

            <h1 class="text-5xl font-black text-white mb-2 tracking-tight">EUB</h1>
            <p class="text-white/80 font-medium text-lg leading-snug">Evaluasi Umpan Balik Universitas Siliwangi</p>
        </div>
    </div>

    <!-- Bottom Card Section (Layout from Image 1) -->
    <div class="flex-grow bottom-card p-10 flex flex-col animate-in slide-in-from-bottom duration-700">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 leading-none">Sign in</h2>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6 flex-grow">
            @csrf

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Email Input -->
            <div class="space-y-1">
                <div class="input-box flex items-center px-4 py-4 rounded-xl group transition-all">
                    <i data-lucide="mail" class="w-5 h-5 input-icon mr-3 transition-colors"></i>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-transparent text-gray-800 placeholder-gray-400 focus:outline-none font-medium text-base"
                        placeholder="Enter your email" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="text-rose-500 text-xs font-bold px-2 mt-1" />
            </div>

            <!-- Password Input -->
            <div class="space-y-1">
                <div class="input-box flex items-center px-4 py-4 rounded-xl group transition-all">
                    <i data-lucide="lock" class="w-5 h-5 input-icon mr-3 transition-colors"></i>
                    <input type="password" name="password" required autocomplete="current-password"
                        class="w-full bg-transparent text-gray-800 placeholder-gray-400 focus:outline-none font-medium text-base"
                        placeholder="Enter your Password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="text-rose-500 text-xs font-bold px-2 mt-1" />
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between px-1">
                <label class="flex items-center group cursor-pointer">
                    <input type="checkbox" name="remember"
                        class="w-4 h-4 rounded border-gray-300 text-[#008444] focus:ring-[#008444]/20 transition">
                    <span class="ml-2 text-xs font-semibold text-gray-500 group-hover:text-gray-700 transition">Remember
                        me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-xs font-bold text-blue-600 hover:text-blue-800 transition">Forgot password?</a>
                @endif
            </div>

            <!-- Sign In Button (Layout from Image 1, Color from Image 2) -->
            <div class="pt-4 pb-2">
                <button type="submit"
                    class="w-full py-4 bg-[#008444] text-white font-bold rounded-xl text-lg shadow-lg shadow-[#008444]/20 hover:bg-[#006b35] active:scale-95 transition-all duration-300">
                    Sign in
                </button>
            </div>

            <!-- Footer Link -->
            <div class="mt-auto pb-6 text-center text-gray-500 font-semibold text-sm">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-600 font-bold ml-1">Sign up</a>
            </div>
        </form>
    </div>

    <!-- UNSIL Logo Branding (Small at bottom center) -->
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2 opacity-10 grayscale">
        <div class="w-4 h-4 rounded-full bg-[#008444]"></div>
        <span class="text-[8px] font-black tracking-[0.3em] uppercase">EUB UNIV SILIWANGI</span>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>