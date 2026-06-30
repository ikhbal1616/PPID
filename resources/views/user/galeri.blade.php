<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri PPID | Universitas Baiturrahmah</title>
    <!-- Meta SEO -->
    <meta name="description" content="Dokumentasi foto dan galeri kegiatan Pejabat Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah secara transparan dan akuntabel.">
    <meta name="keywords" content="Galeri PPID, Foto PPID, Kegiatan PPID, Universitas Baiturrahmah, Unbrah">
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
                <a href="/#news" class="hover:text-brand-gold-500 transition-colors">Arsip Berita</a>
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
                <a href="/" class="flex items-center space-x-4 group">
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
                    <a href="/" class="hover:text-brand-green-600 transition-colors">Beranda</a>
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

                    <a href="/#news" class="hover:text-brand-green-600 transition-colors">Kilas Berita</a>
                    <a href="/galeri" class="text-brand-green-600 transition-colors relative after:absolute after:bottom-[-6px] after:left-0 after:w-full after:h-[2px] after:bg-brand-green-500">Galeri</a>
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
                    <a href="/" class="block py-2 hover:text-brand-green-600">Beranda</a>
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

                    <a href="/#news" class="block py-2 hover:text-brand-green-600">Kilas Berita</a>
                    <a href="/galeri" class="block py-2 pl-4 text-xs text-brand-green-600 font-bold">Galeri</a>
                    <a href="/dokumen" class="block py-2 hover:text-brand-green-600">Dokumen</a>
                </div>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Galeri PPID <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Dokumentasi visual rangkaian kegiatan, sosialisasi keterbukaan informasi, dan pelayanan publik PPID Universitas Baiturrahmah Padang.
            </p>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section class="py-20 max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12">
        <div class="space-y-12">
            
            <!-- Category Filter Tabs -->
            <div class="flex items-center justify-start md:justify-center space-x-2 overflow-x-auto pb-4 scrollbar-none">
                <button class="filter-btn active px-5 py-2.5 text-xs font-bold rounded-xl bg-brand-green-600 text-white shadow-md transition-all whitespace-nowrap cursor-pointer" data-category="all">Semua Foto</button>
                <button class="filter-btn px-5 py-2.5 text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all whitespace-nowrap cursor-pointer" data-category="sosialisasi">Sosialisasi & Bimtek</button>
                <button class="filter-btn px-5 py-2.5 text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all whitespace-nowrap cursor-pointer" data-category="rapat">Rapat Kerja</button>
                <button class="filter-btn px-5 py-2.5 text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all whitespace-nowrap cursor-pointer" data-category="monev">Monitoring & Evaluasi</button>
                <button class="filter-btn px-5 py-2.5 text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all whitespace-nowrap cursor-pointer" data-category="layanan">Layanan Publik</button>
            </div>

            <!-- Photo Grid -->
            <div id="gallery-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $galeriRaw = setting('galeri_list');
                    $galeriList = [];
                    if ($galeriRaw) {
                        $galeriList = json_decode($galeriRaw, true);
                    }
                    if (empty($galeriList)) {
                        $galeriList = [
                            [
                                "title" => "Sosialisasi E-PPID dan Keterbukaan Informasi",
                                "category" => "sosialisasi",
                                "date" => "2026-07-15",
                                "description" => "Workshop pelaksanaan tata laksana dan bimbingan teknis standar pelayanan publik bagi seluruh dekanat dan pengelola data fakultas.",
                                "image_url" => "/images/slider3.png"
                            ],
                            [
                                "title" => "Rapat Evaluasi Program Kerja Tahunan",
                                "category" => "rapat",
                                "date" => "2026-08-22",
                                "description" => "Pertemuan koordinasi tim pelaksana PPID Universitas Baiturrahmah dalam merancang target kepatuhan informasi publik semester berikutnya.",
                                "image_url" => "/images/slider2.png"
                            ],
                            [
                                "title" => "Visitasi Komisi Informasi Sumatera Barat",
                                "category" => "monev",
                                "date" => "2026-09-10",
                                "description" => "Monitoring dan verifikasi langsung berkas serta ketersediaan dokumen publik di ruang sekretariat PPID Unbrah oleh Komisioner KI Sumbar.",
                                "image_url" => "/images/slider1.png"
                            ],
                            [
                                "title" => "Pelayanan Informasi Terpadu Mahasiswa",
                                "category" => "layanan",
                                "date" => "2026-10-05",
                                "description" => "Petugas PPID melayani permohonan salinan data registrasi akademik mahasiswa secara cepat, santun, dan gratis di loket layanan.",
                                "image_url" => "/images/slider2.png"
                            ],
                            [
                                "title" => "Bimbingan Teknis Kearsipan Digital",
                                "category" => "sosialisasi",
                                "date" => "2026-10-18",
                                "description" => "Bimbingan penginputan data pendukung kinerja institusi bagi tenaga kependidikan demi keselarasan sistem informasi terpadu.",
                                "image_url" => "/images/slider1.png"
                            ],
                            [
                                "title" => "Penerimaan Penghargaan Keterbukaan Informasi",
                                "category" => "monev",
                                "date" => "2026-11-12",
                                "description" => "Penyerahan piagam penghargaan kategori Perguruan Tinggi Swasta Paling Informatif dalam PPID Award tingkat wilayah.",
                                "image_url" => "/images/slider3.png"
                            ]
                        ];
                    }

                    $categoryBadgeMap = [
                        'sosialisasi' => 'Sosialisasi',
                        'rapat' => 'Rapat Kerja',
                        'monev' => 'Monev',
                        'layanan' => 'Layanan Publik'
                    ];

                    if (!function_exists('formatIndoDate')) {
                        function formatIndoDate($dateStr) {
                            if (empty($dateStr)) return '';
                            try {
                                $months = [
                                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
                                    7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                ];
                                $time = strtotime($dateStr);
                                $day = date('d', $time);
                                $month = $months[(int)date('m', $time)];
                                $year = date('Y', $time);
                                return "$day $month $year";
                            } catch (\Exception $e) {
                                return $dateStr;
                            }
                        }
                    }
                @endphp

                @foreach ($galeriList as $item)
                    <div class="gallery-card doc-item group bg-white border border-slate-100 hover:border-slate-200 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 cursor-pointer flex flex-col" data-category="{{ $item['category'] ?? 'sosialisasi' }}">
                        <div class="relative overflow-hidden h-60 bg-slate-100">
                            <img src="{{ $item['image_url'] ?? '/images/slider1.png' }}" 
                                 alt="{{ $item['title'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                <span class="text-white text-xs font-semibold flex items-center space-x-1.5">
                                    <svg class="w-4 h-4 text-brand-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    <span>Perbesar Gambar</span>
                                </span>
                            </div>
                        </div>
                        <div class="p-6 space-y-2 flex-grow flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                    <span>{{ formatIndoDate($item['date'] ?? '') }}</span>
                                    <span class="text-brand-green-700 bg-brand-green-50 px-2 py-0.5 rounded">{{ $categoryBadgeMap[$item['category'] ?? 'sosialisasi'] ?? 'Sosialisasi' }}</span>
                                </div>
                                <h4 class="font-bold text-slate-800 text-base leading-snug group-hover:text-brand-green-700 transition-colors">{{ $item['title'] }}</h4>
                                <p class="text-xs text-slate-500 font-light leading-relaxed text-justify">
                                    {{ $item['description'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- INTERACTIVE LIGHTBOX MODAL -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 bg-black/95 flex flex-col justify-center items-center p-4 hidden">
        <!-- Close Button -->
        <button onclick="closeLightbox()" class="absolute top-6 right-6 w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-full flex items-center justify-center transition-colors focus:outline-none cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        
        <!-- Lightbox Image Wrapper -->
        <div class="max-w-4xl w-full flex flex-col items-center space-y-4">
            <img id="lightbox-img" src="" alt="" class="max-h-[75vh] w-auto object-contain rounded-2xl shadow-2xl border border-white/10 animate-fade-in">
            <!-- Details Container -->
            <div class="text-center max-w-2xl px-4 space-y-2">
                <h3 id="lightbox-title" class="text-xl font-bold font-display text-brand-gold-500"></h3>
                <p id="lightbox-desc" class="text-sm text-slate-300 font-light leading-relaxed"></p>
            </div>
        </div>
    </div>

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
                            <svg class="w-5 h-5 text-slate-400 hover:text-brand-gold-500" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
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

                    <!-- Jenis Pelanggaran Dropdown (Only visible for WBS) -->
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

                    <!-- Upload file dropzone -->
                    <div id="uploader-container" class="space-y-1">
                        <label id="uploader-label" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Unggah Berkas Pendukung (KTP/Bukti Fisik)</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-2xl hover:border-brand-green-400 transition-colors bg-slate-50">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-10 w-10 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-xs text-slate-600 justify-center">
                                    <label for="file_bukti" class="relative cursor-pointer bg-white rounded-md font-semibold text-brand-green-600 hover:text-brand-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-green-500">
                                        <span id="file-bukti-label-text">Pilih file dokumen</span>
                                        <input id="file_bukti" name="file_bukti" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1" id="file-bukti-drag-text">atau seret ke sini</p>
                                </div>
                                <p class="text-[10px] text-slate-400" id="file-bukti-subtext">PNG, JPG, PDF hingga 5MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Consent/Terms & Conditions -->
                    <div id="permohonan-consent" class="flex items-start space-x-3 pt-2">
                        <input type="checkbox" id="consent_checkbox" class="w-4 h-4 text-brand-green-600 border-slate-300 rounded focus:ring-brand-green-500 mt-0.5 cursor-pointer">
                        <label for="consent_checkbox" class="text-[11px] text-slate-500 leading-snug cursor-pointer">Saya menyatakan bahwa data yang saya berikan adalah benar dan bersedia mematuhi syarat & ketentuan yang berlaku serta bersedia dituntut secara hukum bila terbukti memberikan data palsu.</label>
                    </div>

                    <!-- Bentuk Informasi & Cara Mendapatkan Salinan (Only visible for permohonan) -->
                    <div id="permohonan-extra-fields" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label for="bentuk_informasi" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Bentuk Informasi</label>
                            <select id="bentuk_informasi" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Pilih Bentuk Informasi...</option>
                                <option value="Salinan Informasi (Hardcopy / Softcopy)">Salinan Informasi (Hardcopy / Softcopy)</option>
                                <option value="Melihat / Mendengar / Mencatat Sendiri">Melihat / Mendengar / Mencatat Sendiri</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label for="cara_mendapatkan" class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider">Cara Mendapatkan Salinan Informasi</label>
                            <select id="cara_mendapatkan" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Pilih Cara Mendapatkan Salinan Informasi...</option>
                                <option value="Mengambil Langsung di Sekretariat PPID">Mengambil Langsung di Sekretariat PPID</option>
                                <option value="Mengirim Lewat Email (Softcopy)">Mengirim Lewat Email (Softcopy)</option>
                                <option value="Dikirim Melalui Pos / Kurir">Dikirim Melalui Pos / Kurir</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 border-t border-slate-100 flex justify-end">
                        <button type="submit" class="w-full sm:w-auto bg-brand-green-600 hover:bg-brand-green-700 text-white font-semibold text-xs px-6 py-3 rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">
                            Kirim Formulir
                        </button>
                    </div>
                </form>

                <!-- Success state inside modal -->
                <div id="success-state" class="p-12 text-center space-y-6 hidden">
                    <div class="w-20 h-20 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto shadow-inner border border-emerald-100">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-slate-900 font-display">Pengajuan Berhasil Dikirim!</h3>
                        <p class="text-xs text-slate-500 max-w-sm mx-auto leading-relaxed">Terima kasih. Pengajuan Anda telah terdaftar dalam sistem kami. Silakan catat nomor tiket pelayanan Anda di bawah ini:</p>
                        <span class="text-lg font-bold text-brand-green-700 font-display block mt-1" id="ticket-number-span">#PPID-12345</span>
                    </div>
                    <div class="pt-4">
                        <button onclick="closeModal()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold px-6 py-2.5 rounded-full transition-all">Tutup Jendela</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN JAVASCRIPT CONTROLLERS -->
    <script>
        // DOM Elements
        const mainHeader = document.getElementById('main-header');
        const navbarBg = document.getElementById('navbar-bg');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        // Sticky Header scroll styling
        window.addEventListener('scroll', () => {
            if (window.scrollY > 30) {
                mainHeader.classList.add('py-0');
                navbarBg.classList.remove('glass-light');
                navbarBg.classList.add('bg-white/95', 'backdrop-blur-md', 'border-b', 'border-slate-100');
            } else {
                mainHeader.classList.remove('py-0');
                navbarBg.classList.add('glass-light');
                navbarBg.classList.remove('bg-white/95', 'backdrop-blur-md', 'border-b', 'border-slate-100');
            }
        });

        // Mobile Menu Toggle
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Interactive Lightbox Modal Control
        const lightboxModal = document.getElementById('lightbox-modal');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');
        const lightboxDesc = document.getElementById('lightbox-desc');
        const galleryCards = document.querySelectorAll('.gallery-card');

        // Store gallery card details for navigation
        const galleryData = Array.from(galleryCards).map(card => {
            const img = card.querySelector('img');
            return {
                src: img.getAttribute('src'),
                alt: img.getAttribute('alt'),
                title: card.querySelector('h4').innerText,
                desc: card.querySelector('p').innerText,
                category: card.getAttribute('data-category')
            };
        });

        let currentActiveIndex = 0;

        // Open Lightbox
        galleryCards.forEach((card, index) => {
            card.addEventListener('click', () => {
                const data = galleryData[index];
                currentActiveIndex = index;
                showImageInLightbox(data);
            });
        });

        function showImageInLightbox(data) {
            lightboxImg.src = data.src;
            lightboxImg.alt = data.alt;
            lightboxTitle.innerText = data.title;
            lightboxDesc.innerText = data.desc;

            lightboxModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightboxModal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Close on ESC key press
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });

        // Live Document Search & Category Filtering
        const filterBtns = document.querySelectorAll('.filter-btn');
        const docItems = document.querySelectorAll('.doc-item');

        function performFiltering() {
            const activeBtn = document.querySelector('.filter-btn.active');
            const activeCategory = activeBtn ? activeBtn.getAttribute('data-category') : 'all';

            docItems.forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                const matchesCategory = activeCategory === 'all' || itemCategory === activeCategory;

                if (matchesCategory) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        }

        // Add filter button click handlers
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active state class names
                filterBtns.forEach(b => {
                    b.classList.remove('active', 'bg-brand-green-600', 'text-white', 'shadow-md');
                    b.classList.add('bg-slate-100', 'text-slate-600', 'hover:bg-slate-200');
                });
                
                btn.classList.add('active', 'bg-brand-green-600', 'text-white', 'shadow-md');
                btn.classList.remove('bg-slate-100', 'text-slate-600', 'hover:bg-slate-200');
                
                performFiltering();
            });
        });


        // PPID Interactive Modal Logic
        const formModal = document.getElementById('form-modal');
        const modalContainer = document.getElementById('modal-container');
        const interactiveForm = document.getElementById('ppid-interactive-form');
        const successState = document.getElementById('success-state');

        const modalTitle = document.getElementById('modal-title-text');
        const modalSubtitle = document.getElementById('modal-subtitle-text');
        const formTypeField = document.getElementById('form-type-field');

        const penyalahgunaanFields = document.getElementById('penyalahgunaan-extra-fields');
        const permohonanFields = document.getElementById('permohonan-extra-fields');
        const permohonanConsent = document.getElementById('permohonan-consent');
        const uploaderContainer = document.getElementById('uploader-container');
        const perincianLabel = document.getElementById('perincian-label');
        const perincianTextarea = document.getElementById('perincian');
        const namaLabel = document.getElementById('nama-label');
        const namaInput = document.getElementById('nama');
        const kategoriPenggunaContainer = document.getElementById('kategori-pengguna-container');

        // File Uploader Elements
        const fileInput = document.getElementById('file_bukti');
        const fileLabelText = document.getElementById('file-bukti-label-text');
        const fileDragText = document.getElementById('file-bukti-drag-text');
        const fileSubtext = document.getElementById('file-bukti-subtext');

        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                const name = e.target.files[0].name;
                const size = (e.target.files[0].size / 1024 / 1024).toFixed(2);
                fileLabelText.textContent = "Berkas Dipilih:";
                fileDragText.textContent = `${name} (${size} MB)`;
                fileDragText.className = "pl-1 text-brand-green-600 font-bold";
                fileSubtext.textContent = "Klik 'Pilih file dokumen' untuk mengganti";
            }
        });

        function openModal(type) {
            // Reset state
            interactiveForm.classList.remove('hidden');
            successState.classList.add('hidden');
            interactiveForm.reset();
            
            // Reset file upload texts
            fileLabelText.textContent = "Pilih file dokumen";
            fileDragText.textContent = "atau seret ke sini";
            fileDragText.className = "pl-1";
            fileSubtext.textContent = "PNG, JPG, PDF hingga 5MB";

            // Open overlay animations
            formModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                modalContainer.classList.remove('scale-95', 'opacity-0');
                modalContainer.classList.add('scale-100', 'opacity-100');
            }, 50);

            // Configure fields layout depending on form type
            formTypeField.value = type;

            // Default hidden
            penyalahgunaanFields.classList.add('hidden');
            permohonanFields.classList.add('hidden');
            permohonanConsent.classList.add('hidden');
            uploaderContainer.classList.add('hidden');
            kategoriPenggunaContainer.classList.add('hidden');
            
            namaLabel.textContent = "Nama Lengkap";
            namaInput.placeholder = "Masukkan nama lengkap Anda";
            
            if (type === 'permohonan') {
                modalTitle.textContent = "Permohonan Informasi Publik";
                modalSubtitle.textContent = "Layanan PPID Universitas Baiturrahmah";
                permohonanFields.classList.remove('hidden');
                permohonanConsent.classList.remove('hidden');
                uploaderContainer.classList.remove('hidden');
                perincianLabel.textContent = "Rincian Informasi Yang Dibutuhkan";
                perincianTextarea.placeholder = "Jelaskan sedetail mungkin mengenai berkas/dokumen informasi akademik/administrasi yang Anda perlukan...";
            } 
            else if (type === 'keberatan') {
                modalTitle.textContent = "Pengajuan Keberatan Pelayanan";
                modalSubtitle.textContent = "Laporan Penolakan / Keterlambatan Informasi";
                permohonanConsent.classList.remove('hidden');
                uploaderContainer.classList.remove('hidden');
                perincianLabel.textContent = "Alasan Keberatan Layanan";
                perincianTextarea.placeholder = "Tuliskan kronologi dan alasan mengapa Anda mengajukan keberatan (contoh: informasi ditolak, tidak ditanggapi, waktu melebihi batas)...";
            } 
            else if (type === 'penyalahgunaan') {
                modalTitle.textContent = "Penyalahgunaan Wewenang (WBS)";
                modalSubtitle.textContent = "Sistem Pelaporan Pelanggaran Civitas Akademika";
                penyalahgunaanFields.classList.remove('hidden');
                uploaderContainer.classList.remove('hidden');
                namaLabel.textContent = "Nama Pelapor (Bisa Samaran)";
                namaInput.placeholder = "Gunakan nama samaran jika ingin identitas disembunyikan";
                perincianLabel.textContent = "Kronologi & Detail Laporan Kasus";
                perincianTextarea.placeholder = "Uraikan detail kejadian, pelaku, waktu, lokasi, serta kronologi pelanggaran wewenang/korupsi/gratifikasi secara objektif...";
            } 
            else if (type === 'pengaduan') {
                modalTitle.textContent = "Pengaduan Kualitas Layanan";
                modalSubtitle.textContent = "Kritik & Saran Peningkatan Mutu PPID";
                kategoriPenggunaContainer.classList.remove('hidden');
                perincianLabel.textContent = "Detail Keluhan / Masukan Anda";
                perincianTextarea.placeholder = "Tuliskan keluhan, saran perbaikan, atau aspirasi Anda demi peningkatan kualitas pelayanan PPID Universitas Baiturrahmah...";
            }
        }

        function closeModal() {
            modalContainer.classList.remove('scale-100', 'opacity-100');
            modalContainer.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                formModal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 200);
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
                    document.getElementById('ticket-number-span').textContent = data.ticket_number;
                    
                    // Show success state
                    const interactiveFormEl = document.getElementById('ppid-interactive-form');
                    const successStateEl = document.getElementById('success-state');
                    if (interactiveFormEl) interactiveFormEl.classList.add('hidden');
                    if (successStateEl) successStateEl.classList.remove('hidden');
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
    </script>
</body>
</html>
