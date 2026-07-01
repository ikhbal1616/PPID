@extends('layouts.frontend')

@section('title', 'Akses Ditolak | Evaluasi PPID Unbrah')

@section('content')
@php
    // $reason: 'not_found' | 'not_finished' | 'already_rated'
    $configs = [
        'not_found' => [
            'icon_color'  => 'text-slate-400',
            'bg_color'    => 'bg-slate-100',
            'badge_color' => 'bg-slate-100 text-slate-600',
            'badge_label' => 'Tiket Tidak Ditemukan',
            'title'       => 'Nomor Tiket Tidak Valid',
            'desc'        => 'Nomor tiket yang Anda masukkan tidak ditemukan pada sistem kami. Pastikan Anda menggunakan tautan resmi dari email notifikasi yang kami kirimkan.',
            'icon_path'   => 'M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'not_finished' => [
            'icon_color'  => 'text-amber-500',
            'bg_color'    => 'bg-amber-50',
            'badge_color' => 'bg-amber-100 text-amber-700',
            'badge_label' => 'Laporan Belum Selesai',
            'title'       => 'Evaluasi Belum Dapat Diisi',
            'desc'        => 'Formulir evaluasi kepuasan hanya dapat diisi setelah laporan/permohonan Anda berstatus <strong>Selesai</strong>. Petugas kami masih memproses permohonan Anda, mohon ditunggu.',
            'icon_path'   => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'already_rated' => [
            'icon_color'  => 'text-brand-green-700',
            'bg_color'    => 'bg-brand-green-50',
            'badge_color' => 'bg-brand-green-100 text-brand-green-800',
            'badge_label' => 'Sudah Dinilai',
            'title'       => 'Evaluasi Sudah Pernah Dikirimkan',
            'desc'        => 'Anda telah memberikan penilaian kepuasan untuk tiket ini sebelumnya. Setiap tiket hanya dapat dievaluasi <strong>satu kali</strong> untuk menjaga keakuratan data. Terima kasih atas partisipasi Anda!',
            'icon_path'   => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
    ];

    $cfg = $configs[$reason] ?? $configs['not_found'];
@endphp

{{-- HERO --}}
<section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
    <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
        <h1 class="text-3xl sm:text-5xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
            Evaluasi <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Kepuasan</span>
        </h1>
        <p class="text-sm text-slate-300/80 max-w-xl mx-auto font-light">Layanan PPID Universitas Baiturrahmah</p>
    </div>
</section>

{{-- FALLBACK CARD --}}
<section class="py-24 bg-slate-50 min-h-[60vh] flex items-center">
    <div class="max-w-lg mx-auto px-4 w-full">
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xl overflow-hidden p-8 md:p-10 text-center space-y-6">

            {{-- Animated Icon --}}
            <div class="flex justify-center">
                <div class="w-24 h-24 rounded-full {{ $cfg['bg_color'] }} flex items-center justify-center">
                    <svg class="w-12 h-12 {{ $cfg['icon_color'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $cfg['icon_path'] }}"/>
                    </svg>
                </div>
            </div>

            {{-- Badge --}}
            <span class="inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest {{ $cfg['badge_color'] }}">
                {{ $cfg['badge_label'] }}
            </span>

            {{-- Title & Description --}}
            <div class="space-y-3">
                <h2 class="text-xl font-bold text-slate-900 font-display">{{ $cfg['title'] }}</h2>
                <p class="text-sm text-slate-500 leading-relaxed">{!! $cfg['desc'] !!}</p>
            </div>

            {{-- Ticket info if available --}}
            @isset($permohonan)
            <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-left space-y-2">
                <div class="flex justify-between text-xs">
                    <span class="text-slate-400 font-semibold">Nomor Tiket</span>
                    <span class="font-mono font-bold text-brand-green-800">{{ $permohonan->ticket_number }}</span>
                </div>
                <div class="flex justify-between text-xs">
                    <span class="text-slate-400 font-semibold">Subjek</span>
                    <span class="font-semibold text-slate-700 max-w-[55%] text-right">{{ $permohonan->subjek }}</span>
                </div>
                <div class="flex justify-between text-xs">
                    <span class="text-slate-400 font-semibold">Status</span>
                    @php
                        $statusColors = ['Pending'=>'bg-yellow-100 text-yellow-700','Ditinjau'=>'bg-blue-100 text-blue-700','Selesai'=>'bg-emerald-100 text-emerald-700','Ditolak'=>'bg-red-100 text-red-700'];
                    @endphp
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $statusColors[$permohonan->status] ?? 'bg-slate-100 text-slate-600' }}">
                        {{ $permohonan->status }}
                    </span>
                </div>
                @if($reason === 'already_rated' && $permohonan->rating)
                <div class="flex justify-between text-xs items-center pt-1 border-t border-slate-100 mt-1">
                    <span class="text-slate-400 font-semibold">Rating Anda</span>
                    <div class="flex items-center space-x-0.5">
                        @for ($s = 1; $s <= 5; $s++)
                            <svg class="w-3.5 h-3.5 fill-current {{ $s <= $permohonan->rating ? 'text-brand-gold-400' : 'text-slate-200' }}" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        @endfor
                        <span class="ml-1 text-[10px] font-bold text-brand-gold-500">{{ $permohonan->rating }}/5</span>
                    </div>
                </div>
                @if($permohonan->ulasan_kepuasan)
                <div class="pt-2">
                    <p class="text-[11px] text-slate-500 italic leading-relaxed">"{{ $permohonan->ulasan_kepuasan }}"</p>
                </div>
                @endif
                @endif
            </div>
            @endisset

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                <a href="/" class="flex-1 px-5 py-3 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold text-xs rounded-2xl transition-all shadow text-center">
                    Kembali ke Beranda
                </a>
                <a href="/#cek-tiket" class="flex-1 px-5 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-2xl transition-all text-center">
                    Lacak Status Tiket
                </a>
            </div>

        </div>
    </div>
</section>
@endsection
