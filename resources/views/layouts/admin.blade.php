<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | PPID Universitas Baiturrahmah</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Meta SEO -->
    <meta name="description" content="Dashboard Administrasi Internal PPID Universitas Baiturrahmah.">
    <meta name="author" content="Universitas Baiturrahmah">
    
    <!-- Favicon -->
    <link class="favicon" rel="icon" type="image/png" href="/images/logo_unbrah.png">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js (Local Offline) -->
    <script defer src="/js/alpine.js"></script>
    
    <!-- SweetAlert2 (Local Offline) -->
    <script src="/js/sweetalert2.js"></script>
    
    @yield('styles')
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased overflow-x-hidden">

    <!-- ADMIN LAYOUT WRAPPER -->
    <div class="flex min-h-screen">

        <!-- SIDEBAR (Desktop & Mobile) -->
        <aside id="admin-sidebar" class="w-64 bg-brand-green-950 text-slate-300 flex-shrink-0 flex flex-col justify-between transition-all duration-300 z-30 fixed top-0 bottom-0 left-0 -translate-x-full lg:translate-x-0 h-screen shadow-2xl">
            <div class="flex flex-col flex-1 min-h-0 overflow-hidden">
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
                <nav class="p-4 space-y-1.5 text-xs font-semibold flex-1 overflow-y-auto min-h-0">
                    <span class="block px-3 py-2 text-[10px] text-brand-green-600 uppercase tracking-widest font-bold">Menu Utama</span>
                    
                    <!-- Dashboard -->
                    <a href="/admin" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path></svg>
                        <span>Dashboard Utama</span>
                    </a>

                    @if(in_array($adminUser->role, ['admin', 'petugas']))
                    <!-- Slide Show -->
                    <a href="/admin/slide-show" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/slide-show*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Slide Show</span>
                    </a>
                    @endif

                    <span class="block px-3 py-2 text-[10px] text-brand-green-600 uppercase tracking-widest font-bold pt-4">Permohonan</span>

                    <a href="/admin/permohonan" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/permohonan*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Permohonan Informasi</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-permohonan">{{ $globalSidebarCounts['permohonan'] ?? 0 }}</span>
                    </a>

                    <a href="/admin/keberatan" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/keberatan*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span class="flex-1">Keberatan Informasi</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-keberatan">{{ $globalSidebarCounts['keberatan'] ?? 0 }}</span>
                    </a>

                    <a href="/admin/penyalahgunaan" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/penyalahgunaan*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
                        <span class="flex-1">Penyalahgunaan Wewenang</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-penyalahgunaan">{{ $globalSidebarCounts['penyalahgunaan'] ?? 0 }}</span>
                    </a>

                    <a href="/admin/pengaduan" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/pengaduan*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        <span class="flex-1">Pengaduan Layanan</span>
                        <span class="bg-brand-green-700/60 text-slate-200 text-[10px] px-2 py-0.5 rounded-full" id="sidebar-count-pengaduan">{{ $globalSidebarCounts['pengaduan'] ?? 0 }}</span>
                    </a>

                    @if(in_array($adminUser->role, ['admin', 'petugas']))
                    <span class="block px-3 py-2 text-[10px] text-brand-green-600 uppercase tracking-widest font-bold pt-4">Dokumen Profil</span>

                    <!-- Kelola Tentang -->
                    <a href="/admin/tentang" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/tentang*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="flex-1">Kelola Tentang</span>
                    </a>

                    <!-- Kelola Profil PPID -->
                    <a href="/admin/profil-ppid" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/profil-ppid*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Kelola Profil PPID</span>
                    </a>

                    <!-- Agenda Kegiatan -->
                    <a href="/admin/agenda-kegiatan" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/agenda-kegiatan*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="flex-1">Agenda Kegiatan</span>
                    </a>

                    <!-- Informasi Publik Berkala -->
                    <a href="/admin/informasi-publik-berkala" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/informasi-publik-berkala*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Publik Berkala</span>
                    </a>

                    <!-- Informasi Serta Merta -->
                    <a href="/admin/informasi-serta-merta" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/informasi-serta-merta*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Serta Merta</span>
                    </a>

                    <!-- Informasi Tersedia Setiap Saat -->
                    <a href="/admin/informasi-tersedia-setiap-saat" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/informasi-tersedia-setiap-saat*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="flex-1">Informasi Tersedia Setiap Saat</span>
                    </a>

                    <!-- Kelola Galeri PPID -->
                    <a href="/admin/galeri" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/galeri*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="flex-1">Kelola Galeri PPID</span>
                    </a>

                    <!-- Kelola Dokumen -->
                    <a href="/admin/dokumen" class="flex items-center space-x-3 px-3 py-3 rounded-lg transition-all {{ request()->is('admin/dokumen*') ? 'bg-brand-green-900/60 text-brand-gold-500 border-l-4 border-brand-gold-500' : 'text-slate-400 hover:bg-brand-green-900/40 hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                        <span class="flex-1">Kelola Dokumen</span>
                    </a>
                    @endif

                </nav>
            </div>

            <!-- Profile Info Footer in Sidebar with Logout Button -->
            <div class="p-4 border-t border-brand-green-900 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <!-- Green online pulsing dot -->
                        <span class="absolute bottom-0 right-0 w-2.5 h-2.5 rounded-full bg-emerald-500 border border-brand-green-950 animate-pulse"></span>
                        <div class="w-9 h-9 rounded-full bg-brand-gold-500/20 text-brand-gold-500 flex items-center justify-center font-bold text-xs uppercase">
                            {{ $adminUser->initials }}
                        </div>
                    </div>
                    <div class="flex flex-col text-left">
                        <span class="text-xs font-bold text-white leading-tight">{{ $adminUser->name }}</span>
                        <span class="text-[9px] text-slate-500 uppercase tracking-wider">
                            @if($adminUser->role === 'admin')
                                Super Admin
                            @elseif($adminUser->role === 'petugas')
                                Petugas PPID
                            @else
                                Pimpinan
                            @endif
                        </span>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="p-1.5 rounded-lg hover:bg-brand-green-900 text-slate-400 hover:text-rose-400 cursor-pointer transition-colors" title="Keluar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </button>
                </form>
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
                    
                    @yield('header-left')
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Live time / date (Desktop) -->
                    <span class="text-xs text-slate-500 font-semibold hidden md:inline-block" id="live-date"></span>
                    
                    <!-- Notification Bell -->
                    <button class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-50 rounded-lg transition-colors cursor-pointer">
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-rose-500"></span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>

                    <!-- Profile avatar -->
                    <div class="w-8 h-8 rounded-full bg-brand-green-700 text-white flex items-center justify-center font-bold text-xs uppercase cursor-pointer">
                        {{ $adminUser->initials }}
                    </div>
                </div>
            </header>

            <!-- MAIN CONTENT AREA -->
            <main class="p-6 space-y-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Toggle Sidebar Script -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // Clock Script
        function updateLiveDate() {
            const dateSpan = document.getElementById('live-date');
            if (dateSpan) {
                const now = new Date();
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
                dateSpan.innerText = now.toLocaleDateString('id-ID', options);
            }
        }
        document.addEventListener('DOMContentLoaded', () => {
            updateLiveDate();
            setInterval(updateLiveDate, 60000);
        });
    </script>
    @yield('scripts')
</body>
</html>
