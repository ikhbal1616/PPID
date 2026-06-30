<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri PPID | Admin PPID Universitas Baiturrahmah</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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

                    <!-- Fitur Baru: Kelola Galeri PPID (Active Style) -->
                    <a href="/admin/galeri" class="flex items-center space-x-3 bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500 px-3 py-3 rounded-lg transition-all">
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
                    <span class="text-xs text-slate-500 font-semibold hidden md:inline-block" id="live-date">-</span>
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
                    <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Galeri Foto PPID</h1>
                    <p class="text-slate-500 text-xs mt-1">Tambahkan, edit, dan hapus foto dokumentasi kegiatan PPID Universitas Baiturrahmah secara dinamis.</p>
                </div>

                <!-- Success Popup Modal -->
                @if (session('success'))
                <div id="success-save-modal" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4">
                    <!-- Backdrop -->
                    <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-md transition-opacity duration-300"></div>

                    <!-- Modal Content Card -->
                    <div class="relative transform overflow-hidden rounded-3xl bg-gradient-to-br from-brand-green-900 to-brand-green-950 border border-brand-green-800/50 text-center shadow-2xl p-8 max-w-sm w-full transition-all duration-300 scale-100 opacity-100 z-10 flex flex-col items-center">
                        
                        <!-- Success Pulsing Icon -->
                        <div class="w-16 h-16 rounded-full bg-emerald-500/10 flex items-center justify-center mb-5 relative shrink-0">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500/10 opacity-75"></span>
                            <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white relative z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Header and Description -->
                        <h3 class="text-base font-bold text-white tracking-wide font-display">Berhasil Disimpan</h3>
                        <p class="text-[11px] text-emerald-100/75 mt-2.5 mb-6 leading-relaxed max-w-xs">
                            Seluruh perubahan foto kegiatan PPID, deskripsi, tanggal, dan kategorisasi telah diperbarui ke sistem database secara permanen.
                        </p>

                        <!-- Action Button -->
                        <button onclick="closeSuccessSaveModal()" class="w-full py-2.5 bg-white hover:bg-slate-100 active:scale-[0.98] text-brand-green-950 text-xs font-bold rounded-xl transition-all duration-300 shadow-md cursor-pointer">
                            Selesai
                        </button>
                    </div>
                </div>
                <script>
                    function closeSuccessSaveModal() {
                        const modal = document.getElementById('success-save-modal');
                        if (modal) {
                            modal.classList.add('pointer-events-none');
                            modal.style.transition = 'opacity 300ms ease-out';
                            modal.style.opacity = '0';
                            setTimeout(() => modal.remove(), 300);
                        }
                    }
                </script>
                @endif

                <!-- SAVE ALL FORM (Hidden, auto-saved in background) -->
                <form action="{{ route('admin.galeri.update') }}" method="POST" id="main-submit-form" class="hidden">
                    @csrf
                    <!-- Hidden input to store JSON list values -->
                    <input type="hidden" name="galeri_list" id="galeri_list_input">
                </form>

                <!-- GRID LIST FOR PHOTOS -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider">Daftar Foto Galeri</h3>
                        <button type="button" onclick="createNewPhoto()" class="px-4 py-2 bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold rounded-xl flex items-center space-x-1.5 transition-all shadow-md transform hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                            <span>Tambah Foto</span>
                        </button>
                    </div>

                    <!-- Dynamic list containers -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="galeri-list-container">
                        <!-- Dynamic items injected here -->
                    </div>
                </div>

            </main>

        </div>
    </div>

    <!-- MODAL FORM TAMBAH/EDIT FOTO -->
    <div id="photo-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300" onclick="closePhotoModal()"></div>

        <!-- Scrollable content alignment helper -->
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Body Container -->
            <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl mx-4 sm:mx-auto border border-slate-100 scale-95 opacity-0 duration-300 ease-out" id="photo-modal-container">
                <!-- Header with color accent -->
                <div class="relative bg-gradient-to-r from-brand-green-900 to-brand-green-950 px-6 py-4 flex justify-between items-center text-white">
                    <div>
                        <h3 class="text-sm font-bold font-display uppercase tracking-wider" id="form-photo-title">Form Tambah Foto Galeri</h3>
                        <p class="text-[9px] text-brand-gold-500 tracking-widest uppercase font-semibold mt-0.5">Layanan Online Transparan</p>
                    </div>
                    <!-- Close button -->
                    <button onclick="closePhotoModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors focus:outline-none cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Form Content -->
                <div class="p-6 space-y-4">
                    <div class="space-y-1.5">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul Kegiatan / Foto</label>
                        <input type="text" id="photo-title" placeholder="Contoh: Rapat Evaluasi Kinerja PPID..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Kategori Kegiatan</label>
                            <select id="photo-category" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Pilih Kategori...</option>
                                <option value="sosialisasi">Sosialisasi & Bimtek</option>
                                <option value="rapat">Rapat Kerja</option>
                                <option value="monev">Monitoring & Evaluasi</option>
                                <option value="layanan">Layanan Publik</option>
                            </select>
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Tanggal Kegiatan</label>
                            <input type="date" id="photo-date" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Deskripsi Singkat Kegiatan</label>
                        <textarea id="photo-desc" rows="3" placeholder="Masukkan ringkasan kronologi atau detail kegiatan dokumentasi..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-none"></textarea>
                    </div>

                    <!-- PDF / Image Upload Section -->
                    <div class="space-y-1.5 border-t border-slate-100 pt-3">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider font-semibold">Unggah Gambar Kegiatan (Maks 2MB)</label>
                        
                        <!-- Upload Box or Preview Grid layout -->
                        <div class="flex items-center space-x-4">
                            <label class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-brand-green-50 text-slate-700 rounded-xl text-xs font-bold cursor-pointer transition-colors shadow-sm inline-block shrink-0">
                                Pilih File Foto
                                <input type="file" id="photo-file-uploader" class="hidden" accept=".jpg,.jpeg,.png,.webp" onchange="uploadPhotoBerkas(this)">
                            </label>
                            <span class="text-[10px] text-slate-400 font-medium" id="photo-upload-status">Belum ada berkas diunggah.</span>
                        </div>
                        <input type="hidden" id="photo-image-url">

                        <div class="w-full mt-2 hidden" id="photo-preview-container">
                            <label class="block text-[8px] font-bold text-slate-400 uppercase tracking-wider mb-1">Preview Gambar:</label>
                            <img src="" id="photo-preview-img" class="h-28 w-auto object-cover rounded-xl border border-slate-200 shadow-inner">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 pt-4 border-t border-slate-100">
                        <button type="button" onclick="closePhotoModal()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-all cursor-pointer">
                            Batal
                        </button>
                        <button type="button" onclick="savePhotoItem()" class="px-5 py-2.5 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all shadow-md cursor-pointer flex items-center space-x-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span id="save-photo-btn-text">Simpan Foto</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Sidebar responsive toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        }

        // Live formatted date
        window.addEventListener('DOMContentLoaded', () => {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('live-date').innerText = new Date().toLocaleDateString('id-ID', options);

            const form = document.getElementById('main-submit-form');
            if (form) {
                form.addEventListener('submit', () => {
                    isDirty = false;
                });
            }
        });

        

        // Default Fallback Data if Setting is empty
        const defaultGaleri = [
            {
                "title": "Sosialisasi E-PPID dan Keterbukaan Informasi",
                "category": "sosialisasi",
                "date": "2026-07-15",
                "description": "Workshop pelaksanaan tata laksana dan bimbingan teknis standar pelayanan publik bagi seluruh dekanat dan pengelola data fakultas.",
                "image_url": "/images/slider3.png"
            },
            {
                "title": "Rapat Evaluasi Program Kerja Tahunan",
                "category": "rapat",
                "date": "2026-08-22",
                "description": "Pertemuan koordinasi tim pelaksana PPID Universitas Baiturrahmah dalam merancang target kepatuhan informasi publik semester berikutnya.",
                "image_url": "/images/slider2.png"
            },
            {
                "title": "Visitasi Komisi Informasi Sumatera Barat",
                "category": "monev",
                "date": "2026-09-10",
                "description": "Monitoring dan verifikasi langsung berkas serta ketersediaan dokumen publik di ruang sekretariat PPID Unbrah oleh Komisioner KI Sumbar.",
                "image_url": "/images/slider1.png"
            },
            {
                "title": "Pelayanan Informasi Terpadu Mahasiswa",
                "category": "layanan",
                "date": "2026-10-05",
                "description": "Petugas PPID melayani permohonan salinan data registrasi akademik mahasiswa secara cepat, santun, dan gratis di loket layanan.",
                "image_url": "/images/slider2.png"
            },
            {
                "title": "Bimbingan Teknis Kearsipan Digital",
                "category": "sosialisasi",
                "date": "2026-10-18",
                "description": "Bimbingan penginputan data pendukung kinerja institusi bagi tenaga kependidikan demi keselarasan sistem informasi terpadu.",
                "image_url": "/images/slider1.png"
            },
            {
                "title": "Penerimaan Penghargaan Keterbukaan Informasi",
                "category": "monev",
                "date": "2026-11-12",
                "description": "Penyerahan piagam penghargaan kategori Perguruan Tinggi Swasta Paling Informatif dalam PPID Award tingkat wilayah.",
                "image_url": "/images/slider3.png"
            }
        ];

        let galeriItems = [];
        let editingPhotoIndex = null;
        let isDirty = false;

        try {
            const rawData = {!! json_encode(setting('galeri_list')) !!};
            if (rawData) {
                galeriItems = JSON.parse(rawData);
            } else {
                galeriItems = defaultGaleri;
            }
        } catch(e) {
            galeriItems = defaultGaleri;
        }

        const categoryLabelMap = {
            'sosialisasi': 'Sosialisasi & Bimtek',
            'rapat': 'Rapat Kerja',
            'monev': 'Monitoring & Evaluasi',
            'layanan': 'Layanan Publik'
        };

        // Render Galeri Cards
        function renderGaleriList() {
            const container = document.getElementById('galeri-list-container');
            const input = document.getElementById('galeri_list_input');
            if (!container || !input) return;

            input.value = JSON.stringify(galeriItems);
            container.innerHTML = '';

            if (galeriItems.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full p-8 text-center text-xs text-slate-400 font-medium bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        Belum ada Foto Kegiatan yang ditambahkan. Silakan klik tombol "Tambah Foto".
                    </div>
                `;
                return;
            }

            galeriItems.forEach((item, index) => {
                const cardEl = document.createElement('div');
                cardEl.className = "bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm flex flex-col group hover:border-slate-300 hover:shadow-md transition-all duration-200";

                const displayDate = item.date ? formatDateIndo(item.date) : '-';
                const labelCategory = categoryLabelMap[item.category] || item.category;

                cardEl.innerHTML = `
                    <div class="relative h-44 bg-slate-100 overflow-hidden shrink-0 border-b border-slate-100">
                        <img src="${item.image_url || '/images/slider1.png'}" alt="${escapeHtml(item.title)}" class="w-full h-full object-cover">
                        <span class="absolute top-2.5 left-2.5 bg-brand-green-800 text-white text-[9px] font-bold px-2 py-0.5 rounded-lg shadow-sm">
                            ${escapeHtml(labelCategory)}
                        </span>
                    </div>
                    <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
                        <div class="space-y-1.5">
                            <span class="text-[9px] text-slate-400 font-bold tracking-wider block uppercase">${escapeHtml(displayDate)}</span>
                            <h4 class="font-bold text-slate-800 text-xs leading-snug truncate-2-lines">${escapeHtml(item.title)}</h4>
                            <p class="text-[10px] text-slate-500 font-light leading-relaxed truncate-3-lines">${escapeHtml(item.description || '-')}</p>
                        </div>
                        <div class="flex items-center justify-end space-x-1 pt-2 border-t border-slate-100">
                            <button type="button" onclick="editPhotoItem(${index})" class="p-1 rounded-lg hover:bg-brand-green-50 text-brand-green-600 transition-colors cursor-pointer" title="Edit Foto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                            <button type="button" onclick="deletePhotoItem(${index})" class="p-1 rounded-lg hover:bg-rose-50 text-rose-500 transition-colors cursor-pointer" title="Hapus Foto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </div>
                `;

                container.appendChild(cardEl);
            });
        }

        // Open Modal
        function createNewPhoto() {
            cancelPhotoEdit();
            
            const modal = document.getElementById('photo-modal');
            const container = document.getElementById('photo-modal-container');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        // Close Modal
        function closePhotoModal() {
            const modal = document.getElementById('photo-modal');
            const container = document.getElementById('photo-modal-container');
            
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Save Photo
        function savePhotoItem() {
            const title = document.getElementById('photo-title').value.trim();
            const category = document.getElementById('photo-category').value;
            const date = document.getElementById('photo-date').value;
            const description = document.getElementById('photo-desc').value.trim();
            const image_url = document.getElementById('photo-image-url').value.trim();

            if (!title) {
                showErrorModalPopup('Gagal Menyimpan', 'Judul kegiatan wajib diisi.');
                return;
            }
            if (!category) {
                showErrorModalPopup('Gagal Menyimpan', 'Kategori kegiatan wajib dipilih.');
                return;
            }
            if (!date) {
                showErrorModalPopup('Gagal Menyimpan', 'Tanggal kegiatan wajib diisi.');
                return;
            }
            if (!image_url) {
                showErrorModalPopup('Gagal Menyimpan', 'Silakan pilih dan unggah file foto terlebih dahulu.');
                return;
            }

            if (editingPhotoIndex !== null) {
                galeriItems[editingPhotoIndex] = { title, category, date, description, image_url };
                cancelPhotoEdit();
                closePhotoModal();
                renderGaleriList();
                saveToServerAsync("Berhasil Diperbarui", "Foto kegiatan telah berhasil diperbarui di database.");
            } else {
                galeriItems.push({ title, category, date, description, image_url });
                closePhotoModal();
                renderGaleriList();
                saveToServerAsync("Berhasil Ditambahkan", "Foto kegiatan baru telah berhasil disimpan ke database.");
            }
        }

        // Edit mode
        function editPhotoItem(index) {
            const item = galeriItems[index];
            if (!item) return;

            editingPhotoIndex = index;
            document.getElementById('photo-title').value = item.title;
            document.getElementById('photo-category').value = item.category;
            document.getElementById('photo-date').value = item.date;
            document.getElementById('photo-desc').value = item.description || '';
            document.getElementById('photo-image-url').value = item.image_url;

            // Preview
            const previewContainer = document.getElementById('photo-preview-container');
            const previewImg = document.getElementById('photo-preview-img');
            previewImg.src = item.image_url;
            previewContainer.classList.remove('hidden');

            document.getElementById('photo-upload-status').innerText = "Selesai: File sudah diunggah";
            document.getElementById('photo-upload-status').className = "text-[10px] text-emerald-600 font-semibold";

            document.getElementById('form-photo-title').innerText = "Form Edit Foto Galeri";
            document.getElementById('save-photo-btn-text').innerText = "Simpan Perubahan";

            // Open Modal
            const modal = document.getElementById('photo-modal');
            const container = document.getElementById('photo-modal-container');
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        // Delete photo
        function deletePhotoItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus foto kegiatan ini?')) {
                galeriItems.splice(index, 1);
                renderGaleriList();
                saveToServerAsync("Berhasil Dihapus", "Foto kegiatan telah berhasil dihapus dari database.");
            }
        }

        // Cancel Edit
        function cancelPhotoEdit() {
            editingPhotoIndex = null;
            document.getElementById('photo-title').value = '';
            document.getElementById('photo-category').value = '';
            document.getElementById('photo-date').value = '';
            document.getElementById('photo-desc').value = '';
            document.getElementById('photo-image-url').value = '';
            document.getElementById('photo-file-uploader').value = '';
            document.getElementById('photo-preview-container').classList.add('hidden');
            document.getElementById('photo-preview-img').src = '';
            document.getElementById('photo-upload-status').innerText = "Belum ada berkas diunggah.";
            document.getElementById('photo-upload-status').className = "text-[10px] text-slate-400 font-medium";
            document.getElementById('form-photo-title').innerText = "Form Tambah Foto Galeri";
            document.getElementById('save-photo-btn-text').innerText = "Simpan Foto";
        }

        // AJAX upload file
        function uploadPhotoBerkas(input) {
            const file = input.files[0];
            const statusEl = document.getElementById('photo-upload-status');
            const urlEl = document.getElementById('photo-image-url');
            const previewContainer = document.getElementById('photo-preview-container');
            const previewImg = document.getElementById('photo-preview-img');
            
            if (!file) return;

            // Check if file size exceeds 2MB
            if (file.size > 2 * 1024 * 1024) {
                showErrorModalPopup('Gagal Mengunggah', 'Ukuran gambar tidak boleh melebihi 2MB.');
                statusEl.innerText = "Gagal: Melebihi 2MB.";
                statusEl.className = "text-[10px] text-rose-500 font-semibold";
                input.value = '';
                return;
            }

            statusEl.innerText = "Mengunggah...";
            statusEl.className = "text-[10px] text-brand-green-600 font-semibold";

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
                    urlEl.value = data.path;
                    statusEl.innerText = "Selesai: " + file.name;
                    statusEl.className = "text-[10px] text-emerald-600 font-semibold";
                    
                    // Show Preview
                    previewImg.src = data.path;
                    previewContainer.classList.remove('hidden');
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

        function showSaveToast() {
            const existingToast = document.getElementById('save-toast-reminder');
            if (existingToast) existingToast.remove();

            const toast = document.createElement('div');
            toast.id = 'save-toast-reminder';
            toast.className = "fixed bottom-5 right-5 z-50 bg-emerald-600 text-white text-xs font-semibold px-5 py-3.5 rounded-2xl shadow-xl transition-opacity duration-500 flex items-center space-x-2";
            toast.innerHTML = `
                <svg class="w-4 h-4 text-emerald-100 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Perubahan disimpan secara lokal. Klik tombol <strong class="underline">Simpan Perubahan</strong> di atas untuk menyimpan ke database!</span>
            `;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 6000);
        }

        function formatDateIndo(dateStr) {
            if (!dateStr) return '';
            try {
                const parts = dateStr.split('-');
                if (parts.length !== 3) return dateStr;
                const months = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];
                const day = parseInt(parts[2]);
                const month = months[parseInt(parts[1]) - 1];
                const year = parts[0];
                return `${day} ${month} ${year}`;
            } catch(e) {
                return dateStr;
            }
        }

        function escapeHtml(text) {
            if (!text) return '';
            return text
                .toString()
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function showSuccessModalPopup(title, message) {
            const existing = document.getElementById("js-success-popup-modal");
            if (existing) existing.remove();

            const modal = document.createElement("div");
            modal.id = "js-success-popup-modal";
            modal.className = "fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4";
            modal.innerHTML = `
                <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-md transition-opacity duration-300"></div>
                <div class="relative transform overflow-hidden rounded-3xl bg-gradient-to-br from-brand-green-900 to-brand-green-950 border border-brand-green-800/50 text-center shadow-2xl p-8 max-w-sm w-full transition-all duration-300 scale-100 opacity-100 z-10 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-emerald-500/10 flex items-center justify-center mb-5 relative shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500/10 opacity-75"></span>
                        <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white relative z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-base font-bold text-white tracking-wide font-display">${title}</h3>
                    <p class="text-[11px] text-emerald-100/75 mt-2.5 mb-6 leading-relaxed max-w-xs text-center">
                        ${message}
                    </p>
                    <button onclick="closeJsSuccessPopupModal()" class="w-full py-2.5 bg-white hover:bg-slate-100 active:scale-[0.98] text-brand-green-950 text-xs font-bold rounded-xl transition-all duration-300 shadow-md cursor-pointer">
                        Selesai
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
        }

        function closeJsSuccessPopupModal() {
            const modal = document.getElementById("js-success-popup-modal");
            if (modal) {
                modal.classList.add("pointer-events-none");
                modal.style.transition = "opacity 300ms ease-out";
                modal.style.opacity = "0";
                setTimeout(() => modal.remove(), 300);
            }
        }

        function showErrorModalPopup(title, message) {
            const existing = document.getElementById("js-error-popup-modal");
            if (existing) existing.remove();

            const modal = document.createElement("div");
            modal.id = "js-error-popup-modal";
            modal.className = "fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4";
            modal.innerHTML = `
                <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-md transition-opacity duration-300"></div>
                <div class="relative transform overflow-hidden rounded-3xl bg-gradient-to-br from-rose-900 to-rose-950 border border-rose-800/50 text-center shadow-2xl p-8 max-w-sm w-full transition-all duration-300 scale-100 opacity-100 z-10 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-rose-500/10 flex items-center justify-center mb-5 relative shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-500/10 opacity-75"></span>
                        <div class="w-10 h-10 rounded-full bg-rose-500 flex items-center justify-center text-white relative z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-base font-bold text-white tracking-wide font-display">${title}</h3>
                    <p class="text-[11px] text-rose-100/75 mt-2.5 mb-6 leading-relaxed max-w-xs text-center">
                        ${message}
                    </p>
                    <button onclick="closeJsErrorPopupModal()" class="w-full py-2.5 bg-white hover:bg-slate-100 active:scale-[0.98] text-rose-950 text-xs font-bold rounded-xl transition-all duration-300 shadow-md cursor-pointer">
                        Selesai
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
        }

        function closeJsErrorPopupModal() {
            const modal = document.getElementById("js-error-popup-modal");
            if (modal) {
                modal.classList.add("pointer-events-none");
                modal.style.transition = "opacity 300ms ease-out";
                modal.style.opacity = "0";
                setTimeout(() => modal.remove(), 300);
            }
        }

        function saveToServerAsync(successTitle, successMessage) {
            const input = document.getElementById("galeri_list_input");
            if (input) {
                input.value = JSON.stringify(galeriItems);
            }
            
            const form = document.getElementById("main-submit-form");
            if (!form) return;

            const formData = new FormData(form);
            fetch(form.action, {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    isDirty = false;
                    if (successTitle && successMessage) {
                        showSuccessModalPopup(successTitle, successMessage);
                    }
                } else {
                    showErrorModalPopup("Gagal Menyimpan", "Gagal menyimpan ke server: " + data.message);
                }
            })
            .catch(err => {
                console.error(err);
                showErrorModalPopup("Gagal Menyimpan", "Koneksi ke server terputus.");
            });
        }

        // Render initially
        renderGaleriList();
    </script>
</body>
</html>
