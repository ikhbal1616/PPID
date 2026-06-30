<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | PPID Universitas Baiturrahmah</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta SEO -->
    <meta name="description" content="Dashboard Administrasi Internal PPID Universitas Baiturrahmah. Mengelola permohonan informasi, keberatan, pengaduan, dan data publik secara efisien.">
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
                    <a href="#" class="flex items-center space-x-3 group">
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
                    
                    <a href="#" class="flex items-center space-x-3 bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500 px-3 py-3 rounded-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span>Dashboard Utama</span>
                    </a>

                    <!-- Slide Show -->
                    <a href="/admin/slide-show" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
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
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-permohonan">2</span>
                    </a>

                    <a href="/admin/keberatan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span class="flex-1">Keberatan Informasi Publik</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-keberatan">2</span>
                    </a>

                    <a href="/admin/penyalahgunaan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                        <span class="flex-1">Penyalahgunaan Wewenang</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-penyalahgunaan">1</span>
                    </a>

                    <a href="/admin/pengaduan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span class="flex-1">Pengaduan Layanan Kampus</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-pengaduan">1</span>
                    </a>

                    <span class="block px-3 py-2 text-[10px] text-brand-green-600 uppercase tracking-widest font-bold pt-4">Dokumen Profil</span>

                    <!-- Fitur Baru: Kelola Tentang -->
                    <a href="/admin/tentang" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
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
                    <!-- Green online pulsing dot -->
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
                    <!-- Search Input -->
                    <div class="relative w-64 md:w-80">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" id="table-search" oninput="handleSearch(this.value)" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs pl-9 pr-3 py-2 rounded-xl transition-all outline-none" placeholder="Cari tiket, nama pemohon, atau subjek...">
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Live time / date (Desktop) -->
                    <span class="text-xs text-slate-500 font-semibold hidden md:inline-block">Senin, 22 Juni 2026</span>
                    <!-- Notification Bell -->
                    <button class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-50 rounded-lg transition-colors cursor-pointer">
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500"></span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    <!-- Profile avatar dropdown -->
                    <div class="w-8 h-8 rounded-full bg-brand-green-700 text-white flex items-center justify-center font-bold text-xs uppercase cursor-pointer">
                        {{ $adminUser->initials }}
                    </div>
                </div>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="p-6 space-y-6">

                <!-- HEADER SUMMARY -->
                <div class="flex flex-col md:flex-row md:items-center justify-between space-y-2 md:space-y-0">
                    <div>
                        <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Dashboard Overview</h1>
                        <p class="text-slate-500 text-xs">Selamat datang kembali! Berikut adalah ringkasan berkas informasi publik hari ini.</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button onclick="window.print()" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 font-semibold text-xs px-4 py-2.5 rounded-xl shadow-sm transition-all cursor-pointer flex items-center space-x-2">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            <span>Cetak Laporan</span>
                        </button>
                        <a href="/" target="_blank" class="bg-brand-green-600 hover:bg-brand-green-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-md hover:shadow-lg transition-all cursor-pointer flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            <span>Kunjungi Situs Utama</span>
                        </a>
                    </div>
                </div>

                <!-- METRIC CARDS ROW (Grid of 4) -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Metric Card 1 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex items-center space-x-4">
                        <div class="p-3 bg-brand-green-50 rounded-xl text-brand-green-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Total Laporan</span>
                            <span class="text-xl sm:text-2xl font-bold font-display text-slate-800" id="metric-total">6</span>
                            <span class="text-[9px] font-bold text-emerald-600 block mt-0.5">↑ 12.3% bulan ini</span>
                        </div>
                    </div>

                    <!-- Metric Card 2 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex items-center space-x-4">
                        <div class="p-3 bg-amber-50 rounded-xl text-amber-600 relative">
                            <!-- Amber pulsing dot -->
                            <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Pending Verifikasi</span>
                            <span class="text-xl sm:text-2xl font-bold font-display text-slate-800" id="metric-pending">1</span>
                            <span class="text-[9px] font-bold text-amber-500 block mt-0.5">Perlu verifikasi data</span>
                        </div>
                    </div>

                    <!-- Metric Card 3 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex items-center space-x-4">
                        <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Dalam Tinjauan</span>
                            <span class="text-xl sm:text-2xl font-bold font-display text-slate-800" id="metric-review">2</span>
                            <span class="text-[9px] font-bold text-blue-500 block mt-0.5">Sedang dinilai tim ahli</span>
                        </div>
                    </div>

                    <!-- Metric Card 4 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex items-center space-x-4">
                        <div class="p-3 bg-emerald-50 rounded-xl text-emerald-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Selesai / Tuntas</span>
                            <span class="text-xl sm:text-2xl font-bold font-display text-slate-800" id="metric-resolved">2</span>
                            <span class="text-[9px] font-bold text-emerald-600 block mt-0.5">Rata-rata tanggapan 4 hari</span>
                        </div>
                    </div>
                </div>

                <!-- ANALYTICS SVG CHART SECTION -->
                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-2 sm:space-y-0">
                        <div>
                            <h2 class="text-lg font-bold font-display text-slate-800 leading-tight">Tren Laporan PPID Bulanan</h2>
                            <p class="text-slate-500 text-xs">Statistik perbandingan jumlah laporan permohonan informasi publik tahun 2026.</p>
                        </div>
                        <!-- Legend indicators -->
                        <div class="flex items-center space-x-4 text-xs font-semibold text-slate-600">
                            <span class="flex items-center space-x-1.5">
                                <span class="w-3 h-3 rounded bg-brand-green-600"></span>
                                <span>Permohonan & Laporan</span>
                            </span>
                            <span class="flex items-center space-x-1.5">
                                <span class="w-3 h-3 rounded bg-brand-gold-500"></span>
                                <span>Rata-Rata Bulanan</span>
                            </span>
                        </div>
                    </div>

                    <!-- SVG Chart Visualizer -->
                    <div class="relative w-full h-64 border-b border-l border-slate-200">
                        <!-- Chart Tooltip -->
                        <div id="chart-tooltip" class="absolute hidden bg-slate-900 text-white text-[10px] px-3 py-1.5 rounded-lg shadow-xl border border-slate-700 pointer-events-none transform -translate-x-1/2 -translate-y-full z-10"></div>

                        <!-- Grid Lines -->
                        <div class="absolute inset-0 flex flex-col justify-between py-2 pointer-events-none opacity-40">
                            <hr class="border-dashed border-slate-200 w-full">
                            <hr class="border-dashed border-slate-200 w-full">
                            <hr class="border-dashed border-slate-200 w-full">
                            <hr class="border-dashed border-slate-200 w-full">
                        </div>

                        <!-- Main Graphic Area (responsive size via viewBox) -->
                        <svg class="w-full h-full" viewBox="0 0 1000 240" preserveAspectRatio="none">
                            <defs>
                                <linearGradient id="chart-gradient" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#009A44" stop-opacity="0.3"/>
                                    <stop offset="100%" stop-color="#009A44" stop-opacity="0"/>
                                </linearGradient>
                            </defs>

                            <!-- Gradient Area under curve -->
                            <path d="M 50 200 L 180 160 L 320 180 L 460 90 L 600 120 L 740 60 L 880 80 L 880 220 L 50 220 Z" fill="url(#chart-gradient)"></path>

                            <!-- Line Path -->
                            <path d="M 50 200 Q 115 180 180 160 T 320 180 T 460 90 T 600 120 T 740 60 T 880 80" fill="none" stroke="#009A44" stroke-width="3" stroke-linecap="round"></path>
                            
                            <!-- Average benchmark dashed line -->
                            <line x1="50" y1="120" x2="950" y2="120" stroke="#EDC97F" stroke-width="1.5" stroke-dasharray="6,4"></line>

                            <!-- Dots/Nodes with hover triggers in HTML/JS -->
                            <circle cx="50" cy="200" r="6" fill="#ffffff" stroke="#009A44" stroke-width="3" class="cursor-pointer hover:r-8 hover:fill-brand-gold-500 transition-all" onclick="showChartValue(50, 200, 'Januari: 12 Laporan')"></circle>
                            <circle cx="180" cy="160" r="6" fill="#ffffff" stroke="#009A44" stroke-width="3" class="cursor-pointer hover:r-8 hover:fill-brand-gold-500 transition-all" onclick="showChartValue(180, 160, 'Februari: 22 Laporan')"></circle>
                            <circle cx="320" cy="180" r="6" fill="#ffffff" stroke="#009A44" stroke-width="3" class="cursor-pointer hover:r-8 hover:fill-brand-gold-500 transition-all" onclick="showChartValue(320, 180, 'Maret: 18 Laporan')"></circle>
                            <circle cx="460" cy="90" r="6" fill="#ffffff" stroke="#009A44" stroke-width="3" class="cursor-pointer hover:r-8 hover:fill-brand-gold-500 transition-all" onclick="showChartValue(460, 90, 'April: 45 Laporan')"></circle>
                            <circle cx="600" cy="120" r="6" fill="#ffffff" stroke="#009A44" stroke-width="3" class="cursor-pointer hover:r-8 hover:fill-brand-gold-500 transition-all" onclick="showChartValue(600, 120, 'Mei: 34 Laporan')"></circle>
                            <circle cx="740" cy="60" r="6" fill="#ffffff" stroke="#009A44" stroke-width="3" class="cursor-pointer hover:r-8 hover:fill-brand-gold-500 transition-all" onclick="showChartValue(740, 60, 'Juni: 58 Laporan')"></circle>
                            <circle cx="880" cy="80" r="6" fill="#ffffff" stroke="#009A44" stroke-width="3" class="cursor-pointer hover:r-8 hover:fill-brand-gold-500 transition-all" onclick="showChartValue(880, 80, 'Juli: 52 Laporan')"></circle>
                        </svg>

                        <!-- X Axis Labels -->
                        <div class="absolute bottom-[-24px] left-0 right-0 flex justify-between text-[10px] font-bold text-slate-400 px-6">
                            <span>Jan</span>
                            <span>Feb</span>
                            <span>Mar</span>
                            <span>Apr</span>
                            <span>Mei</span>
                            <span>Jun</span>
                            <span>Jul</span>
                        </div>
                    </div>
                </div>

                <!-- MAIN DATA TABLE CARD -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    
                    <!-- Table controls & Filter Tab Bar -->
                    <div class="p-6 border-b border-slate-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <h2 class="text-lg font-bold font-display text-slate-800 leading-tight">Daftar Pengajuan Masuk</h2>
                        
                        <!-- Tabs -->
                        <div class="flex flex-wrap gap-1.5 text-xs font-bold text-slate-500 bg-slate-100 rounded-xl p-1 w-fit">
                            <button onclick="setFilter('semua')" id="tab-semua" class="tab-btn px-4 py-2 rounded-lg bg-white text-slate-800 shadow-sm transition-all cursor-pointer">Semua</button>
                            <button onclick="setFilter('permohonan')" id="tab-permohonan" class="tab-btn px-4 py-2 rounded-lg hover:bg-white/50 hover:text-slate-800 transition-all cursor-pointer">Permohonan</button>
                            <button onclick="setFilter('keberatan')" id="tab-keberatan" class="tab-btn px-4 py-2 rounded-lg hover:bg-white/50 hover:text-slate-800 transition-all cursor-pointer">Keberatan</button>
                            <button onclick="setFilter('penyalahgunaan')" id="tab-penyalahgunaan" class="tab-btn px-4 py-2 rounded-lg hover:bg-white/50 hover:text-slate-800 transition-all cursor-pointer">WBS (Lapor)</button>
                            <button onclick="setFilter('pengaduan')" id="tab-pengaduan" class="tab-btn px-4 py-2 rounded-lg hover:bg-white/50 hover:text-slate-800 transition-all cursor-pointer">Pengaduan</button>
                        </div>
                    </div>

                    <!-- Responsive Table -->
                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-200">
                                    <th class="px-6 py-4">Tiket ID</th>
                                    <th class="px-6 py-4">Pemohon</th>
                                    <th class="px-6 py-4">Kategori</th>
                                    <th class="px-6 py-4">Subjek / Perihal</th>
                                    <th class="px-6 py-4">Tanggal Masuk</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-body" class="divide-y divide-slate-200 font-medium text-slate-700">
                                <!-- Javascript dynamically populates rows. Showing mock entries fallback first: -->
                                <!-- (Included here so it functions immediately on server load) -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination / Table stats footer -->
                    <div class="p-6 border-t border-slate-200 flex items-center justify-between text-xs text-slate-400">
                        <span id="table-entries-info">Menampilkan 6 entri laporan</span>
                        <div class="flex space-x-1">
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-[11px] font-bold cursor-pointer disabled:opacity-50" disabled>Sebelumnya</button>
                            <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-[11px] font-bold cursor-pointer">Selanjutnya</button>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- DETAIL PANEL MODAL -->
    <div id="slide-over" class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto hidden" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0" id="slide-over-backdrop" onclick="closeSlideOver()"></div>

        <!-- Panel Content (Centered Modal) -->
        <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl flex flex-col justify-between transform scale-95 opacity-0 transition-all duration-300 ease-out border border-slate-100 max-h-[90vh] overflow-hidden" id="slide-over-container">
                
                <!-- Panel Header -->
                <div class="bg-gradient-to-r from-brand-green-900 to-brand-green-950 px-6 py-5 flex justify-between items-center text-white shrink-0">
                    <div>
                        <h3 class="text-base font-bold font-display" id="detail-ticket-id">Detail Laporan #PER-10492</h3>
                        <p class="text-[10px] text-brand-gold-500 tracking-wider uppercase font-semibold mt-0.5" id="detail-category-header">Layanan Kategori Permohonan</p>
                    </div>
                    <button onclick="closeSlideOver()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Two-Column Grid Body -->
                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 overflow-hidden min-h-0">
                    <!-- Left Column (Scrollable details and form inputs) -->
                    <div class="overflow-y-auto p-6 space-y-6 text-xs leading-relaxed text-slate-600 border-r border-slate-100">
                        <!-- Status Header Indicator -->
                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 flex justify-between items-center">
                            <span class="font-bold text-slate-500 uppercase tracking-wider text-[10px]">Status Berkas Saat Ini:</span>
                            <span id="detail-status-badge" class="px-3 py-1 rounded-full text-[10px] font-bold">Pending</span>
                        </div>

                        <!-- Identitas Pemohon -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Identitas Pemohon</h4>
                            <div class="grid grid-cols-3 gap-y-2 text-slate-700">
                                <span class="text-slate-400 font-semibold">Nama Lengkap</span>
                                <span class="col-span-2 font-bold" id="detail-nama">Ahmad Fauzi</span>

                                <span class="text-slate-400 font-semibold">NIK (No. KTP)</span>
                                <span class="col-span-2 font-mono" id="detail-nik">1306020509890001</span>

                                <span class="text-slate-400 font-semibold">Alamat Email</span>
                                <span class="col-span-2 text-brand-green-700 font-semibold" id="detail-email">fauzi@gmail.com</span>

                                <span class="text-slate-400 font-semibold">Nomor WhatsApp</span>
                                <span class="col-span-2 font-mono" id="detail-telepon">081290328812</span>

                                <span class="text-slate-400 font-semibold">Alamat Lengkap</span>
                                <span class="col-span-2 text-[11px]" id="detail-alamat">Jl. Khatib Sulaiman No. 42, Kota Padang</span>
                            </div>
                        </div>

                        <!-- Perincian Laporan -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Isi Pesan / Perincian</h4>
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 text-slate-800 font-medium shadow-inner whitespace-pre-line" id="detail-perincian">
                                Saya ingin meminta berkas Statuta Universitas Baiturrahmah tahun 2025 untuk keperluan penelitian tesis pascasarjana saya mengenai tata kelola hukum perguruan tinggi swasta di Sumatera Barat. Terima kasih.
                            </div>
                        </div>

                        <!-- Metode Pengiriman & Salinan -->
                        <div class="space-y-3 hidden" id="detail-delivery-container">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Metode Pengiriman & Salinan</h4>
                            <div class="grid grid-cols-3 gap-y-2 text-slate-700">
                                <span class="text-slate-400 font-semibold">Bentuk Salinan</span>
                                <span class="col-span-2 font-bold" id="detail-bentuk-salinan">-</span>

                                <span class="text-slate-400 font-semibold">Cara Ambil</span>
                                <span class="col-span-2 font-bold" id="detail-cara-ambil">-</span>
                            </div>
                        </div>

                        <!-- Lampiran Berkas -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Lampiran Berkas Pendukung</h4>
                            <div id="detail-file-container">
                                <!-- Link of file -->
                            </div>
                        </div>

                        <!-- Ganti Status Administrasi -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Ubah Status Laporan</h4>
                            <select id="detail-select-status" onchange="updateRowStatus(this.value)" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none">
                                <option value="Pending">Menunggu Verifikasi (Pending)</option>
                                <option value="Ditinjau">Sedang Ditinjau (Review)</option>
                                <option value="Selesai">Selesai / Tuntas (Resolved)</option>
                                <option value="Ditolak">Ditolak / Dikecualikan (Rejected)</option>
                            </select>
                        </div>

                        <!-- Formulir Tanggapan Resmi -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Tulis Tanggapan Resmi</h4>
                            <textarea id="detail-response-text" rows="4" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none resize-none" placeholder="Tanggapan resmi yang akan dikirim otomatis ke alamat email pemohon..."></textarea>
                        </div>
                    </div>

                    <!-- Right Column (Document / Image Preview) -->
                    <div class="p-6 bg-slate-50 flex flex-col justify-start max-h-[100%] overflow-y-auto space-y-4">
                        <div class="flex justify-between items-center border-b border-slate-200 pb-2">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider">Pratinjau Berkas Pendukung</h4>
                            <div id="detail-download-btn-container"></div>
                        </div>
                        <div id="detail-preview-container" class="flex-1 flex items-center justify-center border border-slate-200 rounded-2xl bg-white p-4 overflow-hidden min-h-[350px] shadow-sm">
                            <div class="text-slate-400 font-medium italic text-center">Tidak ada lampiran dokumen untuk pratinjau.</div>
                        </div>
                    </div>
                </div>

                <!-- Panel Actions Footer -->
                <div class="p-6 border-t border-slate-100 bg-slate-50 flex items-center justify-end space-x-3 shrink-0">
                    <button onclick="closeSlideOver()" class="px-5 py-2.5 rounded-full border border-slate-200 text-slate-500 hover:bg-slate-100 text-xs font-semibold transition-colors cursor-pointer">Batal</button>
                    <button onclick="submitResponse()" class="px-6 py-2.5 rounded-full bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 cursor-pointer">Kirim Balasan</button>
                </div>

            </div>
    </div>

    <!-- LOGICAL JAVASCRIPT CONTROLLERS -->
    <script>
        // --- 1. POPULATE DATABASE RECORDS FROM LARAVEL ---
        const reports = @json($reports);

        // --- 2. CONTROLLERS STATE & VARIABLES ---
        let currentFilter = 'semua';
        let currentSearchQuery = '';
        let activeSelectedReport = null;

        // Render Table Initially
        window.addEventListener('DOMContentLoaded', () => {
            renderTable();
            updateMetrics();
        });

        // Toggle Sidebar visibility (Mobile responsive)
        function toggleSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // Metrics counter updates
        function updateMetrics() {
            const total = reports.length;
            const pending = reports.filter(r => r.status === 'Pending').length;
            const review = reports.filter(r => r.status === 'Ditinjau').length;
            const resolved = reports.filter(r => r.status === 'Selesai').length;

            document.getElementById('metric-total').innerText = total;
            document.getElementById('metric-pending').innerText = pending;
            document.getElementById('metric-review').innerText = review;
            document.getElementById('metric-resolved').innerText = resolved;

            // Sidebar counts
            const countPermohonan = reports.filter(r => r.kategori === 'permohonan').length;
            const countKeberatan = reports.filter(r => r.kategori === 'keberatan').length;
            const countPenyalahgunaan = reports.filter(r => r.kategori === 'penyalahgunaan').length;
            const countPengaduan = reports.filter(r => r.kategori === 'pengaduan').length;

            document.getElementById('sidebar-count-permohonan').innerText = countPermohonan;
            document.getElementById('sidebar-count-keberatan').innerText = countKeberatan;
            document.getElementById('sidebar-count-penyalahgunaan').innerText = countPenyalahgunaan;
            document.getElementById('sidebar-count-pengaduan').innerText = countPengaduan;
        }

        // --- 3. FILTER & SEARCH HANDLERS ---
        function setFilter(filterType) {
            currentFilter = filterType;
            
            // Toggle active style on tab buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-white', 'text-slate-800', 'shadow-sm');
                btn.classList.add('hover:bg-white/50', 'hover:text-slate-800');
            });

            const activeBtn = document.getElementById(`tab-${filterType}`) || document.getElementById('tab-semua');
            if (activeBtn) {
                activeBtn.classList.remove('hover:bg-white/50', 'hover:text-slate-800');
                activeBtn.classList.add('bg-white', 'text-slate-800', 'shadow-sm');
            }

            renderTable();
        }

        // Parse search box input
        function handleSearch(query) {
            currentSearchQuery = query.toLowerCase().trim();
            renderTable();
        }

        // --- 4. TABLE RENDERER ---
        function renderTable() {
            const tbody = document.getElementById('table-body');
            tbody.innerHTML = '';

            // Filter logic
            let filteredReports = reports.filter(report => {
                const matchesFilter = (currentFilter === 'semua' || report.kategori === currentFilter);
                const matchesSearch = (
                    report.id.toLowerCase().includes(currentSearchQuery) ||
                    report.nama.toLowerCase().includes(currentSearchQuery) ||
                    report.subjek.toLowerCase().includes(currentSearchQuery) ||
                    report.email.toLowerCase().includes(currentSearchQuery)
                );
                return matchesFilter && matchesSearch;
            });

            // Update Info label
            document.getElementById('table-entries-info').innerText = `Menampilkan ${filteredReports.length} entri laporan`;

            // Populate rows
            if (filteredReports.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center py-12 text-slate-400 font-medium">
                            Tidak ada pengajuan yang cocok dengan pencarian atau kategori ini.
                        </td>
                    </tr>
                `;
                return;
            }

            filteredReports.forEach(report => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/80 transition-colors border-b border-slate-100';

                // Status Badge details
                let badgeClass = '';
                if (report.status === 'Pending') badgeClass = 'bg-amber-100 text-amber-700';
                else if (report.status === 'Ditinjau') badgeClass = 'bg-blue-100 text-blue-700';
                else if (report.status === 'Selesai') badgeClass = 'bg-emerald-100 text-emerald-700';
                else if (report.status === 'Ditolak') badgeClass = 'bg-rose-100 text-rose-700';

                let categoryName = report.kategori;
                if (report.kategori === 'penyalahgunaan') categoryName = 'Penyalahgunaan Wewenang';
                else if (report.kategori === 'permohonan') categoryName = 'Permohonan';
                else if (report.kategori === 'keberatan') categoryName = 'Keberatan';
                else if (report.kategori === 'pengaduan') categoryName = 'Pengaduan';

                tr.innerHTML = `
                    <td class="px-6 py-4 font-mono font-bold text-brand-green-700">${report.id}</td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-900">${report.nama}</div>
                        <div class="text-[10px] text-slate-400 font-light mt-0.5">${report.email}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="capitalize bg-slate-100 text-slate-600 text-[10px] font-bold px-2.5 py-1 rounded-md">${categoryName}</span>
                    </td>
                    <td class="px-6 py-4 max-w-xs truncate font-semibold text-slate-800">${report.subjek}</td>
                    <td class="px-6 py-4 text-slate-500 font-light">${report.tanggal}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center space-x-1 px-2.5 py-1 rounded-full text-[10px] font-bold ${badgeClass}">
                            <span class="w-1.5 h-1.5 rounded-full ${report.status === 'Pending' || report.status === 'Ditinjau' ? 'animate-pulse' : ''} ${report.status === 'Pending' ? 'bg-amber-500' : report.status === 'Ditinjau' ? 'bg-blue-500' : report.status === 'Selesai' ? 'bg-emerald-500' : 'bg-rose-500'}"></span>
                            <span>${report.status}</span>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button onclick="openSlideOver('${report.id}')" class="px-3.5 py-1.5 bg-brand-green-50 text-brand-green-700 border border-brand-green-100 hover:bg-brand-green-600 hover:text-white rounded-lg font-bold text-[11px] shadow-sm transition-all hover:scale-105 cursor-pointer">Lihat Detail</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // --- 5. SLIDE-OVER CONTROL LOGIC ---
        // Open Slide Over Panel
        function openSlideOver(ticketId) {
            const report = reports.find(r => r.id === ticketId);
            if (!report) return;

            activeSelectedReport = report;

            // Fill elements
            document.getElementById('detail-ticket-id').innerText = `Detail Laporan ${report.id}`;
            document.getElementById('detail-category-header').innerText = `Layanan Kategori ${report.kategori.toUpperCase()}`;
            document.getElementById('detail-nama').innerText = report.nama;
            document.getElementById('detail-nik').innerText = report.nik;
            document.getElementById('detail-email').innerText = report.email;
            document.getElementById('detail-telepon').innerText = report.telepon;
            document.getElementById('detail-alamat').innerText = report.alamat;
            document.getElementById('detail-perincian').innerText = report.perincian;

            // Fill delivery options if category is permohonan
            const deliveryContainer = document.getElementById('detail-delivery-container');
            if (report.kategori === 'permohonan' && report.bentuk_informasi) {
                deliveryContainer.classList.remove('hidden');
                document.getElementById('detail-bentuk-salinan').innerText = report.bentuk_informasi;
                document.getElementById('detail-cara-ambil').innerText = report.cara_mendapatkan;
            } else {
                deliveryContainer.classList.add('hidden');
            }

            // Update badge style inside panel
            let badgeClass = '';
            if (report.status === 'Pending') badgeClass = 'bg-amber-100 text-amber-700';
            else if (report.status === 'Ditinjau') badgeClass = 'bg-blue-100 text-blue-700';
            else if (report.status === 'Selesai') badgeClass = 'bg-emerald-100 text-emerald-700';
            else if (report.status === 'Ditolak') badgeClass = 'bg-rose-100 text-rose-700';

            const statusBadge = document.getElementById('detail-status-badge');
            statusBadge.className = `px-3 py-1 rounded-full text-[10px] font-bold ${badgeClass}`;
            statusBadge.innerText = report.status;

            document.getElementById('detail-select-status').value = report.status;
            document.getElementById('detail-response-text').value = report.tanggapan || '';

            // Handle file attachments link
            const fileContainer = document.getElementById('detail-file-container');
            if (report.file_bukti) {
                const extension = report.file_bukti.split('.').pop().toLowerCase();
                const iconBg = extension === 'pdf' ? 'bg-rose-100 text-rose-600' : 'bg-blue-100 text-blue-600';
                
                fileContainer.innerHTML = `
                    <a href="${report.file_bukti}" target="_blank" class="flex items-center space-x-3 bg-slate-50 hover:bg-slate-100 border border-slate-200 hover:border-slate-300 rounded-xl p-3 transition-colors cursor-pointer">
                        <div class="w-10 h-10 rounded-lg ${iconBg} flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-slate-800 truncate">${report.file_bukti.split('/').pop()}</p>
                            <p class="text-[10px] text-slate-400 uppercase">${extension} File</p>
                        </div>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </a>
                `;
            } else {
                fileContainer.innerHTML = `
                    <div class="text-slate-400 font-medium italic py-2">Tidak ada lampiran dokumen.</div>
                `;
            }

            // Handle preview container and download button
            const previewContainer = document.getElementById('detail-preview-container');
            const downloadBtnContainer = document.getElementById('detail-download-btn-container');
            if (report.file_bukti) {
                const extension = report.file_bukti.split('.').pop().toLowerCase();
                const isImage = ['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(extension);
                
                // Show download button
                downloadBtnContainer.innerHTML = `
                    <a href="${report.file_bukti}" download class="inline-flex items-center space-x-1.5 px-3 py-1.5 bg-brand-green-50 text-brand-green-700 hover:bg-brand-green-600 hover:text-white rounded-lg font-bold text-[10px] transition-all duration-200 border border-brand-green-100 shadow-sm cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        <span>Unduh Berkas</span>
                    </a>
                `;

                if (isImage) {
                    previewContainer.innerHTML = `
                        <img src="${report.file_bukti}" alt="Pratinjau Berkas" class="max-w-full max-h-[350px] object-contain rounded-xl shadow-sm border border-slate-200">
                    `;
                } else if (extension === 'pdf') {
                    previewContainer.innerHTML = `
                        <iframe src="${report.file_bukti}" class="w-full h-[350px] rounded-xl border border-slate-200" frameborder="0"></iframe>
                    `;
                } else {
                    previewContainer.innerHTML = `
                        <div class="text-center p-4">
                            <div class="w-16 h-16 mx-auto rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            </div>
                            <p class="text-xs font-bold text-slate-800">${report.file_bukti.split('/').pop()}</p>
                            <p class="text-[10px] text-slate-400 uppercase mt-1">${extension} File</p>
                        </div>
                    `;
                }
            } else {
                downloadBtnContainer.innerHTML = '';
                previewContainer.innerHTML = `
                    <div class="text-slate-400 font-medium italic text-center">Tidak ada lampiran dokumen untuk pratinjau.</div>
                `;
            }

            // Animation transitions trigger
            const slideOver = document.getElementById('slide-over');
            const backdrop = document.getElementById('slide-over-backdrop');
            const container = document.getElementById('slide-over-container');

            slideOver.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        // Close Slide Over Panel
        function closeSlideOver() {
            const backdrop = document.getElementById('slide-over-backdrop');
            const container = document.getElementById('slide-over-container');
            const slideOver = document.getElementById('slide-over');

            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                slideOver.classList.add('hidden');
                activeSelectedReport = null;
            }, 300);
        }

        // Live modification of status select trigger
        function updateRowStatus(newStatus) {
            if (!activeSelectedReport) return;
            
            // Update panel badge immediately
            const statusBadge = document.getElementById('detail-status-badge');
            statusBadge.innerText = newStatus;
            statusBadge.className = 'px-3 py-1 rounded-full text-[10px] font-bold ';
            if (newStatus === 'Pending') statusBadge.classList.add('bg-amber-100', 'text-amber-700');
            else if (newStatus === 'Ditinjau') statusBadge.classList.add('bg-blue-100', 'text-blue-700');
            else if (newStatus === 'Selesai') statusBadge.classList.add('bg-emerald-100', 'text-emerald-700');
            else if (newStatus === 'Ditolak') statusBadge.classList.add('bg-rose-100', 'text-rose-700');
        }

        // Response Submit action trigger
        function submitResponse() {
            if (!activeSelectedReport) return;

            const newStatus = document.getElementById('detail-select-status').value;
            const tanggapanText = document.getElementById('detail-response-text').value;

            // Submit via AJAX
            fetch(`/admin/permohonan/${activeSelectedReport.db_id}/update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    status: newStatus,
                    tanggapan: tanggapanText
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update local state
                    const index = reports.findIndex(r => r.db_id === activeSelectedReport.db_id);
                    if (index !== -1) {
                        reports[index].status = newStatus;
                        reports[index].tanggapan = tanggapanText;
                    }
                    
                    // Re-render
                    renderTable();
                    updateMetrics();
                    closeSlideOver();
                    
                    alert('Status dan tanggapan laporan berhasil diperbarui!');
                } else {
                    alert('Gagal memperbarui status: ' + data.message);
                }
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan saat menyimpan tanggapan.');
            });
        }

        // --- 6. SVG GRAPHICS TOOLTIP TRIGGER ---
        function showChartValue(cx, cy, label) {
            const tooltip = document.getElementById('chart-tooltip');
            tooltip.innerText = label;
            tooltip.classList.remove('hidden');
            
            // Map svg coords relative to parent element
            const pctX = (cx / 1000) * 100;
            const pctY = (cy / 240) * 100;

            tooltip.style.left = `${pctX}%`;
            tooltip.style.top = `${pctY - 12}%`;

            // Hide after 3 seconds
            setTimeout(() => {
                tooltip.classList.add('hidden');
            }, 3000);
        }
    </script>
</body>
</html>
