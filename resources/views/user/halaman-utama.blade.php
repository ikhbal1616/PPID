@extends('layouts.frontend')

@section('title', 'PPID Universitas Baiturrahmah')

@section('content')
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
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-brand-green-50 rounded-full group-hover:bg-brand-green-950/10 transition-colors duration-500"></div>
                <div>
                    <!-- Icon -->
                    <div class="w-12 h-12 rounded-xl bg-brand-green-100 group-hover:bg-brand-gold-500 flex items-center justify-center text-brand-green-900 group-hover:text-brand-green-950 transition-colors duration-500 mb-6">
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
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-brand-green-50 rounded-full group-hover:bg-brand-green-950/10 transition-colors duration-500"></div>
                <div>
                    <div class="w-12 h-12 rounded-xl bg-brand-green-100 group-hover:bg-brand-gold-500 flex items-center justify-center text-brand-green-900 group-hover:text-brand-green-950 transition-colors duration-500 mb-6">
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
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-brand-green-50 rounded-full group-hover:bg-brand-green-950/10 transition-colors duration-500"></div>
                <div>
                    <div class="w-12 h-12 rounded-xl bg-brand-green-100 group-hover:bg-brand-gold-500 flex items-center justify-center text-brand-green-900 group-hover:text-brand-green-950 transition-colors duration-500 mb-6">
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
                <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-brand-green-50 rounded-full group-hover:bg-brand-green-950/10 transition-colors duration-500"></div>
                <div>
                    <div class="w-12 h-12 rounded-xl bg-brand-green-100 group-hover:bg-brand-gold-500 flex items-center justify-center text-brand-green-900 group-hover:text-brand-green-950 transition-colors duration-500 mb-6">
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

    <!-- LACAK TIKET / CEK STATUS SECTION -->
    <section class="py-16 bg-slate-50 border-y border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8">
            <div class="space-y-2">
                <span class="text-xs font-bold text-brand-green-900 uppercase tracking-widest bg-brand-green-50 px-3 py-1.5 rounded-full">Lacak Pengajuan Anda</span>
                <h2 class="text-3xl font-bold font-display text-slate-900 tracking-tight">Cek Status Tiket PPID</h2>
                <p class="text-slate-500 text-xs max-w-md mx-auto">Masukkan Nomor Tiket Pengajuan Anda untuk memantau proses verifikasi secara real-time.</p>
            </div>

            <!-- Search Form -->
            <div class="max-w-md mx-auto relative">
                <div class="flex items-center bg-white rounded-2xl shadow-md border border-slate-200 p-1.5 focus-within:ring-2 focus-within:ring-brand-green-600 focus-within:border-transparent transition-all">
                    <span class="pl-3 text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" id="ticket-search-input" class="w-full bg-transparent text-slate-800 text-xs px-3 py-2.5 outline-none font-semibold font-mono" placeholder="Contoh: UNBRAH-PER-12345">
                    <button onclick="performTicketSearch()" class="px-5 py-2.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold text-xs rounded-xl shadow-md cursor-pointer transition-colors shrink-0">Cari Tiket</button>
                </div>
            </div>

            <!-- Results container -->
            <div id="search-results-container" class="hidden text-left max-w-2xl mx-auto bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden transform scale-95 opacity-0 transition-all duration-300">
                <!-- Injected dynamically by JS -->
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
            <div id="video-widget-container" class="reveal-right relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white group h-80 bg-slate-900">
                <div id="video-preview-state" class="absolute inset-0 flex flex-col justify-between">
                    <div class="absolute inset-0 bg-brand-green-950/20 group-hover:bg-brand-green-950/10 transition-colors z-10 duration-300"></div>
                    <img src="{{ setting('profil_ppid_video_image', '/images/slider2.png') }}" alt="PPID Video Preview" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    
                    <!-- Play Button Action -->
                    <div class="absolute inset-0 flex items-center justify-center z-20">
                        <button onclick="playProfileVideo('{{ setting('profil_ppid_video_url', 'https://www.youtube.com/embed/jXZVBE2wbs0') }}')" class="w-16 h-16 rounded-full bg-brand-gold-500 hover:bg-brand-gold-600 text-brand-green-950 flex items-center justify-center shadow-2xl hover:scale-110 transition-all duration-300 cursor-pointer border-none outline-none focus:outline-none">
                            <svg class="w-8 h-8 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                        </button>
                    </div>
                    
                    <div class="absolute bottom-4 left-4 right-4 z-20 bg-brand-green-950/80 backdrop-blur rounded-xl p-3 border border-white/15">
                        <span class="text-brand-gold-500 text-[10px] font-bold tracking-widest uppercase block">{{ setting('profil_ppid_video_label', 'Video Profil') }}</span>
                        <h4 class="text-white text-xs font-bold mt-0.5 block">{{ setting('profil_ppid_video_title', 'Panduan Alur Permohonan Informasi Publik Unbrah') }}</h4>
                    </div>
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
            <a href="#" class="mt-4 md:mt-0 flex items-center space-x-2 bg-brand-green-50 hover:bg-brand-green-100 text-brand-green-900 font-bold text-xs px-5 py-2.5 rounded-full transition-all duration-300 border border-brand-green-200">
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
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-full">Akademik</span>
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
                    <a href="#" class="bg-slate-100 hover:bg-brand-green-50 text-slate-600 hover:text-brand-green-900 text-[10px] font-bold px-3 py-1.5 rounded-md transition-colors">#transparansi</a>
                    <a href="#" class="bg-slate-100 hover:bg-brand-green-50 text-slate-600 hover:text-brand-green-900 text-[10px] font-bold px-3 py-1.5 rounded-md transition-colors">#e-ppid</a>
                    <a href="#" class="bg-slate-100 hover:bg-brand-green-50 text-slate-600 hover:text-brand-green-900 text-[10px] font-bold px-3 py-1.5 rounded-md transition-colors">#sumaterabarat</a>
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
@endsection

@section('scripts')
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

        // --- 5. TICKET SEARCH LOGIC ---
        function performTicketSearch() {
            const inputVal = document.getElementById('ticket-search-input').value.trim();
            const container = document.getElementById('search-results-container');

            if (!inputVal) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Input Kosong',
                    text: 'Silakan masukkan nomor tiket pengajuan Anda terlebih dahulu.'
                });
                return;
            }

            // Fetch from backend
            fetch(`/cek-tiket?id=${encodeURIComponent(inputVal)}`)
                .then(res => {
                    if (!res.ok) {
                        return res.json().then(err => { throw new Error(err.message || 'Tiket tidak ditemukan'); });
                    }
                    return res.json();
                })
                .then(resData => {
                    const report = resData.data;
                    
                    // Render status badges and layouts
                    let badgeClass = '';
                    if (report.status === 'Pending') badgeClass = 'bg-amber-100 text-amber-700';
                    else if (report.status === 'Ditinjau') badgeClass = 'bg-blue-100 text-blue-700';
                    else if (report.status === 'Selesai') badgeClass = 'bg-emerald-100 text-emerald-700';
                    else if (report.status === 'Ditolak') badgeClass = 'bg-rose-100 text-rose-700';

                    let categoryName = report.kategori;
                    if (report.kategori === 'penyalahgunaan') categoryName = 'Penyalahgunaan Wewenang';
                    else if (report.kategori === 'permohonan') categoryName = 'Permohonan Informasi';
                    else if (report.kategori === 'keberatan') categoryName = 'Keberatan Informasi';
                    else if (report.kategori === 'pengaduan') categoryName = 'Pengaduan Layanan';

                    let responseHtml = '';
                    if (report.tanggapan) {
                        let fileLinkHtml = '';
                        if (report.file_tanggapan) {
                            fileLinkHtml = `
                                <div class="mt-2.5 pt-2 border-t border-emerald-200/50">
                                    <a href="${report.file_tanggapan}" target="_blank" class="inline-flex items-center space-x-1 font-bold text-[11px] text-emerald-700 hover:underline">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                        <span>Unduh Berkas Lampiran Jawaban Resmi</span>
                                    </a>
                                </div>
                            `;
                        }

                        responseHtml = `
                            <div class="mt-4 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 border-l-4 border-l-emerald-600">
                                <h4 class="text-xs font-bold text-emerald-800 uppercase tracking-wider mb-1">Tanggapan Petugas PPID:</h4>
                                <p class="text-xs text-slate-800 leading-relaxed italic">"${report.tanggapan}"</p>
                                ${fileLinkHtml}
                            </div>
                        `;
                    } else {
                        responseHtml = `
                            <div class="mt-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 border-l-4 border-l-slate-400">
                                <h4 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Tanggapan Resmi:</h4>
                                <p class="text-xs text-slate-400 leading-relaxed italic">Belum ada tanggapan resmi dari petugas.</p>
                            </div>
                        `;
                    }

                    container.innerHTML = `
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-brand-green-900 to-brand-green-950 px-6 py-4 flex justify-between items-center text-white">
                            <div>
                                <h3 class="text-sm font-bold font-display">Hasil Lacak Tiket #${report.id}</h3>
                                <p class="text-[9px] text-brand-gold-500 tracking-wider uppercase font-semibold mt-0.5">${categoryName}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-[9px] font-bold ${badgeClass}">
                                ${report.status === 'Ditinjau' ? 'Sedang Ditinjau' : report.status}
                            </span>
                        </div>

                        <!-- Body Grid -->
                        <div class="p-6 space-y-4 text-xs leading-relaxed text-slate-600">
                            <!-- Identitas Pemohon -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="space-y-1">
                                    <span class="text-slate-400 font-bold uppercase text-[9px] tracking-wider block">Nama Pengaju (Disamarkan)</span>
                                    <span class="font-bold text-slate-800 text-sm block">${report.nama}</span>
                                </div>
                                <div class="space-y-1">
                                    <span class="text-slate-400 font-bold uppercase text-[9px] tracking-wider block">NIK / No. KTP (Disamarkan)</span>
                                    <span class="font-semibold text-slate-800 block font-mono">${report.nik}</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-1.5 border-t border-slate-100">
                                <div class="space-y-1">
                                    <span class="text-slate-400 font-bold uppercase text-[9px] tracking-wider block">Alamat Email</span>
                                    <span class="font-semibold text-slate-800 block font-mono">${report.email}</span>
                                </div>
                                <div class="space-y-1">
                                    <span class="text-slate-400 font-bold uppercase text-[9px] tracking-wider block">No. WhatsApp</span>
                                    <span class="font-semibold text-slate-800 block font-mono">${report.telepon}</span>
                                </div>
                            </div>

                            <!-- Perincian -->
                            <div class="pt-3 border-t border-slate-100 space-y-1">
                                <span class="text-slate-400 font-bold uppercase text-[9px] tracking-wider block">Subjek Laporan</span>
                                <span class="font-bold text-slate-800 block">${report.subjek}</span>
                                <p class="text-slate-500 mt-1 leading-relaxed text-justify bg-slate-50 p-3.5 rounded-xl border border-slate-150">${report.perincian}</p>
                            </div>

                            <!-- Tanggapan Resmi -->
                            ${responseHtml}
                        </div>
                    `;

                    // Trigger animations
                    container.classList.remove('hidden');
                    void container.offsetWidth;
                    container.classList.remove('scale-95', 'opacity-0');
                    container.classList.add('scale-100', 'opacity-100');
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Tiket Tidak Ditemukan',
                        text: err.message || 'Terjadi kesalahan saat melacak nomor tiket pengajuan Anda.'
                    });
                    container.classList.add('hidden');
                });
        }

        // --- 6. INLINE VIDEO PLAYER ---
        function playProfileVideo(url) {
            const container = document.getElementById('video-widget-container');
            
            // Parse YouTube URL to find Video ID
            let embedUrl = url;
            let videoId = '';
            
            try {
                if (url.includes('youtube.com/watch')) {
                    const urlParams = new URLSearchParams(new URL(url).search);
                    videoId = urlParams.get('v');
                } else if (url.includes('youtu.be/')) {
                    videoId = url.split('youtu.be/')[1].split('?')[0];
                } else if (url.includes('youtube.com/embed/')) {
                    videoId = url.split('youtube.com/embed/')[1].split('?')[0];
                }
            } catch (e) {
                console.error("Error parsing YouTube URL:", e);
            }
            
            if (videoId) {
                embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            }
            
            // Swap container content with autoplay iframe
            container.innerHTML = `
                <iframe src="${embedUrl}" class="w-full h-full border-none rounded-3xl" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            `;
        }
</script>
@endsection
