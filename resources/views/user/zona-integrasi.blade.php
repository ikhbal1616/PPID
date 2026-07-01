@extends('layouts.frontend')

@section('title', 'Zona Integrasi')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Zona Integrasi (ZI) <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Wilayah Bebas Korupsi & Birokrasi Bersih</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Komitmen Universitas Baiturrahmah dalam mewujudkan tata kelola perguruan tinggi yang bersih, transparan, dan berkinerja tinggi.
            </p>
        </div>
    </section>

    <!-- MAIN ZI CONTENT -->
    <section class="py-20 bg-white text-slate-800 relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10 space-y-16">
            
            <!-- Intro Text -->
            <div class="max-w-3xl mx-auto text-center space-y-4">
                <span class="text-brand-green-600 font-bold text-xs uppercase tracking-widest">Reformasi Birokrasi</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold font-display text-slate-900 leading-tight">Pembangunan Zona Integrasi PPID</h2>
                <p class="text-slate-500 text-sm leading-relaxed font-light">
                    Zona Integrasi (ZI) adalah predikat yang diberikan kepada instansi pemerintah yang pimpinan dan jajarannya mempunyai komitmen untuk mewujudkan Wilayah Bebas dari Korupsi (WBK) dan Wilayah Birokrasi Bersih dan Melayani (WBBM) melalui reformasi birokrasi, khususnya dalam hal pencegahan korupsi dan peningkatan kualitas pelayanan publik.
                </p>
            </div>

            <!-- Framed Pledge / Declaration Certificate -->
            <div class="max-w-4xl mx-auto bg-gradient-to-br from-brand-green-900 to-brand-green-950 text-white rounded-3xl p-8 md:p-12 shadow-2xl relative border-4 border-brand-gold-500/30 overflow-hidden text-center space-y-6">
                <div class="absolute inset-4 border border-brand-gold-500/20 rounded-2xl pointer-events-none"></div>
                <div class="absolute -right-32 -top-32 w-80 h-80 bg-brand-gold-500/5 rounded-full pointer-events-none"></div>
                <div class="absolute -left-32 -bottom-32 w-80 h-80 bg-white/5 rounded-full pointer-events-none"></div>

                <div class="relative z-10 space-y-4 max-w-3xl mx-auto">
                    <div class="w-16 h-16 rounded-full bg-brand-gold-500 text-brand-green-950 flex items-center justify-center mx-auto shadow-2xl border-4 border-brand-green-950">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    
                    <span class="block text-brand-gold-500 font-bold text-xs uppercase tracking-widest">Pernyataan Komitmen Bersama</span>
                    <h3 class="text-xl sm:text-2xl font-bold font-display leading-tight tracking-tight border-b border-white/10 pb-4">
                        MAKLUMAT PEMBANGUNAN ZONA INTEGRASI
                    </h3>
                    
                    <p class="text-sm sm:text-base text-slate-200 font-light leading-relaxed italic px-4">
                        "Kami Pimpinan dan Seluruh Civitas Akademika Universitas Baiturrahmah berkomitmen membangun Zona Integrasi Menuju Wilayah Bebas dari Korupsi (WBK) dan Wilayah Birokrasi Bersih dan Melayani (WBBM) dengan mengedepankan integritas moral, peningkatan pelayanan yang prima, serta penegakan akuntabilitas kinerja tanpa pungutan liar."
                    </p>
                    
                    <div class="pt-4 flex flex-col items-center space-y-1">
                        <span class="text-[10px] text-slate-400 tracking-wider uppercase font-semibold">Tertanda,</span>
                        <span class="text-xs font-bold text-brand-gold-500">Rektor & Manajemen Universitas Baiturrahmah</span>
                    </div>
                </div>
            </div>

            <!-- ZI 6 Change Areas Section -->
            <div class="max-w-5xl mx-auto space-y-8 pt-8">
                <div class="text-center space-y-2">
                    <span class="text-brand-green-600 font-bold text-xs uppercase tracking-widest">Pilar Utama ZI</span>
                    <h3 class="text-2xl font-bold font-display text-slate-900">6 Area Perubahan Zona Integrasi</h3>
                    <p class="text-slate-500 text-xs sm:text-sm font-light max-w-2xl mx-auto">Untuk mensukseskan reformasi birokrasi, PPID Universitas Baiturrahmah membagi fokus kerja ke dalam 6 dimensi perubahan:</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Area 1 -->
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-brand-green-50 text-brand-green-900 flex items-center justify-center shadow-sm">
                            <span class="font-bold text-sm font-display">1</span>
                        </div>
                        <h4 class="font-bold text-slate-800 text-base">Manajemen Perubahan</h4>
                        <p class="text-slate-500 text-xs leading-relaxed font-light">
                            Mengubah sistem kerja, pola pikir (mindset), dan budaya kerja (culture set) organisasi menjadi lebih berorientasi pada pelayanan masyarakat dan integritas tinggi.
                        </p>
                    </div>

                    <!-- Area 2 -->
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-brand-green-50 text-brand-green-900 flex items-center justify-center shadow-sm">
                            <span class="font-bold text-sm font-display">2</span>
                        </div>
                        <h4 class="font-bold text-slate-800 text-base">Penataan Tatalaksana</h4>
                        <p class="text-slate-500 text-xs leading-relaxed font-light">
                            Meningkatkan efisiensi dan efektivitas sistem, proses, serta prosedur kerja yang jelas, efektif, efisien, dan terukur dengan mengintegrasikan teknologi digital.
                        </p>
                    </div>

                    <!-- Area 3 -->
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-brand-green-50 text-brand-green-900 flex items-center justify-center shadow-sm">
                            <span class="font-bold text-sm font-display">3</span>
                        </div>
                        <h4 class="font-bold text-slate-800 text-base">Penataan Sistem Manajemen SDM</h4>
                        <p class="text-slate-500 text-xs leading-relaxed font-light">
                            Meningkatkan profesionalisme, kedisiplinan, kompetensi, dan transparansi dalam pengelolaan sumber daya manusia di lingkungan PPID kampus.
                        </p>
                    </div>

                    <!-- Area 4 -->
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-brand-green-50 text-brand-green-900 flex items-center justify-center shadow-sm">
                            <span class="font-bold text-sm font-display">4</span>
                        </div>
                        <h4 class="font-bold text-slate-800 text-base">Penguatan Akuntabilitas</h4>
                        <p class="text-slate-500 text-xs leading-relaxed font-light">
                            Meningkatkan kapasitas dan tanggung jawab kinerja instansi dalam melaksanakan program kerja yang bersih dan berorientasi pada pencapaian target.
                        </p>
                    </div>

                    <!-- Area 5 -->
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-brand-green-50 text-brand-green-900 flex items-center justify-center shadow-sm">
                            <span class="font-bold text-sm font-display">5</span>
                        </div>
                        <h4 class="font-bold text-slate-800 text-base">Penguatan Pengawasan</h4>
                        <p class="text-slate-500 text-xs leading-relaxed font-light">
                            Mewujudkan instansi yang bebas korupsi dan kolusi melalui penerapan sistem pengaduan Whistleblowing System (WBS) dan Unit Pengendalian Gratifikasi.
                        </p>
                    </div>

                    <!-- Area 6 -->
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 space-y-4">
                        <div class="w-10 h-10 rounded-2xl bg-brand-green-50 text-brand-green-900 flex items-center justify-center shadow-sm">
                            <span class="font-bold text-sm font-display">6</span>
                        </div>
                        <h4 class="font-bold text-slate-800 text-base">Peningkatan Kualitas Pelayanan</h4>
                        <p class="text-slate-500 text-xs leading-relaxed font-light">
                            Meningkatkan kualitas pelayanan publik PPID yang lebih cepat, murah, aman, terintegrasi, serta responsif terhadap kritik maupun masukan dari pengguna informasi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Documents and Downloads Area -->
            <div class="max-w-5xl mx-auto space-y-6 pt-8">
                <h3 class="font-bold text-slate-800 text-lg font-display border-l-4 border-brand-green-600 pl-3">Dokumen Pembangunan Zona Integrasi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-2xl">
                        <div class="flex items-center space-x-3">
                            <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A1 1 0 0112 2.586L15.414 6A1 1 0 0116 6.707V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path></svg>
                            <div>
                                <span class="font-bold text-xs text-slate-800 block">SK Tim Pembangunan Zona Integrasi UNBRAH 2026</span>
                                <span class="text-[10px] text-slate-400">PDF (1.4 MB)</span>
                            </div>
                        </div>
                        <a href="#" class="bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-semibold px-3 py-1.5 rounded-full transition-colors">Unduh</a>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-slate-50 border border-slate-100 rounded-2xl">
                        <div class="flex items-center space-x-3">
                            <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 20 20"><path d="M4 4a2 2 0 012-2h4.586A1 1 0 0112 2.586L15.414 6A1 1 0 0116 6.707V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path></svg>
                            <div>
                                <span class="font-bold text-xs text-slate-800 block">Rencana Kerja Pembangunan ZI PPID UNBRAH</span>
                                <span class="text-[10px] text-slate-400">PDF (890 KB)</span>
                            </div>
                        </div>
                        <a href="#" class="bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-semibold px-3 py-1.5 rounded-full transition-colors">Unduh</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER SECTION -->
@endsection
