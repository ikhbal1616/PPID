@extends('layouts.frontend')

@section('title', 'Struktur Organisasi')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Struktur Organisasi PPID <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Bagan koordinasi dan pembagian bidang kerja di jajaran sekretariat PPID Universitas Baiturrahmah.
            </p>
        </div>
    </section>

    <!-- STRUKTUR ORGANISASI CONTENT SECTION -->
    <section class="py-24 bg-white text-slate-800 relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
            
            @php
                $defaultStruktur = [
                    ["badge" => "LPM", "name" => "Lembaga Penjaminan Mutu"],
                    ["badge" => "LPPM", "name" => "Lembaga Penelitian & Pengabdian Masyarakat"],
                    ["badge" => "UPTB", "name" => "Unit Pelaksana Teknis Perpustakaan"],
                    ["badge" => "UPTK", "name" => "Unit Pelaksana Teknis Komputer"],
                    ["badge" => "BAA", "name" => "Biro Administrasi Akademik"],
                    ["badge" => "BKK", "name" => "Biro Kemahasiswaan & Kerjasama"]
                ];
                $rawStruktur = setting('struktur_list');
                $strukturItems = $rawStruktur ? json_decode($rawStruktur, true) : $defaultStruktur;
                if (!is_array($strukturItems)) {
                    $strukturItems = $defaultStruktur;
                }
            @endphp

            <!-- Bagan Struktur Organisasi (Top Section) - Sesuai Susunan Gambar 2 -->
            <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-xl flex justify-center items-center mb-8">
                <img src="{{ setting('struktur_image', '/images/logo_unbrah.png') }}" class="max-w-full h-auto rounded-2xl shadow-sm border border-slate-100" alt="Bagan Struktur Organisasi PPID Universitas Baiturrahmah">
            </div>

            <!-- Daftar Lembaga / Unit Kerja (Bottom Section) - Menggunakan Desain UI Gambar 1 -->
            <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-xl space-y-6">
                <div class="border-b border-slate-100 pb-4 flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wider">Daftar Lembaga / Unit Kerja</h3>
                        <span class="bg-brand-green-50 text-brand-green-700 font-bold px-2 py-0.5 rounded-full text-[10px]">{{ count($strukturItems) }} Unit</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($strukturItems as $item)
                    <div class="flex items-center space-x-4 p-4 bg-slate-50 hover:bg-brand-green-50/20 rounded-2xl transition-all border border-slate-100 group shadow-sm">
                        <span class="bg-slate-950 text-white font-bold px-3 py-2 rounded-xl text-[10px] uppercase tracking-wider min-w-[70px] text-center shrink-0 border border-slate-900 shadow-md">
                            {{ $item['badge'] ?? '' }}
                        </span>
                        <span class="text-xs font-semibold text-slate-700 leading-tight">
                            {{ $item['name'] ?? '' }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
@endsection
