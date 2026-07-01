@extends('layouts.frontend')

@section('title', 'Regulasi PPID')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Regulasi & Peraturan PPID <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Keterbukaan Informasi Publik</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Landasan hukum formal dan standar operasional pelayanan informasi di lingkungan PPID Universitas Baiturrahmah.
            </p>
        </div>
    </section>

    <!-- REGULASI CONTENT SECTION -->
    @php
        $defaultRegulasi = [
            [
                'type' => setting('regulasi_1_type', 'Undang-Undang'),
                'title' => setting('regulasi_1_title', 'Undang-Undang No. 14 Tahun 2008'),
                'desc' => setting('regulasi_1_desc', 'Tentang Keterbukaan Informasi Publik (UU KIP). Regulasi utama tingkat nasional yang memberikan jaminan hukum atas hak masyarakat dalam memperoleh informasi publik.'),
                'link' => 'https://id.wikipedia.org/wiki/Undang-Undang_Keterbukaan_Informasi_Publik',
                'file' => setting('regulasi_1_file')
            ],
            [
                'type' => setting('regulasi_2_type', 'Peraturan Pemerintah'),
                'title' => setting('regulasi_2_title', 'Peraturan Pemerintah No. 61 Tahun 2010'),
                'desc' => setting('regulasi_2_desc', 'Tentang Pelaksanaan Undang-Undang Keterbukaan Informasi Publik. Mengatur secara detil hak, tata cara pengajuan, penunjukan Pejabat Pengelola Informasi.'),
                'link' => '',
                'file' => setting('regulasi_2_file')
            ],
            [
                'type' => setting('regulasi_3_type', 'Peraturan Komisi Informasi'),
                'title' => setting('regulasi_3_title', 'PERKI No. 1 Tahun 2021'),
                'desc' => setting('regulasi_3_desc', 'Tentang Standar Layanan Informasi Publik (SLIP). Berisi petunjuk teknis operasional dan standardisasi bagi badan publik dalam mengumumkan layanan data.'),
                'link' => '',
                'file' => setting('regulasi_3_file')
            ]
        ];

        $regulasiListRaw = setting('regulasi_list');
        $regulasiList = [];
        if ($regulasiListRaw) {
            $regulasiList = json_decode($regulasiListRaw, true);
        }
        if (empty($regulasiList)) {
            $regulasiList = $defaultRegulasi;
        }
    @endphp

    <section class="py-20 bg-white text-slate-800 relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
            <!-- Header Text -->
            <div class="max-w-3xl mx-auto text-center space-y-4 mb-16">
                <span class="text-brand-green-600 font-bold text-xs uppercase tracking-widest">Daftar Dokumen Regulasi</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold font-display text-slate-900 leading-tight">Landasan Hukum Resmi Layanan PPID</h2>
                <p class="text-slate-500 text-sm leading-relaxed font-light">
                    Semua kebijakan dan dasar hukum yang digunakan dalam penyelenggaraan Layanan Informasi Publik di Universitas Baiturrahmah dirangkum di bawah ini dan dapat diunduh secara bebas.
                </p>
            </div>

            <!-- Law Card List -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                @foreach ($regulasiList as $item)
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-8 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] bg-brand-green-100 text-brand-green-900 font-bold px-3 py-1 rounded-full uppercase tracking-wider">{{ $item['type'] }}</span>
                                <span class="text-xs text-slate-400">PDF</span>
                            </div>
                            <h4 class="font-bold text-slate-800 text-lg group-hover:text-brand-green-900 transition-colors">{{ $item['title'] }}</h4>
                            <p class="text-slate-500 text-xs sm:text-sm font-light leading-relaxed">
                                {{ $item['desc'] }}
                            </p>
                        </div>
                        <div class="pt-6 border-t border-slate-200/50 mt-6 flex items-center justify-between">
                            @if (!empty($item['link']))
                                <a href="{{ $item['link'] }}" target="_blank" class="text-xs font-bold text-brand-green-600 hover:text-brand-green-900 flex items-center space-x-1.5">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            @else
                                <div class="text-xs text-slate-400 font-medium">Informasi Resmi</div>
                            @endif

                            @if (!empty($item['file']))
                                <a href="{{ $item['file'] }}" target="_blank" class="inline-flex items-center space-x-1 bg-white hover:bg-brand-green-50 text-slate-700 border border-slate-200 hover:border-brand-green-300 text-xs font-semibold px-4 py-2 rounded-full transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    <span>Unduh</span>
                                </a>
                            @else
                                <span class="text-xs text-slate-400 italic">No File</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- FOOTER SECTION -->
@endsection
