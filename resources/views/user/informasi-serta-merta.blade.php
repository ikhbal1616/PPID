@extends('layouts.frontend')

@section('title', 'Informasi Serta Merta')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Informasi Serta Merta <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">PPID Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Akses dokumen informasi publik serta merta secara transparan, akurat, dan dapat diakses dengan cepat sesuai UU No. 14 Tahun 2008.
            </p>
        </div>
    </section>

    <!-- MAIN CONTENT SECTION -->
    <section class="py-16 bg-white text-slate-800 relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10 space-y-12">
            
            <!-- Controls (Search) -->
            <div class="w-full">
                <!-- Search bar -->
                <div class="relative max-w-xl mx-auto">
                    <input type="text" id="doc-search" placeholder="Cari berkas/dokumen (contoh: Evakuasi, Bencana, Darurat)..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-sm pl-12 pr-4 py-3.5 rounded-2xl shadow-sm outline-none transition-all duration-300">
                    <div class="absolute left-4 top-4.5 text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Documents Accordion -->
            <div id="docs-accordion" class="w-full space-y-4">
                @php
                    $informasiSertaMertaRaw = setting('informasi_serta_merta_list');
                    $informasiSertaMertaList = [];
                    if ($informasiSertaMertaRaw) {
                        $informasiSertaMertaList = json_decode($informasiSertaMertaRaw, true);
                    }
                    if (empty($informasiSertaMertaList)) {
                        $informasiSertaMertaList = [
                            [
                                "title" => "Informasi Keadaan Darurat / Bencana",
                                "category" => "layanan",
                                "badge_type" => "Dokumen",
                                "description" => "Daftar Informasi Keadaan Darurat di Universitas Baiturrahmah:",
                                "link_url" => "",
                                "link_label" => "",
                                "files" => [
                                    ["title" => "Panduan Tanggap Darurat Bencana Kebakaran", "url" => "#", "type" => "PDF"],
                                    ["title" => "SOP Evakuasi Darurat Gedung Rektorat", "url" => "#", "type" => "PDF"]
                                ]
                            ]
                        ];
                    }

                    $categoryBadgeMap = [
                        'profil' => 'Profil & Akademik',
                        'lppm' => 'Penelitian & LPPM',
                        'kinerja' => 'Kinerja & Regulasi',
                        'layanan' => 'Layanan & Laporan',
                    ];
                @endphp

                @foreach ($informasiSertaMertaList as $index => $item)
                    @php
                        $displayIndex = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                        $accordionId = $index + 1;
                        $categoryName = $item['category'] ?? 'layanan';
                        $categoryBadge = $categoryBadgeMap[$categoryName] ?? 'Layanan & Laporan';
                        $badgeType = $item['badge_type'] ?? 'Dokumen';
                    @endphp

                    <div class="doc-item bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden transition-all duration-300" data-category="{{ $categoryName }}">
                        <button class="w-full px-6 py-5 flex items-center justify-between text-left focus:outline-none cursor-pointer group" onclick="toggleAccordion({{ $accordionId }})">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 rounded-xl bg-brand-green-50 text-brand-green-900 flex items-center justify-center font-bold text-sm shrink-0 group-hover:bg-brand-green-900 group-hover:text-white transition-colors duration-300">
                                    {{ $displayIndex }}
                                </div>
                                <div class="flex flex-col sm:flex-row sm:items-center space-y-1 sm:space-y-0 sm:space-x-3">
                                    <span class="font-bold text-slate-800 text-sm sm:text-base">{{ $item['title'] }}</span>
                                </div>
                            </div>
                            <svg id="arrow-{{ $accordionId }}" class="w-5 h-5 text-slate-400 group-hover:text-brand-green-900 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="content-{{ $accordionId }}" class="hidden px-6 pb-6 pt-4 border-t border-slate-100 text-slate-600 text-xs sm:text-sm leading-relaxed space-y-4">
                            @if (!empty($item['description']))
                                <p class="text-slate-500 mb-2 font-medium">{{ $item['description'] }}</p>
                            @endif

                            @if (!empty($item['files']))
                                <div class="space-y-2.5 w-full">
                                    @foreach ($item['files'] as $fileItem)
                                        @php
                                            $isExternal = str_starts_with($fileItem['url'], 'http') || str_starts_with($fileItem['url'], 'https') || str_starts_with($fileItem['url'], '/uploads/');
                                            $fileType = $fileItem['type'] ?? 'PDF';
                                        @endphp
                                        <a href="{{ $fileItem['url'] }}" @if($isExternal) target="_blank" @endif class="flex items-center justify-between p-3 bg-slate-50 hover:bg-brand-green-50/40 rounded-xl transition-all duration-200 border border-slate-200/60 group">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-2 bg-white rounded-lg border border-slate-200 group-hover:border-brand-green-200 transition-colors shrink-0">
                                                    @if ($fileType === 'PDF')
                                                        <svg class="w-4 h-4 text-brand-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                    @elseif ($fileType === 'Gambar')
                                                        <svg class="w-4 h-4 text-brand-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                    @elseif ($fileType === 'Halaman')
                                                        <svg class="w-4 h-4 text-brand-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                                    @else
                                                        <svg class="w-4 h-4 text-brand-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                                    @endif
                                                </div>
                                                <span class="font-bold text-slate-700 group-hover:text-brand-green-800 transition-colors">{{ $fileItem['title'] }}</span>
                                            </div>
                                            <span class="text-[11px] text-brand-green-900 font-bold uppercase flex items-center space-x-1 shrink-0">
                                                <span>Lihat</span>
                                                <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                                <span class="text-[10px] text-slate-400">Status: Aktif</span>
                                @if (!empty($item['link_url']))
                                    <a href="{{ $item['link_url'] }}" target="_blank" class="text-brand-green-600 hover:text-brand-green-800 text-xs font-bold flex items-center space-x-1 group">
                                        <span>{{ $item['link_label'] ?: 'Lihat Selengkapnya' }}</span>
                                        <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- FOOTER SECTION -->
@endsection
