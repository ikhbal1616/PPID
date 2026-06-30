<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Informasi Publik Berkala | Admin PPID Universitas Baiturrahmah</title>
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

                    <!-- Fitur Baru: Informasi Publik Berkala (Active Style) -->
                    <a href="/admin/informasi-publik-berkala" class="flex items-center space-x-3 bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500 px-3 py-3 rounded-lg transition-all">
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
                    <span class="text-xs text-slate-500 font-semibold hidden md:inline-block" id="live-date">Sabtu, 27 Juni 2026</span>
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
                    <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Informasi Publik Berkala</h1>
                    <p class="text-slate-500 text-xs mt-1">Kelola kelompok dokumen (accordion) beserta file-file dan link tautan terkait secara dinamis.</p>
                </div>

                <!-- Alert Messages replaced with Modal Success Popup (UI Reference style) -->
                @if (session('success'))
                <div id="success-save-modal" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4">
                    <!-- Backdrop -->
                    <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-md transition-opacity duration-300"></div>

                    <!-- Modal Content Card -->
                    <div class="relative transform overflow-hidden rounded-3xl bg-gradient-to-br from-brand-green-900 to-brand-green-950 border border-brand-green-800/50 text-center shadow-2xl p-8 max-w-sm w-full transition-all duration-300 scale-100 opacity-100 z-10 flex flex-col items-center">
                        
                        <!-- Success Pulsing Icon (Nested solid circle matching UI reference) -->
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
                            Perubahan pada kelompok informasi, berkas lampiran, dan link URL telah berhasil diperbarui ke database sistem secara permanen.
                        </p>

                        <!-- Action Button (White background) -->
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
                <form action="{{ route('admin.informasi-publik-berkala.update') }}" method="POST" id="main-submit-form" class="hidden">
                    @csrf
                    <!-- Hidden input to store JSON list values -->
                    <input type="hidden" name="informasi_berkala_list" id="informasi_berkala_list_input">
                </form>

                <!-- MAIN CARD LIST (FULL WIDTH CONTAINER) -->
                <div class="space-y-6">
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                            <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider">Daftar Kelompok Informasi</h3>
                            <button type="button" onclick="createNewKelompok()" class="px-4 py-2 bg-brand-green-600 hover:bg-brand-green-700 text-white text-xs font-bold rounded-xl flex items-center space-x-1.5 transition-all shadow-md transform hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                <span>Tambah Kelompok</span>
                            </button>
                        </div>

                        <div class="space-y-4" id="kelompok-list-container">
                            <!-- Dynamic Kelompok items injected here -->
                        </div>
                    </div>
                </div>

            </main>

        </div>
    </div>

    <!-- MODAL FORM TAMBAH/EDIT KELOMPOK -->
    <div id="kelompok-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300" onclick="closeKelompokModal()"></div>

        <!-- Scrollable content alignment helper -->
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Body Container -->
            <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl mx-4 sm:mx-auto border border-slate-100 scale-95 opacity-0 duration-300 ease-out" id="kelompok-modal-container">
                <!-- Header with color accent -->
                <div class="relative bg-gradient-to-r from-brand-green-900 to-brand-green-950 px-6 py-4 flex justify-between items-center text-white">
                    <div>
                        <h3 class="text-sm font-bold font-display uppercase tracking-wider" id="form-kelompok-title">Form Tambah Kelompok</h3>
                        <p class="text-[9px] text-brand-gold-500 tracking-widest uppercase font-semibold mt-0.5">Layanan Online Transparan</p>
                    </div>
                    <!-- Close button -->
                    <button onclick="closeKelompokModal()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors focus:outline-none cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Form Content -->
                <div class="p-6 space-y-4">
                    <div class="space-y-1.5">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul Kelompok Informasi (Accordion)</label>
                        <input type="text" id="kel-title" placeholder="Contoh: Profil PPID Universitas Baiturrahmah..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Deskripsi Singkat / Sub-Header</label>
                        <textarea id="kel-desc" rows="3" placeholder="Masukkan deskripsi singkat atau instruksi daftar berkas..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-none"></textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 border-t border-slate-100 pt-3">
                        <div class="space-y-1.5">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Tautan Langsung (Opsional)</label>
                            <input type="text" id="kel-link-url" placeholder="Contoh: https://spmb.unbrah.ac.id/..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Label Tautan Langsung</label>
                            <input type="text" id="kel-link-label" placeholder="Contoh: Daftar Sekarang..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-2 pt-4 border-t border-slate-100">
                        <button type="button" onclick="closeKelompokModal()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-all cursor-pointer">
                            Batal
                        </button>
                        <button type="button" onclick="saveKelompokItem()" class="px-5 py-2.5 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all shadow-md cursor-pointer flex items-center space-x-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span id="save-kel-btn-text">Simpan Kelompok</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL FORM TAMBAH FILE / BERKAS -->
    <div id="file-modal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300" onclick="closeFileFormPanel()"></div>

        <!-- Scrollable content alignment helper -->
        <div class="flex min-h-screen items-center justify-center p-4 text-center sm:p-0">
            <!-- Modal Body Container -->
            <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all w-full max-w-2xl mx-4 sm:mx-auto border border-slate-100 scale-95 opacity-0 duration-300 ease-out" id="file-modal-container">
                <!-- Header with color accent -->
                <div class="relative bg-gradient-to-r from-brand-green-900 to-brand-green-950 px-6 py-4 flex justify-between items-center text-white">
                    <div>
                        <h3 class="text-sm font-bold font-display uppercase tracking-wider" id="form-file-title">Tambah File ke Kelompok</h3>
                        <p class="text-[9px] text-brand-gold-500 tracking-widest uppercase font-semibold mt-0.5">Layanan Online Transparan</p>
                    </div>
                    <!-- Close button -->
                    <button onclick="closeFileFormPanel()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors focus:outline-none cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Form Content -->
                <div class="p-6 space-y-4">
                    <div class="bg-brand-green-50/50 border border-brand-green-100 p-3.5 rounded-xl text-[11px] text-brand-green-800 font-semibold leading-relaxed">
                        Kelompok Aktif: <span id="active-kel-display-title" class="text-slate-800 font-bold"></span>
                    </div>

                    <input type="hidden" id="file-kel-index">

                    <div class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul File / Halaman</label>
                            <input type="text" id="file-title" placeholder="Contoh: Visi & Misi PPID..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                        </div>

                        <div class="space-y-1.5" id="file-type-container">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Tipe Tautan</label>
                            <select id="file-type" onchange="toggleFileTypeInput(this.value)" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                                <option value="" disabled selected>Pilih Tipe Tautan...</option>
                                <option value="PDF">Unduhan PDF (Upload)</option>
                                <option value="Link">Link</option>
                            </select>
                        </div>

                        <div class="space-y-1.5" id="file-url-container">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Link URL</label>
                            <input type="text" id="file-url" placeholder="Masukkan URL link (contoh: https://...)" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none">
                        </div>

                        <!-- PDF Upload Section -->
                        <div class="space-y-1.5 hidden" id="file-pdf-upload-container">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Dokumen Lampiran (PDF)</label>
                            <div class="flex items-center space-x-3">
                                <label class="px-4 py-2.5 bg-white border border-slate-200 hover:bg-brand-green-50 text-slate-700 rounded-xl text-xs font-bold cursor-pointer transition-colors shadow-sm inline-block">
                                    Pilih PDF
                                    <input type="file" id="file-pdf-uploader" class="hidden" accept=".pdf" onchange="uploadBerkasFile(this)">
                                </label>
                                <span class="text-[10px] text-slate-400 font-medium" id="file-upload-status">Belum ada file diunggah.</span>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-2 pt-4 border-t border-slate-100">
                            <button type="button" onclick="closeFileFormPanel()" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-all cursor-pointer">
                                Batal
                            </button>
                            <button type="button" onclick="saveFileItem()" class="px-5 py-2.5 bg-brand-green-600 hover:bg-brand-green-700 text-white rounded-xl text-xs font-bold transition-all shadow-md cursor-pointer flex items-center space-x-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                <span id="save-file-btn-text">Tambahkan Berkas</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN JAVASCRIPT LOGIC -->
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
        const defaultKelompok = [
            {
                "title": "Profil PPID Universitas Baiturrahmah",
                "category": "profil",
                "badge_type": "Halaman",
                "description": "Daftar Informasi Profil PPID Universitas Baiturrahmah:",
                "link_url": "",
                "link_label": "",
                "files": [
                    { "title": "Profil", "url": "/profil", "type": "Halaman" },
                    { "title": "Visi Misi", "url": "/visi-misi", "type": "Halaman" },
                    { "title": "Tugas Fungsi dan Ruang Lingkup Kegiatan", "url": "/tugas-fungsi", "type": "Halaman" },
                    { "title": "Struktur Organisasi", "url": "/struktur-organisasi", "type": "Halaman" },
                    { "title": "Profile Pimpinan Perguruan Tinggi dan Pejabat Struktural", "url": "https://unbrah.ac.id/profil/pimpinan", "type": "Link" }
                ]
            },
            {
                "title": "Pendaftaran Mahasiswa Baru (SPMB)",
                "category": "profil",
                "badge_type": "Halaman",
                "description": "Portal informasi penerimaan mahasiswa baru tahun akademik berjalan untuk sarjana, diploma, dan profesi.",
                "link_url": "https://spmb.unbrah.ac.id/",
                "link_label": "Daftar Sekarang",
                "files": []
            }
        ];

        let kelompokItems = [];
        let editingKelompokIndex = null;
        let editingFileIndex = null;

        try {
            const rawData = {!! json_encode(setting('informasi_berkala_list')) !!};
            if (rawData) {
                kelompokItems = JSON.parse(rawData);
            } else {
                kelompokItems = defaultKelompok;
            }
        } catch(e) {
            kelompokItems = defaultKelompok;
        }

        const categoryLabelMap = {
            'profil': 'Profil & Akademik',
            'lppm': 'Penelitian & LPPM',
            'kinerja': 'Kinerja & Regulasi',
            'layanan': 'Layanan & Laporan'
        };

        let expandedIndices = {};
        let isDirty = false;

        // Render Kelompok List Cards
        function renderKelompokList() {
            const container = document.getElementById('kelompok-list-container');
            const input = document.getElementById('informasi_berkala_list_input');
            if (!container || !input) return;

            input.value = JSON.stringify(kelompokItems);
            container.innerHTML = '';

            if (kelompokItems.length === 0) {
                container.innerHTML = `
                    <div class="p-8 text-center text-xs text-slate-400 font-medium bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        Belum ada Kelompok Informasi yang ditambahkan. Silakan klik tombol "Tambah Kelompok".
                    </div>
                `;
                return;
            }

            kelompokItems.forEach((kel, index) => {
                const cardEl = document.createElement('div');
                cardEl.className = "bg-slate-50 border border-slate-200/70 rounded-2xl p-5 space-y-4 hover:border-slate-300 transition-all duration-200 shadow-sm";

                // Check expanded state
                const isExpanded = expandedIndices[index] ? '' : 'hidden';
                const arrowRotate = expandedIndices[index] ? 'rotate-180' : '';

                // Render File / Link sub-items inside
                let filesHtml = '';
                if (kel.files && kel.files.length > 0) {
                    filesHtml = `
                        <div class="space-y-2">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Tautan Dokumen / File:</span>
                            <div class="bg-white rounded-xl border border-slate-200/50 p-3 space-y-2">
                                ${kel.files.map((file, fIndex) => `
                                    <div class="flex items-center justify-between text-xs p-2.5 bg-slate-50/50 rounded-lg hover:bg-slate-50 transition-colors">
                                        <div class="flex items-center space-x-2.5">
                                            <span class="px-2 py-0.5 bg-brand-green-50 text-brand-green-700 text-[9px] font-bold rounded">
                                                ${escapeHtml(file.type)}
                                            </span>
                                            <span class="font-bold text-slate-700">${escapeHtml(file.title)}</span>
                                            <span class="text-[10px] text-slate-400 font-light truncate max-w-[300px] sm:max-w-md">(${escapeHtml(file.url)})</span>
                                        </div>
                                        <div class="flex items-center space-x-1">
                                            <button type="button" onclick="event.stopPropagation(); editFileItem(${index}, ${fIndex})" class="p-1 rounded text-brand-green-600 hover:bg-brand-green-50 transition-colors cursor-pointer" title="Edit File">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            <button type="button" onclick="event.stopPropagation(); deleteFileItem(${index}, ${fIndex})" class="p-1 rounded text-rose-500 hover:bg-rose-50 transition-colors cursor-pointer" title="Hapus File">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    `;
                } else {
                    filesHtml = `
                        <div class="space-y-1">
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Tautan Dokumen / File:</span>
                            <div class="text-[11px] text-slate-400 font-medium italic pl-1">Belum ada lampiran file.</div>
                        </div>
                    `;
                }

                const actionLinkHtml = kel.link_url 
                    ? `<div class="text-xs text-slate-500 font-semibold pl-1">
                         Tautan Langsung: <a href="${kel.link_url}" target="_blank" class="text-brand-green-600 font-bold underline hover:text-brand-green-800">${escapeHtml(kel.link_label || 'Buka Link')}</a>
                       </div>`
                    : '';

                cardEl.innerHTML = `
                    <div class="flex items-center justify-between gap-4 cursor-pointer select-none" onclick="toggleKelompokAccordion(${index})">
                        <div class="space-y-1">
                            <div class="flex items-center space-x-2 flex-wrap gap-y-1">
                                <span class="bg-brand-green-700 text-white font-bold px-2 py-0.5 rounded-lg text-[10px]">
                                    ${(index + 1).toString().padStart(2, '0')}
                                </span>
                                <h4 class="font-bold text-slate-800 text-sm">${escapeHtml(kel.title)}</h4>
                            </div>
                            <p class="text-[11px] text-slate-500 leading-relaxed pt-1">${escapeHtml(kel.description || '-')}</p>
                        </div>
                        
                        <div class="flex items-center space-x-2 shrink-0" onclick="event.stopPropagation();">
                            <button type="button" onclick="editKelompokItem(${index})" class="p-1.5 rounded-lg text-brand-green-600 hover:bg-brand-green-100/50 transition-colors cursor-pointer" title="Edit Kelompok">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                            <button type="button" onclick="deleteKelompokItem(${index})" class="p-1.5 rounded-lg text-rose-500 hover:bg-rose-50 transition-colors cursor-pointer" title="Hapus Kelompok">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                            <button type="button" onclick="event.stopPropagation(); toggleKelompokAccordion(${index});" class="p-1.5 rounded-lg text-slate-400 hover:bg-slate-200 transition-colors cursor-pointer" title="Toggle Detail">
                                <svg id="kel-arrow-${index}" class="w-5 h-5 transform transition-transform duration-300 ${arrowRotate}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                        </div>
                    </div>

                    <div id="kel-content-${index}" class="${isExpanded} pt-4 border-t border-slate-200 space-y-4">
                        ${actionLinkHtml}
                        ${filesHtml}

                        <div class="flex justify-end pt-1">
                            <button type="button" onclick="openFileFormPanel(${index})" class="text-xs font-bold text-brand-green-700 hover:text-brand-green-900 hover:bg-brand-green-50/50 px-3 py-1.5 rounded-lg flex items-center space-x-1.5 transition-all border border-brand-green-200/50 cursor-pointer whitespace-nowrap">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                <span>Tambah File/Tautan</span>
                            </button>
                        </div>
                    </div>
                `;

                container.appendChild(cardEl);
            });
        }

        // Toggle Kelompok Dropdown/Accordion
        function toggleKelompokAccordion(index) {
            const content = document.getElementById(`kel-content-${index}`);
            const arrow = document.getElementById(`kel-arrow-${index}`);
            if (!content || !arrow) return;

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                arrow.classList.add('rotate-180');
                expandedIndices[index] = true;
            } else {
                content.classList.add('hidden');
                arrow.classList.remove('rotate-180');
                expandedIndices[index] = false;
            }
        }

        // Open Kelompok Modal
        function createNewKelompok() {
            cancelKelompokEdit();
            
            const modal = document.getElementById('kelompok-modal');
            const container = document.getElementById('kelompok-modal-container');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        // Close Kelompok Modal
        function closeKelompokModal() {
            const modal = document.getElementById('kelompok-modal');
            const container = document.getElementById('kelompok-modal-container');
            
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Add / Update Kelompok
        function saveKelompokItem() {
            const title = document.getElementById('kel-title').value.trim();
            const category = 'profil';
            const badge_type = '';
            const description = document.getElementById('kel-desc').value.trim();
            const link_url = document.getElementById('kel-link-url').value.trim();
            const link_label = document.getElementById('kel-link-label').value.trim();

            if (!title) {
                showErrorModalPopup('Gagal Menyimpan', 'Judul Kelompok Informasi wajib diisi.');
                return;
            }

            if (editingKelompokIndex !== null) {
                const existingFiles = kelompokItems[editingKelompokIndex].files || [];
                kelompokItems[editingKelompokIndex] = {
                    title,
                    category,
                    badge_type,
                    description,
                    link_url,
                    link_label,
                    files: existingFiles
                };
                cancelKelompokEdit();
                closeKelompokModal();
                renderKelompokList();
                saveToServerAsync("Berhasil Diperbarui", "Kelompok informasi telah berhasil diperbarui di database.");
            } else {
                kelompokItems.push({
                    title,
                    category,
                    badge_type,
                    description,
                    link_url,
                    link_label,
                    files: []
                });
                closeKelompokModal();
                renderKelompokList();
                saveToServerAsync("Berhasil Ditambahkan", "Kelompok informasi baru telah berhasil disimpan ke database.");
            }
        }

        // Edit Kelompok item mode
        function editKelompokItem(index) {
            const item = kelompokItems[index];
            if (!item) return;

            editingKelompokIndex = index;
            document.getElementById('kel-title').value = item.title;
            document.getElementById('kel-desc').value = item.description || '';
            document.getElementById('kel-link-url').value = item.link_url || '';
            document.getElementById('kel-link-label').value = item.link_label || '';

            document.getElementById('form-kelompok-title').innerText = "Form Edit Kelompok";
            document.getElementById('save-kel-btn-text').innerText = "Simpan Kelompok";

            // Open Modal
            const modal = document.getElementById('kelompok-modal');
            const container = document.getElementById('kelompok-modal-container');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function cancelKelompokEdit() {
            editingKelompokIndex = null;
            document.getElementById('kel-title').value = '';
            document.getElementById('kel-desc').value = '';
            document.getElementById('kel-link-url').value = '';
            document.getElementById('kel-link-label').value = '';

            document.getElementById('form-kelompok-title').innerText = "Form Tambah Kelompok";
            document.getElementById('save-kel-btn-text').innerText = "Simpan Kelompok";
        }

        function deleteKelompokItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus kelompok ini beserta seluruh berkas di dalamnya?')) {
                if (editingKelompokIndex === index) {
                    cancelKelompokEdit();
                }
                kelompokItems.splice(index, 1);
                closeFileFormPanel();
                renderKelompokList();
                saveToServerAsync("Berhasil Dihapus", "Kelompok informasi telah berhasil dihapus dari database.");
            }
        }

        // Sub-files/links modal handlers
        function openFileFormPanel(kIndex) {
            const kel = kelompokItems[kIndex];
            if (!kel) return;

            editingFileIndex = null;

            document.getElementById('file-kel-index').value = kIndex;
            document.getElementById('active-kel-display-title').innerText = kel.title;

            // Reset inputs
            document.getElementById('file-title').value = '';
            document.getElementById('file-type').value = '';
            document.getElementById('file-url').value = '';
            document.getElementById('file-pdf-uploader').value = '';
            document.getElementById('file-upload-status').innerText = "Belum ada file diunggah.";
            document.getElementById('file-upload-status').className = "text-[10px] text-slate-400 font-medium";

            document.getElementById('form-file-title').innerText = "Tambah File ke Kelompok";
            document.getElementById('save-file-btn-text').innerText = "Tambahkan Berkas";

            toggleFileTypeInput('');

            // Open Modal
            const modal = document.getElementById('file-modal');
            const container = document.getElementById('file-modal-container');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function editFileItem(kIndex, fIndex) {
            const kel = kelompokItems[kIndex];
            if (!kel || !kel.files || !kel.files[fIndex]) return;

            const file = kel.files[fIndex];
            editingFileIndex = fIndex;

            document.getElementById('file-kel-index').value = kIndex;
            document.getElementById('active-kel-display-title').innerText = kel.title;

            document.getElementById('file-title').value = file.title;
            
            let fileType = file.type;
            if (fileType === 'Halaman') {
                fileType = 'Link';
            }
            document.getElementById('file-type').value = fileType;
            document.getElementById('file-url').value = file.url;
            document.getElementById('file-pdf-uploader').value = '';
            
            if (file.type === 'PDF' && file.url.startsWith('/uploads/')) {
                document.getElementById('file-upload-status').innerText = "File terunggah: " + file.url.split('/').pop();
                document.getElementById('file-upload-status').className = "text-[10px] text-emerald-600 font-semibold";
            } else {
                document.getElementById('file-upload-status').innerText = "Belum ada file baru diunggah.";
                document.getElementById('file-upload-status').className = "text-[10px] text-slate-400 font-medium";
            }

            document.getElementById('form-file-title').innerText = "Edit File/Tautan";
            document.getElementById('save-file-btn-text').innerText = "Simpan Perubahan Berkas";

            toggleFileTypeInput(fileType);

            // Open Modal
            const modal = document.getElementById('file-modal');
            const container = document.getElementById('file-modal-container');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function closeFileFormPanel() {
            const modal = document.getElementById('file-modal');
            const container = document.getElementById('file-modal-container');
            
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function toggleFileTypeInput(type) {
            const pdfContainer = document.getElementById('file-pdf-upload-container');
            const urlContainer = document.getElementById('file-url-container');
            const urlInput = document.getElementById('file-url');
            
            if (type === 'PDF') {
                pdfContainer.classList.remove('hidden');
                urlContainer.classList.add('hidden');
                if (urlInput && urlInput.value === '#') {
                    urlInput.value = '';
                }
            } else if (type === 'Link') {
                pdfContainer.classList.add('hidden');
                urlContainer.classList.remove('hidden');
                if (urlInput && urlInput.value === '#') {
                    urlInput.value = '';
                }
            } else {
                pdfContainer.classList.add('hidden');
                urlContainer.classList.add('hidden');
            }
        }

        // AJAX PDF Upload logic
        function uploadBerkasFile(input) {
            const file = input.files[0];
            const statusEl = document.getElementById('file-upload-status');
            const urlEl = document.getElementById('file-url');
            
            if (!file) return;

            // Check file size (10 MB = 10 * 1024 * 1024 bytes)
            const maxSize = 10 * 1024 * 1024;
            if (file.size > maxSize) {
                showErrorModalPopup('Ukuran Berkas Terlalu Besar', 'Berkas PDF yang Anda pilih berukuran ' + (file.size / 1024 / 1024).toFixed(2) + ' MB. Batas maksimum ukuran berkas yang diperbolehkan adalah 10 MB.');
                input.value = '';
                statusEl.innerText = "Gagal: Berkas melebihi 10MB.";
                statusEl.className = "text-[10px] text-rose-500 font-semibold";
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

        function saveFileItem() {
            const kIndex = parseInt(document.getElementById('file-kel-index').value);
            const titleInput = document.getElementById('file-title');
            const typeInput = document.getElementById('file-type');
            const urlInput = document.getElementById('file-url');

            if (isNaN(kIndex) || !kelompokItems[kIndex]) return;

            const title = titleInput.value.trim();
            const type = typeInput.value;
            const url = urlInput.value.trim();

            if (!type) {
                showErrorModalPopup('Gagal Menyimpan', 'Tipe Tautan wajib dipilih.');
                return;
            }

            if (!title) {
                showErrorModalPopup('Gagal Menyimpan', 'Judul berkas wajib diisi.');
                return;
            }

            if (type === 'Link' && !url) {
                showErrorModalPopup('Gagal Menyimpan', 'Link URL wajib diisi.');
                return;
            }

            if (type === 'PDF' && !url) {
                showErrorModalPopup('Gagal Menyimpan', 'Silakan unggah dokumen PDF terlebih dahulu.');
                return;
            }

            if (!kelompokItems[kIndex].files) {
                kelompokItems[kIndex].files = [];
            }

            if (editingFileIndex !== null) {
                kelompokItems[kIndex].files[editingFileIndex] = { title, type, url };
                editingFileIndex = null;
                closeFileFormPanel();
                renderKelompokList();
                saveToServerAsync("Berkas Disimpan", "Perubahan dokumen/link telah berhasil disimpan ke database.");
            } else {
                kelompokItems[kIndex].files.push({ title, type, url });
                closeFileFormPanel();
                renderKelompokList();
                saveToServerAsync("Berkas Ditambahkan", "Dokumen/link baru telah berhasil ditambahkan ke database.");
            }
        }

        function deleteFileItem(kIndex, fIndex) {
            if (confirm('Apakah Anda yakin ingin menghapus berkas ini dari kelompok?')) {
                if (kelompokItems[kIndex] && kelompokItems[kIndex].files) {
                    kelompokItems[kIndex].files.splice(fIndex, 1);
                    renderKelompokList();
                    saveToServerAsync("Berkas Dihapus", "Dokumen/link telah berhasil dihapus dari database.");
                }
            }
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
            const input = document.getElementById("informasi_berkala_list_input");
            if (input) {
                input.value = JSON.stringify(kelompokItems);
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
        renderKelompokList();
    </script>
</body>
</html>
