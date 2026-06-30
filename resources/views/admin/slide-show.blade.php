<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Slide Show | Admin PPID Universitas Baiturrahmah</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta SEO -->
    <meta name="description" content="Kelola banner slide show halaman utama secara dinamis.">
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

                    <!-- Slide Show (Active Style) -->
                    <a href="/admin/slide-show" class="flex items-center space-x-3 bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500 px-3 py-3 rounded-lg transition-all">
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

                    <a href="/admin/tentang" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="flex-1">Kelola Tentang</span>
                    </a>

                    <a href="/admin/informasi-publik-berkala" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Publik Berkala</span>
                    </a>

                    <a href="/admin/informasi-serta-merta" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Serta Merta</span>
                    </a>

                    <a href="/admin/informasi-tersedia-setiap-saat" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Tersedia Setiap Saat</span>
                    </a>

                    <a href="/admin/galeri" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="flex-1">Kelola Galeri PPID</span>
                    </a>

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
                    <span class="text-xs text-slate-500 font-semibold hidden md:inline-block" id="live-date">Senin, 29 Juni 2026</span>
                    <!-- Profile avatar -->
                    <div class="w-8 h-8 rounded-full bg-brand-green-700 text-white flex items-center justify-center font-bold text-xs uppercase cursor-pointer">
                        {{ $adminUser->initials }}
                    </div>
                </div>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="p-6 space-y-6">

                <!-- HEADER SUMMARY -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Slide Show</h1>
                        <p class="text-slate-500 text-xs mt-1">Ganti gambar banner, badge, judul, tombol, dan deskripsi slide show halaman utama.</p>
                    </div>
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

                <div class="space-y-6">
                    
                    <!-- SLIDE LIST (Full width, matching page boundaries) -->
                    <div class="space-y-4">
                        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-4">
                            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                <div class="flex items-center space-x-2">
                                    <h3 class="text-sm font-bold text-slate-950 font-display uppercase tracking-wider">Daftar Slide Banner</h3>
                                    <span class="bg-slate-100 text-slate-600 text-[10px] font-bold px-2 py-0.5 rounded-full" id="slide-count">0 Slide</span>
                                </div>
                                <button type="button" onclick="openSlideModalForAdd()" class="px-3.5 py-2 bg-brand-green-50 hover:bg-brand-green-100 text-brand-green-700 hover:text-brand-green-800 text-[11px] font-bold rounded-xl transition-all flex items-center space-x-1 cursor-pointer transform active:scale-95">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                    <span>Tambah Slide Baru</span>
                                </button>
                            </div>

                            <!-- List Container -->
                            <div class="space-y-3 max-h-[550px] overflow-y-auto pr-1" id="slides-list-container">
                                <!-- Dynamic slide items will be injected here by JS -->
                            </div>

                            <!-- Form Save Button -->
                            <form action="{{ route('admin.slide-show.update') }}" method="POST" id="main-slideshow-form" class="pt-2">
                                @csrf
                                <input type="hidden" name="slides_list" id="slides_list_input">
                                <button type="submit" class="w-full py-3.5 bg-brand-green-700 hover:bg-brand-green-800 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform active:scale-[0.98] flex items-center justify-center space-x-2 text-xs cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                    <span>Simpan Seluruh Perubahan</span>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>

            </main>

        </div>

    </div>

    <!-- MODAL FOR TAMBAH / EDIT SLIDE -->
    <div id="slide-modal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <!-- Backdrop overlay with blur effect -->
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity duration-300 opacity-0" id="slide-modal-backdrop" onclick="closeSlideModal()"></div>

        <!-- Center modal contents -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <!-- Modal Box -->
            <div class="relative bg-white rounded-3xl border border-slate-200 shadow-2xl overflow-hidden w-full max-w-3xl transform transition-all duration-300 scale-95 opacity-0 z-10" id="slide-modal-content">
                <!-- Close Button in Header -->
                <button type="button" onclick="closeSlideModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-600 hover:bg-slate-100 p-2 rounded-xl transition-all cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="p-6 md:p-8 space-y-6">
                    <div class="border-b border-slate-100 pb-3">
                        <h3 class="text-sm font-bold text-slate-950 font-display uppercase tracking-wider" id="form-title">Form Tambah/Edit Slide</h3>
                    </div>

                    <div class="space-y-5">
                        <!-- Background Image Picker/Uploader -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Gambar Latar Belakang (Slider)</label>
                            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                                <div class="md:col-span-4">
                                    <div class="relative w-full h-24 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 flex items-center justify-center shadow-inner">
                                        <img id="image-preview" src="/images/slider1.png" class="w-full h-full object-cover" alt="Preview Image">
                                        <div id="upload-spinner" class="absolute inset-0 bg-black/40 flex items-center justify-center hidden">
                                            <svg class="animate-spin h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="md:col-span-8 space-y-2">
                                    <input type="file" id="file-uploader" onchange="uploadSlideImage(this)" class="hidden" accept="image/*">
                                    <button type="button" onclick="document.getElementById('file-uploader').click()" class="w-full py-2.5 px-4 bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-800 text-xs font-bold rounded-xl transition-all cursor-pointer flex items-center justify-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span>Pilih & Unggah Gambar Baru</span>
                                    </button>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-[10px] text-slate-400 font-bold uppercase">Atau URL:</span>
                                        <input type="text" id="slide-image-url" oninput="updatePreviewFromUrl()" class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all" placeholder="/images/slider1.png">
                                    </div>
                                </div>
                            </div>
                            <p class="text-[10px] text-slate-400 mt-2 font-medium">Rekomendasi ukuran gambar: 1920x1080 piksel (Widescreen landscape).</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Badge -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Teks Badge Atas</label>
                                <input type="text" id="slide-badge" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all font-semibold" placeholder="Contoh: Layanan Publik Informatif">
                            </div>

                            <!-- Title Line 1 -->
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Judul Baris 1</label>
                                <input type="text" id="slide-title-line1" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all font-semibold" placeholder="Contoh: Keterbukaan Informasi">
                            </div>
                        </div>

                        <!-- Title Line 2 (Highlight Gold) -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Judul Baris 2 (Highlight Emas)</label>
                            <input type="text" id="slide-title-line2" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all font-bold text-brand-gold-600" placeholder="Contoh: Universitas Baiturrahmah">
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Deskripsi Lengkap</label>
                            <textarea id="slide-description" rows="3" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all leading-relaxed" placeholder="Tulis deskripsi penjelasan slide show..."></textarea>
                        </div>

                        <hr class="border-slate-100">

                        <!-- BUTTON 1 SETTINGS -->
                        <div class="space-y-4">
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Tombol Kiri (Utama)</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-[10px] text-slate-500 font-bold uppercase mb-1">Teks Tombol</label>
                                    <input type="text" id="btn1-text" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all" placeholder="Ajukan Informasi Sekarang">
                                </div>
                                <div>
                                    <label class="block text-[10px] text-slate-500 font-bold uppercase mb-1">Aksi Tombol</label>
                                    <select id="btn1-action" onchange="toggleLinkInput(1)" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all">
                                        <option value="link">Buka URL Link</option>
                                        <option value="permohonan">Buka Form Permohonan</option>
                                        <option value="keberatan">Buka Form Keberatan</option>
                                        <option value="penyalahgunaan">Buka Form Penyalahgunaan</option>
                                        <option value="pengaduan">Buka Form Pengaduan</option>
                                        <option value="none">Sembunyikan Tombol</option>
                                    </select>
                                </div>
                                <div id="btn1-link-wrapper">
                                    <label class="block text-[10px] text-slate-500 font-bold uppercase mb-1">Link URL</label>
                                    <input type="text" id="btn1-link" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all" placeholder="/profil atau #about">
                                </div>
                            </div>
                        </div>

                        <hr class="border-slate-100">

                        <!-- BUTTON 2 SETTINGS -->
                        <div class="space-y-4">
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Tombol Kanan (Sekunder)</h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-[10px] text-slate-500 font-bold uppercase mb-1">Teks Tombol</label>
                                    <input type="text" id="btn2-text" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all" placeholder="Pelajari Selengkapnya">
                                </div>
                                <div>
                                    <label class="block text-[10px] text-slate-500 font-bold uppercase mb-1">Aksi Tombol</label>
                                    <select id="btn2-action" onchange="toggleLinkInput(2)" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all">
                                        <option value="link">Buka URL Link</option>
                                        <option value="permohonan">Buka Form Permohonan</option>
                                        <option value="keberatan">Buka Form Keberatan</option>
                                        <option value="penyalahgunaan">Buka Form Penyalahgunaan</option>
                                        <option value="pengaduan">Buka Form Pengaduan</option>
                                        <option value="none">Sembunyikan Tombol</option>
                                    </select>
                                </div>
                                <div id="btn2-link-wrapper">
                                    <label class="block text-[10px] text-slate-500 font-bold uppercase mb-1">Link URL</label>
                                    <input type="text" id="btn2-link" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 text-xs focus:ring-2 focus:ring-brand-green-600 focus:bg-white transition-all" placeholder="#about">
                                </div>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-slate-100 flex justify-end gap-3">
                            <button type="button" onclick="closeSlideModal()" class="px-5 py-3 border border-slate-200 hover:bg-slate-50 text-slate-700 rounded-xl text-xs font-bold transition-all cursor-pointer transform active:scale-95 shadow-sm">
                                Batal / Tutup
                            </button>
                            <button type="button" onclick="saveSlideItem()" id="submit-slide-btn" class="px-6 py-3 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all flex items-center space-x-1.5 cursor-pointer transform active:scale-95 shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span id="submit-slide-btn-text">Tambahkan Slide</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- GLOBAL JAVASCRIPT FOR SIDEBAR TOGGLE & DYNAMIC MANAGEMENT -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        window.addEventListener('DOMContentLoaded', () => {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('live-date').innerText = new Date().toLocaleDateString('id-ID', options);
        });

        // Toggle Link URL Input visibility depending on action selected
        function toggleLinkInput(btnNum) {
            const actionSelect = document.getElementById(`btn${btnNum}-action`);
            const wrapper = document.getElementById(`btn${btnNum}-link-wrapper`);
            if (actionSelect.value === 'link') {
                wrapper.classList.remove('invisible');
                wrapper.style.opacity = '1';
            } else {
                wrapper.classList.add('invisible');
                wrapper.style.opacity = '0';
            }
        }

        // Live image url preview sync
        function updatePreviewFromUrl() {
            const urlInput = document.getElementById('slide-image-url').value;
            const preview = document.getElementById('image-preview');
            if (urlInput.trim() !== '') {
                preview.src = urlInput;
            } else {
                preview.src = '/images/slider1.png';
            }
        }

        // AJAX Image Upload helper
        async function uploadSlideImage(fileInput) {
            if (!fileInput.files || fileInput.files.length === 0) return;
            const file = fileInput.files[0];
            const spinner = document.getElementById('upload-spinner');
            
            // Show Spinner
            spinner.classList.remove('hidden');

            const formData = new FormData();
            formData.append('file', file);

            try {
                const response = await fetch('/admin/upload-file', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                });
                
                const result = await response.json();
                if (result.success) {
                    document.getElementById('slide-image-url').value = result.path;
                    document.getElementById('image-preview').src = result.path;
                } else {
                    alert('Gagal mengunggah gambar: ' + (result.message || 'Error tidak diketahui'));
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan koneksi saat mengunggah gambar.');
            } finally {
                spinner.classList.add('hidden');
            }
        }

        // SLIDESHOW DATA STORAGE AND RENDERER
        const defaultSlides = [
            {
                image: '/images/slider1.png',
                badge: 'Layanan Publik Informatif',
                title_line1: 'Keterbukaan Informasi',
                title_line2: 'Universitas Baiturrahmah',
                description: 'Memberikan layanan data dan dokumen publik secara akurat, transparan, dan akuntabel sesuai dengan UU No.14 Tahun 2008.',
                button1_text: 'Ajukan Informasi Sekarang',
                button1_action: 'permohonan',
                button1_link: '',
                button2_text: 'Pelajari Selengkapnya',
                button2_action: 'link',
                button2_link: '#about',
            },
            {
                image: '/images/slider2.png',
                badge: 'Layanan Cepat & Akurat',
                title_line1: 'Pengaduan & Keberatan',
                title_line2: 'Layanan Publik',
                description: 'Kami berkomitmen memberikan tanggapan cepat terhadap pengaduan dan keberatan pelayanan informasi demi kepuasan publik.',
                button1_text: 'Ajukan Keberatan',
                button1_action: 'keberatan',
                button1_link: '',
                button2_text: 'Layangkan Pengaduan',
                button2_action: 'pengaduan',
                button2_link: '',
            },
            {
                image: '/images/slider3.png',
                badge: 'Edukasi & Sosialisasi',
                title_line1: 'Sosialisasi Transparansi',
                title_line2: 'Akademik Terbuka',
                description: 'Membangun iklim akademik yang transparan, bebas dari korupsi, nepotisme, dan penyalahgunaan wewenang jabatan.',
                button1_text: 'Lapor Penyalahgunaan Wewenang',
                button1_action: 'penyalahgunaan',
                button1_link: '',
                button2_text: '',
                button2_action: 'none',
                button2_link: '',
            }
        ];

        let slidesData = [];
        let editingIndex = null;

        // On Load Init
        window.addEventListener('DOMContentLoaded', () => {
            const rawSlides = {!! json_encode(setting('slides_list')) !!};
            if (rawSlides) {
                try {
                    slidesData = JSON.parse(rawSlides);
                    if (!Array.isArray(slidesData) || slidesData.length === 0) {
                        slidesData = defaultSlides;
                    }
                } catch (e) {
                    slidesData = defaultSlides;
                }
            } else {
                slidesData = defaultSlides;
            }
            renderSlidesList();
        });

        // Render Slides List in UI
        function renderSlidesList() {
            const container = document.getElementById('slides-list-container');
            const inputField = document.getElementById('slides_list_input');
            const counter = document.getElementById('slide-count');

            inputField.value = JSON.stringify(slidesData);
            counter.innerText = slidesData.length + ' Slide';

            if (slidesData.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-8 text-slate-400 font-medium">
                        <svg class="w-12 h-12 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="text-xs">Belum ada slide banner dikonfigurasi.</p>
                    </div>
                `;
                return;
            }

            container.innerHTML = '';
            slidesData.forEach((slide, index) => {
                const card = document.createElement('div');
                card.className = `p-3 rounded-2xl border transition-all duration-300 flex items-center justify-between gap-3 ${
                    editingIndex === index 
                    ? 'border-brand-gold-500 bg-brand-gold-50/55 shadow-md' 
                    : 'border-slate-200/80 bg-white hover:border-slate-300 hover:shadow-sm'
                }`;

                card.innerHTML = `
                    <div class="flex items-center gap-3 min-w-0 flex-1">
                        <div class="w-14 h-10 rounded-lg overflow-hidden bg-slate-100 border border-slate-200/60 flex-shrink-0">
                            <img src="${slide.image || '/images/slider1.png'}" class="w-full h-full object-cover" onerror="this.src='/images/slider1.png'">
                        </div>
                        <div class="min-w-0 flex-1">
                            <span class="text-[9px] font-bold text-brand-green-700 bg-brand-green-50 px-2 py-0.5 rounded-full uppercase tracking-wider">${slide.badge || 'Slide'}</span>
                            <h4 class="text-xs font-bold text-slate-800 truncate mt-1">${slide.title_line1 || ''} <span class="text-brand-gold-600">${slide.title_line2 || ''}</span></h4>
                            <p class="text-[10px] text-slate-400 truncate leading-relaxed">${slide.description || ''}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5 flex-shrink-0">
                        <button type="button" onclick="moveSlide(${index}, -1)" ${index === 0 ? 'disabled class="p-1 text-slate-200"' : 'class="p-1 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg cursor-pointer transition-colors"'} title="Pindahkan Keatas">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"></path></svg>
                        </button>
                        <button type="button" onclick="moveSlide(${index}, 1)" ${index === slidesData.length - 1 ? 'disabled class="p-1 text-slate-200"' : 'class="p-1 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg cursor-pointer transition-colors"'} title="Pindahkan Kebawah">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <button type="button" onclick="editSlideItem(${index})" class="p-1 text-brand-green-600 hover:text-brand-green-700 hover:bg-brand-green-50 rounded-lg cursor-pointer transition-colors" title="Edit Slide">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </button>
                        <button type="button" onclick="deleteSlideItem(${index})" class="p-1 text-rose-500 hover:text-rose-600 hover:bg-rose-50 rounded-lg cursor-pointer transition-colors" title="Hapus Slide">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                `;

                container.appendChild(card);
            });
        }

        // Add / Save changes to slide item
        function saveSlideItem() {
            const image = document.getElementById('slide-image-url').value.trim();
            const badge = document.getElementById('slide-badge').value.trim();
            const title_line1 = document.getElementById('slide-title-line1').value.trim();
            const title_line2 = document.getElementById('slide-title-line2').value.trim();
            const description = document.getElementById('slide-description').value.trim();

            const button1_text = document.getElementById('btn1-text').value.trim();
            const button1_action = document.getElementById('btn1-action').value;
            const button1_link = document.getElementById('btn1-link').value.trim();

            const button2_text = document.getElementById('btn2-text').value.trim();
            const button2_action = document.getElementById('btn2-action').value;
            const button2_link = document.getElementById('btn2-link').value.trim();

            if (!image) {
                alert('Harap pilih/unggah gambar latar belakang atau isi URL gambar.');
                return;
            }

            const item = {
                image,
                badge,
                title_line1,
                title_line2,
                description,
                button1_text,
                button1_action,
                button1_link: button1_action === 'link' ? button1_link : '',
                button2_text,
                button2_action,
                button2_link: button2_action === 'link' ? button2_link : ''
            };

            if (editingIndex !== null) {
                // Update
                slidesData[editingIndex] = item;
                alert('Slide berhasil diperbarui pada daftar. Klik "Simpan Seluruh Perubahan" di bagian bawah daftar slide untuk menyimpan ke database.');
            } else {
                // Add new
                slidesData.push(item);
                alert('Slide baru berhasil ditambahkan ke daftar. Klik "Simpan Seluruh Perubahan" di bagian bawah daftar slide untuk menyimpan ke database.');
            }

            resetFormState();
            closeSlideModal(true); // Close modal and skip duplicate reset
        }

        // Load item into Form for editing
        function editSlideItem(index) {
            const item = slidesData[index];
            editingIndex = index;

            document.getElementById('slide-image-url').value = item.image || '';
            document.getElementById('image-preview').src = item.image || '/images/slider1.png';
            document.getElementById('slide-badge').value = item.badge || '';
            document.getElementById('slide-title-line1').value = item.title_line1 || '';
            document.getElementById('slide-title-line2').value = item.title_line2 || '';
            document.getElementById('slide-description').value = item.description || '';

            document.getElementById('btn1-text').value = item.button1_text || '';
            document.getElementById('btn1-action').value = item.button1_action || 'link';
            document.getElementById('btn1-link').value = item.button1_link || '';

            document.getElementById('btn2-text').value = item.button2_text || '';
            document.getElementById('btn2-action').value = item.button2_action || 'link';
            document.getElementById('btn2-link').value = item.button2_link || '';

            toggleLinkInput(1);
            toggleLinkInput(2);

            document.getElementById('form-title').innerText = "Form Edit Slide #" + (index + 1);
            document.getElementById('submit-slide-btn-text').innerText = "Perbarui Slide";
            document.getElementById('submit-slide-btn').className = "px-6 py-3 bg-brand-gold-500 hover:bg-brand-gold-600 text-brand-green-950 rounded-xl text-xs font-bold transition-all flex items-center space-x-1.5 cursor-pointer transform active:scale-95 shadow-md";

            renderSlidesList(); // Re-render to highlight active editing item
            openSlideModal(); // Open popup modal
        }

        // Delete slide item from array
        function deleteSlideItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus slide ini dari daftar?')) {
                if (editingIndex === index) {
                    resetFormState();
                } else if (editingIndex !== null && editingIndex > index) {
                    editingIndex--;
                }
                slidesData.splice(index, 1);
                renderSlidesList();
            }
        }

        // Move Slide sequence (up/down)
        function moveSlide(index, offset) {
            const targetIndex = index + offset;
            if (targetIndex < 0 || targetIndex >= slidesData.length) return;

            // Swap
            const temp = slidesData[index];
            slidesData[index] = slidesData[targetIndex];
            slidesData[targetIndex] = temp;

            // Keep editing index updated if it was moved
            if (editingIndex === index) {
                editingIndex = targetIndex;
            } else if (editingIndex === targetIndex) {
                editingIndex = index;
            }

            renderSlidesList();
        }

        // Modal opening/closing animations logic
        function openSlideModal() {
            const modal = document.getElementById('slide-modal');
            const backdrop = document.getElementById('slide-modal-backdrop');
            const content = document.getElementById('slide-modal-content');

            modal.classList.remove('hidden');
            
            // Force repaint
            void modal.offsetHeight;

            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');

            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }

        function closeSlideModal(skipReset = false) {
            const modal = document.getElementById('slide-modal');
            const backdrop = document.getElementById('slide-modal-backdrop');
            const content = document.getElementById('slide-modal-content');

            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');

            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                if (!skipReset) {
                    resetFormState();
                }
            }, 300);
        }

        function openSlideModalForAdd() {
            resetFormState();
            openSlideModal();
        }

        // Reset form state to "Add Slide"
        function resetFormState() {
            editingIndex = null;
            document.getElementById('slide-image-url').value = '';
            document.getElementById('image-preview').src = '/images/slider1.png';
            document.getElementById('slide-badge').value = '';
            document.getElementById('slide-title-line1').value = '';
            document.getElementById('slide-title-line2').value = '';
            document.getElementById('slide-description').value = '';

            document.getElementById('btn1-text').value = '';
            document.getElementById('btn1-action').value = 'link';
            document.getElementById('btn1-link').value = '';

            document.getElementById('btn2-text').value = '';
            document.getElementById('btn2-action').value = 'link';
            document.getElementById('btn2-link').value = '';

            toggleLinkInput(1);
            toggleLinkInput(2);

            document.getElementById('form-title').innerText = "Form Tambah/Edit Slide";
            document.getElementById('submit-slide-btn-text').innerText = "Tambahkan Slide";
            document.getElementById('submit-slide-btn').className = "px-6 py-3 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all flex items-center space-x-1.5 cursor-pointer transform active:scale-95 shadow-md";

            renderSlidesList();
        }
    </script>
</body>
</html>
