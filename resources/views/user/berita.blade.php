@extends('layouts.frontend')

@section('title', 'Kilas Berita & Publikasi PPID')

@section('content')
<!-- HERO SECTION -->
<section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-16 text-white overflow-hidden shadow-xl">
    <!-- Background elements -->
    <div class="absolute top-[-100px] right-[-100px] w-96 h-96 bg-brand-gold-500/10 rounded-full blur-[80px]"></div>
    <div class="absolute bottom-[-150px] left-[-150px] w-[500px] h-[500px] bg-brand-green-500/10 rounded-full blur-[120px]"></div>

    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-4">
        <span class="text-xs font-bold text-brand-gold-500 uppercase tracking-widest bg-brand-green-900/50 px-4 py-2 rounded-full border border-brand-gold-500/10">Warta & Kabar Terkini</span>
        <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
            Kilas Berita & <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Publikasi</span>
        </h1>
        <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
            Menyajikan informasi terbaru, pengumuman resmi, serta agenda kegiatan Universitas Baiturrahmah secara akurat dan transparan.
        </p>
    </div>
</section>

<!-- MAIN SECTION -->
<section class="py-16 bg-slate-50 text-slate-800 relative overflow-hidden min-h-screen">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10 space-y-10">
        
        <!-- Controls: Search & Category Filter -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/50 flex flex-col xl:flex-row xl:items-center justify-between gap-6">
            <!-- Search input -->
            <div class="relative w-full xl:max-w-md">
                <input type="text" id="search-input" oninput="filterNews()" placeholder="Cari judul berita atau deskripsi..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs pl-12 pr-4 py-4 rounded-2xl shadow-sm outline-none transition-all duration-300">
                <div class="absolute left-4 top-4 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <!-- Category Filter Tags -->
            <div class="flex flex-wrap items-center gap-2" id="category-filters">
                <button onclick="selectCategory('all')" data-category="all" class="category-btn active px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer bg-brand-green-900 text-white shadow-md shadow-brand-green-900/20 border border-transparent">Semua</button>
                <button onclick="selectCategory('kerja sama')" data-category="kerja sama" class="category-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer bg-slate-100 text-slate-600 hover:bg-slate-200 border border-transparent">Kerja Sama</button>
                <button onclick="selectCategory('prestasi')" data-category="prestasi" class="category-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer bg-slate-100 text-slate-600 hover:bg-slate-200 border border-transparent">Prestasi</button>
                <button onclick="selectCategory('seminar')" data-category="seminar" class="category-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer bg-slate-100 text-slate-600 hover:bg-slate-200 border border-transparent">Seminar</button>
                <button onclick="selectCategory('event')" data-category="event" class="category-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer bg-slate-100 text-slate-650 hover:bg-slate-200 border border-transparent">Event</button>
                <button onclick="selectCategory('sosial')" data-category="sosial" class="category-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer bg-slate-100 text-slate-650 hover:bg-slate-200 border border-transparent">Sosial</button>
                <button onclick="selectCategory('kajian dhuha')" data-category="kajian dhuha" class="category-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer bg-slate-100 text-slate-650 hover:bg-slate-200 border border-transparent">Kajian Dhuha</button>
                <button onclick="selectCategory('umum')" data-category="umum" class="category-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer bg-slate-100 text-slate-650 hover:bg-slate-200 border border-transparent">Umum</button>
            </div>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="news-grid">
            <!-- Article Card 1 -->
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between" data-category="seminar" data-title="universitas baiturrahmah sukses gelar forum sosialisasi e-ppid untuk peningkatan kualitas layanan informasi publik">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="/images/slider1.png" alt="Universitas Baiturrahmah PPID" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">Seminar</span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>22 Juni 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            Universitas Baiturrahmah Sukses Gelar Forum Sosialisasi E-PPID Untuk Peningkatan Kualitas Layanan Informasi Publik
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            Forum sosialisasi ini bertujuan memperkenalkan platform E-PPID terpadu yang memfasilitasi publik dalam melakukan permohonan informasi akademik, kepengurusan data kemahasiswaan, hingga transparansi anggaran secara terstruktur.
                        </p>
                    </div>
                </div>
                <!-- Action / Tags -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/1" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#e-ppid</span>
                </div>
            </div>

            <!-- Article Card 2 -->
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between" data-category="kerja sama" data-title="kolaborasi unbrah & pemkot padang mengenai integrasi data ppid terbuka daerah">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="/images/slider2.png" alt="UNBRAH & Pemkot Padang" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">Kerja Sama</span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>18 Juni 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            Kolaborasi UNBRAH & Pemkot Padang Mengenai Integrasi Data PPID Terbuka Daerah
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            Langkah sinergis dalam mengintegrasikan portal data informasi daerah untuk mempermudah masyarakat accessing statistik pendidikan, laporan anggaran riset, serta pemanfaatan sarana publik.
                        </p>
                    </div>
                </div>
                <!-- Action / Tags -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/2" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#kerjasama</span>
                </div>
            </div>

            <!-- Article Card 3 -->
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between" data-category="seminar" data-title="bimtek standardisasi pelayanan informasi publik pejabat daerah sumatera barat">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="/images/slider3.png" alt="Bimtek PPID" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">Seminar</span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>12 Juni 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            Bimtek Standardisasi Pelayanan Informasi Publik Pejabat Daerah Sumatera Barat
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            Pejabat pengelola informasi dibekali dengan tata cara penyelesaian sengketa informasi, regulasi keterbukaan, serta teknologi penyimpanan arsip dokumen digital yang aman.
                        </p>
                    </div>
                </div>
                <!-- Action / Tags -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/3" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#bimtek</span>
                </div>
            </div>

            <!-- Article Card 4 -->
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between" data-category="umum" data-title="universitas baiturrahmah rilis portal data publik resmi terintegrasi">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="/images/slider1.png" alt="Library Unbrah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">Umum</span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>05 Juni 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            Universitas Baiturrahmah Rilis Portal Data Publik Resmi Terintegrasi
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            Peluncuran portal data ini memudahkan sivitas akademika dan masyarakat luas memantau profil kelulusan, penyerapan dana hibah penelitian, serta dokumen regulasi kampus.
                        </p>
                    </div>
                </div>
                <!-- Action / Tags -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/4" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#portal-data</span>
                </div>
            </div>

            <!-- Article Card 5 -->
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between" data-category="prestasi" data-title="penerimaan penghargaan ppid award kategori kampus terinformatif tahun 2026">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="/images/slider2.png" alt="PPID Award" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">Prestasi</span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>28 Mei 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            Penerimaan Penghargaan PPID Award Kategori Kampus Terinformatif Tahun 2026
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            Pencapaian gemilang Universitas Baiturrahmah yang berhasil meraih peringkat pertama sebagai kampus paling transparan dalam penyediaan informasi publik bagi masyarakat regional.
                        </p>
                    </div>
                </div>
                <!-- Action / Tags -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/5" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#prestasi</span>
                </div>
            </div>

            <!-- Article Card 6 -->
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between" data-category="event" data-title="sosialisasi alur pengajuan keberatan pelayanan informasi bagi mahasiswa baru">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="/images/slider3.png" alt="Sosialisasi Kampus" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">Event</span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>15 Mei 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            Sosialisasi Alur Pengajuan Keberatan Pelayanan Informasi Bagi Mahasiswa Baru
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            Pemberian materi pengenalan hak-hak informasi publik bagi mahasiswa, tata cara pelaporan penyalahgunaan wewenang, serta simulasi pengajuan keberatan melalui web.
                        </p>
                    </div>
                </div>
                <!-- Action / Tags -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/6" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#mahasiswa</span>
                </div>
            </div>

            <!-- Article Card 7 -->
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between" data-category="kajian dhuha" data-title="kajian dhuha bulanan civitas akademika universitas baiturrahmah menuju kampus religius">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="/images/slider1.png" alt="Kajian Dhuha" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">Kajian Dhuha</span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>10 Mei 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            Kajian Dhuha Bulanan Civitas Akademika Universitas Baiturrahmah Menuju Kampus Religius
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            Kegiatan siraman rohani bulanan guna mempererat silaturahmi serta meningkatkan keimanan dan ketakwaan dosen, karyawan, serta mahasiswa di lingkungan kampus Baiturrahmah.
                        </p>
                    </div>
                </div>
                <!-- Action / Tags -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/7" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#religius</span>
                </div>
            </div>

            <!-- Article Card 8 -->
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between" data-category="sosial" data-title="aksi sosial donor darah mahasiswa universitas baiturrahmah peduli sesama">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="/images/slider2.png" alt="Aksi Sosial Donor Darah" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">Sosial</span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>01 Mei 2026</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Humas Unbrah</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            Aksi Sosial Donor Darah Mahasiswa Universitas Baiturrahmah Peduli Sesama
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            Bekerja sama dengan PMI Kota Padang, PPID memfasilitasi aksi kemanusiaan donor darah massal yang berhasil mengumpulkan ratusan kantong darah siap pakai.
                        </p>
                    </div>
                </div>
                <!-- Action / Tags -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/8" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#sosial</span>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div id="empty-state" class="hidden text-center py-20 bg-white rounded-3xl border border-slate-200/50 shadow-sm max-w-md mx-auto space-y-4">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="font-bold text-slate-800 text-base">Berita Tidak Ditemukan</h3>
            <p class="text-slate-500 text-xs px-6">Maaf, kami tidak dapat menemukan berita yang sesuai dengan kata kunci atau kategori yang Anda cari.</p>
            <button onclick="resetFilters()" class="px-5 py-2.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold text-xs rounded-xl shadow-md cursor-pointer transition-colors border-0">Lihat Semua Berita</button>
        </div>
    </div>
</section>

<script>
    let selectedCategoryName = 'all';

    function selectCategory(category) {
        selectedCategoryName = category.toLowerCase();
        
        // Update button active state styling
        const buttons = document.querySelectorAll('.category-btn');
        buttons.forEach(btn => {
            const btnCategory = btn.getAttribute('data-category');
            if (btnCategory === selectedCategoryName) {
                btn.classList.remove('bg-slate-100', 'text-slate-650', 'hover:bg-slate-200');
                btn.classList.add('bg-brand-green-900', 'text-white', 'shadow-md', 'shadow-brand-green-900/20');
            } else {
                btn.classList.remove('bg-brand-green-900', 'text-white', 'shadow-md', 'shadow-brand-green-900/20');
                btn.classList.add('bg-slate-100', 'text-slate-600', 'hover:bg-slate-200');
            }
        });

        filterNews();
    }

    function filterNews() {
        const query = document.getElementById('search-input').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.news-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const cardCategory = card.getAttribute('data-category').toLowerCase();
            const cardTitle = card.getAttribute('data-title').toLowerCase();
            
            const matchesCategory = (selectedCategoryName === 'all' || cardCategory === selectedCategoryName);
            const matchesSearch = (cardTitle.includes(query));

            if (matchesCategory && matchesSearch) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Toggle Empty State
        const emptyState = document.getElementById('empty-state');
        const newsGrid = document.getElementById('news-grid');
        
        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
            newsGrid.classList.add('hidden');
        } else {
            emptyState.classList.add('hidden');
            newsGrid.classList.remove('hidden');
        }
    }

    function resetFilters() {
        document.getElementById('search-input').value = '';
        selectCategory('all');
    }
</script>
@endsection
