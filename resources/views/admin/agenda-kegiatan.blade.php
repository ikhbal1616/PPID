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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Agenda Kegiatan | Admin PPID Universitas Baiturrahmah</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta SEO -->
    <meta name="description" content="Kelola konten agenda, jadwal kegiatan, dan timeline beranda secara dinamis.">
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

                    <!-- Agenda Kegiatan (Active Style) -->
                    <a href="/admin/agenda-kegiatan" class="flex items-center space-x-3 bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500 px-3 py-3 rounded-lg transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Agenda Kegiatan</span>
                    </a>

                    <span class="block px-3 py-2 text-[10px] text-brand-green-600 uppercase tracking-widest font-bold pt-4">Permohonan</span>

                    <a href="/admin/permohonan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Permohonan Informasi Publik</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-permohonan">0</span>
                    </a>

                    <a href="/admin/keberatan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span class="flex-1">Keberatan Informasi Publik</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-keberatan">0</span>
                    </a>

                    <a href="/admin/penyalahgunaan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                        <span class="flex-1">Penyalahgunaan Wewenang</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-penyalahgunaan">0</span>
                    </a>

                    <a href="/admin/pengaduan" class="flex items-center space-x-3 hover:bg-brand-green-900/40 hover:text-white px-3 py-3 rounded-lg transition-all text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span class="flex-1">Pengaduan Layanan Kampus</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-pengaduan">0</span>
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
                    <div class="w-9 h-9 rounded-full bg-brand-gold-500/20 text-brand-gold-500 flex items-center justify-center font-bold text-xs uppercase font-display">
                        SA
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-xs font-bold text-white leading-tight">Admin PPID</span>
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
                    <span class="text-xs text-slate-500 font-semibold hidden md:inline-block" id="live-date">Selasa, 30 Juni 2026</span>
                    <!-- Profile avatar -->
                    <div class="w-8 h-8 rounded-full bg-brand-green-700 text-white flex items-center justify-center font-bold text-xs uppercase cursor-pointer">
                        SA
                    </div>
                </div>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="p-6 space-y-6">

                <!-- HEADER SUMMARY -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Agenda Kegiatan (Halaman Utama)</h1>
                        <p class="text-slate-500 text-xs mt-1">Perbarui judul utama, deskripsi pengantar, dan daftar timeline kartu kegiatan secara interaktif.</p>
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
                    <form action="{{ route('admin.agenda-kegiatan.update') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 md:p-8 space-y-8">
                        @csrf
                        
                        <!-- HIDDEN SERIALIZED DATA INPUT -->
                        <input type="hidden" name="agenda_kegiatan_list" id="agenda-kegiatan-list-input" value="{{ json_encode($agendas) }}">

                        <!-- CONTENT CONTAINER -->
                        <div class="space-y-8">

                            <!-- SECTION 1: NARASI UTAMA -->
                            <div class="space-y-6">
                                <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">1. Konten Teks & Narasi Utama</h3>
                                <div class="space-y-4">
                                    <div class="space-y-2">
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Judul Utama Agenda</label>
                                        <input type="text" name="agenda_kegiatan_title" value="{{ setting('agenda_kegiatan_title', 'Timeline & Jadwal Aktivitas PPID') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Deskripsi Singkat / Narasi</label>
                                        <textarea name="agenda_kegiatan_desc" rows="4" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-y" required>{{ setting('agenda_kegiatan_desc', 'Ikuti jadwal pelaksanaan kegiatan, sosialisasi, dan monitoring keterbukaan informasi publik terbaru dari kami.') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- SECTION 2: DAFTAR AGENDA (LIST / TABLE VIEW WITH MODAL) -->
                            <div class="space-y-6 pt-4">
                                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                    <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider">2. Daftar Agenda Timeline</h3>
                                    <!-- Add New button opens empty modal -->
                                    <button type="button" onclick="openAgendaModal(-1)" class="px-4 py-2 bg-brand-green-700 hover:bg-brand-green-800 text-white text-xs font-bold rounded-xl transition-all cursor-pointer flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                        <span>Tambah Kegiatan Baru</span>
                                    </button>
                                </div>

                                <!-- Responsive Table Layout -->
                                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                                    <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
                                        <thead class="bg-slate-50 font-bold uppercase text-[10px] tracking-wider text-slate-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4 w-[5%]">No</th>
                                                <th scope="col" class="px-6 py-4 w-[15%]">Tanggal</th>
                                                <th scope="col" class="px-6 py-4 w-[25%]">Nama Kegiatan</th>
                                                <th scope="col" class="px-6 py-4 w-[15%]">Lokasi</th>
                                                <th scope="col" class="px-6 py-4 w-[30%]">Deskripsi Singkat</th>
                                                <th scope="col" class="px-6 py-4 w-[10%] text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-200 bg-white" id="agenda-table-body">
                                            <!-- Dynamically filled by Javascript -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!-- SUBMIT BUTTON -->
                        <div class="pt-6 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-6 py-3.5 bg-brand-green-700 hover:bg-brand-green-800 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform active:scale-[0.98] flex items-center space-x-2 text-xs cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                <span>Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>

            </main>

        </div>

    </div>

    <!-- POP-UP MODAL EDIT/ADD FORM -->
    <div id="agenda-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeAgendaModal()"></div>
        
        <!-- Modal Content Container -->
        <div class="relative bg-white rounded-3xl max-w-lg w-full p-6 md:p-8 space-y-4 shadow-2xl z-10 mx-4 transform transition-all scale-95 opacity-0 duration-300" id="modal-container">
            <button type="button" onclick="closeAgendaModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <h3 class="text-base font-bold text-slate-850 uppercase tracking-wider border-b border-slate-100 pb-3" id="modal-title">Edit Agenda Kegiatan</h3>
            
            <div class="space-y-3 pt-2">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Tanggal Kegiatan</label>
                        <input type="text" id="modal-input-date" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required placeholder="Contoh: 15 Juli 2026">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Lokasi Kegiatan</label>
                        <input type="text" id="modal-input-location" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required placeholder="Contoh: Aula Kampus">
                    </div>
                </div>
                
                <div class="space-y-1">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Nama/Judul Kegiatan</label>
                    <input type="text" id="modal-input-title" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required placeholder="Contoh: Sosialisasi UU KIP">
                </div>

                <div class="space-y-1">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Deskripsi Singkat</label>
                    <textarea id="modal-input-desc" rows="3" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none resize-y" required placeholder="Contoh: Deskripsi singkat tentang agenda."></textarea>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
                <button type="button" onclick="closeAgendaModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold rounded-xl transition-all cursor-pointer">Batal</button>
                <button type="button" onclick="saveAgendaModal()" class="px-4 py-2 bg-brand-green-700 hover:bg-brand-green-800 text-white text-xs font-bold rounded-xl transition-all cursor-pointer flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    <span>Simpan</span>
                </button>
            </div>
        </div>
    </div>

    <!-- GLOBAL JAVASCRIPT FOR SIDEBAR TOGGLE & DYNAMIC TIMELINE MANAGEMENT -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        window.addEventListener('DOMContentLoaded', () => {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('live-date').innerText = new Date().toLocaleDateString('id-ID', options);
            
            // Set dynamic sidebar counts
            const counts = {!! json_encode($sidebarCounts) !!};
            if (counts) {
                document.getElementById('sidebar-count-permohonan').innerText = counts.permohonan || 0;
                document.getElementById('sidebar-count-keberatan').innerText = counts.keberatan || 0;
                document.getElementById('sidebar-count-penyalahgunaan').innerText = counts.penyalahgunaan || 0;
                document.getElementById('sidebar-count-pengaduan').innerText = counts.pengaduan || 0;
            }

            // Render initial table rows
            renderAgendaTable();
        });



        // DYNAMIC AGENDA DATA & ACTIONS
        let agendas = {!! json_encode($agendas) !!};
        let currentEditIndex = -1;

        // Render Table Body
        function renderAgendaTable() {
            const tbody = document.getElementById('agenda-table-body');
            tbody.innerHTML = '';

            if (agendas.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-slate-400 font-semibold italic">
                            Tidak ada agenda kegiatan. Silakan tambah kegiatan baru.
                        </td>
                    </tr>
                `;
                return;
            }

            agendas.forEach((item, index) => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/60 transition-colors';
                tr.innerHTML = `
                    <td class="px-6 py-4 font-bold text-slate-500">${index + 1}</td>
                    <td class="px-6 py-4 font-bold text-brand-green-800 text-[11px] uppercase">${escapeHtml(item.date)}</td>
                    <td class="px-6 py-4 font-semibold text-slate-900">${escapeHtml(item.title)}</td>
                    <td class="px-6 py-4 font-bold text-slate-500 uppercase text-[10px] tracking-wider">${escapeHtml(item.location)}</td>
                    <td class="px-6 py-4 text-slate-500 max-w-xs truncate">${escapeHtml(item.desc)}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center space-x-2.5">
                            <button type="button" onclick="openAgendaModal(${index})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 hover:text-slate-800 transition-colors cursor-pointer" title="Edit Kegiatan">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                            <button type="button" onclick="deleteAgendaItem(${index})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 transition-colors cursor-pointer" title="Hapus Kegiatan">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            });

            // Update the hidden input field value
            document.getElementById('agenda-kegiatan-list-input').value = JSON.stringify(agendas);
        }

        // Open Modal (Index = -1 means add mode)
        function openAgendaModal(index) {
            currentEditIndex = index;
            const modal = document.getElementById('agenda-modal');
            const container = document.getElementById('modal-container');
            const title = document.getElementById('modal-title');
            
            // Inputs
            const inputDate = document.getElementById('modal-input-date');
            const inputLocation = document.getElementById('modal-input-location');
            const inputTitle = document.getElementById('modal-input-title');
            const inputDesc = document.getElementById('modal-input-desc');

            if (index === -1) {
                // Add mode
                title.innerText = 'Tambah Agenda Baru';
                inputDate.value = '';
                inputLocation.value = '';
                inputTitle.value = '';
                inputDesc.value = '';
            } else {
                // Edit mode
                title.innerText = `Edit Agenda Kegiatan #${index + 1}`;
                const data = agendas[index];
                inputDate.value = data.date;
                inputLocation.value = data.location;
                inputTitle.value = data.title;
                inputDesc.value = data.desc;
            }

            // Show Modal
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        // Close Modal
        function closeAgendaModal() {
            const modal = document.getElementById('agenda-modal');
            const container = document.getElementById('modal-container');

            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Save Modal Contents
        function saveAgendaModal() {
            const inputDate = document.getElementById('modal-input-date').value.trim();
            const inputLocation = document.getElementById('modal-input-location').value.trim();
            const inputTitle = document.getElementById('modal-input-title').value.trim();
            const inputDesc = document.getElementById('modal-input-desc').value.trim();

            if (!inputDate || !inputLocation || !inputTitle || !inputDesc) {
                alert('Semua bidang input wajib diisi!');
                return;
            }

            const item = {
                date: inputDate,
                location: inputLocation,
                title: inputTitle,
                desc: inputDesc
            };

            if (currentEditIndex === -1) {
                // Add Mode
                agendas.push(item);
            } else {
                // Edit Mode
                agendas[currentEditIndex] = item;
            }

            // Re-render
            renderAgendaTable();
            closeAgendaModal();
        }

        // Delete Item
        function deleteAgendaItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus agenda kegiatan ini?')) {
                agendas.splice(index, 1);
                renderAgendaTable();
            }
        }

        // Helper to escape HTML tags
        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }
    </script>
</body>
</html>
