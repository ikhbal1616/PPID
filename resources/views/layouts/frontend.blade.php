<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PPID Universitas Baiturrahmah') | Keterbukaan Informasi Publik</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta SEO -->
    <meta name="description" content="Portal Resmi Pejabat Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah. Memberikan akses informasi publik secara transparan, akurat, dan akuntabel sesuai UU No. 14 Tahun 2008.">
    <meta name="author" content="Universitas Baiturrahmah">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/logo_unbrah.png">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js (Local Offline) -->
    <script defer src="/js/alpine.js"></script>
    
    <!-- SweetAlert2 (Local Offline) -->
    <script src="/js/sweetalert2.js"></script>
    
    @yield('styles')
    
    <!-- Google Translate Custom Styling Override -->
    <style>
        .goog-te-banner-frame.skiptranslate,
        .goog-te-banner-frame,
        iframe.goog-te-banner-frame {
            display: none !important;
        }
        body {
            top: 0px !important;
        }
        .goog-tooltip,
        .goog-tooltip:hover {
            display: none !important;
        }
        .goog-text-highlight {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased overflow-x-hidden">

    <!-- TOP BAR (Mini-Header) -->
    <div class="bg-brand-green-950 text-slate-200 text-xs py-2 border-b border-brand-green-900/50 hidden md:block">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-brand-gold-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <span>(0751) 4641913</span>
                </span>
                <span class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-brand-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>ppid@unbrah.ac.id</span>
                </span>
                <span class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-brand-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Senin - Jumat: 08:00 - 16:00 WIB</span>
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="/berita" class="hover:text-brand-gold-500 transition-colors">Arsip Berita</a>
                <span>|</span>
                <a href="#" class="hover:text-brand-gold-500 transition-colors">Sistem Informasi</a>
                <span>|</span>
                <!-- Language Toggle Switch (Desktop) -->
                <button onclick="toggleLanguage()" id="lang-switch" class="relative inline-flex items-center h-6 w-14 rounded-full transition-colors duration-305 focus:outline-none cursor-pointer p-0.5 bg-brand-green-900 border border-brand-green-800">
                    <span id="lang-switch-knob" class="pointer-events-none inline-block h-4.5 w-4.5 rounded-full bg-white shadow-md transform transition-transform duration-300 ease-in-out translate-x-0"></span>
                    <span id="lang-switch-text" class="pointer-events-none absolute text-[10px] font-black uppercase tracking-wider select-none transition-all duration-300 text-brand-gold-500 right-2">
                        ID
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR (Glassmorphism & Sticky) -->
    <header id="main-header" class="sticky top-0 z-50 transition-all duration-300 w-full">
        <div id="navbar-bg" class="glass-light shadow-md transition-all duration-300">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 py-3.5 flex justify-between items-center">
                <!-- Branding / Logo -->
                <a href="/" class="flex items-center space-x-4 group">
                    <img src="/images/logo_unbrah.png" 
                         alt="Logo Universitas Baiturrahmah" 
                         class="w-18 h-18 object-contain filter drop-shadow group-hover:scale-105 transition-transform duration-300">
                    <div class="flex flex-col justify-center translate-y-[2px]">
                        <span class="text-[11px] md:text-xs font-bold tracking-wider text-brand-green-900 uppercase leading-tight">Pejabat Pengelola<br>Informasi & Dokumentasi</span>
                        <span class="text-2xl md:text-3xl font-bold tracking-tight text-brand-green-950 font-display group-hover:text-brand-green-600 transition-colors leading-tight -mt-1">PPID UNBRAH</span>
                    </div>
                </a>

                <!-- Navigation Links (Desktop) -->
                <nav class="hidden lg:flex items-center space-x-8 font-semibold text-sm text-brand-green-950">
                    <a href="/" class="{{ request()->is('/') ? 'text-brand-green-600 relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[2px] after:bg-brand-green-500' : 'hover:text-brand-green-600 transition-colors py-2' }}">Beranda</a>
                    
                    <!-- Tentang Dropdown -->
                    @php
                        $isAboutActive = request()->is('profil*') || request()->is('visi-misi*') || request()->is('struktur-organisasi*') || request()->is('tugas-fungsi*') || request()->is('ppid-dalam-angka*') || request()->is('regulasi*') || request()->is('maklumat-pelayanan*');
                    @endphp
                    <div class="relative group">
                        <button class="flex items-center space-x-1 cursor-pointer transition-colors py-2 {{ $isAboutActive ? 'text-brand-green-600' : 'hover:text-brand-green-600' }}">
                            <span>Tentang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <!-- Dropdown -->
                        <div class="absolute top-full left-0 mt-1 w-56 rounded-xl bg-white shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-2 z-50">
                            <a href="/profil" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('profil') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Profil PPID</a>
                            <a href="/visi-misi" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('visi-misi') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Visi & Misi PPID</a>
                            <a href="/struktur-organisasi" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('struktur-organisasi') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Struktur Organisasi PPID</a>
                            <a href="/tugas-fungsi" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('tugas-fungsi') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Tugas & Fungsi PPID</a>
                            <a href="/ppid-dalam-angka" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('ppid-dalam-angka') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">PPID Dalam Angka</a>
                            <a href="/regulasi" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('regulasi') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Regulasi PPID</a>
                            <a href="/maklumat-pelayanan" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('maklumat-pelayanan') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Maklumat PPID</a>
                        </div>
                    </div>
                    
                    <!-- Informasi Publik Dropdown -->
                    @php
                        $isInfoActive = request()->is('informasi-publik-berkala*') || request()->is('informasi-serta-merta*') || request()->is('informasi-tersedia-setiap-saat*');
                    @endphp
                    <div class="relative group">
                        <button class="flex items-center space-x-1 cursor-pointer transition-colors py-2 {{ $isInfoActive ? 'text-brand-green-600' : 'hover:text-brand-green-600' }}">
                            <span>Informasi Publik</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 mt-1 w-56 rounded-xl bg-white shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-2 z-50">
                            <a href="/informasi-publik-berkala" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('informasi-publik-berkala') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Informasi Publik Berkala</a>
                            <a href="/informasi-serta-merta" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('informasi-serta-merta') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Informasi Serta Merta</a>
                            <a href="/informasi-tersedia-setiap-saat" class="block px-4 py-2 text-xs rounded-lg {{ request()->is('informasi-tersedia-setiap-saat') ? 'bg-brand-green-50 text-brand-green-900 font-bold' : 'hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors' }}">Informasi Tersedia Setiap Saat</a>
                        </div>
                    </div>

                    <!-- Layanan Form Dropdown -->
                    <div class="relative group">
                        <button class="hover:text-brand-green-600 flex items-center space-x-1 cursor-pointer transition-colors py-2">
                            <span>Layanan</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 mt-1 w-64 rounded-xl bg-white shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-2 z-50">
                            <a href="javascript:void(0)" onclick="openModal('permohonan')" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors">Permohonan Informasi</a>
                            <a href="javascript:void(0)" onclick="openModal('keberatan')" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors">Pengajuan Keberatan</a>
                            <a href="javascript:void(0)" onclick="openModal('penyalahgunaan')" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors">Penyalahgunaan Wewenang</a>
                            <a href="javascript:void(0)" onclick="openModal('pengaduan')" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-900 transition-colors">Pengaduan Layanan</a>
                        </div>
                    </div>

                    <a href="/berita" class="{{ request()->is('berita*') ? 'text-brand-green-600 relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[2px] after:bg-brand-green-500' : 'hover:text-brand-green-600 transition-colors py-2' }}">Kilas Berita</a>
                    <a href="/galeri" class="{{ request()->is('galeri*') ? 'text-brand-green-600 relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[2px] after:bg-brand-green-500' : 'hover:text-brand-green-600 transition-colors py-2' }}">Galeri</a>
                    <a href="/dokumen" class="{{ request()->is('dokumen*') ? 'text-brand-green-600 relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[2px] after:bg-brand-green-500' : 'hover:text-brand-green-600 transition-colors py-2' }}">Dokumen</a>
                </nav>

                <!-- Action Button & Mobile Nav Trigger -->
                <div class="flex items-center space-x-4">
                    <!-- Call to Action (Form Cepat) -->
                    <button onclick="openModal('permohonan')" class="hidden md:flex items-center whitespace-nowrap space-x-2 bg-gradient-to-r from-brand-green-900 to-brand-green-950 hover:from-brand-green-950 hover:to-brand-green-900 text-white font-semibold text-sm px-5 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer border border-brand-gold-500/20 hover:border-brand-gold-500/50">
                        <svg class="w-4 h-4 text-brand-gold-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        <span>Hubungi PPID</span>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="lg:hidden p-2 rounded-lg text-brand-green-950 hover:bg-brand-green-50 focus:outline-none transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-100 bg-white shadow-inner max-h-[80vh] overflow-y-auto">
                <div class="px-4 py-3 space-y-2 text-sm font-semibold text-brand-green-950">
                    <a href="/" class="block py-2 text-brand-green-600">Beranda</a>
                    <hr class="border-slate-100">
                    
                    <div>
                        <span class="block py-1 text-slate-400 text-xs font-bold uppercase tracking-wider">Tentang Kami</span>
                        <a href="/profil" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Profil PPID</a>
                        <a href="/visi-misi" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Visi & Misi PPID</a>
                        <a href="/struktur-organisasi" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Struktur Organisasi PPID</a>
                        <a href="/tugas-fungsi" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Tugas & Fungsi PPID</a>
                        <a href="/ppid-dalam-angka" class="block py-2 pl-4 text-xs hover:text-brand-green-600">PPID Dalam Angka</a>
                        <a href="/regulasi" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Regulasi PPID</a>
                        <a href="/maklumat-pelayanan" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Maklumat PPID</a>
                    </div>
                    <hr class="border-slate-100">

                    <div>
                        <span class="block py-1 text-slate-400 text-xs font-bold uppercase tracking-wider">Informasi Publik</span>
                        <a href="/informasi-publik-berkala" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Informasi Publik Berkala</a>
                        <a href="/informasi-serta-merta" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Informasi Serta Merta</a>
                        <a href="/informasi-tersedia-setiap-saat" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Informasi Tersedia Setiap Saat</a>
                    </div>
                    <hr class="border-slate-100">

                    <div>
                        <span class="block py-1 text-slate-400 text-xs font-bold uppercase tracking-wider">Layanan Form</span>
                        <a href="javascript:void(0)" onclick="openModal('permohonan')" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Permohonan Informasi</a>
                        <a href="javascript:void(0)" onclick="openModal('keberatan')" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Pengajuan Keberatan</a>
                        <a href="javascript:void(0)" onclick="openModal('penyalahgunaan')" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Penyalahgunaan Wewenang</a>
                        <a href="javascript:void(0)" onclick="openModal('pengaduan')" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Pengaduan Layanan</a>
                    </div>
                    <hr class="border-slate-100">

                    <a href="/berita" class="block py-2 {{ request()->is('berita*') ? 'text-brand-green-600 font-bold' : 'hover:text-brand-green-600' }}">Kilas Berita</a>
                    <a href="/galeri" class="block py-2 hover:text-brand-green-600">Galeri</a>
                    <a href="/dokumen" class="block py-2 hover:text-brand-green-600">Dokumen</a>
                    
                    <!-- Language Toggle Mobile Switch -->
                    <hr class="border-slate-100">
                    <div class="flex items-center justify-between py-2.5">
                        <span class="text-slate-450 text-xs font-bold uppercase tracking-wider">Bahasa / Language</span>
                        <button onclick="toggleLanguage()" id="lang-switch-mobile" class="relative inline-flex items-center h-6 w-14 rounded-full transition-colors duration-300 focus:outline-none cursor-pointer p-0.5 bg-slate-100 border border-slate-200">
                            <span id="lang-switch-knob-mobile" class="pointer-events-none inline-block h-4.5 w-4.5 rounded-full bg-white shadow-md transform transition-transform duration-300 ease-in-out translate-x-0"></span>
                            <span id="lang-switch-text-mobile" class="pointer-events-none absolute text-[10px] font-black uppercase tracking-wider select-none transition-all duration-300 text-slate-450 right-2">
                                ID
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN FRONTEND CONTENT -->
    @yield('content')

    <!-- FOOTER SECTION -->
    <footer class="bg-brand-green-950 text-slate-400 pt-20 border-t border-brand-green-900">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 pb-16">
                <!-- Column 1: Brand/Logo (Col span 4) -->
                <div class="lg:col-span-4 space-y-6">
                    <a href="/" class="flex items-center space-x-4 group">
                        <img src="/images/logo_unbrah.png" 
                             alt="Logo Universitas Baiturrahmah" 
                             class="w-24 h-24 object-contain filter brightness-95">
                        <div class="flex flex-col justify-center translate-y-[2px]">
                            <span class="text-xs md:text-sm font-bold tracking-wider text-slate-400 uppercase leading-tight">Pejabat Pengelola<br>Informasi & Dokumentasi</span>
                            <span class="text-3xl md:text-4xl font-bold tracking-tight text-white font-display group-hover:text-brand-gold-500 transition-colors leading-tight -mt-1">PPID UNBRAH</span>
                        </div>
                    </a>
                    
                    <p class="text-xs text-slate-400 leading-relaxed font-light">
                        Mewujudkan transparansi keterbukaan informasi di lingkungan kampus secara profesional, kredibel, dan bertanggung jawab sesuai konstitusi Republik Indonesia.
                    </p>
                    
                    <!-- Contacts -->
                    <div class="space-y-3 text-xs text-slate-300">
                        <div class="flex items-start space-x-3">
                            <svg class="w-4 h-4 text-brand-gold-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="font-light">Jl. Raya By Pass KM 15, Aie Pacah, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25176</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 text-brand-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="font-light">(0751) 4641913</span>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Quick Links (Col span 2) -->
                <div class="lg:col-span-2 lg:col-start-6 space-y-6">
                    <h4 class="text-white font-bold font-display text-sm tracking-wider uppercase">Menu Pintas</h4>
                    <ul class="space-y-3 text-xs">
                        <li><a href="/" class="hover:text-white transition-colors">Beranda</a></li>
                        <li><a href="/profil" class="hover:text-white transition-colors">Profil PPID</a></li>
                        <li><a href="/regulasi" class="hover:text-white transition-colors">Regulasi Hukum</a></li>
                        <li><a href="/dokumen" class="hover:text-white transition-colors">Dokumen Publik</a></li>
                        <li><a href="/galeri" class="hover:text-white transition-colors">Galeri Kegiatan</a></li>
                        <li><a href="/berita" class="hover:text-white transition-colors">Kilas Berita</a></li>
                    </ul>
                </div>

                <!-- Column 3: Services (Col span 3) -->
                <div class="lg:col-span-3 space-y-6">
                    <h4 class="text-white font-bold font-display text-sm tracking-wider uppercase">Layanan Informasi</h4>
                    <ul class="space-y-3 text-xs">
                        <li><a href="javascript:void(0)" onclick="openModal('permohonan')" class="hover:text-white transition-colors">Permohonan Informasi Publik</a></li>
                        <li><a href="javascript:void(0)" onclick="openModal('keberatan')" class="hover:text-white transition-colors">Pengajuan Keberatan Pelayanan</a></li>
                        <li><a href="javascript:void(0)" onclick="openModal('penyalahgunaan')" class="hover:text-white transition-colors">Whistleblowing System (WBS)</a></li>
                        <li><a href="javascript:void(0)" onclick="openModal('pengaduan')" class="hover:text-white transition-colors">Pengaduan Layanan Kampus</a></li>
                    </ul>
                </div>

                <!-- Column 4: Links Eksternal (Col span 2) -->
                <div class="lg:col-span-2 space-y-6">
                    <h4 class="text-white font-bold font-display text-sm tracking-wider uppercase">Tautan Resmi</h4>
                    <ul class="space-y-3 text-xs">
                        <li><a href="https://unbrah.ac.id" target="_blank" class="hover:text-white transition-colors">Univ. Baiturrahmah</a></li>
                        <li><a href="https://kemdikbud.go.id" target="_blank" class="hover:text-white transition-colors">Kemendikbudristek</a></li>
                        <li><a href="https://komisiinformasi.go.id" target="_blank" class="hover:text-white transition-colors">Komisi Informasi Pusat</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright bar -->
            <div class="border-t border-brand-green-900/60 py-8 flex flex-col sm:flex-row justify-between items-center text-[10px] text-slate-500">
                <p>© {{ date('Y') }} PPID Universitas Baiturrahmah. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 sm:mt-0 font-medium">
                    <a href="#" class="hover:text-brand-gold-500 transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-brand-gold-500 transition-colors">Ketentuan Layanan</a>
                    <a href="#" class="hover:text-brand-gold-500 transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- INTERACTIVE MODAL FORMS (Shared Globally) -->
    <div id="form-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300"></div>

        <!-- Scrollable content alignment helper -->
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Body Container -->
            <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-3xl border border-slate-100 scale-95 opacity-0 duration-300 ease-out" id="modal-container">
                <!-- Header with color accent -->
                <div class="relative bg-gradient-to-r from-brand-green-900 to-brand-green-950 px-6 py-4 flex justify-between items-center text-white">
                    <div>
                        <h3 class="text-lg font-bold font-display" id="modal-title-text">Formulir Pengajuan PPID</h3>
                        <p class="text-[10px] text-brand-gold-500 tracking-wider uppercase font-semibold mt-0.5" id="modal-subtitle-text">Layanan Online Transparan</p>
                    </div>
                    <!-- Close button -->
                    <button onclick="closeModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors focus:outline-none cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Form Content -->
                <form id="ppid-interactive-form" onsubmit="handleFormSubmit(event)" class="p-6 space-y-4" enctype="multipart/form-data">
                    @csrf
                    <!-- Dynamic field input state depending on type -->
                    <input type="hidden" name="kategori" id="form-type-field">

                    <!-- Jenis Pelanggaran Dropdown (Only visible for penyalahgunaan) -->
                    <div id="penyalahgunaan-extra-fields" class="space-y-1 hidden">
                        <label for="jenis_pelanggaran" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Jenis Pelanggaran</label>
                        <select id="jenis_pelanggaran" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                            <option value="" disabled selected>Jenis Pelanggaran...</option>
                            <option value="Korupsi">Korupsi</option>
                            <option value="Suap">Suap</option>
                            <option value="Gratifikasi">Gratifikasi</option>
                            <option value="Benturan Kepentingan">Benturan Kepentingan</option>
                            <option value="Pencurian">Pencurian</option>
                            <option value="Kecurangan">Kecurangan</option>
                            <option value="Melanggar Hukum dan Peraturan Institusi">Melanggar Hukum dan Peraturan Institusi</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="nama" id="nama-label" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div class="space-y-1">
                            <label for="email" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Alamat Email</label>
                            <input type="email" id="email" name="email" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Masukkan email aktif">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="nik" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">NIK / No. Identitas (KTP)</label>
                            <input type="text" id="nik" name="nik" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="16 digit No. KTP">
                        </div>
                        <div class="space-y-1">
                            <label for="telepon" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">No. WhatsApp</label>
                            <input type="text" id="telepon" name="telepon" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Nomor WA aktif Anda">
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="alamat" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Alamat Lengkap</label>
                        <textarea id="alamat" name="alamat" rows="2" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none resize-none" placeholder="Tulis alamat rumah lengkap Anda"></textarea>
                    </div>

                    <!-- Kategori Pengguna Pelayanan (Only visible for pengaduan) -->
                    <div id="kategori-pengguna-container" class="space-y-1 hidden">
                        <label for="kategori_pengguna" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Kategori Pengguna Pelayanan</label>
                        <select id="kategori_pengguna" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                            <option value="" disabled selected>Kategori Pengguna Pelayanan...</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Umum">Umum</option>
                            <option value="Tendik (Tenaga Kependidikan)">Tendik (Tenaga Kependidikan)</option>
                        </select>
                    </div>

                    <!-- Dynamic field label text depending on form type -->
                    <div id="perincian-container" class="space-y-1">
                        <label for="perincian" id="perincian-label" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Rincian Informasi</label>
                        <textarea id="perincian" name="perincian" rows="3" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none resize-none" placeholder="Detail deskripsi data/layanan yang Anda butuhkan/laporkan"></textarea>
                    </div>

                    <div class="space-y-1">
                        <label id="uploader-label" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Unggah Berkas Pendukung (KTP/Bukti Fisik)</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl bg-slate-50 hover:bg-slate-100 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-xs text-slate-600 justify-center">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md font-bold text-brand-green-600 hover:text-brand-green-900 focus-within:outline-none">
                                        <span id="file-upload-label-text">Pilih file dokumen</span>
                                        <input id="file-upload" name="file_bukti" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1" id="file-upload-drag-text">atau seret ke sini</p>
                                </div>
                                <p class="text-[10px] text-slate-400" id="file-upload-subtext">PNG, JPG, PDF hingga 5MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Bentuk Informasi & Cara Mendapatkan Salinan (Only visible for permohonan) -->
                    <div id="permohonan-extra-fields" class="grid grid-cols-1 sm:grid-cols-2 gap-4 hidden">
                        <div class="space-y-1">
                            <label for="bentuk_informasi" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bentuk Informasi</label>
                            <select id="bentuk_informasi" name="bentuk_informasi" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Pilih Bentuk Informasi...</option>
                                <option value="Dilihat/dibaca/didengarkan/dicatat">Dilihat/dibaca/didengarkan/dicatat</option>
                                <option value="Salinan Informasi (Hardcopy / Softcopy)">Salinan Informasi (Hardcopy / Softcopy)</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label for="cara_mendapatkan" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Cara Mendapatkan Salinan Informasi</label>
                            <select id="cara_mendapatkan" name="cara_mendapatkan" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Pilih Cara Mendapatkan Salinan Informasi...</option>
                                <option value="Mengambil Langsung">Mengambil Langsung</option>
                                <option value="Via Pos / Kurir">Via Pos / Kurir</option>
                                <option value="Email">Email</option>
                            </select>
                        </div>
                    </div>

                    <!-- WBS (Whistleblowing System) Extra Fields (Only visible for penyalahgunaan) -->
                    <div id="wbs-extra-fields" class="space-y-4 mt-4 pt-4 border-t border-slate-200 hidden">
                        <div class="space-y-1">
                            <label for="pejabat_terlapor" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pejabat Yang Melakukan Penyalahgunaan</label>
                            <input type="text" id="pejabat_terlapor" name="pejabat_terlapor" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Masukkan nama pejabat/staf terlapor">
                        </div>
                        <div class="space-y-1">
                            <label for="unit_kerja_terlapor" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Unit Kerja Terlapor</label>
                            <select id="unit_kerja_terlapor" name="unit_kerja_terlapor" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Unit kerja terlapor...</option>
                                <optgroup label="Fakultas">
                                    <option value="Fakultas Kedokteran">Fakultas Kedokteran</option>
                                    <option value="Fakultas Kedokteran Gigi">Fakultas Kedokteran Gigi</option>
                                    <option value="Fakultas Ekonomi & Bisnis">Fakultas Ekonomi & Bisnis</option>
                                    <option value="Fakultas Ilmu Kesehatan">Fakultas Ilmu Kesehatan</option>
                                    <option value="Fakultas Vokasi">Fakultas Vokasi</option>
                                </optgroup>
                                <optgroup label="Prodi">
                                    <option value="Prodi Administrasi Rumah Sakit">Prodi Administrasi Rumah Sakit</option>
                                    <option value="Prodi Farmasi Klinis">Prodi Farmasi Klinis</option>
                                    <option value="Prodi Kebidanan">Prodi Kebidanan</option>
                                    <option value="Prodi Kedokteran">Prodi Kedokteran</option>
                                    <option value="Prodi Keperawatan Anastesiologi">Prodi Keperawatan Anastesiologi</option>
                                    <option value="Prodi Kesmas">Prodi Kesmas</option>
                                    <option value="Prodi Kewirausahaan">Prodi Kewirausahaan</option>
                                    <option value="Prodi Manajemen">Prodi Manajemen</option>
                                    <option value="Prodi Pendidikan Dokter Gigi">Prodi Pendidikan Dokter Gigi</option>
                                    <option value="Prodi Teknik Radiologi">Prodi Teknik Radiologi</option>
                                    <option value="Profesi Bidan">Profesi Bidan</option>
                                    <option value="Profesi Ners">Profesi Ners</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label for="judul_laporan" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Judul Laporan</label>
                            <input type="text" id="judul_laporan" name="judul_laporan" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Tuliskan ringkasan judul laporan dugaan pelanggaran">
                        </div>

                        <div class="space-y-1">
                            <label for="isi_laporan" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Uraian Detail Laporan Kasus</label>
                            <textarea id="isi_laporan" name="isi_laporan" rows="4" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none resize-none" placeholder="Uraikan detail fakta kejadian, kapan, siapa terlapor, saksi, kerugian, dan informasi pendukung lainnya..."></textarea>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-end space-x-2">
                        <button type="button" onclick="closeModal()" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs rounded-xl cursor-pointer transition-colors">Batal</button>
                        <button type="submit" id="btn-submit-ppid" class="px-5 py-2.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold text-xs rounded-xl shadow cursor-pointer transition-colors">Kirim Pengajuan</button>
                    </div>
                </form>

                <!-- Modal Success state -->
                <div id="modal-success-state" class="hidden p-8 flex flex-col items-center text-center space-y-6">
                    <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center animate-bounce">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold font-display text-slate-900">Pengajuan Berhasil Dikirim!</h3>
                        <p class="text-xs text-slate-500 mt-2 max-w-md mx-auto">Laporan Anda telah tercatat pada sistem PPID Universitas Baiturrahmah. Simpan nomor tiket di bawah ini untuk melacak status pengajuan Anda.</p>
                    </div>
                    <div class="bg-slate-50 border border-slate-200 px-6 py-4 rounded-2xl flex flex-col items-center">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-2">Nomor Tiket Anda</span>
                        <span class="text-xl font-mono font-bold text-brand-green-800" id="ticket-number-span">#UNBRAH-PER-XXXXX</span>
                    </div>
                    <button onclick="closeModal()" class="px-6 py-2.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold text-xs rounded-xl shadow transition-colors cursor-pointer">Selesai & Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Scripts (Shared Globally) -->
    <script>
        // Navbar scroll effect
        const mainHeader = document.getElementById('main-header');
        const navbarBg = document.getElementById('navbar-bg');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbarBg.classList.remove('glass-light');
                navbarBg.classList.add('bg-white', 'shadow-lg');
            } else {
                navbarBg.classList.add('glass-light');
                navbarBg.classList.remove('bg-white', 'shadow-lg');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Modal triggers
        function openModal(type) {
            const modal = document.getElementById('form-modal');
            const container = document.getElementById('modal-container');
            const form = document.getElementById('ppid-interactive-form');
            const successState = document.getElementById('modal-success-state');

            // Reset modal states
            form.classList.remove('hidden');
            successState.classList.add('hidden');
            form.reset();

            // Set Form Type
            document.getElementById('form-type-field').value = type;

            // Form Title/Subtitle adjustment
            const titleText = document.getElementById('modal-title-text');
            const subtitleText = document.getElementById('modal-subtitle-text');
            const perincianLabel = document.getElementById('perincian-label');
            const perincian = document.getElementById('perincian');

            // Hide all conditional areas first
            document.getElementById('penyalahgunaan-extra-fields').classList.add('hidden');
            document.getElementById('permohonan-extra-fields').classList.add('hidden');
            document.getElementById('kategori-pengguna-container').classList.add('hidden');
            document.getElementById('wbs-extra-fields').classList.add('hidden');

            document.getElementById('nama').required = true;
            document.getElementById('nik').required = true;

            if (type === 'permohonan') {
                titleText.innerText = "Formulir Permohonan Informasi Publik";
                subtitleText.innerText = "Layanan Permintaan Berkas Resmi";
                perincianLabel.innerText = "Rincian Informasi Yang Dibutuhkan";
                perincian.placeholder = "Tuliskan secara lengkap rincian informasi, data, atau dokumen yang Anda minta...";
                document.getElementById('permohonan-extra-fields').classList.remove('hidden');
            } 
            else if (type === 'keberatan') {
                titleText.innerText = "Formulir Pengajuan Keberatan";
                subtitleText.innerText = "Penyampaian Keberatan Pelayanan Informasi";
                perincianLabel.innerText = "Alasan Pengajuan Keberatan";
                perincian.placeholder = "Sebutkan detail keberatan Anda mengenai pelayanan kami (misal: penundaan, berkas tidak lengkap, dll)...";
            } 
            else if (type === 'penyalahgunaan') {
                titleText.innerText = "Whistleblowing System (WBS)";
                subtitleText.innerText = "Pelaporan Pelanggaran Wewenang & Etika";
                perincianLabel.innerText = "Detail Kronologi Pelanggaran";
                perincian.placeholder = "Deskripsikan secara rinci kejadian penyalahgunaan wewenang, lokasi, waktu, dan pelaku...";
                document.getElementById('penyalahgunaan-extra-fields').classList.remove('hidden');
                document.getElementById('wbs-extra-fields').classList.remove('hidden');
            } 
            else if (type === 'pengaduan') {
                titleText.innerText = "Pengaduan Layanan Akademik & Kampus";
                subtitleText.innerText = "Aspirasi & Keluhan Pelayanan Publik";
                perincianLabel.innerText = "Deskripsi Pengaduan Pelayanan";
                perincian.placeholder = "Tuliskan keluhan atau pengaduan Anda mengenai kualitas pelayanan kampus kami...";
                document.getElementById('kategori-pengguna-container').classList.remove('hidden');
            }

            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function closeModal() {
            const modal = document.getElementById('form-modal');
            const container = document.getElementById('modal-container');
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Form Submit
        function handleFormSubmit(e) {
            e.preventDefault();
            const btnSubmit = document.getElementById('btn-submit-ppid');
            const originalBtnText = btnSubmit.innerHTML;

            btnSubmit.disabled = true;
            btnSubmit.innerHTML = `<svg class="animate-spin h-4 w-4 text-white inline mr-2" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Mengirim...`;

            const form = document.getElementById('ppid-interactive-form');
            const formData = new FormData(form);

            // Add text values
            formData.append('nama', document.getElementById('nama').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('nik', document.getElementById('nik').value);
            formData.append('telepon', document.getElementById('telepon').value);
            formData.append('alamat', document.getElementById('alamat').value);
            let perincianVal = document.getElementById('perincian').value;
            if (document.getElementById('form-type-field').value === 'penyalahgunaan') {
                perincianVal = document.getElementById('isi_laporan').value;
            }
            formData.append('perincian', perincianVal);

            const fileInput = document.getElementById('file-upload');
            if (fileInput.files.length > 0) {
                formData.append('file_bukti', fileInput.files[0]);
            }

            if (document.getElementById('form-type-field').value === 'permohonan') {
                formData.append('bentuk_informasi', document.getElementById('bentuk_informasi').value);
                formData.append('cara_mendapatkan', document.getElementById('cara_mendapatkan').value);
            }

            fetch("{{ route('permohonan.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => {
                if (!res.ok) {
                    return res.json().then(err => { throw err; });
                }
                return res.json();
            })
            .then(data => {
                if (data.success) {
                    document.getElementById('ticket-number-span').textContent = data.ticket_number;
                    form.classList.add('hidden');
                    document.getElementById('modal-success-state').classList.remove('hidden');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan: ' + data.message,
                        confirmButtonColor: '#007f37'
                    });
                }
            })
            .catch(err => {
                console.error(err);
                if (err.errors) {
                    const messages = Object.values(err.errors).flat().join('\n');
                    Swal.fire({
                        icon: 'warning',
                        title: 'Validasi Gagal',
                        text: messages,
                        confirmButtonColor: '#007f37'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal mengirim pengajuan. Silakan coba beberapa saat lagi.',
                        confirmButtonColor: '#007f37'
                    });
                }
            })
            .finally(() => {
                btnSubmit.disabled = false;
                btnSubmit.innerHTML = originalBtnText;
            });
        }

        // File upload event listener
        const fileUploadInput = document.getElementById('file-upload');
        const fileUploadLabelText = document.getElementById('file-upload-label-text');
        const fileUploadDragText = document.getElementById('file-upload-drag-text');
        const fileUploadSubtext = document.getElementById('file-upload-subtext');

        if (fileUploadInput) {
            fileUploadInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    fileUploadLabelText.innerText = this.files[0].name;
                    fileUploadDragText.classList.add('hidden');
                    fileUploadSubtext.innerText = `Ukuran: ${(this.files[0].size / 1024 / 1024).toFixed(2)} MB - Klik untuk ganti`;
                } else {
                    fileUploadLabelText.innerText = "Pilih file dokumen";
                    fileUploadDragText.classList.remove('hidden');
                    fileUploadSubtext.innerText = "PNG, JPG, PDF hingga 5MB";
                }
            });
        }
    </script>
    <!-- Google Translate Element Container (Hidden) -->
    <div id="google_translate_element" class="hidden animate-none" style="display:none;"></div>

    <!-- Google Translate Initialization Script -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'id,en',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- Language Toggle Action Script -->
    <script type="text/javascript">
        function changeLanguage(langCode) {
            var cookieValue = "/id/" + langCode;
            document.cookie = "googtrans=" + cookieValue + "; path=/";
            document.cookie = "googtrans=" + cookieValue + "; path=/; domain=" + window.location.hostname;
            
            var hostParts = window.location.hostname.split('.');
            if (hostParts.length > 2) {
                var rootDomain = "." + hostParts.slice(-2).join('.');
                document.cookie = "googtrans=" + cookieValue + "; path=/; domain=" + rootDomain;
            }
            
            window.location.reload();
        }

        function toggleLanguage() {
            var cookies = document.cookie.split(';');
            var currentLang = 'id';
            for (var i = 0; i < cookies.length; i++) {
                var c = cookies[i].trim();
                if (c.indexOf('googtrans=') === 0) {
                    var val = c.substring('googtrans='.length, c.length);
                    if (val.includes('/en')) {
                        currentLang = 'en';
                    }
                    break;
                }
            }
            var nextLang = (currentLang === 'id') ? 'en' : 'id';
            changeLanguage(nextLang);
        }

        document.addEventListener("DOMContentLoaded", function() {
            var cookies = document.cookie.split(';');
            var currentLang = 'id';
            for (var i = 0; i < cookies.length; i++) {
                var c = cookies[i].trim();
                if (c.indexOf('googtrans=') === 0) {
                    var val = c.substring('googtrans='.length, c.length);
                    if (val.includes('/en')) {
                        currentLang = 'en';
                    }
                    break;
                }
            }

            var switchBtn = document.getElementById('lang-switch');
            var switchKnob = document.getElementById('lang-switch-knob');
            var switchText = document.getElementById('lang-switch-text');

            var switchBtnMobile = document.getElementById('lang-switch-mobile');
            var switchKnobMobile = document.getElementById('lang-switch-knob-mobile');
            var switchTextMobile = document.getElementById('lang-switch-text-mobile');

            if (currentLang === 'en') {
                if (switchBtn) {
                    switchBtn.classList.remove('bg-brand-green-900', 'border-brand-green-800');
                    switchBtn.classList.add('bg-brand-gold-500', 'border-brand-gold-400');
                }
                if (switchKnob) {
                    switchKnob.classList.remove('translate-x-0');
                    switchKnob.classList.add('translate-x-[32px]');
                }
                if (switchText) {
                    switchText.innerText = 'EN';
                    switchText.classList.remove('right-2', 'text-brand-gold-500');
                    switchText.classList.add('left-2', 'text-brand-green-950');
                }

                if (switchBtnMobile) {
                    switchBtnMobile.classList.remove('bg-slate-100', 'border-slate-200');
                    switchBtnMobile.classList.add('bg-brand-green-900', 'border-brand-green-850');
                }
                if (switchKnobMobile) {
                    switchKnobMobile.classList.remove('translate-x-0');
                    switchKnobMobile.classList.add('translate-x-[32px]');
                }
                if (switchTextMobile) {
                    switchTextMobile.innerText = 'EN';
                    switchTextMobile.classList.remove('right-2', 'text-slate-450');
                    switchTextMobile.classList.add('left-2', 'text-brand-gold-500');
                }
            } else {
                if (switchBtn) {
                    switchBtn.classList.add('bg-brand-green-900', 'border-brand-green-800');
                    switchBtn.classList.remove('bg-brand-gold-500', 'border-brand-gold-400');
                }
                if (switchKnob) {
                    switchKnob.classList.add('translate-x-0');
                    switchKnob.classList.remove('translate-x-[32px]');
                }
                if (switchText) {
                    switchText.innerText = 'ID';
                    switchText.classList.add('right-2', 'text-brand-gold-500');
                    switchText.classList.remove('left-2', 'text-brand-green-950');
                }

                if (switchBtnMobile) {
                    switchBtnMobile.classList.add('bg-slate-100', 'border-slate-200');
                    switchBtnMobile.classList.remove('bg-brand-green-900', 'border-brand-green-850');
                }
                if (switchKnobMobile) {
                    switchKnobMobile.classList.add('translate-x-0');
                    switchKnobMobile.classList.remove('translate-x-[32px]');
                }
                if (switchTextMobile) {
                    switchTextMobile.innerText = 'ID';
                    switchTextMobile.classList.add('right-2', 'text-slate-450');
                    switchTextMobile.classList.remove('left-2', 'text-brand-gold-500');
                }
            }
        });
    </script>

    @yield('scripts')
</body>
</html>
