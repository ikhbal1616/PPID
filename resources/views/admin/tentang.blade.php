<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Tentang | Admin PPID Universitas Baiturrahmah</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta SEO -->
    <meta name="description" content="Kelola konten halaman menu Tentang secara dinamis dan modern.">
    <meta name="author" content="Universitas Baiturrahmah">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased overflow-x-hidden">

    <!-- ADMIN LAYOUT WRAPPER -->
    <div class="flex min-h-screen">

        <!-- SIDEBAR (Desktop & Mobile) -->
        <aside id="admin-sidebar" class="w-64 bg-brand-green-950 text-slate-300 flex-shrink-0 flex flex-col justify-between transition-all duration-300 z-30 fixed top-0 bottom-0 left-0 -translate-x-full lg:translate-x-0 h-screen shadow-2xl">
            <div>
                <!-- Sidebar Logo Header -->
                <div class="p-6 border-b border-brand-green-900 flex items-center justify-between">
                    <a href="/" class="flex items-center space-x-3 group">
                        <img src="/images/logo_unbrah.png" 
                             alt="Logo Universitas Baiturrahmah" 
                             class="w-10 h-10 object-contain brightness-95">
                        <div class="flex flex-col">
                            <span class="text-sm font-bold tracking-tight text-white font-display">PPID Admin</span>
                            <span class="text-[9px] text-brand-gold-500 uppercase tracking-widest font-semibold">Unbrah Padang</span>
                        </div>
                    </a>
                    <!-- Close button for mobile -->
                    <button onclick="toggleSidebar()" class="p-1.5 rounded-lg hover:bg-brand-green-900 text-slate-400 hover:text-white cursor-pointer lg:hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Navigation items -->
                <nav class="p-4 space-y-1.5 text-xs font-semibold">
                    <span class="block px-3 py-2 text-[10px] text-brand-green-600 uppercase tracking-widest font-bold">Menu Utama</span>
                    
                    <a href="/admin" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span>Dashboard Utama</span>
                    </a>

                    <!-- Slide Show -->
                    <a href="/admin/slide-show" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Slide Show</span>
                    </a>

                    <!-- Profil PPID -->
                    <a href="/admin/profil-ppid" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>Profil PPID</span>
                    </a>

                    <!-- Agenda Kegiatan -->
                    <a href="/admin/agenda-kegiatan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Agenda Kegiatan</span>
                    </a>

                    <span class="block px-3 py-2 text-[10px] text-brand-green-600 uppercase tracking-widest font-bold pt-4">Permohonan</span>

                    <a href="/admin/permohonan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Permohonan Informasi Publik</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-permohonan">{{ $sidebarCounts['permohonan'] }}</span>
                    </a>

                    <a href="/admin/keberatan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span class="flex-1">Keberatan Informasi Publik</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-keberatan">{{ $sidebarCounts['keberatan'] }}</span>
                    </a>

                    <a href="/admin/penyalahgunaan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                        <span class="flex-1">Penyalahgunaan Wewenang</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-penyalahgunaan">{{ $sidebarCounts['penyalahgunaan'] }}</span>
                    </a>

                    <a href="/admin/pengaduan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span class="flex-1">Pengaduan Layanan Kampus</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-pengaduan">{{ $sidebarCounts['pengaduan'] }}</span>
                    </a>

                    <span class="block px-3 py-2 text-[10px] text-brand-green-600 uppercase tracking-widest font-bold pt-4">Dokumen Profil</span>

                    <!-- Fitur Baru: Kelola Tentang (Active Style) -->
                    <a href="/admin/tentang" class="flex items-center space-x-3 bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500 px-3 py-3 rounded-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="flex-1">Kelola Tentang</span>
                    </a>

                    <!-- Fitur Baru: Informasi Publik Berkala -->
                    <a href="/admin/informasi-publik-berkala" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Publik Berkala</span>
                    </a>

                    <!-- Fitur Baru: Informasi Serta Merta -->
                    <a href="/admin/informasi-serta-merta" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Serta Merta</span>
                    </a>

                    <!-- Fitur Baru: Informasi Tersedia Setiap Saat -->
                    <a href="/admin/informasi-tersedia-setiap-saat" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Tersedia Setiap Saat</span>
                    </a>

                    <!-- Fitur Baru: Kelola Galeri PPID -->
                    <a href="/admin/galeri" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="flex-1">Kelola Galeri PPID</span>
                    </a>

                    <!-- Fitur Baru: Kelola Dokumen -->
                    <a href="/admin/dokumen" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                        <span class="flex-1">Kelola Dokumen</span>
                    </a>

                </nav>
            </div>

            <!-- Profile Info Footer in Sidebar -->
            <div class="p-4 border-t border-brand-green-900 flex items-center space-x-3">
                <div class="relative">
                    <span class="absolute bottom-0 right-0 w-2.5 h-2.5 rounded-full bg-emerald-500 border border-brand-green-950 animate-pulse"></span>
                    <div class="w-9 h-9 rounded-full bg-brand-gold-500/20 text-brand-gold-500 flex items-center justify-center font-bold text-xs uppercase">
                        {{ $adminUser->initials }}
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-xs font-bold text-white leading-tight">{{ $adminUser->name }}</span>
                    <span class="text-[9px] text-slate-500">Super Administrator</span>
                </div>
            </div>
        </aside>

        <!-- MAIN WINDOW WRAPPER -->
        <div class="flex-1 flex flex-col min-h-screen pl-0 lg:pl-64 transition-all duration-300 overflow-y-auto">

            <!-- MAIN HEADER -->
            <header class="bg-white border-b border-slate-200 py-3 px-6 flex justify-between items-center shadow-sm">
                <div class="flex items-center space-x-4">
                    <!-- Mobile Hamburger trigger -->
                    <button onclick="toggleSidebar()" class="p-2 rounded-lg hover:bg-slate-100 text-slate-600 focus:outline-none cursor-pointer lg:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    </button>
                    <!-- Title for current view -->
                    <h2 class="text-slate-800 font-bold text-sm font-display tracking-tight">Halaman Administrasi</h2>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-xs text-slate-500 font-semibold hidden md:inline-block" id="live-date">Jumat, 26 Juni 2026</span>
                    <!-- Profile avatar -->
                    <div class="w-8 h-8 rounded-full bg-brand-green-700 text-white flex items-center justify-center font-bold text-xs uppercase cursor-pointer">
                        {{ $adminUser->initials }}
                    </div>
                </div>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="p-6 space-y-6">

                <!-- HEADER SUMMARY -->
                <div>
                    <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Konten Profil PPID</h1>
                    <p class="text-slate-500 text-xs mt-1">Perbarui narasi Tentang PPID, Visi & Misi, Struktur Organisasi, dan landasan regulasi.</p>
                </div>

                <!-- Alert Messages -->
                @if (session('success'))
                <div class="flex items-center p-4 mb-4 text-emerald-800 border-l-4 border-emerald-500 bg-emerald-50 rounded-xl shadow-sm transition-all" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-xs font-semibold">
                        {{ session('success') }}
                    </div>
                </div>
                @endif

                <!-- MODERN TAB NAVIGATION (Following Reference UI Style) -->
                <div class="border-b border-slate-200 overflow-x-auto">
                    <nav class="flex space-x-8 text-xs font-bold font-display uppercase tracking-wider pb-1 min-w-[700px]">
                        <button onclick="switchTab('profil')" id="tab-btn-profil" class="tab-link border-b-2 py-3 px-1 transition-all outline-none cursor-pointer border-brand-green-700 text-brand-green-700">
                            Profil PPID
                        </button>
                        <button onclick="switchTab('visimisi')" id="tab-btn-visimisi" class="tab-link border-b-2 py-3 px-1 transition-all outline-none cursor-pointer border-transparent text-slate-400 hover:text-slate-600">
                            Visi & Misi
                        </button>
                        <button onclick="switchTab('struktur')" id="tab-btn-struktur" class="tab-link border-b-2 py-3 px-1 transition-all outline-none cursor-pointer border-transparent text-slate-400 hover:text-slate-600">
                            Struktur Organisasi
                        </button>
                        <button onclick="switchTab('tugas')" id="tab-btn-tugas" class="tab-link border-b-2 py-3 px-1 transition-all outline-none cursor-pointer border-transparent text-slate-400 hover:text-slate-600">
                            Tugas & Fungsi
                        </button>
                        <button onclick="switchTab('angka')" id="tab-btn-angka" class="tab-link border-b-2 py-3 px-1 transition-all outline-none cursor-pointer border-transparent text-slate-400 hover:text-slate-600">
                            PPID Dalam Angka
                        </button>
                        <button onclick="switchTab('regulasi')" id="tab-btn-regulasi" class="tab-link border-b-2 py-3 px-1 transition-all outline-none cursor-pointer border-transparent text-slate-400 hover:text-slate-600">
                            Regulasi
                        </button>
                        <button onclick="switchTab('maklumat')" id="tab-btn-maklumat" class="tab-link border-b-2 py-3 px-1 transition-all outline-none cursor-pointer border-transparent text-slate-400 hover:text-slate-600">
                            Maklumat
                        </button>
                    </nav>
                </div>

                <!-- TAB PANELS CONTENT CONTAINER -->
                <div class="space-y-6">

                    <!-- PANEL 1: PROFIL PPID -->
                    <div id="panel-profil" class="tab-panel block">
                        <form action="{{ route('admin.tentang.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                            @csrf
                            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">Bagian "Tentang PPID" (Beranda Profil)</h3>
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Judul Utama</label>
                                    <input type="text" name="profil_judul" value="{{ setting('profil_judul', 'Mendukung Keterbukaan Informasi Publik di Lingkungan Kampus') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Deskripsi Profil / Narasi</label>
                                    <textarea name="profil_deskripsi" rows="8" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-y" required>{{ setting('profil_deskripsi', "Lahir dari amanat Undang-Undang No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik (UU KIP), Pejabat Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah berkomitmen penuh dalam mengedepankan transparansi tata kelola kampus.\n\nMelalui pembentukan wadah ini, masyarakat umum, mahasiswa, dosen, serta pemangku kepentingan dapat dengan mudah mengakses informasi resmi institusi secara legal, profesional, dan akuntabel. Kami senantiasa berbenah mengintegrasikan teknologi digital guna melayani kebutuhan dokumen publik dengan waktu tanggap yang optimal.") }}</textarea>
                                </div>
                            </div>
                            
                            <div class="pt-4 border-t border-slate-100 flex justify-end">
                                <button type="submit" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- PANEL 2: VISI & MISI -->
                    <div id="panel-visimisi" class="tab-panel hidden">
                        <form action="{{ route('admin.tentang.update') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                            @csrf
                            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">Visi & Misi Strategis PPID</h3>
                            
                            <div class="grid grid-cols-1 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Teks Visi Utama</label>
                                    <textarea name="visi_text" rows="3" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-none" required>{{ setting('visi_text', 'Mewujudkan Pelayanan Informasi Publik Universitas Baiturrahmah yang Cepat, Transparan, Akuntabel dan Kredibel.') }}</textarea>
                                </div>
                                
                                <div class="border-t border-slate-100 pt-4 space-y-4">
                                    <h4 class="font-bold text-slate-700 text-xs uppercase tracking-wider">Butir-Butir Misi PPID</h4>
                                    
                                    <div class="space-y-3">
                                        <div class="flex items-center space-x-3">
                                            <span class="w-8 h-8 rounded-lg bg-brand-green-50 text-brand-green-700 flex items-center justify-center font-bold text-xs shrink-0">01</span>
                                            <input type="text" name="misi_1" value="{{ setting('misi_1', 'Meningkatkan pengelolaan dokumentasi dan sistem pelayanan informasi publik yang terintegrasi secara digital.') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <span class="w-8 h-8 rounded-lg bg-brand-green-50 text-brand-green-700 flex items-center justify-center font-bold text-xs shrink-0">02</span>
                                            <input type="text" name="misi_2" value="{{ setting('misi_2', 'Menyediakan akses informasi publik yang mudah, murah, tepat, akurat, dan tidak menyesatkan bagi pemohon.') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <span class="w-8 h-8 rounded-lg bg-brand-green-50 text-brand-green-700 flex items-center justify-center font-bold text-xs shrink-0">03</span>
                                            <input type="text" name="misi_3" value="{{ setting('misi_3', 'Mengembangkan kompetensi petugas pengelola informasi publik demi kualitas pelayanan yang prima dan ramah.') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <span class="w-8 h-8 rounded-lg bg-brand-green-50 text-brand-green-700 flex items-center justify-center font-bold text-xs shrink-0">04</span>
                                            <input type="text" name="misi_4" value="{{ setting('misi_4', 'Mewujudkan keterbukaan informasi di lingkungan kampus secara profesional, kredibel, dan bertanggung jawab sesuai konstitusi.') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <span class="w-8 h-8 rounded-lg bg-brand-green-50 text-brand-green-700 flex items-center justify-center font-bold text-xs shrink-0">05</span>
                                            <input type="text" name="misi_5" value="{{ setting('misi_5', 'Menyelaraskan regulasi internal kampus dengan undang-undang keterbukaan informasi publik secara berkelanjutan.') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pt-4 border-t border-slate-100 flex justify-end">
                                <button type="submit" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- PANEL 3: STRUKTUR ORGANISASI -->
                    <div id="panel-struktur" class="tab-panel hidden">
                        <form action="{{ route('admin.tentang.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                            @csrf
                            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">Struktur Organisasi & Lembaga PPID</h3>
                            
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                
                                <!-- LEFT COLUMN: LIST MANAGER (Sesuai Referensi Gambar 2) -->
                                <div class="space-y-4">
                                    <div class="flex justify-between items-center">
                                        <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Lembaga / Unit Kerja</h4>
                                    </div>
                                    
                                    <!-- Add New Item Row (UI Kekinian) -->
                                    <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/60 flex flex-col gap-3">
                                        <h5 class="text-[10px] font-bold text-slate-500 uppercase tracking-wider" id="struktur-form-title">Tambah Lembaga / Unit Kerja</h5>
                                        <div class="flex flex-col sm:flex-row gap-3">
                                            <div class="w-full sm:w-1/3">
                                                <input type="text" id="new-item-badge" placeholder="Singkatan (LPM)" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none uppercase font-bold tracking-wider">
                                            </div>
                                            <div class="flex-1">
                                                <input type="text" id="new-item-name" placeholder="Nama Lembaga / Unit Kerja..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none">
                                            </div>
                                        </div>
                                        <div class="flex justify-end space-x-2">
                                            <button type="button" id="cancel-struktur-edit-btn" onclick="cancelStrukturEdit()" class="hidden px-4 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all cursor-pointer transform active:scale-95">
                                                Batal
                                            </button>
                                            <button type="button" id="add-struktur-btn" onclick="addStrukturItem()" class="px-4 py-2.5 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all shrink-0 flex items-center justify-center space-x-1.5 cursor-pointer transform active:scale-95 shadow-md">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                                <span id="add-struktur-btn-text">Tambah</span>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Items List Container -->
                                    <div class="border border-slate-200/60 rounded-2xl divide-y divide-slate-100 max-h-[350px] overflow-y-auto bg-slate-50/50 p-2.5 space-y-2.5 shadow-inner" id="struktur-list-container">
                                        <!-- Dynamic items injected here via JS -->
                                    </div>
                                    
                                    <!-- Hidden input to store JSON stringified value -->
                                    <input type="hidden" name="struktur_list" id="struktur_list_input">
                                </div>
                                
                                <!-- RIGHT COLUMN: IMAGE UPLOADER -->
                                <div class="space-y-4">
                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Bagan Struktur (Gambar)</h4>
                                    <div class="border-2 border-slate-200 border-dashed rounded-3xl p-6 text-center bg-slate-50 hover:bg-slate-100 transition-colors relative flex flex-col items-center justify-center min-h-[300px]">
                                        <img src="{{ setting('struktur_image', '/images/logo_unbrah.png') }}" class="max-h-64 object-contain mb-4 rounded-xl shadow-sm border border-slate-100" id="prev-struktur_image">
                                        <label class="px-4 py-2 bg-white border border-slate-200 hover:bg-brand-green-50 text-slate-700 rounded-full text-xs font-bold cursor-pointer transition-colors shadow-sm">
                                            Pilih Gambar Bagan
                                            <input type="file" name="struktur_image" onchange="previewImage(this, 'prev-struktur_image')" class="hidden">
                                        </label>
                                        <span class="text-[10px] text-slate-400 mt-2 block font-medium">Format didukung: PNG, JPG, JPEG.</span>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="pt-4 border-t border-slate-100 flex justify-end">
                                <button type="submit" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- PANEL 4: TUGAS & FUNGSI -->
                    <div id="panel-tugas" class="tab-panel hidden">
                        <form action="{{ route('admin.tentang.update') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                            @csrf
                            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">Tugas & Fungsi PPID</h3>
                            
                            <div class="space-y-6">
                                <!-- Form Input Baru (UI Kekinian) -->
                                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/60 space-y-4">
                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider" id="tugas-form-title">Form Tambah Tugas & Fungsi</h4>
                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul Tugas & Fungsi</label>
                                            <input type="text" id="new-tugas-title" placeholder="Masukkan judul tugas & fungsi..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Deskripsi Tugas & Fungsi</label>
                                            <textarea id="new-tugas-desc" rows="3" placeholder="Masukkan rincian deskripsi tugas & fungsi..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none resize-none"></textarea>
                                        </div>
                                    </div>
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" id="cancel-tugas-edit-btn" onclick="cancelTugasEdit()" class="hidden px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all cursor-pointer transform active:scale-95">
                                            Batal
                                        </button>
                                        <button type="button" id="add-tugas-btn" onclick="addTugasItem()" class="px-5 py-2.5 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all flex items-center space-x-1.5 cursor-pointer transform active:scale-95 shadow-md">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                            <span id="add-tugas-btn-text">Tambah Tugas & Fungsi</span>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Container List Tugas & Fungsi -->
                                <div class="space-y-3">
                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Tugas & Fungsi</h4>
                                    <div class="border border-slate-200/60 rounded-2xl max-h-[400px] overflow-y-auto bg-slate-50/50 p-4 space-y-3 shadow-inner" id="tugas-list-container">
                                        <!-- Dynamic items injected here via JS -->
                                    </div>
                                </div>
                                
                                <!-- Hidden input to store JSON stringified value -->
                                <input type="hidden" name="tugas_list" id="tugas_list_input">
                            </div>
                            
                            <div class="pt-4 border-t border-slate-100 flex justify-end">
                                <button type="submit" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- PANEL 5: PPID DALAM ANGKA -->
                    <div id="panel-angka" class="tab-panel hidden">
                        <form action="{{ route('admin.tentang.update') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                            @csrf
                            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">Dashboard Kinerja & Statistik PPID</h3>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                <!-- Metrik 1 -->
                                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/60 space-y-2">
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Total Permohonan</label>
                                    <input type="text" name="angka_total_permohonan" value="{{ setting('angka_total_permohonan', '342') }}" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none font-bold" required>
                                </div>
                                <!-- Metrik 2 -->
                                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/60 space-y-2">
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Selesai Ditindaklanjuti</label>
                                    <input type="text" name="angka_selesai_tindaklanjut" value="{{ setting('angka_selesai_tindaklanjut', '328') }}" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none font-bold" required>
                                </div>
                                <!-- Metrik 3 -->
                                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/60 space-y-2">
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Ditolak / Dikecualikan</label>
                                    <input type="text" name="angka_ditolak_dikecualikan" value="{{ setting('angka_ditolak_dikecualikan', '14') }}" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none font-bold" required>
                                </div>
                                <!-- Metrik 4 -->
                                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/60 space-y-2">
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Rata-rata Waktu Proses</label>
                                    <input type="text" name="angka_rata_waktu_proses" value="{{ setting('angka_rata_waktu_proses', '4.8 Hari') }}" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none font-bold" required>
                                </div>
                            </div>
                            
                            <div class="pt-4 border-t border-slate-100 flex justify-end">
                                <button type="submit" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- PANEL 6: REGULASI -->
                    <div id="panel-regulasi" class="tab-panel hidden">
                        <form action="{{ route('admin.tentang.update') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                            @csrf
                            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">Daftar Regulasi & Landasan Hukum</h3>
                            
                            <div class="space-y-6">
                                <!-- Form Input Baru (UI Kekinian) -->
                                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/60 space-y-4">
                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider" id="regulasi-form-title">Form Tambah Regulasi</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Jenis Dokumen (Badge)</label>
                                            <input type="text" id="new-regulasi-type" placeholder="Contoh: Undang-Undang, Peraturan Pemerintah..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul Dokumen</label>
                                            <input type="text" id="new-regulasi-title" placeholder="Contoh: Undang-Undang No. 14 Tahun 2008..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none">
                                        </div>
                                        <div class="space-y-2 md:col-span-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Deskripsi Singkat</label>
                                            <textarea id="new-regulasi-desc" rows="3" placeholder="Masukkan rincian deskripsi singkat regulasi..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none resize-none"></textarea>
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Link Baca Selengkapnya (Opsional)</label>
                                            <input type="text" id="new-regulasi-link" placeholder="Contoh: https://id.wikipedia.org/wiki/..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Dokumen Lampiran (PDF)</label>
                                            <div class="flex items-center space-x-3">
                                                <label class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-brand-green-50 text-slate-700 rounded-xl text-xs font-bold cursor-pointer transition-colors shadow-sm inline-block">
                                                    Pilih PDF
                                                    <input type="file" id="new-regulasi-file" class="hidden" accept=".pdf" onchange="uploadRegulasiFile(this)">
                                                </label>
                                                <span class="text-[10px] text-slate-400 font-medium" id="regulasi-upload-status">Belum ada file diunggah.</span>
                                            </div>
                                            <!-- Hidden input to store uploaded file path temporarily -->
                                            <input type="hidden" id="new-regulasi-file-path">
                                        </div>
                                    </div>
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" id="cancel-regulasi-edit-btn" onclick="cancelRegulasiEdit()" class="hidden px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all cursor-pointer transform active:scale-95">
                                            Batal
                                        </button>
                                        <button type="button" id="add-regulasi-btn" onclick="addRegulasiItem()" class="px-5 py-2.5 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all flex items-center space-x-1.5 cursor-pointer transform active:scale-95 shadow-md">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                            <span id="add-regulasi-btn-text">Tambah Regulasi</span>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Container List Regulasi -->
                                <div class="space-y-3">
                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Regulasi & Landasan Hukum</h4>
                                    <div class="border border-slate-200/60 rounded-2xl max-h-[500px] overflow-y-auto bg-slate-50/50 p-4 space-y-3 shadow-inner" id="regulasi-list-container">
                                        <!-- Dynamic items injected here via JS -->
                                    </div>
                                </div>
                                
                                <!-- Hidden input to store JSON stringified value -->
                                <input type="hidden" name="regulasi_list" id="regulasi_list_input">
                            </div>
                            
                            <div class="pt-4 border-t border-slate-100 flex justify-end">
                                <button type="submit" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                    <!-- PANEL 7: MAKLUMAT -->
                    <div id="panel-maklumat" class="tab-panel hidden">
                        <form action="{{ route('admin.tentang.update') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                            @csrf
                            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">Teks Maklumat Pelayanan PPID</h3>
                            
                            <div class="space-y-2">
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Isi Komitmen Maklumat</label>
                                <textarea name="maklumat_text" rows="5" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-none font-medium italic" required>{{ setting('maklumat_text', '"Kami pengelola PPID Universitas Baiturrahmah dengan ini menyatakan sanggup menyelenggarakan pelayanan informasi publik secara profesional, transparan, cepat, tepat waktu, dan akuntabel sesuai dengan ketentuan perundang-undangan demi mewujudkan kepuasan publik."') }}</textarea>
                            </div>

                            <div class="border-t border-slate-100 pt-6 space-y-6">
                                <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">4 Pilar Komitmen PPID</h3>

                                <!-- Form Input Baru (UI Kekinian) -->
                                <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/60 space-y-4">
                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider" id="pillars-form-title">Form Tambah/Edit Pilar Komitmen</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul Pilar</label>
                                            <input type="text" id="new-pillar-title" placeholder="Masukkan judul pilar..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Ikon Pilar</label>
                                            <select id="new-pillar-icon" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none">
                                                <option value="eye">Mata / Transparansi</option>
                                                <option value="clock">Jam / Kecepatan</option>
                                                <option value="scale">Timbangan / Keadilan</option>
                                                <option value="check">Bebas Biaya / Checkmark</option>
                                            </select>
                                        </div>
                                        <div class="space-y-2 md:col-span-2">
                                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Deskripsi Pilar</label>
                                            <textarea id="new-pillar-desc" rows="3" placeholder="Masukkan rincian deskripsi pilar..." class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3.5 py-2.5 rounded-xl transition-all outline-none resize-none"></textarea>
                                        </div>
                                    </div>
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" id="cancel-pillars-edit-btn" onclick="cancelPillarsEdit()" class="hidden px-5 py-2.5 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl text-xs font-bold transition-all cursor-pointer transform active:scale-95">
                                            Batal
                                        </button>
                                        <button type="button" id="add-pillars-btn" onclick="addPillarsItem()" class="px-5 py-2.5 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all flex items-center space-x-1.5 cursor-pointer transform active:scale-95 shadow-md">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                            <span id="add-pillars-btn-text">Tambah Pilar</span>
                                        </button>
                                    </div>
                                </div>

                                <!-- Container List Pillars -->
                                <div class="space-y-3">
                                    <h4 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Pilar Komitmen</h4>
                                    <div class="border border-slate-200/60 rounded-2xl max-h-[400px] overflow-y-auto bg-slate-50/50 p-4 space-y-3 shadow-inner" id="pillars-list-container">
                                        <!-- Dynamic items injected here via JS -->
                                    </div>
                                </div>

                                <!-- Hidden input to store JSON stringified value -->
                                <input type="hidden" name="pillars_list" id="pillars_list_input">
                            </div>
                            
                            <div class="pt-4 border-t border-slate-100 flex justify-end">
                                <button type="submit" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        // Toggle Sidebar visibility (Mobile responsive)
        function toggleSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // Switching Tabs client-side
        function switchTab(tabId) {
            // Hide all tab panels
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.remove('block');
                panel.classList.add('hidden');
            });
            
            // Show active panel
            const activePanel = document.getElementById('panel-' + tabId);
            if (activePanel) {
                activePanel.classList.remove('hidden');
                activePanel.classList.add('block');
            }

            // Reset tab styles
            document.querySelectorAll('.tab-link').forEach(link => {
                link.classList.remove('border-brand-green-700', 'text-brand-green-700');
                link.classList.add('border-transparent', 'text-slate-400', 'hover:text-slate-600');
            });

            // Set active tab style
            const activeBtn = document.getElementById('tab-btn-' + tabId);
            if (activeBtn) {
                activeBtn.classList.remove('border-transparent', 'text-slate-400', 'hover:text-slate-600');
                activeBtn.classList.add('border-brand-green-700', 'text-brand-green-700');
            }

            // Store active tab in localStorage for page refresh persistence
            localStorage.setItem('active_profil_tab', tabId);
        }

        // Dynamic Struktur Organisasi List Manager
        const defaultStruktur = [
            {"badge": "LPM", "name": "Lembaga Penjaminan Mutu"},
            {"badge": "LPPM", "name": "Lembaga Penelitian & Pengabdian Masyarakat"},
            {"badge": "UPTB", "name": "Unit Pelaksana Teknis Perpustakaan"},
            {"badge": "UPTK", "name": "Unit Pelaksana Teknis Komputer"},
            {"badge": "BAA", "name": "Biro Administrasi Akademik"},
            {"badge": "BKK", "name": "Biro Kemahasiswaan & Kerjasama"}
        ];

        let strukturItems = [];

        try {
            const raw = {!! json_encode(setting('struktur_list')) !!};
            if (raw) {
                strukturItems = JSON.parse(raw);
            } else {
                strukturItems = defaultStruktur;
            }
        } catch(e) {
            strukturItems = defaultStruktur;
        }

        let editingStrukturIndex = null;

        function renderStrukturList() {
            const container = document.getElementById('struktur-list-container');
            const input = document.getElementById('struktur_list_input');
            if (!container || !input) return;

            input.value = JSON.stringify(strukturItems);
            container.innerHTML = '';

            if (strukturItems.length === 0) {
                container.innerHTML = `<div class="p-6 text-center text-xs text-slate-400 font-medium">Belum ada lembaga/unit kerja yang ditambahkan.</div>`;
                return;
            }

            strukturItems.forEach((item, index) => {
                const itemEl = document.createElement('div');
                itemEl.className = "flex items-center justify-between p-2.5 bg-white hover:bg-slate-100 rounded-xl transition-all duration-200 border border-slate-100 shadow-sm";
                itemEl.innerHTML = `
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        <span class="bg-brand-green-50 text-brand-green-700 font-bold px-2.5 py-1.5 rounded-lg text-[10px] uppercase tracking-wider min-w-[70px] text-center shrink-0 border border-brand-green-100">
                            ${escapeHtml(item.badge)}
                        </span>
                        <span class="text-xs font-semibold text-slate-700 truncate">
                            ${escapeHtml(item.name)}
                        </span>
                    </div>
                    <div class="flex items-center space-x-1 shrink-0">
                        <button type="button" onclick="editStrukturItem(${index})" class="p-1.5 rounded-lg text-brand-green-600 hover:bg-brand-green-50 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <button type="button" onclick="deleteStrukturItem(${index})" class="p-1.5 rounded-lg text-rose-500 hover:bg-rose-50 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                `;
                container.appendChild(itemEl);
            });
        }

        function addStrukturItem() {
            const badgeInput = document.getElementById('new-item-badge');
            const nameInput = document.getElementById('new-item-name');
            if (!badgeInput || !nameInput) return;

            const badge = badgeInput.value.trim().toUpperCase();
            const name = nameInput.value.trim();

            if (!badge || !name) {
                alert('Singkatan dan Nama Lembaga harus diisi.');
                return;
            }

            if (editingStrukturIndex !== null) {
                strukturItems[editingStrukturIndex] = { badge, name };
                cancelStrukturEdit();
            } else {
                strukturItems.push({ badge, name });
            }

            badgeInput.value = '';
            nameInput.value = '';

            renderStrukturList();
        }

        function editStrukturItem(index) {
            const item = strukturItems[index];
            if (!item) return;

            editingStrukturIndex = index;
            
            document.getElementById('new-item-badge').value = item.badge;
            document.getElementById('new-item-name').value = item.name;
            
            document.getElementById('struktur-form-title').innerText = "Edit Lembaga / Unit Kerja";
            document.getElementById('add-struktur-btn-text').innerText = "Simpan";
            document.getElementById('cancel-struktur-edit-btn').classList.remove('hidden');

            document.getElementById('new-item-badge').focus();
        }

        function cancelStrukturEdit() {
            editingStrukturIndex = null;
            document.getElementById('new-item-badge').value = '';
            document.getElementById('new-item-name').value = '';
            document.getElementById('struktur-form-title').innerText = "Tambah Lembaga / Unit Kerja";
            document.getElementById('add-struktur-btn-text').innerText = "Tambah";
            document.getElementById('cancel-struktur-edit-btn').classList.add('hidden');
        }

        function deleteStrukturItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus lembaga ini?')) {
                if (editingStrukturIndex === index) {
                    cancelStrukturEdit();
                }
                strukturItems.splice(index, 1);
                renderStrukturList();
            }
        }

        // Dynamic Tugas & Fungsi List Manager
        const defaultTugas = [
            {
                "title": "Pengumpulan & Klasifikasi Informasi",
                "desc": "Tugas utama ini mencakup penyusunan Daftar Informasi Publik (DIP) secara rutin dan teratur dari seluruh unit kerja/fakultas di lingkungan Universitas Baiturrahmah."
            },
            {
                "title": "Penyediaan & Pelayanan Informasi Publik",
                "desc": "Mengelola pusat layanan data baik secara daring (online form pada portal web) maupun luring (meja layanan PPID di gedung rektorat)."
            },
            {
                "title": "Pengujian Konsekuensi Informasi Dikecualikan",
                "desc": "Melakukan analisis hukum yang mendalam sebelum menolak permohonan informasi tertentu."
            },
            {
                "title": "Mediasi & Penyelesaian Sengketa Informasi",
                "desc": "Menangani dan memberikan tanggapan atas keberatan tertulis yang dilayangkan oleh pemohon informasi."
            }
        ];

        let tugasItems = [];
        let editingTugasIndex = null;

        try {
            const rawTugas = {!! json_encode(setting('tugas_list')) !!};
            if (rawTugas) {
                tugasItems = JSON.parse(rawTugas);
            } else {
                tugasItems = defaultTugas;
            }
        } catch(e) {
            tugasItems = defaultTugas;
        }

        function renderTugasList() {
            const container = document.getElementById('tugas-list-container');
            const input = document.getElementById('tugas_list_input');
            if (!container || !input) return;

            input.value = JSON.stringify(tugasItems);
            container.innerHTML = '';

            if (tugasItems.length === 0) {
                container.innerHTML = `<div class="p-6 text-center text-xs text-slate-400 font-medium">Belum ada tugas & fungsi yang ditambahkan.</div>`;
                return;
            }

            tugasItems.forEach((item, index) => {
                const itemEl = document.createElement('div');
                itemEl.className = "flex items-start justify-between p-4 bg-white hover:bg-slate-100 rounded-xl transition-all duration-200 border border-slate-100 shadow-sm gap-4";
                
                const indexStr = String(index + 1).padStart(2, '0');

                itemEl.innerHTML = `
                    <div class="flex items-start space-x-3 flex-1 min-w-0">
                        <span class="w-7 h-7 bg-brand-green-50 text-brand-green-700 rounded-lg flex items-center justify-center font-bold text-xs shrink-0 border border-brand-green-100">
                            ${indexStr}
                        </span>
                        <div class="flex flex-col min-w-0">
                            <span class="text-xs font-bold text-slate-800">
                                ${escapeHtml(item.title)}
                            </span>
                            <span class="text-[11px] text-slate-500 mt-1 whitespace-pre-line leading-relaxed">
                                ${escapeHtml(item.desc)}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-1 shrink-0 mt-0.5">
                        <button type="button" onclick="editTugasItem(${index})" class="p-1.5 rounded-lg text-brand-green-600 hover:bg-brand-green-50 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <button type="button" onclick="deleteTugasItem(${index})" class="p-1.5 rounded-lg text-rose-500 hover:bg-rose-50 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                `;
                container.appendChild(itemEl);
            });
        }

        function addTugasItem() {
            const titleInput = document.getElementById('new-tugas-title');
            const descInput = document.getElementById('new-tugas-desc');
            if (!titleInput || !descInput) return;

            const title = titleInput.value.trim();
            const desc = descInput.value.trim();

            if (!title || !desc) {
                alert('Judul dan Deskripsi Tugas harus diisi.');
                return;
            }

            if (editingTugasIndex !== null) {
                tugasItems[editingTugasIndex] = { title, desc };
                cancelTugasEdit();
            } else {
                tugasItems.push({ title, desc });
            }

            titleInput.value = '';
            descInput.value = '';

            renderTugasList();
        }

        function editTugasItem(index) {
            const item = tugasItems[index];
            if (!item) return;

            editingTugasIndex = index;
            
            document.getElementById('new-tugas-title').value = item.title;
            document.getElementById('new-tugas-desc').value = item.desc;
            
            document.getElementById('tugas-form-title').innerText = "Form Edit Tugas & Fungsi";
            document.getElementById('add-tugas-btn-text').innerText = "Simpan Tugas & Fungsi";
            document.getElementById('cancel-tugas-edit-btn').classList.remove('hidden');

            document.getElementById('new-tugas-title').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            document.getElementById('new-tugas-title').focus();
        }

        function cancelTugasEdit() {
            editingTugasIndex = null;
            document.getElementById('new-tugas-title').value = '';
            document.getElementById('new-tugas-desc').value = '';
            document.getElementById('tugas-form-title').innerText = "Form Tambah Tugas & Fungsi";
            document.getElementById('add-tugas-btn-text').innerText = "Tambah Tugas & Fungsi";
            document.getElementById('cancel-tugas-edit-btn').classList.add('hidden');
        }

        function deleteTugasItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus tugas ini?')) {
                if (editingTugasIndex === index) {
                    cancelTugasEdit();
                }
                tugasItems.splice(index, 1);
                renderTugasList();
            }
        }

        // Dynamic Regulasi & Landasan Hukum List Manager
        const defaultRegulasi = [
            {
                "type": {!! json_encode(setting('regulasi_1_type', 'Undang-Undang')) !!},
                "title": {!! json_encode(setting('regulasi_1_title', 'Undang-Undang No. 14 Tahun 2008')) !!},
                "desc": {!! json_encode(setting('regulasi_1_desc', 'Tentang Keterbukaan Informasi Publik (UU KIP). Regulasi utama tingkat nasional yang memberikan jaminan hukum atas hak masyarakat dalam memperoleh informasi publik.')) !!},
                "link": "https://id.wikipedia.org/wiki/Undang-Undang_Keterbukaan_Informasi_Publik",
                "file": {!! json_encode(setting('regulasi_1_file')) !!}
            },
            {
                "type": {!! json_encode(setting('regulasi_2_type', 'Peraturan Pemerintah')) !!},
                "title": {!! json_encode(setting('regulasi_2_title', 'Peraturan Pemerintah No. 61 Tahun 2010')) !!},
                "desc": {!! json_encode(setting('regulasi_2_desc', 'Tentang Pelaksanaan Undang-Undang Keterbukaan Informasi Publik. Mengatur secara detil hak, tata cara pengajuan, penunjukan Pejabat Pengelola Informasi.')) !!},
                "link": "",
                "file": {!! json_encode(setting('regulasi_2_file')) !!}
            },
            {
                "type": {!! json_encode(setting('regulasi_3_type', 'Peraturan Komisi Informasi')) !!},
                "title": {!! json_encode(setting('regulasi_3_title', 'PERKI No. 1 Tahun 2021')) !!},
                "desc": {!! json_encode(setting('regulasi_3_desc', 'Tentang Standar Layanan Informasi Publik (SLIP). Berisi petunjuk teknis operasional dan standardisasi bagi badan publik dalam mengumumkan layanan data.')) !!},
                "link": "",
                "file": {!! json_encode(setting('regulasi_3_file')) !!}
            }
        ];

        let regulasiItems = [];
        let editingRegulasiIndex = null;

        try {
            const rawRegulasi = {!! json_encode(setting('regulasi_list')) !!};
            if (rawRegulasi) {
                regulasiItems = JSON.parse(rawRegulasi);
            } else {
                regulasiItems = defaultRegulasi;
            }
        } catch(e) {
            regulasiItems = defaultRegulasi;
        }

        function uploadRegulasiFile(input) {
            const statusEl = document.getElementById('regulasi-upload-status');
            const pathEl = document.getElementById('new-regulasi-file-path');
            if (!input.files || input.files.length === 0) return;

            const file = input.files[0];
            if (file.type !== 'application/pdf') {
                alert('Hanya diperbolehkan mengunggah file PDF.');
                input.value = '';
                return;
            }

            statusEl.innerText = "Mengunggah...";
            statusEl.className = "text-[10px] text-brand-gold-600 font-semibold animate-pulse";

            const formData = new FormData();
            formData.append('file', file);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('{{ route("admin.upload-file") }}', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    pathEl.value = data.path;
                    statusEl.innerText = "Selesai: " + file.name;
                    statusEl.className = "text-[10px] text-emerald-600 font-semibold";
                } else {
                    alert('Gagal mengunggah file: ' + data.message);
                    statusEl.innerText = "Gagal mengunggah.";
                    statusEl.className = "text-[10px] text-rose-500 font-semibold";
                }
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan saat mengunggah file.');
                statusEl.innerText = "Gagal mengunggah.";
                statusEl.className = "text-[10px] text-rose-500 font-semibold";
            });
        }

        function renderRegulasiList() {
            const container = document.getElementById('regulasi-list-container');
            const input = document.getElementById('regulasi_list_input');
            if (!container || !input) return;

            input.value = JSON.stringify(regulasiItems);
            container.innerHTML = '';

            if (regulasiItems.length === 0) {
                container.innerHTML = `<div class="p-6 text-center text-xs text-slate-400 font-medium">Belum ada regulasi yang ditambahkan.</div>`;
                return;
            }

            regulasiItems.forEach((item, index) => {
                const itemEl = document.createElement('div');
                itemEl.className = "flex items-start justify-between p-4 bg-white hover:bg-slate-100 rounded-xl transition-all duration-200 border border-slate-100 shadow-sm gap-4";
                
                const fileHtml = item.file 
                    ? `<span class="text-[10px] text-slate-400">Berkas: <a href="${item.file}" target="_blank" class="text-brand-green-600 font-semibold underline">Unduh PDF</a></span>`
                    : `<span class="text-[10px] text-rose-400">Tidak ada berkas PDF.</span>`;
                const linkHtml = item.link
                    ? `<span class="text-[10px] text-slate-400">| Link: <a href="${item.link}" target="_blank" class="text-brand-green-600 font-semibold underline">Wikipedia / Info</a></span>`
                    : '';

                itemEl.innerHTML = `
                    <div class="flex items-start space-x-3 flex-1 min-w-0">
                        <span class="bg-brand-green-50 text-brand-green-700 font-bold px-2.5 py-1.5 rounded-lg text-[10px] uppercase tracking-wider text-center shrink-0 border border-brand-green-100 min-w-[120px]">
                            ${escapeHtml(item.type)}
                        </span>
                        <div class="flex flex-col min-w-0">
                            <span class="text-xs font-bold text-slate-800">
                                ${escapeHtml(item.title)}
                            </span>
                            <span class="text-[11px] text-slate-500 mt-1 leading-relaxed">
                                ${escapeHtml(item.desc)}
                            </span>
                            <div class="mt-2 flex items-center space-x-2">
                                ${fileHtml}
                                ${linkHtml}
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-1 shrink-0 mt-0.5">
                        <button type="button" onclick="editRegulasiItem(${index})" class="p-1.5 rounded-lg text-brand-green-600 hover:bg-brand-green-50 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <button type="button" onclick="deleteRegulasiItem(${index})" class="p-1.5 rounded-lg text-rose-500 hover:bg-rose-50 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                `;
                container.appendChild(itemEl);
            });
        }

        function addRegulasiItem() {
            const typeInput = document.getElementById('new-regulasi-type');
            const titleInput = document.getElementById('new-regulasi-title');
            const descInput = document.getElementById('new-regulasi-desc');
            const linkInput = document.getElementById('new-regulasi-link');
            const fileInput = document.getElementById('new-regulasi-file');
            const filePathInput = document.getElementById('new-regulasi-file-path');

            if (!typeInput || !titleInput || !descInput) return;

            const type = typeInput.value.trim();
            const title = titleInput.value.trim();
            const desc = descInput.value.trim();
            const link = linkInput ? linkInput.value.trim() : '';
            const file = filePathInput ? filePathInput.value.trim() : '';

            if (!type || !title || !desc) {
                alert('Jenis Dokumen, Judul Dokumen, dan Deskripsi harus diisi.');
                return;
            }

            if (editingRegulasiIndex !== null) {
                const oldFile = regulasiItems[editingRegulasiIndex].file;
                regulasiItems[editingRegulasiIndex] = { 
                    type, 
                    title, 
                    desc, 
                    link, 
                    file: file || oldFile 
                };
                cancelRegulasiEdit();
            } else {
                regulasiItems.push({ type, title, desc, link, file });
            }

            typeInput.value = '';
            titleInput.value = '';
            descInput.value = '';
            if (linkInput) linkInput.value = '';
            if (fileInput) fileInput.value = '';
            if (filePathInput) filePathInput.value = '';
            
            document.getElementById('regulasi-upload-status').innerText = "Belum ada file diunggah.";
            document.getElementById('regulasi-upload-status').className = "text-[10px] text-slate-400 font-medium";

            renderRegulasiList();
        }

        function editRegulasiItem(index) {
            const item = regulasiItems[index];
            if (!item) return;

            editingRegulasiIndex = index;
            
            document.getElementById('new-regulasi-type').value = item.type;
            document.getElementById('new-regulasi-title').value = item.title;
            document.getElementById('new-regulasi-desc').value = item.desc;
            document.getElementById('new-regulasi-link').value = item.link || '';
            document.getElementById('new-regulasi-file-path').value = item.file || '';
            
            document.getElementById('regulasi-form-title').innerText = "Form Edit Regulasi";
            document.getElementById('add-regulasi-btn-text').innerText = "Simpan Regulasi";
            document.getElementById('cancel-regulasi-edit-btn').classList.remove('hidden');

            if (item.file) {
                const filename = item.file.substring(item.file.lastIndexOf('/') + 1);
                document.getElementById('regulasi-upload-status').innerText = "Ada file: " + filename;
                document.getElementById('regulasi-upload-status').className = "text-[10px] text-emerald-600 font-semibold";
            } else {
                document.getElementById('regulasi-upload-status').innerText = "Belum ada file diunggah.";
                document.getElementById('regulasi-upload-status').className = "text-[10px] text-slate-400 font-medium";
            }

            document.getElementById('new-regulasi-type').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            document.getElementById('new-regulasi-type').focus();
        }

        function cancelRegulasiEdit() {
            editingRegulasiIndex = null;
            
            document.getElementById('new-regulasi-type').value = '';
            document.getElementById('new-regulasi-title').value = '';
            document.getElementById('new-regulasi-desc').value = '';
            document.getElementById('new-regulasi-link').value = '';
            document.getElementById('new-regulasi-file-path').value = '';
            document.getElementById('new-regulasi-file').value = '';
            
            document.getElementById('regulasi-form-title').innerText = "Form Tambah Regulasi";
            document.getElementById('add-regulasi-btn-text').innerText = "Tambah Regulasi";
            document.getElementById('cancel-regulasi-edit-btn').classList.add('hidden');
            
            document.getElementById('regulasi-upload-status').innerText = "Belum ada file diunggah.";
            document.getElementById('regulasi-upload-status').className = "text-[10px] text-slate-400 font-medium";
        }

        function deleteRegulasiItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus regulasi ini?')) {
                if (editingRegulasiIndex === index) {
                    cancelRegulasiEdit();
                }
                regulasiItems.splice(index, 1);
                renderRegulasiList();
            }
        }

        // Dynamic 4 Pillars list manager
        const defaultPillars = [
            {
                "title": "Transparansi Mutlak",
                "icon": "eye",
                "desc": "Menyediakan informasi publik secara terbuka tanpa mempersulit prosedur, kecuali informasi yang dikecualikan hukum."
            },
            {
                "title": "Ketepatan & Kecepatan",
                "icon": "clock",
                "desc": "Merespon permohonan informasi secepatnya dalam tenggat maksimal regulasi (10 + 7 hari kerja)."
            },
            {
                "title": "Keadilan & Kesetaraan",
                "icon": "scale",
                "desc": "Melayani adil tanpa diskriminasi suku, agama, ras, golongan, selama tidak melanggar hukum."
            },
            {
                "title": "Bebas Pungutan Biaya",
                "icon": "check",
                "desc": "Tanpa pungutan liar. Biaya penggandaan data fisik (hardcopy) sepenuhnya ditanggung pemohon."
            }
        ];

        let pillarsItems = [];
        let editingPillarsIndex = null;

        try {
            const rawPillars = {!! json_encode(setting('pillars_list')) !!};
            if (rawPillars) {
                pillarsItems = JSON.parse(rawPillars);
            } else {
                pillarsItems = defaultPillars;
            }
        } catch(e) {
            pillarsItems = defaultPillars;
        }

        const iconLabelMap = {
            'eye': 'Mata / Transparansi',
            'clock': 'Jam / Kecepatan',
            'scale': 'Timbangan / Keadilan',
            'check': 'Bebas Biaya / Checkmark'
        };

        function renderPillarsList() {
            const container = document.getElementById('pillars-list-container');
            const input = document.getElementById('pillars_list_input');
            if (!container || !input) return;

            input.value = JSON.stringify(pillarsItems);
            container.innerHTML = '';

            if (pillarsItems.length === 0) {
                container.innerHTML = `<div class="p-6 text-center text-xs text-slate-400 font-medium">Belum ada pilar komitmen yang ditambahkan.</div>`;
                return;
            }

            pillarsItems.forEach((item, index) => {
                const itemEl = document.createElement('div');
                itemEl.className = "flex items-start justify-between p-4 bg-white hover:bg-slate-100 rounded-xl transition-all duration-200 border border-slate-100 shadow-sm gap-4";
                
                const iconName = iconLabelMap[item.icon] || item.icon;

                itemEl.innerHTML = `
                    <div class="flex items-start space-x-3 flex-1 min-w-0">
                        <span class="bg-brand-green-50 text-brand-green-700 font-bold px-2.5 py-1.5 rounded-lg text-[10px] uppercase tracking-wider text-center shrink-0 border border-brand-green-100 min-w-[120px]">
                            ${escapeHtml(iconName)}
                        </span>
                        <div class="flex flex-col min-w-0">
                            <span class="text-xs font-bold text-slate-800">
                                ${escapeHtml(item.title)}
                            </span>
                            <span class="text-[11px] text-slate-500 mt-1 leading-relaxed">
                                ${escapeHtml(item.desc)}
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-1 shrink-0 mt-0.5">
                        <button type="button" onclick="editPillarsItem(${index})" class="p-1.5 rounded-lg text-brand-green-600 hover:bg-brand-green-50 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <button type="button" onclick="deletePillarsItem(${index})" class="p-1.5 rounded-lg text-rose-500 hover:bg-rose-50 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                `;
                container.appendChild(itemEl);
            });
        }

        function addPillarsItem() {
            const titleInput = document.getElementById('new-pillar-title');
            const iconInput = document.getElementById('new-pillar-icon');
            const descInput = document.getElementById('new-pillar-desc');

            if (!titleInput || !iconInput || !descInput) return;

            const title = titleInput.value.trim();
            const icon = iconInput.value;
            const desc = descInput.value.trim();

            if (!title || !desc) {
                alert('Judul dan Deskripsi Pilar harus diisi.');
                return;
            }

            if (editingPillarsIndex !== null) {
                pillarsItems[editingPillarsIndex] = { title, icon, desc };
                cancelPillarsEdit();
            } else {
                pillarsItems.push({ title, icon, desc });
            }

            titleInput.value = '';
            iconInput.value = 'eye';
            descInput.value = '';

            renderPillarsList();
        }

        function editPillarsItem(index) {
            const item = pillarsItems[index];
            if (!item) return;

            editingPillarsIndex = index;
            
            document.getElementById('new-pillar-title').value = item.title;
            document.getElementById('new-pillar-icon').value = item.icon || 'eye';
            document.getElementById('new-pillar-desc').value = item.desc;
            
            document.getElementById('pillars-form-title').innerText = "Form Edit Pilar Komitmen";
            document.getElementById('add-pillars-btn-text').innerText = "Simpan Pilar";
            document.getElementById('cancel-pillars-edit-btn').classList.remove('hidden');

            document.getElementById('new-pillar-title').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            document.getElementById('new-pillar-title').focus();
        }

        function cancelPillarsEdit() {
            editingPillarsIndex = null;
            
            document.getElementById('new-pillar-title').value = '';
            document.getElementById('new-pillar-icon').value = 'eye';
            document.getElementById('new-pillar-desc').value = '';
            
            document.getElementById('pillars-form-title').innerText = "Form Tambah/Edit Pilar Komitmen";
            document.getElementById('add-pillars-btn-text').innerText = "Tambah Pilar";
            document.getElementById('cancel-pillars-edit-btn').classList.add('hidden');
        }

        function deletePillarsItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus pilar komitmen ini?')) {
                if (editingPillarsIndex === index) {
                    cancelPillarsEdit();
                }
                pillarsItems.splice(index, 1);
                renderPillarsList();
            }
        }

        function escapeHtml(text) {
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        // Live image previews
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Live formatted date
        window.addEventListener('DOMContentLoaded', () => {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('live-date').innerText = new Date().toLocaleDateString('id-ID', options);

            // Restore active tab from localStorage if exists
            const savedTab = localStorage.getItem('active_profil_tab');
            if (savedTab) {
                switchTab(savedTab);
            }

            // Render the Dynamic Struktur Organisasi list
            renderStrukturList();

            // Render the Dynamic Tugas & Fungsi list
            renderTugasList();

            // Render the Dynamic Regulasi list
            renderRegulasiList();

            // Render the Dynamic Pillars list
            renderPillarsList();
        });
    </script>
</body>
</html>
