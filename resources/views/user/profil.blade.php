@extends('layouts.frontend')

@section('title', 'Profil PPID')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Profil PPID <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Portal Informasi Resmi Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah Padang untuk mewujudkan pelayanan publik yang cepat, transparan, dan akuntabel.
            </p>
        </div>
    </section>

    <!-- SEKILAS PPID SECTION -->
    <section class="py-20 max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Text Content -->
            <div class="space-y-6">
                <div class="flex items-center space-x-2 text-brand-green-600 font-bold text-xs uppercase tracking-widest">
                    <span class="w-8 h-[2px] bg-brand-green-500 inline-block"></span>
                    <span>Sejarah & Dasar Pembentukan</span>
                </div>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold font-display text-slate-900 leading-tight">
                    {{ setting('profil_judul', 'Mendukung Keterbukaan Informasi Publik di Lingkungan Kampus') }}
                </h2>
                <p class="text-slate-600 text-sm md:text-base leading-relaxed text-justify">
                    {!! nl2br(e(setting('profil_deskripsi', "Lahir dari amanat Undang-Undang No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik (UU KIP), Pejabat Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah berkomitmen penuh dalam mengedepankan transparansi tata kelola kampus.\n\nMelalui pembentukan wadah ini, masyarakat umum, mahasiswa, dosen, serta pemangku kepentingan dapat dengan mudah mengakses informasi resmi institusi secara legal, profesional, dan akuntabel. Kami senantiasa berbenah mengintegrasikan teknologi digital guna melayani kebutuhan dokumen publik dengan waktu tanggap yang optimal."))) !!}
                </p>
            </div>
            
            <!-- Graphic / Mockup (Aesthetic Card) -->
            <div class="relative bg-gradient-to-br from-brand-green-900 to-brand-green-950 p-8 rounded-3xl shadow-2xl border border-brand-gold-500/20 text-white overflow-hidden group">
                <div class="absolute -right-16 -bottom-16 w-44 h-44 bg-brand-gold-500/10 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                <div class="relative z-10 space-y-6">
                    <div class="w-12 h-12 rounded-2xl bg-brand-gold-500 text-brand-green-950 flex items-center justify-center font-bold text-xl shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11V5a2 2 0 00-2-2H4a2 2 0 00-2 2v6a12 12 0 004.538 9.387m12.822-.099A13.915 13.915 0 0019 11V5a2 2 0 00-2-2h-3a2 2 0 00-2 2v6a12 12 0 004.538 9.387m-4.538-2.677L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold font-display text-brand-gold-500">Asas Utama Layanan PPID</h3>
                    <ul class="space-y-3 text-sm text-slate-300 font-light">
                        <li class="flex items-center space-x-3">
                            <span class="w-2 h-2 rounded-full bg-brand-gold-500"></span>
                            <span><strong>Cepat:</strong> Pemrosesan permohonan informasi sesegera mungkin.</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <span class="w-2 h-2 rounded-full bg-brand-gold-500"></span>
                            <span><strong>Tepat Waktu:</strong> Kepastian penyelesaian maksimal 10 hari kerja.</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <span class="w-2 h-2 rounded-full bg-brand-gold-500"></span>
                            <span><strong>Biaya Ringan:</strong> Tanpa biaya administrasi (gratis / fotokopi ditanggung pemohon).</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <span class="w-2 h-2 rounded-full bg-brand-gold-500"></span>
                            <span><strong>Proporsional:</strong> Menyeimbangkan hak pemohon dan informasi yang dikecualikan.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER SECTION -->
@endsection
