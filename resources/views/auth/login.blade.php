<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | PPID Universitas Baiturrahmah</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Halaman masuk administrasi internal PPID Universitas Baiturrahmah.">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-green-950 text-slate-200 font-sans min-h-screen flex items-center justify-center relative overflow-hidden p-4">

    <!-- Decorative Glow Circles -->
    <div class="absolute -top-40 -left-40 w-96 h-96 rounded-full bg-brand-green-500/20 blur-[100px] pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 rounded-full bg-brand-gold-500/10 blur-[120px] pointer-events-none"></div>

    <!-- Outer Card Container -->
    <div class="w-full max-w-md z-10">
        <!-- Logo & Header -->
        <div class="text-center mb-8 flex flex-col items-center">
            <div class="w-20 h-20 mb-4 bg-white/10 p-3 rounded-2xl border border-white/10 shadow-xl flex items-center justify-center animate-float">
                <img src="/images/logo_unbrah.png" alt="Logo Universitas Baiturrahmah" class="w-full h-full object-contain">
            </div>
            <h1 class="text-3xl font-bold font-display tracking-tight text-white mb-2">Portal PPID</h1>
            <p class="text-xs text-slate-400 font-semibold uppercase tracking-widest">Universitas Baiturrahmah</p>
        </div>

        <!-- Glassmorphism Form Card -->
        <div class="glass-dark p-8 rounded-3xl shadow-2xl relative overflow-hidden">
            <!-- Subtle Gold Accent Border at Top -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-brand-green-500 via-brand-gold-500 to-brand-green-500"></div>

            <h2 class="text-xl font-bold font-display text-white mb-6 text-center">Masuk ke Dashboard</h2>

            @if ($errors->any())
                <div class="mb-5 p-4 rounded-xl bg-red-950/50 border border-red-500/30 text-red-300 text-xs">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                
                <!-- Email Input Group -->
                <div class="space-y-2">
                    <label for="email" class="block text-xs font-semibold text-slate-300 tracking-wide">Alamat Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-500 pointer-events-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                        </span>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                               class="w-full bg-brand-green-950/50 border border-brand-green-800/60 rounded-xl py-3 pl-11 pr-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold-500 focus:ring-1 focus:ring-brand-gold-500 transition-all"
                               placeholder="nama@email.com">
                    </div>
                </div>

                <!-- Password Input Group -->
                <div class="space-y-2">
                    <label for="password" class="block text-xs font-semibold text-slate-300 tracking-wide">Kata Sandi</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-500 pointer-events-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </span>
                        <input type="password" name="password" id="password" required
                               class="w-full bg-brand-green-950/50 border border-brand-green-800/60 rounded-xl py-3 pl-11 pr-4 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-brand-gold-500 focus:ring-1 focus:ring-brand-gold-500 transition-all"
                               placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center space-x-2 text-xs text-slate-400 select-none cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-brand-green-800 text-brand-green-600 focus:ring-brand-gold-500 bg-brand-green-950">
                        <span>Ingat Saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full bg-brand-gold-500 hover:bg-brand-gold-600 text-brand-green-950 font-bold py-3 px-4 rounded-xl transition-all shadow-lg hover:shadow-brand-gold-500/20 active:scale-[0.98] cursor-pointer text-sm">
                    Masuk Sekarang
                </button>
            </form>
        </div>

        <!-- Public Footer Link -->
        <div class="text-center mt-6">
            <a href="/" class="text-xs text-slate-400 hover:text-brand-gold-500 transition-colors inline-flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda Publik
            </a>
        </div>
    </div>

</body>
</html>
