<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in | PPID Universitas Baiturrahmah</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Halaman masuk administrasi internal PPID Universitas Baiturrahmah.">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom CSS Animations for Premium Experience -->
    <style>
        @keyframes slideUpFade {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes floatPulse {
            0%, 100% {
                transform: translateY(0) scale(1);
                box-shadow: 0 4px 12px rgba(237, 201, 127, 0.1);
            }
            50% {
                transform: translateY(-8px) scale(1.03);
                box-shadow: 0 12px 24px rgba(237, 201, 127, 0.3);
                border-color: rgba(237, 201, 127, 0.5);
            }
        }
        @keyframes subtleGlow {
            0%, 100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.4;
            }
            50% {
                transform: translate(20px, -20px) scale(1.05);
                opacity: 0.6;
            }
        }
        .animate-card {
            animation: slideUpFade 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .animate-float-pulse {
            animation: floatPulse 4s ease-in-out infinite;
        }
        .animate-bg-glow-1 {
            animation: subtleGlow 10s ease-in-out infinite;
        }
        .animate-bg-glow-2 {
            animation: subtleGlow 8s ease-in-out infinite alternate;
        }
    </style>
</head>
<body class="bg-[#EFF3F0] text-slate-800 font-sans min-h-screen flex items-center justify-center p-4 sm:p-6 md:p-8 relative overflow-hidden">

    <!-- Interactive Ambient Background Glows -->
    <div class="absolute -top-40 -left-40 w-[600px] h-[600px] rounded-full bg-brand-green-500/10 blur-[130px] pointer-events-none animate-bg-glow-1"></div>
    <div class="absolute -bottom-40 -right-40 w-[500px] h-[500px] rounded-full bg-brand-green-900/10 blur-[120px] pointer-events-none animate-bg-glow-2"></div>

    <!-- Outer Card Container -->
    <div class="w-full max-w-5xl bg-white rounded-[32px] shadow-[0_20px_50px_rgba(0,0,0,0.06)] overflow-hidden grid grid-cols-1 md:grid-cols-2 min-h-[540px] animate-card relative z-10">
        
        <!-- Left Side: Welcome Panel (Dark Green & Gold Theme) -->
        <div class="bg-gradient-to-b from-brand-green-900 to-brand-green-950 p-8 sm:p-14 text-white flex flex-col justify-center items-center text-center relative overflow-hidden">
            <!-- Decorative Subtle Grid Overlay -->
            <div class="absolute inset-0 opacity-[0.015] pointer-events-none" style="background-image: radial-gradient(circle, white 1.5px, transparent 1.5px); background-size: 24px 24px;"></div>

            <!-- Logo Unbrah in Animated Gold Box -->
            <div class="w-16 h-16 bg-brand-gold-500 rounded-2xl border border-brand-gold-500/20 flex items-center justify-center mb-6 shadow-md relative z-10 animate-float-pulse transition-all duration-300">
                <img src="/images/logo_unbrah.png" alt="Logo Universitas Baiturrahmah" class="w-10 h-10 object-contain">
            </div>

            <!-- Welcome Text in Gold -->
            <h2 class="text-3xl font-bold font-display text-brand-gold-500 mb-3 relative z-10 transition-all">Selamat Datang</h2>
            <p class="text-xs text-slate-300 leading-relaxed max-w-[280px] mb-8 font-light relative z-10">
                Akses portal Pejabat Pengelola Informasi & Dokumentasi Universitas Baiturrahmah dengan aman dan cepat.
            </p>

            <!-- Back to Public Link Button (Gold Theme) -->
            <a href="/" class="px-6 py-2.5 rounded-full border border-brand-gold-500/30 hover:border-brand-gold-500/60 hover:bg-brand-gold-500/10 text-xs font-semibold text-brand-gold-500 hover:scale-105 active:scale-[0.98] transition-all duration-300 relative z-10 cursor-pointer">
                Kembali ke Beranda
            </a>
        </div>

        <!-- Right Side: Form Panel (White) -->
        <div class="p-8 sm:p-14 bg-white flex flex-col justify-center">
            
            <!-- Header Brand Logo (Like Image 2 Mockup) -->
            <div class="flex items-center space-x-4 mb-8">
                <img src="/images/logo_unbrah.png" alt="Logo Universitas Baiturrahmah" class="w-20 h-20 object-contain flex-shrink-0">
                <div class="flex flex-col justify-center">
                    <span class="text-xs font-extrabold tracking-wider text-slate-700 uppercase leading-tight">Pejabat Pengelola</span>
                    <span class="text-xs font-extrabold tracking-wider text-slate-700 uppercase leading-tight -mt-0.5">Informasi & Dokumentasi</span>
                    <span class="text-3xl font-black tracking-tight text-brand-green-950 font-display leading-none -mt-0.5">PPID UNBRAH</span>
                </div>
            </div>

            <!-- Header Info -->
            <div class="space-y-1 mb-6">
                <h3 class="text-2xl font-bold text-slate-900 font-display">Log in</h3>
                <p class="text-xs text-slate-400 font-light">Silakan masukkan kredensial Anda.</p>
            </div>

            <!-- Error Alerts -->
            @if ($errors->any())
                <div class="mb-5 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs transition-all duration-300">
                    <ul class="list-disc list-inside space-y-1 font-light">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Email Input -->
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </span>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                           class="w-full bg-[#F4F7F5] border border-slate-100 focus:border-brand-green-600 focus:bg-white focus:ring-4 focus:ring-brand-green-500/10 rounded-xl py-3.5 pl-12 pr-4 text-xs text-slate-800 placeholder-slate-450 focus:outline-none transition-all duration-300 outline-none"
                           placeholder="Alamat Email">
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </span>
                    <input type="password" name="password" id="password" required
                           class="w-full bg-[#F4F7F5] border border-slate-100 focus:border-brand-green-600 focus:bg-white focus:ring-4 focus:ring-brand-green-500/10 rounded-xl py-3.5 pl-12 pr-11 text-xs text-slate-800 placeholder-slate-450 focus:outline-none transition-all duration-300 outline-none"
                           placeholder="Kata Sandi">
                    <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 flex items-center pr-4 text-slate-450 hover:text-brand-green-600 transition-colors focus:outline-none cursor-pointer">
                        <svg id="password-toggle-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                </div>

                <!-- Remember / Reset links -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center space-x-2 text-slate-450 select-none cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-200 text-brand-green-650 focus:ring-brand-green-500 bg-[#F4F7F5] accent-brand-green-650">
                        <span class="text-[11px] font-medium">Ingat saya</span>
                    </label>
                    <a href="javascript:void(0)" onclick="alert('Silakan hubungi administrator IT untuk mereset kata sandi Anda.')" class="text-[11px] font-bold text-brand-green-700 hover:text-brand-green-900 transition-colors">
                        Lupa sandi?
                    </a>
                </div>

                <!-- Submit Button (Brand Green Theme) -->
                <button type="submit" 
                        class="w-full bg-brand-green-900 hover:bg-brand-green-950 text-white font-black py-3.5 px-4 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg hover:shadow-brand-green-950/15 hover:scale-[1.01] active:scale-[0.99] cursor-pointer text-xs uppercase tracking-wider mt-4 border-0">
                    MASUK SEKARANG
                </button>
            </form>
        </div>

    </div>

    <!-- Password visibility toggle script -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('password-toggle-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>';
            } else {
                passwordInput.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        }
    </script>

</body>
</html>
