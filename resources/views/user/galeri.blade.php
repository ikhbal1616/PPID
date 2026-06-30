@extends('layouts.frontend')

@section('title', 'Galeri PPID')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Galeri PPID <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Dokumentasi visual rangkaian kegiatan, sosialisasi keterbukaan informasi, dan pelayanan publik PPID Universitas Baiturrahmah Padang.
            </p>
        </div>
    </section>

    <!-- GALLERY SECTION -->
    <section class="py-20 max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12">
        <div class="space-y-12">
            
            <!-- Category Filter Tabs -->
            <div class="flex items-center justify-start md:justify-center space-x-2 overflow-x-auto pb-4 scrollbar-none">
                <button class="filter-btn active px-5 py-2.5 text-xs font-bold rounded-xl bg-brand-green-600 text-white shadow-md transition-all whitespace-nowrap cursor-pointer" data-category="all">Semua Foto</button>
                <button class="filter-btn px-5 py-2.5 text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all whitespace-nowrap cursor-pointer" data-category="sosialisasi">Sosialisasi & Bimtek</button>
                <button class="filter-btn px-5 py-2.5 text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all whitespace-nowrap cursor-pointer" data-category="rapat">Rapat Kerja</button>
                <button class="filter-btn px-5 py-2.5 text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all whitespace-nowrap cursor-pointer" data-category="monev">Monitoring & Evaluasi</button>
                <button class="filter-btn px-5 py-2.5 text-xs font-bold rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-all whitespace-nowrap cursor-pointer" data-category="layanan">Layanan Publik</button>
            </div>

            <!-- Photo Grid -->
            <div id="gallery-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $galeriRaw = setting('galeri_list');
                    $galeriList = [];
                    if ($galeriRaw) {
                        $galeriList = json_decode($galeriRaw, true);
                    }
                    if (empty($galeriList)) {
                        $galeriList = [
                            [
                                "title" => "Sosialisasi E-PPID dan Keterbukaan Informasi",
                                "category" => "sosialisasi",
                                "date" => "2026-07-15",
                                "description" => "Workshop pelaksanaan tata laksana dan bimbingan teknis standar pelayanan publik bagi seluruh dekanat dan pengelola data fakultas.",
                                "image_url" => "/images/slider3.png"
                            ],
                            [
                                "title" => "Rapat Evaluasi Program Kerja Tahunan",
                                "category" => "rapat",
                                "date" => "2026-08-22",
                                "description" => "Pertemuan koordinasi tim pelaksana PPID Universitas Baiturrahmah dalam merancang target kepatuhan informasi publik semester berikutnya.",
                                "image_url" => "/images/slider2.png"
                            ],
                            [
                                "title" => "Visitasi Komisi Informasi Sumatera Barat",
                                "category" => "monev",
                                "date" => "2026-09-10",
                                "description" => "Monitoring dan verifikasi langsung berkas serta ketersediaan dokumen publik di ruang sekretariat PPID Unbrah oleh Komisioner KI Sumbar.",
                                "image_url" => "/images/slider1.png"
                            ],
                            [
                                "title" => "Pelayanan Informasi Terpadu Mahasiswa",
                                "category" => "layanan",
                                "date" => "2026-10-05",
                                "description" => "Petugas PPID melayani permohonan salinan data registrasi akademik mahasiswa secara cepat, santun, dan gratis di loket layanan.",
                                "image_url" => "/images/slider2.png"
                            ],
                            [
                                "title" => "Bimbingan Teknis Kearsipan Digital",
                                "category" => "sosialisasi",
                                "date" => "2026-10-18",
                                "description" => "Bimbingan penginputan data pendukung kinerja institusi bagi tenaga kependidikan demi keselarasan sistem informasi terpadu.",
                                "image_url" => "/images/slider1.png"
                            ],
                            [
                                "title" => "Penerimaan Penghargaan Keterbukaan Informasi",
                                "category" => "monev",
                                "date" => "2026-11-12",
                                "description" => "Penyerahan piagam penghargaan kategori Perguruan Tinggi Swasta Paling Informatif dalam PPID Award tingkat wilayah.",
                                "image_url" => "/images/slider3.png"
                            ]
                        ];
                    }

                    $categoryBadgeMap = [
                        'sosialisasi' => 'Sosialisasi',
                        'rapat' => 'Rapat Kerja',
                        'monev' => 'Monev',
                        'layanan' => 'Layanan Publik'
                    ];

                    if (!function_exists('formatIndoDate')) {
                        function formatIndoDate($dateStr) {
                            if (empty($dateStr)) return '';
                            try {
                                $months = [
                                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
                                    7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                ];
                                $time = strtotime($dateStr);
                                $day = date('d', $time);
                                $month = $months[(int)date('m', $time)];
                                $year = date('Y', $time);
                                return "$day $month $year";
                            } catch (\Exception $e) {
                                return $dateStr;
                            }
                        }
                    }
                @endphp

                @foreach ($galeriList as $item)
                    <div class="gallery-card doc-item group bg-white border border-slate-100 hover:border-slate-200 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 cursor-pointer flex flex-col" data-category="{{ $item['category'] ?? 'sosialisasi' }}">
                        <div class="relative overflow-hidden h-60 bg-slate-100">
                            <img src="{{ $item['image_url'] ?? '/images/slider1.png' }}" 
                                 alt="{{ $item['title'] }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                <span class="text-white text-xs font-semibold flex items-center space-x-1.5">
                                    <svg class="w-4 h-4 text-brand-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    <span>Perbesar Gambar</span>
                                </span>
                            </div>
                        </div>
                        <div class="p-6 space-y-2 flex-grow flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                    <span>{{ formatIndoDate($item['date'] ?? '') }}</span>
                                    <span class="text-brand-green-700 bg-brand-green-50 px-2 py-0.5 rounded">{{ $categoryBadgeMap[$item['category'] ?? 'sosialisasi'] ?? 'Sosialisasi' }}</span>
                                </div>
                                <h4 class="font-bold text-slate-800 text-base leading-snug group-hover:text-brand-green-700 transition-colors">{{ $item['title'] }}</h4>
                                <p class="text-xs text-slate-500 font-light leading-relaxed text-justify">
                                    {{ $item['description'] ?? '' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- INTERACTIVE LIGHTBOX MODAL -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 bg-black/95 flex flex-col justify-center items-center p-4 hidden">
        <!-- Close Button -->
        <button onclick="closeLightbox()" class="absolute top-6 right-6 w-12 h-12 bg-white/10 hover:bg-white/20 text-white rounded-full flex items-center justify-center transition-colors focus:outline-none cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
        
        <!-- Lightbox Image Wrapper -->
        <div class="max-w-4xl w-full flex flex-col items-center space-y-4">
            <img id="lightbox-img" src="" alt="" class="max-h-[75vh] w-auto object-contain rounded-2xl shadow-2xl border border-white/10 animate-fade-in">
            <!-- Details Container -->
            <div class="text-center max-w-2xl px-4 space-y-2">
                <h3 id="lightbox-title" class="text-xl font-bold font-display text-brand-gold-500"></h3>
                <p id="lightbox-desc" class="text-sm text-slate-300 font-light leading-relaxed"></p>
            </div>
        </div>
    </div>

    <!-- FOOTER SECTION -->
@endsection
