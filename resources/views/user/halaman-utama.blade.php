<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPID Universitas Baiturrahmah | Keterbukaan Informasi Publik</title>
    <!-- Meta SEO -->
    <meta name="description" content="Portal Resmi Pejabat Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah. Memberikan akses informasi publik secara transparan, akurat, dan akuntabel sesuai UU No. 14 Tahun 2008.">
    <meta name="keywords" content="PPID, Universitas Baiturrahmah, Unbrah, Informasi Publik, Keterbukaan Informasi, Padang, Sumatera Barat">
    <meta name="author" content="Universitas Baiturrahmah">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                <a href="#" class="hover:text-brand-gold-500 transition-colors">Arsip Berita</a>
                <span>|</span>
                <a href="#" class="hover:text-brand-gold-500 transition-colors">Sistem Informasi</a>
                <span>|</span>
                <!-- Language Toggle -->
                <div class="flex items-center space-x-1 bg-brand-green-900/60 rounded px-2 py-0.5 border border-brand-green-800">
                    <span class="text-brand-gold-500 font-semibold cursor-pointer">ID</span>
                    <span class="text-slate-400">/</span>
                    <span class="text-slate-400 hover:text-slate-200 cursor-pointer transition-colors">EN</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR (Glassmorphism & Sticky) -->
    <header id="main-header" class="sticky top-0 z-50 transition-all duration-300 w-full">
        <div id="navbar-bg" class="glass-light shadow-md transition-all duration-300">
            <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 py-3.5 flex justify-between items-center">
                <!-- Branding / Logo -->
                <a href="#" class="flex items-center space-x-4 group">
                    <img src="/images/logo_unbrah.png" 
                         alt="Logo Universitas Baiturrahmah" 
                         class="w-18 h-18 object-contain filter drop-shadow group-hover:scale-105 transition-transform duration-300">
                    <div class="flex flex-col justify-center translate-y-[2px]">
                        <span class="text-[11px] md:text-xs font-bold tracking-wider text-brand-green-700 uppercase leading-tight">Pejabat Pengelola<br>Informasi & Dokumentasi</span>
                        <span class="text-2xl md:text-3xl font-bold tracking-tight text-brand-green-950 font-display group-hover:text-brand-green-600 transition-colors leading-tight -mt-1">PPID UNBRAH</span>
                    </div>
                </a>

                <!-- Navigation Links (Desktop) -->
                <nav class="hidden lg:flex items-center space-x-8 font-semibold text-sm text-brand-green-950">
                    <a href="#" class="text-brand-green-600 relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[2px] after:bg-brand-green-500">Beranda</a>
                    <div class="relative group">
                        <button class="hover:text-brand-green-600 flex items-center space-x-1 cursor-pointer transition-colors py-2">
                            <span>Tentang</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <!-- Dropdown -->
                        <div class="absolute top-full left-0 mt-1 w-56 rounded-xl bg-white shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-2 z-50">
                            <a href="/profil" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Profil PPID</a>
                            <a href="/visi-misi" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Visi & Misi PPID</a>
                            <a href="/struktur-organisasi" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Struktur Organisasi PPID</a>
                            <a href="/tugas-fungsi" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Tugas & Fungsi PPID</a>
                            <a href="/ppid-dalam-angka" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">PPID Dalam Angka</a>
                            <a href="/regulasi" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Regulasi PPID</a>
                            <a href="/maklumat-pelayanan" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Maklumat PPID</a>
                        </div>
                    </div>
                    
                    <div class="relative group">
                        <button class="hover:text-brand-green-600 flex items-center space-x-1 cursor-pointer transition-colors py-2">
                            <span>Informasi Publik</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 mt-1 w-56 rounded-xl bg-white shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-2 z-50">
                            <a href="/informasi-publik-berkala" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Informasi Publik Berkala</a>
                            <a href="/informasi-serta-merta" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Informasi Serta Merta</a>
                            <a href="/informasi-tersedia-setiap-saat" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Informasi Tersedia Setiap Saat</a>
                            <a href="/#info-dikecualikan" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Informasi Dikecualikan</a>
                        </div>
                    </div>

                    <div class="relative group">
                        <button class="hover:text-brand-green-600 flex items-center space-x-1 cursor-pointer transition-colors py-2">
                            <span>Layanan</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 mt-1 w-64 rounded-xl bg-white shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 p-2 z-50">
                            <a href="javascript:void(0)" onclick="openModal('permohonan')" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Permohonan Informasi</a>
                            <a href="javascript:void(0)" onclick="openModal('keberatan')" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Pengajuan Keberatan</a>
                            <a href="javascript:void(0)" onclick="openModal('penyalahgunaan')" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Penyalahgunaan Wewenang</a>
                            <a href="javascript:void(0)" onclick="openModal('pengaduan')" class="block px-4 py-2 text-xs rounded-lg hover:bg-brand-green-50 hover:text-brand-green-700 transition-colors">Pengaduan Layanan</a>
                        </div>
                    </div>

                    <a href="#news" class="hover:text-brand-green-600 transition-colors">Kilas Berita</a>
                    <a href="/galeri" class="hover:text-brand-green-600 transition-colors">Galeri</a>
                    <a href="/dokumen" class="hover:text-brand-green-600 transition-colors">Dokumen</a>
                </nav>

                <!-- Action Button & Mobile Nav Trigger -->
                <div class="flex items-center space-x-4">
                    <!-- Call to Action (Form Cepat) -->
                    <button onclick="openModal('permohonan')" class="hidden md:flex items-center whitespace-nowrap space-x-2 bg-gradient-to-r from-brand-green-600 to-brand-green-700 hover:from-brand-green-700 hover:to-brand-green-800 text-white font-semibold text-sm px-5 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">
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
                    <a href="#" class="block py-2 text-brand-green-600">Beranda</a>
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
                        <a href="/#info-dikecualikan" class="block py-2 pl-4 text-xs hover:text-brand-green-600">Informasi Dikecualikan</a>
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

                    <a href="#news" class="block py-2 hover:text-brand-green-600">Kilas Berita</a>
                    <a href="/galeri" class="block py-2 hover:text-brand-green-600">Galeri</a>
                    <a href="/dokumen" class="block py-2 hover:text-brand-green-600">Dokumen</a>
                </div>
            </div>
        </div>
    </header>

    <!-- HERO AUTO-SLIDER SECTION -->
    <section class="relative w-full h-[550px] md:h-[650px] bg-brand-green-950 overflow-hidden shadow-2xl">
        <!-- Slides Container -->
        <div id="slider" class="relative w-full h-full">
            @php
                $defaultSlides = [
                    [
                        'image' => '/images/slider1.png',
                        'badge' => 'Layanan Publik Informatif',
                        'title_line1' => 'Keterbukaan Informasi',
                        'title_line2' => 'Universitas Baiturrahmah',
                        'description' => 'Memberikan layanan data dan dokumen publik secara akurat, transparan, dan akuntabel sesuai dengan UU No.14 Tahun 2008.',
                        'button1_text' => 'Ajukan Informasi Sekarang',
                        'button1_action' => 'permohonan',
                        'button1_link' => '',
                        'button2_text' => 'Pelajari Selengkapnya',
                        'button2_action' => 'link',
                        'button2_link' => '#about',
                    ],
                    [
                        'image' => '/images/slider2.png',
                        'badge' => 'Layanan Cepat & Akurat',
                        'title_line1' => 'Pengaduan & Keberatan',
                        'title_line2' => 'Layanan Publik',
                        'description' => 'Kami berkomitmen memberikan tanggapan cepat terhadap pengaduan dan keberatan pelayanan informasi demi kepuasan publik.',
                        'button1_text' => 'Ajukan Keberatan',
                        'button1_action' => 'keberatan',
                        'button1_link' => '',
                        'button2_text' => 'Layangkan Pengaduan',
                        'button2_action' => 'pengaduan',
                        'button2_link' => '',
                    ],
                    [
                        'image' => '/images/slider3.png',
                        'badge' => 'Edukasi & Sosialisasi',
                        'title_line1' => 'Sosialisasi Transparansi',
                        'title_line2' => 'Akademik Terbuka',
                        'description' => 'Membangun iklim akademik yang transparan, bebas dari korupsi, nepotisme, dan penyalahgunaan wewenang jabatan.',
                        'button1_text' => 'Lapor Penyalahgunaan Wewenang',
                        'button1_action' => 'penyalahgunaan',
                        'button1_link' => '',
                        'button2_text' => '',
                        'button2_action' => 'none',
                        'button2_link' => '',
                    ]
                ];
                $slidesJson = setting('slides_list');
                $slides = $slidesJson ? json_decode($slidesJson, true) : $defaultSlides;
                if (!is_array($slides) || count($slides) === 0) {
                    $slides = $defaultSlides;
                }
            @endphp

            @foreach ($slides as $index => $slide)
                <div class="slide {{ $index === 0 ? 'active' : '' }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-green-950 via-brand-green-950/40 to-black/30 z-20"></div>
                    <img src="{{ $slide['image'] ?? '/images/slider1.png' }}" alt="{{ $slide['title_line1'] ?? '' }}" class="w-full h-full object-cover slide-bg-zoom">
                    <div class="absolute inset-0 z-30 flex items-center justify-center px-4">
                        <div class="max-w-4xl text-center text-white">
                            @if(!empty($slide['badge']))
                                <span class="inline-block bg-brand-gold-500/20 text-brand-gold-100 border border-brand-gold-500/30 text-[10px] md:text-xs font-bold tracking-widest uppercase px-3 py-1.5 rounded-full mb-4 {{ $index === 0 ? 'animate-pulse' : '' }}">{{ $slide['badge'] }}</span>
                            @endif
                            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight mb-4 drop-shadow">
                                {{ $slide['title_line1'] ?? '' }} <br class="hidden sm:inline">
                                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">{{ $slide['title_line2'] ?? '' }}</span>
                            </h1>
                            @if(!empty($slide['description']))
                                <p class="text-sm md:text-lg text-slate-300 max-w-2xl mx-auto mb-8 leading-relaxed font-light drop-shadow">
                                    {{ $slide['description'] }}
                                </p>
                            @endif
                            <div class="flex flex-col sm:flex-row justify-center items-center space-y-3 sm:space-y-0 sm:space-x-4">
                                @if(!empty($slide['button1_text']))
                                    @if(in_array($slide['button1_action'] ?? 'link', ['permohonan', 'keberatan', 'penyalahgunaan', 'pengaduan']))
                                        <button onclick="openModal('{{ $slide['button1_action'] }}')" class="w-full sm:w-auto bg-brand-gold-500 hover:bg-brand-gold-600 text-brand-green-950 font-bold px-7 py-3.5 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer text-sm">
                                            {{ $slide['button1_text'] }}
                                        </button>
                                    @elseif(($slide['button1_action'] ?? 'link') !== 'none')
                                        <a href="{{ $slide['button1_link'] ?? '#' }}" class="w-full sm:w-auto text-center bg-brand-gold-500 hover:bg-brand-gold-600 text-brand-green-950 font-bold px-7 py-3.5 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 text-sm">
                                            {{ $slide['button1_text'] }}
                                        </a>
                                    @endif
                                @endif

                                @if(!empty($slide['button2_text']))
                                    @if(in_array($slide['button2_action'] ?? 'link', ['permohonan', 'keberatan', 'penyalahgunaan', 'pengaduan']))
                                        <button onclick="openModal('{{ $slide['button2_action'] }}')" class="w-full sm:w-auto text-center border border-white/30 hover:border-white text-white font-semibold px-7 py-3.5 rounded-full hover:bg-white/10 transition-all duration-300 cursor-pointer text-sm">
                                            {{ $slide['button2_text'] }}
                                        </button>
                                    @elseif(($slide['button2_action'] ?? 'link') !== 'none')
                                        <a href="{{ $slide['button2_link'] ?? '#' }}" class="w-full sm:w-auto text-center border border-white/30 hover:border-white text-white font-semibold px-7 py-3.5 rounded-full hover:bg-white/10 transition-all duration-300 text-sm">
                                            {{ $slide['button2_text'] }}
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Slider Indicators -->
        <div class="absolute bottom-6 left-0 right-0 z-40 flex justify-center space-x-3">
            @foreach ($slides as $index => $slide)
                <button class="indicator {{ $index === 0 ? 'w-10 bg-brand-gold-500' : 'w-4 bg-white/40' }} h-1.5 rounded-full transition-all duration-300 cursor-pointer" onclick="goToSlide({{ $index }})"></button>
            @endforeach
        </div>

        <!-- Slider Controls -->
        <button class="absolute top-1/2 left-4 z-40 -translate-y-1/2 w-12 h-12 rounded-full glass-light flex items-center justify-center text-brand-green-950 hover:bg-brand-gold-500 hover:text-brand-green-950 hover:scale-105 transition-all duration-300 cursor-pointer" onclick="prevSlide()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button class="absolute top-1/2 right-4 z-40 -translate-y-1/2 w-12 h-12 rounded-full glass-light flex items-center justify-center text-brand-green-950 hover:bg-brand-gold-500 hover:text-brand-green-950 hover:scale-105 transition-all duration-300 cursor-pointer" onclick="nextSlide()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
        </button>
    </section>

    <!-- CORE PPID QUICK ACTIONS CARD GRID -->
    <section class="relative z-40 -mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div onclick="openModal('permohonan')" class="reveal group relative bg-white hover:bg-gradient-to-br hover:from-brand-green-900 hover:to-brand-green-950 rounded-2xl shadow-xl hover:shadow-2xl border border-slate-100 hover:border-brand-gold-500/50 p-6 flex flex-col justify-between h-72 transform hover:-translate-y-2 transition-all duration-500 cursor-pointer overflow-hidden">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-brand-green-50 rounded-full group-hover:bg-brand-green-800/10 transition-colors duration-500"></div>
                <div>
                    <!-- Icon -->
                    <div class="w-12 h-12 rounded-xl bg-brand-green-100 group-hover:bg-brand-gold-500 flex items-center justify-center text-brand-green-700 group-hover:text-brand-green-950 transition-colors duration-500 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold font-display text-slate-900 group-hover:text-white leading-snug transition-colors duration-500">
                        Permohonan Informasi Publik
                    </h3>
                    <p class="text-slate-500 group-hover:text-slate-300 text-xs mt-3 leading-relaxed transition-colors duration-500">
                        Ajukan permintaan berkas, data akademik, atau kebijakan resmi universitas secara online.
                    </p>
                </div>
                <div class="flex items-center justify-between mt-6 z-10">
                    <span class="text-xs font-bold text-brand-green-600 group-hover:text-brand-gold-500 group-hover:translate-x-1 transition-all duration-300">Buat Permohonan</span>
                    <svg class="w-5 h-5 text-brand-green-600 group-hover:text-brand-gold-500 transform group-hover:translate-x-1.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
            </div>

            <!-- Card 2 -->
            <div onclick="openModal('keberatan')" class="reveal group relative bg-white hover:bg-gradient-to-br hover:from-brand-green-900 hover:to-brand-green-950 rounded-2xl shadow-xl hover:shadow-2xl border border-slate-100 hover:border-brand-gold-500/50 p-6 flex flex-col justify-between h-72 transform hover:-translate-y-2 transition-all duration-500 cursor-pointer overflow-hidden delay-100">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-brand-green-50 rounded-full group-hover:bg-brand-green-800/10 transition-colors duration-500"></div>
                <div>
                    <div class="w-12 h-12 rounded-xl bg-brand-green-100 group-hover:bg-brand-gold-500 flex items-center justify-center text-brand-green-700 group-hover:text-brand-green-950 transition-colors duration-500 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold font-display text-slate-900 group-hover:text-white leading-snug transition-colors duration-500">
                        Keberatan Informasi Publik
                    </h3>
                    <p class="text-slate-500 group-hover:text-slate-300 text-xs mt-3 leading-relaxed transition-colors duration-500">
                        Ajukan keberatan jika permohonan informasi Anda ditolak atau tidak direspon sesuai tenggat.
                    </p>
                </div>
                <div class="flex items-center justify-between mt-6 z-10">
                    <span class="text-xs font-bold text-brand-green-600 group-hover:text-brand-gold-500 group-hover:translate-x-1 transition-all duration-300">Ajukan Keberatan</span>
                    <svg class="w-5 h-5 text-brand-green-600 group-hover:text-brand-gold-500 transform group-hover:translate-x-1.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
            </div>

            <!-- Card 3 -->
            <div onclick="openModal('penyalahgunaan')" class="reveal group relative bg-white hover:bg-gradient-to-br hover:from-brand-green-900 hover:to-brand-green-950 rounded-2xl shadow-xl hover:shadow-2xl border border-slate-100 hover:border-brand-gold-500/50 p-6 flex flex-col justify-between h-72 transform hover:-translate-y-2 transition-all duration-500 cursor-pointer overflow-hidden delay-200">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-brand-green-50 rounded-full group-hover:bg-brand-green-800/10 transition-colors duration-500"></div>
                <div>
                    <div class="w-12 h-12 rounded-xl bg-brand-green-100 group-hover:bg-brand-gold-500 flex items-center justify-center text-brand-green-700 group-hover:text-brand-green-950 transition-colors duration-500 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold font-display text-slate-900 group-hover:text-white leading-snug transition-colors duration-500">
                        Penyalahgunaan Wewenang
                    </h3>
                    <p class="text-slate-500 group-hover:text-slate-300 text-xs mt-3 leading-relaxed transition-colors duration-500">
                        Laporkan tindakan korupsi, kolusi, nepotisme (KKN), atau penyalahgunaan jabatan di lingkungan kampus.
                    </p>
                </div>
                <div class="flex items-center justify-between mt-6 z-10">
                    <span class="text-xs font-bold text-brand-green-600 group-hover:text-brand-gold-500 group-hover:translate-x-1 transition-all duration-300">Laporkan Kasus</span>
                    <svg class="w-5 h-5 text-brand-green-600 group-hover:text-brand-gold-500 transform group-hover:translate-x-1.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
            </div>

            <!-- Card 4 -->
            <div onclick="openModal('pengaduan')" class="reveal group relative bg-white hover:bg-gradient-to-br hover:from-brand-green-900 hover:to-brand-green-950 rounded-2xl shadow-xl hover:shadow-2xl border border-slate-100 hover:border-brand-gold-500/50 p-6 flex flex-col justify-between h-72 transform hover:-translate-y-2 transition-all duration-500 cursor-pointer overflow-hidden delay-300">
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-brand-green-50 rounded-full group-hover:bg-brand-green-800/10 transition-colors duration-500"></div>
                <div>
                    <div class="w-12 h-12 rounded-xl bg-brand-green-100 group-hover:bg-brand-gold-500 flex items-center justify-center text-brand-green-700 group-hover:text-brand-green-950 transition-colors duration-500 mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold font-display text-slate-900 group-hover:text-white leading-snug transition-colors duration-500">
                        Pengaduan Layanan Kampus
                    </h3>
                    <p class="text-slate-500 group-hover:text-slate-300 text-xs mt-3 leading-relaxed transition-colors duration-500">
                        Sampaikan kritik, saran, atau ketidakpuasan Anda terkait layanan sarana dan prasarana Universitas Baiturrahmah.
                    </p>
                </div>
                <div class="flex items-center justify-between mt-6 z-10">
                    <span class="text-xs font-bold text-brand-green-600 group-hover:text-brand-gold-500 group-hover:translate-x-1 transition-all duration-300">Tulis Pengaduan</span>
                    <svg class="w-5 h-5 text-brand-green-600 group-hover:text-brand-gold-500 transform group-hover:translate-x-1.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
            </div>
        </div>
    </section>

    <!-- PROFIL / ABOUT SECTION -->
    <section id="about" class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div class="reveal-left space-y-6">
                <div class="flex items-center space-x-2 text-brand-green-600 font-bold text-xs uppercase tracking-widest">
                    <span class="w-8 h-[2px] bg-brand-green-500 inline-block"></span>
                    <span>Profil PPID Universitas Baiturrahmah</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold font-display tracking-tight text-slate-900 leading-tight">
                    {{ setting('profil_ppid_title', 'Mewujudkan Transparansi Informasi Akademik yang Terpercaya') }}
                </h2>
                <p class="text-slate-600 text-sm md:text-base leading-relaxed whitespace-pre-line text-justify">
                    {{ setting('profil_ppid_description', "Sesuai dengan amanat Undang-Undung Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (KIP), Universitas Baiturrahmah berkomitmen penuh menyediakan wadah bagi publik untuk mengakses informasi secara efisien.\n\nPejabat Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah bertugas mengkoordinasikan pengumpulan, penyimpanan, pendokumentasian, dan penyediaan layanan informasi publik yang dapat diakses oleh masyarakat umum, civitas akademika, maupun instansi terkait secara transparan dan akuntabel.") }}
                </p>
                @php
                    $checkpointsJson = setting('profil_ppid_checkpoints');
                    $checkpoints = $checkpointsJson ? json_decode($checkpointsJson, true) : [
                        ['title' => setting('profil_ppid_check1_title', 'Layanan Online 24/7'), 'desc' => setting('profil_ppid_check1_desc', 'Pengajuan form kapan saja dan di mana saja.')],
                        ['title' => setting('profil_ppid_check2_title', 'Respons Cepat & Terukur'), 'desc' => setting('profil_ppid_check2_desc', 'Pemrosesan maksimal 10 hari kerja.')]
                    ];
                @endphp
                <div class="grid grid-cols-2 gap-4 pt-4">
                    @foreach ($checkpoints as $item)
                    <div class="flex items-start space-x-3">
                        <div class="w-6 h-6 rounded bg-brand-green-100 flex items-center justify-center text-brand-green-600 mt-1 flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-800 text-sm">{{ $item['title'] }}</h4>
                            <p class="text-slate-500 text-[11px] mt-0.5">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- YouTube Video Embed Widget / Image Widget -->
            <div class="reveal-right relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white group">
                <div class="absolute inset-0 bg-brand-green-950/20 group-hover:bg-brand-green-950/10 transition-colors z-10 duration-300"></div>
                <!-- Mock YouTube Video / Image Preview (Using slider image for high visual appeal) -->
                <img src="{{ setting('profil_ppid_video_image', '/images/slider2.png') }}" alt="PPID Video Preview" class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-700">
                <!-- Play Button Action -->
                <div class="absolute inset-0 flex items-center justify-center z-20">
                    <a href="{{ setting('profil_ppid_video_url', 'https://www.youtube.com/embed/jXZVBE2wbs0') }}" target="_blank" class="w-16 h-16 rounded-full bg-brand-gold-500 hover:bg-brand-gold-600 text-brand-green-950 flex items-center justify-center shadow-2xl hover:scale-110 transition-all duration-300 cursor-pointer">
                        <svg class="w-8 h-8 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                    </a>
                </div>
                <div class="absolute bottom-4 left-4 right-4 z-20 bg-brand-green-950/80 backdrop-blur rounded-xl p-3 border border-white/15">
                    <span class="text-brand-gold-500 text-[10px] font-bold tracking-widest uppercase">{{ setting('profil_ppid_video_label', 'Video Profil') }}</span>
                    <h4 class="text-white text-xs font-bold mt-0.5">{{ setting('profil_ppid_video_title', 'Panduan Alur Permohonan Informasi Publik Unbrah') }}</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- AGENDA TIMELINE SECTION -->
    <section class="py-20 bg-brand-green-950 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-4 mb-16">
                <span class="inline-block bg-brand-gold-500/10 text-brand-gold-500 border border-brand-gold-500/20 text-xs font-bold tracking-widest uppercase px-4 py-1.5 rounded-full">Agenda Kegiatan</span>
                <h2 class="text-3xl sm:text-4xl font-bold font-display tracking-tight">
                    {{ setting('agenda_kegiatan_title', 'Timeline & Jadwal Aktivitas PPID') }}
                </h2>
                <p class="text-slate-400 text-sm max-w-xl mx-auto leading-relaxed">
                    {{ setting('agenda_kegiatan_desc', 'Ikuti jadwal pelaksanaan kegiatan, sosialisasi, dan monitoring keterbukaan informasi publik terbaru dari kami.') }}
                </p>
            </div>

            <!-- Horizontal Timeline / Stepper (Responsive) -->
            @php
                $agendaJson = setting('agenda_kegiatan_list');
                $agendas = $agendaJson ? json_decode($agendaJson, true) : [
                    [
                        'date' => '15 Juli 2026',
                        'title' => 'Sosialisasi Keterbukaan Informasi',
                        'desc' => 'Seminar dan workshop keterbukaan dokumen publik bagi seluruh jajaran struktural universitas.',
                        'location' => 'Kampus Unbrah'
                    ],
                    [
                        'date' => '28 Juli 2026',
                        'title' => 'Bimbingan Teknis Pengelola Data',
                        'desc' => 'Pelatihan operasional sistem informasi arsip bagi sekretariat fakultas untuk kecepatan layanan informasi.',
                        'location' => 'Gedung Rektorat'
                    ],
                    [
                        'date' => '12 Agustus 2026',
                        'title' => 'Audit Transparansi Berkala',
                        'desc' => 'Pemeriksaan ketersediaan berkas publik bersama Komisi Informasi Sumatera Barat untuk penilaian kepatuhan.',
                        'location' => 'Ruang VIP Senat'
                    ],
                    [
                        'date' => '25 Agustus 2026',
                        'title' => 'Evaluasi & Laporan PPID Tahunan',
                        'desc' => 'Penyusunan laporan tahunan indeks kepuasan layanan informasi masyarakat di lingkungan Unbrah.',
                        'location' => 'Aula Rektorat'
                    ]
                ];
            @endphp
            <div class="reveal relative py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative z-10">
                    @foreach ($agendas as $index => $event)
                    <!-- Event {{ $index + 1 }} -->
                    <div class="group relative bg-brand-green-900/40 hover:bg-brand-green-900/70 border border-brand-green-800/60 hover:border-brand-gold-500/30 rounded-2xl p-6 transition-all duration-300 flex flex-col justify-between" style="transition-delay: {{ $index * 100 }}ms">
                        <div>
                            <!-- Date Stamp -->
                            <span class="inline-block bg-brand-gold-500 text-brand-green-950 font-bold text-xs px-3 py-1 rounded-full mb-4">{{ $event['date'] }}</span>
                            <h4 class="font-bold text-base text-white group-hover:text-brand-gold-500 transition-colors">{{ $event['title'] }}</h4>
                            <p class="text-slate-400 text-xs mt-2 leading-relaxed text-justify">
                                {{ $event['desc'] }}
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-brand-green-800/50 flex items-center">
                            <span class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">{{ $event['location'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- KILAS BERITA SECTION -->
    <section id="news" class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div class="space-y-4">
                <div class="flex items-center space-x-2 text-brand-green-600 font-bold text-xs uppercase tracking-widest">
                    <span class="w-8 h-[2px] bg-brand-green-500 inline-block"></span>
                    <span>Warta & Kilas Berita</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold font-display tracking-tight text-slate-900 leading-tight">Berita Terkini PPID Universitas Baiturrahmah</h2>
            </div>
            <a href="#" class="mt-4 md:mt-0 flex items-center space-x-2 bg-brand-green-50 hover:bg-brand-green-100 text-brand-green-700 font-bold text-xs px-5 py-2.5 rounded-full transition-all duration-300 border border-brand-green-200">
                <span>Lihat Seluruh Berita</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <!-- 2 Column Layout (Featured & Sidebar) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Column 1: Featured News (Left) -->
            <div class="reveal-left lg:col-span-8 bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group flex flex-col justify-between">
                <div>
                    <!-- Image with hover zoom -->
                    <div class="relative overflow-hidden h-96">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent z-10 opacity-70"></div>
                        <img src="/images/slider1.png" alt="Universitas Baiturrahmah PPID Award" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-600 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-full">Akademik</span>
                    </div>

                    <!-- News details -->
                    <div class="p-8 space-y-4">
                        <div class="flex items-center space-x-4 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>22 Juni 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <a href="#" class="block">
                            <h3 class="text-xl sm:text-2xl font-bold font-display text-slate-900 group-hover:text-brand-green-600 transition-colors leading-tight">
                                Universitas Baiturrahmah Sukses Gelar Forum Sosialisasi E-PPID Untuk Peningkatan Kualitas Layanan Informasi Publik
                            </h3>
                        </a>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed line-clamp-3">
                            Forum sosialisasi ini bertujuan memperkenalkan platform E-PPID terpadu yang memfasilitasi publik dalam melakukan permohonan informasi akademik, kepengurusan data kemahasiswaan, hingga transparansi anggaran secara terstruktur. Rektor Unbrah menegaskan pentingnya keterbukaan demi meraih predikat Perguruan Tinggi Terinformatif tingkat nasional.
                        </p>
                    </div>
                </div>

                <div class="px-8 pb-8 pt-4 flex flex-wrap gap-2 border-t border-slate-50">
                    <a href="#" class="bg-slate-100 hover:bg-brand-green-50 text-slate-600 hover:text-brand-green-700 text-[10px] font-bold px-3 py-1.5 rounded-md transition-colors">#transparansi</a>
                    <a href="#" class="bg-slate-100 hover:bg-brand-green-50 text-slate-600 hover:text-brand-green-700 text-[10px] font-bold px-3 py-1.5 rounded-md transition-colors">#e-ppid</a>
                    <a href="#" class="bg-slate-100 hover:bg-brand-green-50 text-slate-600 hover:text-brand-green-700 text-[10px] font-bold px-3 py-1.5 rounded-md transition-colors">#sumaterabarat</a>
                </div>
            </div>

            <!-- Column 2: News Sidebar (Right) -->
            <div class="reveal-right lg:col-span-4 space-y-6 flex flex-col">
                <h3 class="text-lg font-bold font-display text-slate-900 pb-2 border-b border-slate-200 flex items-center space-x-2">
                    <svg class="w-5 h-5 text-brand-gold-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6.656 2.644a1 1 0 012.22 0l2.4 3a1 1 0 002-2l-2.4-3a3 3 0 00-6.656 0l-2.4 3a1 1 0 102 2l2.4-3z" clip-rule="evenodd"></path></svg>
                    <span>Berita Lainnya</span>
                </h3>
                
                <div class="space-y-6 overflow-y-auto flex-1 max-h-[500px] pr-2">
                    <!-- Sidebar Item 1 -->
                    <div class="group flex space-x-4 items-start pb-4 border-b border-slate-100">
                        <img src="/images/slider2.png" alt="Rektorat Unbrah meeting" class="w-20 h-20 rounded-xl object-cover flex-shrink-0 group-hover:scale-105 transition-transform duration-300">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold text-brand-green-600">18 Juni 2026</span>
                            <a href="#" class="block">
                                <h4 class="font-bold text-xs text-slate-900 group-hover:text-brand-green-600 transition-colors line-clamp-2 leading-snug">
                                    Kolaborasi UNBRAH & Pemkot Padang Mengenai Integrasi Data PPID Terbuka Daerah
                                </h4>
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Item 2 -->
                    <div class="group flex space-x-4 items-start pb-4 border-b border-slate-100">
                        <img src="/images/slider3.png" alt="Information center Unbrah" class="w-20 h-20 rounded-xl object-cover flex-shrink-0 group-hover:scale-105 transition-transform duration-300">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold text-brand-green-600">12 Juni 2026</span>
                            <a href="#" class="block">
                                <h4 class="font-bold text-xs text-slate-900 group-hover:text-brand-green-600 transition-colors line-clamp-2 leading-snug">
                                    Bimtek Standardisasi Pelayanan Informasi Publik Pejabat Daerah Sumatera Barat
                                </h4>
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Item 3 -->
                    <div class="group flex space-x-4 items-start pb-4 border-b border-slate-100">
                        <img src="/images/slider1.png" alt="Library Unbrah digital" class="w-20 h-20 rounded-xl object-cover flex-shrink-0 group-hover:scale-105 transition-transform duration-300">
                        <div class="space-y-1">
                            <span class="text-[10px] font-bold text-brand-green-600">05 Juni 2026</span>
                            <a href="#" class="block">
                                <h4 class="font-bold text-xs text-slate-900 group-hover:text-brand-green-600 transition-colors line-clamp-2 leading-snug">
                                    Universitas Baiturrahmah Rilis Portal Data Publik Resmi Terintegrasi
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATISTIK PPID SECTION -->
    <section class="bg-gradient-to-br from-brand-green-900 to-brand-green-950 text-white py-20 relative overflow-hidden">
        <!-- Floating abstract blobs for visuals -->
        <div class="absolute top-[-100px] left-[-100px] w-96 h-96 bg-brand-gold-500/10 rounded-full blur-[80px]"></div>
        <div class="absolute bottom-[-100px] right-[-100px] w-96 h-96 bg-brand-green-500/20 rounded-full blur-[100px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                <!-- Stat Item 1 -->
                <div class="reveal-scale space-y-2">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-brand-gold-500">
                        <span class="counter" data-target="542">0</span>
                    </div>
                    <p class="text-slate-300 text-xs sm:text-sm font-semibold uppercase tracking-wider">Total Permohonan</p>
                    <p class="text-[10px] text-slate-500">Sejak platform digital diluncurkan</p>
                </div>

                <!-- Stat Item 2 -->
                <div class="reveal-scale space-y-2 delay-100">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-brand-gold-500">
                        <span class="counter" data-target="512">0</span>
                    </div>
                    <p class="text-slate-300 text-xs sm:text-sm font-semibold uppercase tracking-wider">Permohonan Selesai</p>
                    <p class="text-[10px] text-slate-500">Tuntas diproses dalam 10 hari kerja</p>
                </div>

                <!-- Stat Item 3 -->
                <div class="reveal-scale space-y-2 delay-200">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-brand-gold-500">
                        <span class="counter" data-target="30">0</span>
                    </div>
                    <p class="text-slate-300 text-xs sm:text-sm font-semibold uppercase tracking-wider">Permohonan Ditolak</p>
                    <p class="text-[10px] text-slate-500">Informasi yang dikecualikan UU No. 14</p>
                </div>

                <!-- Stat Item 4 -->
                <div class="reveal-scale space-y-2 delay-300">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-brand-gold-500">
                        <span class="counter" data-target="98">0</span><span class="text-brand-gold-500">%</span>
                    </div>
                    <p class="text-slate-300 text-xs sm:text-sm font-semibold uppercase tracking-wider">Indeks Kepuasan</p>
                    <p class="text-[10px] text-slate-500">Hasil survei pemohon informasi publik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->
    <footer class="bg-brand-green-950 text-slate-400 pt-20 border-t border-brand-green-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 pb-16">
                <!-- Column 1: Brand/Logo (Col span 4) -->
                <div class="lg:col-span-4 space-y-6">
                    <a href="#" class="flex items-center space-x-4 group">
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
                            <svg class="w-4 h-4 text-brand-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="font-light">ppid@unbrah.ac.id</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4 text-brand-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span class="font-light">(0751) 4641913</span>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Social Media (Col span 3) -->
                <div class="lg:col-span-3 space-y-6">
                    <h3 class="text-white font-bold text-sm uppercase tracking-wider border-l-2 border-brand-gold-500 pl-3">Ikuti Media Sosial</h3>
                    <p class="text-xs text-slate-400">Dapatkan informasi terkini langsung dari linimasa jejaring sosial kami:</p>
                    
                    <div class="grid grid-cols-2 gap-4 text-xs font-semibold text-slate-300">
                        <a href="https://instagram.com" target="_blank" class="flex items-center space-x-2 hover:text-brand-gold-500 transition-colors">
                            <svg class="w-5 h-5 text-slate-400 hover:text-brand-gold-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"></path></svg>
                            <span>@unbrahpadang</span>
                        </a>

                        <a href="https://facebook.com" target="_blank" class="flex items-center space-x-2 hover:text-brand-gold-500 transition-colors">
                            <svg class="w-5 h-5 text-slate-400 hover:text-brand-gold-500" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg>
                            <span>Unbrah Padang</span>
                        </a>

                        <a href="https://youtube.com" target="_blank" class="flex items-center space-x-2 hover:text-brand-gold-500 transition-colors">
                            <svg class="w-5 h-5 text-slate-400 hover:text-brand-gold-500" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.163a3.003 3.003 0 00-2.11-2.11C19.517 3.545 12 3.545 12 3.545s-7.517 0-9.388.508a3.003 3.003 0 00-2.11 2.11C0 8.033 0 12 0 12s0 3.967.502 5.837a3.003 3.003 0 002.11 2.11c1.871.507 9.388.507 9.388.507s7.517 0 9.388-.507a3.002 3.002 0 002.11-2.11C24 15.967 24 12 24 12s0-3.967-.502-5.837zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"></path></svg>
                            <span>Universitas Baiturrahmah</span>
                        </a>

                        <a href="https://whatsapp.com" target="_blank" class="flex items-center space-x-2 hover:text-brand-gold-500 transition-colors">
                            <svg class="w-5 h-5 text-slate-400 hover:text-brand-gold-500" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.739-1.45L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.859-4.42 9.863-9.864.002-2.634-1.02-5.11-2.881-6.973-1.862-1.863-4.339-2.887-6.985-2.888-5.442 0-9.866 4.42-9.87 9.865-.001 1.748.461 3.454 1.34 4.96l-.995 3.637 3.703-.971zm11.367-7.79c-.295-.148-1.748-.862-2.016-.962-.268-.099-.463-.148-.658.148-.195.297-.759.962-.931 1.16-.172.197-.344.222-.64.074-.295-.148-1.25-.46-2.38-1.467-.88-.785-1.474-1.755-1.647-2.052-.172-.296-.018-.457.13-.604.133-.13.295-.345.443-.518.148-.173.197-.297.296-.494.099-.198.05-.371-.025-.519-.074-.148-.658-1.587-.902-2.18-.237-.57-.48-.493-.66-.502-.17-.008-.364-.01-.559-.01-.195 0-.513.073-.78.37-.268.297-1.023 1.002-1.023 2.446 0 1.444 1.05 2.839 1.197 3.036.147.197 2.068 3.158 5.01 4.428.7.302 1.247.482 1.673.618.704.223 1.345.192 1.852.116.565-.084 1.748-.715 1.992-1.405.244-.69.244-1.282.171-1.406-.074-.123-.269-.197-.565-.346z"></path></svg>
                            <span>Hubungi Admin</span>
                        </a>
                    </div>
                </div>

                <!-- Column 3: Peta Lokasi Kampus (Col span 5) -->
                <div class="lg:col-span-5 space-y-6">
                    <h3 class="text-white font-bold text-sm uppercase tracking-wider border-l-2 border-brand-gold-500 pl-3">Peta Lokasi Kampus</h3>
                    <!-- Google Maps Embed Iframe pointed to Universitas Baiturrahmah -->
                    <div class="rounded-2xl overflow-hidden border border-slate-900 shadow-xl h-44">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1m4!2s0x2fd2b8b9a2a912bb%3A0xad5bd90278783d5a!8m2!3d-0.879796!4d100.395722!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd2b8b9a2a912bb%3A0xad5bd90278783d5a!2sUniversitas%20Baiturrahmah!5e0!3m2!1sid!2sid!4v1719000000000!5m2!1sid!2sid" 
                                class="w-full h-full border-0" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="py-8 border-t border-slate-900 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 space-y-4 sm:space-y-0">
                <span>&copy; 2026 Universitas Baiturrahmah. Hak Cipta Dilindungi Undang-Undang.</span>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-brand-gold-500 transition-colors">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-brand-gold-500 transition-colors">Ketentuan Layanan</a>
                    <a href="#" class="hover:text-brand-gold-500 transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- INTERACTIVE MODAL FORMS -->
    <div id="form-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300" onclick="closeModal()"></div>

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
                <form id="ppid-interactive-form" onsubmit="handleFormSubmit(event)" class="p-6 space-y-4">
                    <!-- Dynamic field input state depending on type -->
                    <input type="hidden" name="type" id="form-type-field">

                    <!-- Jenis Pelanggaran Dropdown (Only visible for penyalahgunaan) -->
                    <div id="penyalahgunaan-extra-fields" class="space-y-1">
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
                            <input type="text" id="nama" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div class="space-y-1">
                            <label for="email" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Alamat Email</label>
                            <input type="email" id="email" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Masukkan email aktif">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="nik" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">NIK / No. Identitas (KTP)</label>
                            <input type="text" id="nik" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="16 digit No. KTP">
                        </div>
                        <div class="space-y-1">
                            <label for="telepon" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">No. WhatsApp</label>
                            <input type="text" id="telepon" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Nomor WA aktif Anda">
                        </div>
                    </div>

                    <!-- Bentuk Informasi & Cara Mendapatkan Salinan (Only visible for permohonan) -->
                    <div id="permohonan-extra-fields" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="bentuk_informasi" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bentuk Informasi</label>
                            <select id="bentuk_informasi" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Pilih Bentuk Informasi...</option>
                                <option value="Dilihat/dibaca/didengarkan/dicatat">Dilihat/dibaca/didengarkan/dicatat</option>
                                <option value="Salinan Informasi (Hardcopy / Softcopy)">Salinan Informasi (Hardcopy / Softcopy)</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label for="cara_mendapatkan" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Cara Mendapatkan Salinan Informasi</label>
                            <select id="cara_mendapatkan" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Pilih Cara Mendapatkan Salinan Informasi...</option>
                                <option value="Mengambil Langsung">Mengambil Langsung</option>
                                <option value="Via Pos / Kurir">Via Pos / Kurir</option>
                                <option value="Email">Email</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label for="alamat" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Alamat Lengkap</label>
                        <textarea id="alamat" rows="2" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none resize-none" placeholder="Tulis alamat rumah lengkap Anda"></textarea>
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
                        <textarea id="perincian" rows="3" required class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none resize-none" placeholder="Detail deskripsi data/layanan yang Anda butuhkan/laporkan"></textarea>
                    </div>

                    <div class="space-y-1">
                        <label id="uploader-label" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Unggah Berkas Pendukung (KTP/Bukti Fisik)</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl bg-slate-50 hover:bg-slate-100 transition-colors">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-xs text-slate-600 justify-center">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md font-bold text-brand-green-600 hover:text-brand-green-700 focus-within:outline-none">
                                        <span id="file-upload-label-text">Pilih file dokumen</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1" id="file-upload-drag-text">atau seret ke sini</p>
                                </div>
                                <p class="text-[10px] text-slate-400" id="file-upload-subtext">PNG, JPG, PDF hingga 5MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- WBS (Whistleblowing System) Extra Fields (Only visible for penyalahgunaan) -->
                    <div id="wbs-extra-fields" class="space-y-4 mt-10 pt-10 border-t-4 border-slate-300 hidden">
                        <div class="space-y-1">
                            <label for="pejabat_terlapor" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pejabat Yang Melakukan Penyalahgunaan</label>
                            <input type="text" id="pejabat_terlapor" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Masukkan nama pejabat/staf terlapor">
                        </div>

                        <div class="space-y-1">
                            <label for="unit_kerja_terlapor" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Unit Kerja Terlapor</label>
                            <select id="unit_kerja_terlapor" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
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
                                    <option value="Profesi Dokter">Profesi Dokter</option>
                                    <option value="Profesi Dokter Gigi">Profesi Dokter Gigi</option>
                                </optgroup>

                                <optgroup label="Lembaga">
                                    <option value="Lembaga Penelitian dan Pengabdian Kepada Masyarakat (LPPM)">Lembaga Penelitian dan Pengabdian Kepada Masyarakat (LPPM)</option>
                                    <option value="Lembaga Pengembangan Pengajaran dan Penjaminan Mutu (LP3M)">Lembaga Pengembangan Pengajaran dan Penjaminan Mutu (LP3M)</option>
                                    <option value="Lembaga Pengembangan Teknologi Informasi dan Komunikasi (LPTIK)">Lembaga Pengembangan Teknologi Informasi dan Komunikasi (LPTIK)</option>
                                </optgroup>

                                <optgroup label="Biro">
                                    <option value="Biro Administrasi Akademik dan Kemahasiswaan (BAAK)">Biro Administrasi Akademik dan Kemahasiswaan (BAAK)</option>
                                    <option value="Biro Administrasi Umum dan Sumber Daya (BAU & SDM)">Biro Administrasi Umum dan Sumber Daya (BAU & SDM)</option>
                                    <option value="Biro Humas dan Kerja Sama">Biro Humas dan Kerja Sama</option>
                                </optgroup>

                                <optgroup label="UPT">
                                    <option value="UPT Laboratorium">UPT Laboratorium</option>
                                    <option value="UPT Perpustakaan">UPT Perpustakaan</option>
                                    <option value="UPT Bahasa">UPT Bahasa</option>
                                    <option value="UPT Agama">UPT Agama</option>
                                    <option value="UPT MKWU">UPT MKWU</option>
                                    <option value="UPT CBT">UPT CBT</option>
                                    <option value="UPT Komputer">UPT Komputer</option>
                                    <option value="UPT KDK-USR">UPT KDK-USR</option>
                                    <option value="UPT Karir Dosen & Tendik">UPT Karir Dosen & Tendik</option>
                                    <option value="UPT MBKM">UPT MBKM</option>
                                    <option value="UPT Layanan Psikologi & Difabel">UPT Layanan Psikologi & Difabel</option>
                                    <option value="UPT P2K2">UPT P2K2</option>
                                    <option value="UPT PPKPT">UPT PPKPT</option>
                                    <option value="UPT PMB">UPT PMB</option>
                                </optgroup>

                                <optgroup label="Lainnya">
                                    <option value="Rektorat">Rektorat</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="space-y-1">
                            <label for="judul_laporan" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Judul Laporan</label>
                            <input type="text" id="judul_laporan" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none" placeholder="Masukkan judul laporan Anda">
                        </div>

                        <div class="space-y-1">
                            <label for="isi_laporan" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Isi Laporan</label>
                            <textarea id="isi_laporan" rows="4" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none resize-none" placeholder="Jelaskan isi laporan secara mendetail..."></textarea>
                        </div>

                        <div class="space-y-1">
                            <label for="file_bukti" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">File Bukti <span class="text-rose-500 font-normal lowercase">(note: file upload/image maksimal 5 mb *)</span></label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl bg-slate-50 hover:bg-slate-100 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-xs text-slate-600 justify-center">
                                        <label for="file_bukti" class="relative cursor-pointer rounded-md font-bold text-brand-green-600 hover:text-brand-green-700 focus-within:outline-none">
                                            <span id="file-bukti-label-text">Pilih file dokumen</span>
                                            <input id="file_bukti" name="file_bukti" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1" id="file-bukti-drag-text">atau seret ke sini</p>
                                    </div>
                                    <p class="text-[10px] text-slate-400" id="file-bukti-subtext">PNG, JPG, PDF hingga 5MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Consent Checkbox (Visible for permohonan, keberatan, and penyalahgunaan) -->
                    <div id="permohonan-consent" class="flex items-start space-x-3 pt-2">
                        <input type="checkbox" id="consent_checkbox" class="w-4 h-4 text-brand-green-600 border-slate-300 rounded focus:ring-brand-green-500 mt-0.5 cursor-pointer">
                        <label for="consent_checkbox" class="text-xs font-semibold text-slate-600 select-none cursor-pointer leading-tight">
                            Data dan informasi yang kami peroleh, kami gunakan sesuai dengan ketentuan perundang-undangan yang berlaku.
                        </label>
                    </div>

                    <!-- Action buttons -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-end space-x-3">
                        <button type="button" onclick="closeModal()" class="px-5 py-2.5 rounded-full border border-slate-200 text-slate-500 hover:bg-slate-100 text-xs font-semibold transition-colors cursor-pointer">Batal</button>
                        <button type="submit" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Kirim Laporan</button>
                    </div>
                </form>
                <div id="modal-success-state" class="hidden p-8 text-center space-y-4">
                    <div class="w-16 h-16 rounded-full bg-brand-green-100 text-brand-green-600 flex items-center justify-center mx-auto">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-xl font-bold font-display text-slate-900">Laporan Berhasil Terkirim!</h4>
                        <p class="text-slate-500 text-xs leading-relaxed max-w-sm mx-auto">
                            Terima kasih. Permohonan Anda telah masuk dalam sistem antrian PPID Universitas Baiturrahmah dengan kode tiket <span class="font-bold text-brand-green-600" id="ticket-number">#UNB-90231</span>. Kami akan menghubungi Anda kembali dalam maksimal 10 hari kerja.
                        </p>
                    </div>
                    <button onclick="closeModal()" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold transition-all duration-300 cursor-pointer">Tutup Dialog</button>
                </div>
            </div>
        </div>
    </div>

    <!-- LOGICAL JAVASCRIPT CONTROLLERS -->
    <script>
        // --- 1. HERO AUTO-SLIDER LOGIC ---
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const indicators = document.querySelectorAll('.indicator');
        let sliderInterval = setInterval(autoSlide, 5000);

        function updateSlider() {
            slides.forEach((slide, i) => {
                if (i === currentSlide) {
                    slide.classList.add('active');
                    indicators[i].classList.add('bg-brand-gold-500', 'w-10');
                    indicators[i].classList.remove('bg-white/40', 'w-4');
                } else {
                    slide.classList.remove('active');
                    indicators[i].classList.remove('bg-brand-gold-500', 'w-10');
                    indicators[i].classList.add('bg-white/40', 'w-4');
                }
            });
        }

        function autoSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlider();
        }

        function nextSlide() {
            clearInterval(sliderInterval);
            currentSlide = (currentSlide + 1) % slides.length;
            updateSlider();
            sliderInterval = setInterval(autoSlide, 5000);
        }

        function prevSlide() {
            clearInterval(sliderInterval);
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            updateSlider();
            sliderInterval = setInterval(autoSlide, 5000);
        }

        function goToSlide(index) {
            clearInterval(sliderInterval);
            currentSlide = index;
            updateSlider();
            sliderInterval = setInterval(autoSlide, 5000);
        }

        // --- 2. HEADER SCROLL EFFECT & MOBILE MENU ---
        const header = document.getElementById('main-header');
        const navbarBg = document.getElementById('navbar-bg');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        window.addEventListener('scroll', () => {
            if (window.scrollY >= 50) {
                navbarBg.classList.add('bg-white/90', 'backdrop-blur-md', 'shadow-lg');
                navbarBg.classList.remove('glass-light', 'shadow-md');
            } else {
                navbarBg.classList.add('glass-light', 'shadow-md');
                navbarBg.classList.remove('bg-white/90', 'backdrop-blur-md', 'shadow-lg');
            }
        });

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when links are clicked
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // --- 3. SCROLL REVEAL ANIMATIONS (IntersectionObserver) ---
        const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
        
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(el => {
            revealObserver.observe(el);
        });

        // --- 4. NUMERIC COUNT-UP COUNTERS ---
        const statCounters = document.querySelectorAll('.counter');
        
        function animateCounter(counterEl) {
            const target = parseInt(counterEl.getAttribute('data-target'));
            const duration = 2000; // 2 seconds animation
            const startTime = performance.now();
            
            function updateCount(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // EaseOutQuad formula
                const easeProgress = progress * (2 - progress);
                
                const currentValue = Math.floor(easeProgress * target);
                counterEl.innerText = currentValue;
                
                if (progress < 1) {
                    requestAnimationFrame(updateCount);
                } else {
                    counterEl.innerText = target;
                }
            }
            requestAnimationFrame(updateCount);
        }

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.counter');
                    counters.forEach(counter => animateCounter(counter));
                    counterObserver.unobserve(entry.target); // Animate only once
                }
            });
        }, {
            threshold: 0.3
        });

        // Observe the parent container section of statistics
        const statsSection = document.querySelector('.bg-gradient-to-br.from-brand-green-900');
        if (statsSection) {
            counterObserver.observe(statsSection);
        }

        // --- 5. MODAL FORM INTERACTIVE LOGIC ---
        const formModal = document.getElementById('form-modal');
        const modalContainer = document.getElementById('modal-container');
        const modalTitleText = document.getElementById('modal-title-text');
        const modalSubtitleText = document.getElementById('modal-subtitle-text');
        const formTypeField = document.getElementById('form-type-field');
        const perincianLabel = document.getElementById('perincian-label');
        const perincianTextarea = document.getElementById('perincian');
        const ppidForm = document.getElementById('ppid-interactive-form');
        const successState = document.getElementById('modal-success-state');
        const ticketSpan = document.getElementById('ticket-number');

        // File Uploader Elements
        const fileUploadInput = document.getElementById('file-upload');
        const fileUploadLabelText = document.getElementById('file-upload-label-text');
        const fileUploadDragText = document.getElementById('file-upload-drag-text');
        const fileUploadSubtext = document.getElementById('file-upload-subtext');

        const fileBuktiInput = document.getElementById('file_bukti');
        const fileBuktiLabelText = document.getElementById('file-bukti-label-text');
        const fileBuktiDragText = document.getElementById('file-bukti-drag-text');
        const fileBuktiSubtext = document.getElementById('file-bukti-subtext');

        function openModal(type) {
            // Reset form states
            ppidForm.classList.remove('hidden');
            successState.classList.add('hidden');
            ppidForm.reset();

            // Reset file upload labels
            if (fileUploadLabelText) fileUploadLabelText.innerText = "Pilih file dokumen";
            if (fileUploadDragText) fileUploadDragText.classList.remove('hidden');
            if (fileUploadSubtext) fileUploadSubtext.innerText = "PNG, JPG, PDF hingga 5MB";

            if (fileBuktiLabelText) fileBuktiLabelText.innerText = "Pilih file dokumen";
            if (fileBuktiDragText) fileBuktiDragText.classList.remove('hidden');
            if (fileBuktiSubtext) fileBuktiSubtext.innerText = "PNG, JPG, PDF hingga 5MB";

            // Set content based on type
            formTypeField.value = type;
            
            const extraFields = document.getElementById('permohonan-extra-fields');
            const bentukInfo = document.getElementById('bentuk_informasi');
            const caraDapat = document.getElementById('cara_mendapatkan');
            const consentContainer = document.getElementById('permohonan-consent');
            const consentCheckbox = document.getElementById('consent_checkbox');
            const namaLabel = document.getElementById('nama-label');
            const namaInput = document.getElementById('nama');
            const penyalahgunaanFields = document.getElementById('penyalahgunaan-extra-fields');
            const jenisPelanggaran = document.getElementById('jenis_pelanggaran');
            const uploaderLabel = document.getElementById('uploader-label');

            const wbsFields = document.getElementById('wbs-extra-fields');
            const pejabatTerlapor = document.getElementById('pejabat_terlapor');
            const unitKerjaTerlapor = document.getElementById('unit_kerja_terlapor');
            const judulLaporan = document.getElementById('judul_laporan');
            const isiLaporan = document.getElementById('isi_laporan');
            const perincianContainer = document.getElementById('perincian-container');
            const kategoriPenggunaContainer = document.getElementById('kategori-pengguna-container');
            const kategoriPenggunaSelect = document.getElementById('kategori_pengguna');

            // Dynamic Name Label & Uploader Label based on form type (penyalahgunaan uses Nama Pelapor and KTP/SIM)
            if (type === 'penyalahgunaan') {
                namaLabel.innerText = "Nama Pelapor";
                namaInput.placeholder = "Masukkan nama pelapor";
                uploaderLabel.innerText = "Unggah Berkas Pendukung (KTP/SIM)";
                
                // Show Jenis Pelanggaran extra fields and make it required
                penyalahgunaanFields.classList.remove('hidden');
                jenisPelanggaran.required = true;

                // Show WBS extra fields and make them required
                wbsFields.classList.remove('hidden');
                pejabatTerlapor.required = true;
                unitKerjaTerlapor.required = true;
                judulLaporan.required = true;
                isiLaporan.required = true;

                // Hide original perincian textarea
                perincianContainer.classList.add('hidden');
                perincianTextarea.required = false;
            } else {
                namaLabel.innerText = "Nama Lengkap";
                namaInput.placeholder = "Masukkan nama lengkap Anda";
                if (type === 'pengaduan') {
                    uploaderLabel.innerText = "Unggah Berkas Pendukung (Bukti Fisik)";
                } else {
                    uploaderLabel.innerText = "Unggah Berkas Pendukung (KTP/Bukti Fisik)";
                }

                // Hide Jenis Pelanggaran extra fields and make it optional
                penyalahgunaanFields.classList.add('hidden');
                jenisPelanggaran.required = false;

                // Hide WBS extra fields and make them optional
                wbsFields.classList.add('hidden');
                pejabatTerlapor.required = false;
                unitKerjaTerlapor.required = false;
                judulLaporan.required = false;
                isiLaporan.required = false;

                // Show original perincian textarea
                perincianContainer.classList.remove('hidden');
                perincianTextarea.required = true;
            }

            if (type === 'permohonan') {
                modalTitleText.innerText = "Form Permohonan Informasi Publik";
                modalSubtitleText.innerText = "Ajuan Informasi Online Unbrah";
                perincianLabel.innerText = "Rincian Informasi yang Dibutuhkan";
                perincianTextarea.placeholder = "Tulis secara detail berkas, data akademik, atau kebijakan yang ingin Anda minta...";
                
                // Show extra fields and make them required
                extraFields.classList.remove('hidden');
                bentukInfo.required = true;
                caraDapat.required = true;
            } else {
                if (type === 'keberatan') {
                    modalTitleText.innerText = "Form Pengajuan Keberatan Informasi";
                    modalSubtitleText.innerText = "Protes Layanan PPID Resmi";
                    perincianLabel.innerText = "Alasan Pengajuan Keberatan";
                    perincianTextarea.placeholder = "Sebutkan alasan mengapa Anda mengajukan keberatan (misal: permohonan ditolak, melebihi batas waktu, dll)...";
                } else if (type === 'penyalahgunaan') {
                    modalTitleText.innerText = "Form Pelaporan Penyalahgunaan Wewenang";
                    modalSubtitleText.innerText = "WBS Kampus (Whistleblowing System)";
                    perincianLabel.innerText = "Deskripsi Dugaan Penyalahgunaan";
                    perincianTextarea.placeholder = "Jelaskan kronologi, pelaku, serta bukti-bukti awal dugaan penyalahgunaan wewenang jabatan...";
                } else if (type === 'pengaduan') {
                    modalTitleText.innerText = "Form Pengaduan Layanan Kampus";
                    modalSubtitleText.innerText = "Kritik & Saran Pembangunan Layanan";
                    perincianLabel.innerText = "Rincian Detail Pengaduan";
                    perincianTextarea.placeholder = "Ceritakan ketidaknyamanan, keluhan sarana, prasarana, atau pelayanan staf yang Anda alami...";
                }
                
                // Hide extra fields and make them optional
                extraFields.classList.add('hidden');
                bentukInfo.required = false;
                caraDapat.required = false;
            }

            // Show/Hide Kategori Pengguna for pengaduan form
            if (type === 'pengaduan') {
                kategoriPenggunaContainer.classList.remove('hidden');
                kategoriPenggunaSelect.required = true;
            } else {
                kategoriPenggunaContainer.classList.add('hidden');
                kategoriPenggunaSelect.required = false;
            }

            // Show/Hide consent checkbox for permohonan, keberatan, and penyalahgunaan
            if (type === 'permohonan' || type === 'keberatan' || type === 'penyalahgunaan') {
                consentContainer.classList.remove('hidden');
                consentCheckbox.required = true;
            } else {
                consentContainer.classList.add('hidden');
                consentCheckbox.required = false;
            }

            // Show modal and scale up
            formModal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden'); // Disable scroll
            setTimeout(() => {
                modalContainer.classList.remove('scale-95', 'opacity-0');
                modalContainer.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function closeModal() {
            modalContainer.classList.remove('scale-100', 'opacity-100');
            modalContainer.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                formModal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden'); // Re-enable scroll
            }, 300);
        }

        function handleFormSubmit(event) {
            event.preventDefault();
            
            const btnSubmit = event.target.querySelector('button[type="submit"]');
            const originalBtnText = btnSubmit.innerHTML;
            btnSubmit.disabled = true;
            btnSubmit.innerHTML = 'Mengirim...';

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            
            const namaEl = document.getElementById('nama');
            const emailEl = document.getElementById('email');
            const nikEl = document.getElementById('nik');
            const teleponEl = document.getElementById('telepon');
            const alamatEl = document.getElementById('alamat');
            const formTypeEl = document.getElementById('form-type-field');
            const perincianEl = document.getElementById('perincian');

            formData.append('nama', namaEl ? namaEl.value : '');
            formData.append('email', emailEl ? emailEl.value : '');
            formData.append('nik', nikEl ? nikEl.value : '');
            formData.append('telepon', teleponEl ? teleponEl.value : '');
            formData.append('alamat', alamatEl ? alamatEl.value : '');
            formData.append('kategori', formTypeEl ? formTypeEl.value : '');

            // Construct perincian based on form type and custom fields if present
            let perincianVal = perincianEl ? perincianEl.value : '';
            const isWbs = formTypeEl && formTypeEl.value === 'penyalahgunaan';
            
            if (isWbs) {
                const judulLaporanEl = document.getElementById('judul_laporan');
                const pejabatTerlaporEl = document.getElementById('pejabat_terlapor');
                const unitKerjaTerlaporEl = document.getElementById('unit_kerja_terlapor');
                const jenisPelanggaranEl = document.getElementById('jenis_pelanggaran');
                const isiLaporanEl = document.getElementById('isi_laporan');
                
                if (judulLaporanEl && pejabatTerlaporEl && unitKerjaTerlaporEl && jenisPelanggaranEl && isiLaporanEl) {
                    perincianVal = `Judul Laporan: ${judulLaporanEl.value}\n` +
                                   `Pejabat Terlapor: ${pejabatTerlaporEl.value}\n` +
                                   `Unit Kerja Terlapor: ${unitKerjaTerlaporEl.value}\n` +
                                   `Jenis Pelanggaran: ${jenisPelanggaranEl.value}\n\n` +
                                   `Isi Laporan:\n${isiLaporanEl.value}`;
                } else if (jenisPelanggaranEl) {
                    perincianVal = `Jenis Pelanggaran: ${jenisPelanggaranEl.value}\n\nLaporan:\n${perincianVal}`;
                }
            } else if (formTypeEl && formTypeEl.value === 'pengaduan') {
                const kategoriPenggunaEl = document.getElementById('kategori_pengguna');
                if (kategoriPenggunaEl && kategoriPenggunaEl.value) {
                    perincianVal = `Kategori Pengguna Pelayanan: ${kategoriPenggunaEl.value}\n\nLaporan:\n${perincianVal}`;
                }
            }

            formData.append('perincian', perincianVal);

            // Permohonan extra fields
            if (formTypeEl && formTypeEl.value === 'permohonan') {
                const bentukInfoEl = document.getElementById('bentuk_informasi');
                const caraDapatEl = document.getElementById('cara_mendapatkan');
                if (bentukInfoEl) formData.append('bentuk_informasi', bentukInfoEl.value);
                if (caraDapatEl) formData.append('cara_mendapatkan', caraDapatEl.value);
            }

            const fileInputEl = document.getElementById('file_bukti');
            if (fileInputEl && fileInputEl.files.length > 0) {
                formData.append('file_bukti', fileInputEl.files[0]);
            }

            fetch('/permohonan', {
                method: 'POST',
                headers: {
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
                    if (typeof ticketSpan !== 'undefined') ticketSpan.textContent = data.ticket_number;
                    else if (document.getElementById('ticket-number-span')) document.getElementById('ticket-number-span').textContent = data.ticket_number;
                    else if (document.getElementById('ticket-number')) document.getElementById('ticket-number').textContent = data.ticket_number;
                    
                    // Show success state
                    if (typeof ppidForm !== 'undefined') ppidForm.classList.add('hidden');
                    else if (document.getElementById('ppid-interactive-form')) document.getElementById('ppid-interactive-form').classList.add('hidden');
                    
                    if (typeof successState !== 'undefined') successState.classList.remove('hidden');
                    else if (document.getElementById('modal-success-state')) document.getElementById('modal-success-state').classList.remove('hidden');
                } else {
                    alert('Terjadi kesalahan: ' + data.message);
                }
            })
            .catch(err => {
                console.error(err);
                if (err.errors) {
                    const messages = Object.values(err.errors).flat().join('\n');
                    alert('Validasi gagal:\n' + messages);
                } else {
                    alert('Gagal mengirim pengajuan. Silakan coba beberapa saat lagi.');
                }
            })
            .finally(() => {
                btnSubmit.disabled = false;
                btnSubmit.innerHTML = originalBtnText;
            });
        }

        // --- 6. FILE UPLOAD EVENT LISTENERS ---
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

        if (fileBuktiInput) {
            fileBuktiInput.addEventListener('change', function() {
                if (this.files && this.files.length > 0) {
                    fileBuktiLabelText.innerText = this.files[0].name;
                    fileBuktiDragText.classList.add('hidden');
                    fileBuktiSubtext.innerText = `Ukuran: ${(this.files[0].size / 1024 / 1024).toFixed(2)} MB - Klik untuk ganti`;
                } else {
                    fileBuktiLabelText.innerText = "Pilih file dokumen";
                    fileBuktiDragText.classList.remove('hidden');
                    fileBuktiSubtext.innerText = "PNG, JPG, PDF hingga 5MB";
                }
            });
        }
    </script>
</body>
</html>