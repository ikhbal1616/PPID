@extends('layouts.frontend')

@section('title', 'Tugas & Fungsi')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Tugas & Fungsi PPID <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Uraian tanggung jawab operasional kami sesuai standar pelayanan informasi publik nasional.
            </p>
        </div>
    </section>

    <!-- TUGAS & FUNGSI CONTENT SECTION -->
    <!-- TUGAS & FUNGSI CONTENT SECTION -->
    @php
        $defaultTugas = [
            [
                'title' => setting('tugas_1_title', 'Pengumpulan & Klasifikasi Informasi'),
                'desc' => setting('tugas_1_desc', 'Tugas utama ini mencakup penyusunan Daftar Informasi Publik (DIP) secara rutin dan teratur dari seluruh unit kerja/fakultas di lingkungan Universitas Baiturrahmah. Kami mengelompokkan informasi ke dalam kategori Informasi Berkala, Serta Merta, Setiap Saat, serta memisahkan Informasi yang Dikecualikan berdasarkan pengujian konsekuensi hukum.')
            ],
            [
                'title' => setting('tugas_2_title', 'Penyediaan & Pelayanan Informasi Publik'),
                'desc' => setting('tugas_2_desc', 'Mengelola pusat layanan data baik secara daring (online form pada portal web) maupun luring (meja layanan PPID di gedung rektorat). Kami memastikan penyediaan berkas informasi publik dilakukan dengan cepat, akurat, aman, dan tanpa biaya yang memberatkan pemohon.')
            ],
            [
                'title' => setting('tugas_3_title', 'Pengujian Konsekuensi Informasi Dikecualikan'),
                'desc' => setting('tugas_3_desc', 'Melakukan analisis hukum yang mendalam sebelum menolak permohonan informasi tertentu. PPID memiliki tugas penting menguji konsekuensi dari setiap informasi yang bersifat sensitif (seperti data pribadi mahasiswa/dosen, dokumen rahasia keuangan yang belum diaudit, dll) sesuai Pasal 17 UU No. 14 Tahun 2008.')
            ],
            [
                'title' => setting('tugas_4_title', 'Mediasi & Penyelesaian Sengketa Informasi'),
                'desc' => setting('tugas_4_desc', 'Menangani dan memberikan tanggapan atas keberatan tertulis yang dilayangkan oleh pemohon informasi. PPID bertugas mewakili institusi dalam proses mediasi maupun ajudikasi non-litigasi di Komisi Informasi jika terjadi sengketa informasi resmi.')
            ]
        ];

        $tugasListRaw = setting('tugas_list');
        $tugasList = [];
        if ($tugasListRaw) {
            $tugasList = json_decode($tugasListRaw, true);
        }
        if (empty($tugasList)) {
            $tugasList = $defaultTugas;
        }
    @endphp

    <section class="py-16 bg-white text-slate-800 relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">

            <!-- Tugas & Fungsi Grid List -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($tugasList as $index => $item)
                    @php
                        $itemNum = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                    @endphp
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-8 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-[10px] bg-brand-green-100 text-brand-green-700 font-bold px-3 py-1 rounded-full uppercase tracking-wider">Tugas & Fungsi {{ $itemNum }}</span>
                            </div>
                            <h4 class="font-bold text-slate-800 text-lg group-hover:text-brand-green-700 transition-colors">{{ $item['title'] }}</h4>
                            <p class="text-slate-500 text-xs sm:text-sm font-light leading-relaxed">
                                {!! nl2br(e($item['desc'])) !!}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FOOTER -->
@endsection
