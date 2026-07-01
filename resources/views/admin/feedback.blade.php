@extends('layouts.admin')

@section('title', 'Indeks Kepuasan Pemohon | Admin PPID')

@section('content')
@php
    $totalRated = $feedbacks->total();
    $avgRating  = $feedbacks->count() ? round($allFeedbacks->avg('rating'), 2) : null;
    $indeks     = $avgRating ? round($avgRating * 20) : null;

    $dist = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
    foreach ($allFeedbacks as $f) { $dist[$f->rating]++; }
@endphp

<div class="p-6 space-y-8">

    {{-- ─── PAGE HEADER ─────────────────────────────── --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h1 class="text-xl font-bold text-slate-900 font-display">Indeks Kepuasan Pemohon</h1>
            <p class="text-xs text-slate-500 mt-0.5">Kumpulan ulasan & penilaian bintang dari pemohon yang telah selesai dilayani.</p>
        </div>
        <a href="{{ route('admin.permohonan.index') }}" class="inline-flex items-center space-x-2 text-xs font-bold text-brand-green-900 hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            <span>Kembali ke Permohonan</span>
        </a>
    </div>

    {{-- ─── SUMMARY CARDS ───────────────────────────── --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        {{-- Indeks Kepuasan --}}
        <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm space-y-2">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Indeks Kepuasan</p>
            <p class="text-4xl font-extrabold text-brand-green-900 font-display">
                {{ $indeks !== null ? $indeks . '%' : '—' }}
            </p>
            <p class="text-[11px] text-slate-400">Skala 0 – 100%</p>
        </div>

        {{-- Rata-rata Bintang --}}
        <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm space-y-2">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Rata-rata Rating</p>
            <div class="flex items-center space-x-2">
                <p class="text-4xl font-extrabold text-brand-gold-500 font-display">
                    {{ $avgRating !== null ? number_format($avgRating, 1) : '—' }}
                </p>
                <svg class="w-7 h-7 text-brand-gold-500 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
            </div>
            <p class="text-[11px] text-slate-400">Dari skala 1 – 5 bintang</p>
        </div>

        {{-- Total Ulasan --}}
        <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm space-y-2">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Ulasan Masuk</p>
            <p class="text-4xl font-extrabold text-slate-800 font-display">{{ number_format($totalRated) }}</p>
            <p class="text-[11px] text-slate-400">Dari pemohon yang telah selesai</p>
        </div>

        {{-- Rating Tertinggi --}}
        <div class="bg-white border border-slate-100 rounded-2xl p-5 shadow-sm space-y-2">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Rating Bintang 5</p>
            <p class="text-4xl font-extrabold text-emerald-600 font-display">{{ $dist[5] }}</p>
            <p class="text-[11px] text-slate-400">Ulasan "Sangat Puas"</p>
        </div>
    </div>

    {{-- ─── DISTRIBUSI BINTANG ─────────────────────── --}}
    <div class="bg-white border border-slate-100 rounded-2xl p-6 shadow-sm space-y-4">
        <h2 class="text-sm font-bold text-slate-800">Distribusi Rating Bintang</h2>
        @for ($star = 5; $star >= 1; $star--)
            @php
                $count = $dist[$star];
                $pct   = $totalRated > 0 ? round(($count / $totalRated) * 100) : 0;
                $starColors = [5=>'bg-emerald-500', 4=>'bg-brand-green-500', 3=>'bg-brand-gold-400', 2=>'bg-orange-400', 1=>'bg-red-500'];
            @endphp
            <div class="flex items-center space-x-3">
                <div class="flex items-center space-x-1 w-16 shrink-0">
                    <span class="text-xs font-bold text-slate-600">{{ $star }}</span>
                    <svg class="w-3.5 h-3.5 text-brand-gold-400 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                </div>
                <div class="flex-1 bg-slate-100 rounded-full h-2.5 overflow-hidden">
                    <div class="{{ $starColors[$star] }} h-full rounded-full transition-all duration-700" style="width: {{ $pct }}%"></div>
                </div>
                <span class="text-xs text-slate-500 w-20 text-right shrink-0">{{ $count }} ({{ $pct }}%)</span>
            </div>
        @endfor
    </div>

    {{-- ─── TABEL ULASAN ────────────────────────────── --}}
    <div class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <h2 class="text-sm font-bold text-slate-800">Daftar Ulasan Pemohon</h2>
            {{-- Filter by rating --}}
            <form method="GET" action="{{ route('admin.feedback.index') }}" class="flex items-center space-x-2">
                <label class="text-[11px] text-slate-500 font-semibold">Filter Bintang:</label>
                <select name="rating" onchange="this.form.submit()" class="text-xs border border-slate-200 rounded-lg px-2 py-1.5 text-slate-700 bg-white outline-none focus:border-brand-green-500">
                    <option value="">Semua</option>
                    @for ($i = 5; $i >= 1; $i--)
                        <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} Bintang</option>
                    @endfor
                </select>
            </form>
        </div>

        @if ($feedbacks->isEmpty())
            <div class="py-20 text-center text-slate-400 space-y-2">
                <svg class="w-12 h-12 mx-auto text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                <p class="text-sm font-semibold">Belum ada ulasan masuk</p>
                <p class="text-xs">Ulasan akan muncul setelah pemohon mengisi survei kepuasan.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-xs text-left">
                    <thead>
                        <tr class="bg-slate-50 text-slate-500 uppercase tracking-wider text-[10px]">
                            <th class="px-4 py-3 font-bold">Tiket</th>
                            <th class="px-4 py-3 font-bold">Pemohon</th>
                            <th class="px-4 py-3 font-bold">Subjek</th>
                            <th class="px-4 py-3 font-bold text-center">Rating</th>
                            <th class="px-4 py-3 font-bold">Ulasan / Komentar</th>
                            <th class="px-4 py-3 font-bold">Tanggal Ulasan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach ($feedbacks as $fb)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="px-4 py-3">
                                <span class="font-mono font-bold text-brand-green-800 text-[10px]">{{ $fb->ticket_number }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <p class="font-semibold text-slate-800">{{ $fb->nama }}</p>
                                <p class="text-slate-400 text-[10px]">{{ $fb->email }}</p>
                            </td>
                            <td class="px-4 py-3 max-w-[160px]">
                                <p class="text-slate-600 truncate" title="{{ $fb->subjek }}">{{ $fb->subjek }}</p>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="inline-flex flex-col items-center space-y-1">
                                    <div class="flex items-center space-x-0.5">
                                        @for ($s = 1; $s <= 5; $s++)
                                            <svg class="w-3.5 h-3.5 fill-current {{ $s <= $fb->rating ? 'text-brand-gold-400' : 'text-slate-200' }}" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        @endfor
                                    </div>
                                    @php
                                        $labels = [1=>'Sangat Tidak Puas', 2=>'Tidak Puas', 3=>'Cukup', 4=>'Puas', 5=>'Sangat Puas'];
                                        $badgeColors = [1=>'bg-red-100 text-red-700', 2=>'bg-orange-100 text-orange-700', 3=>'bg-amber-100 text-amber-700', 4=>'bg-emerald-100 text-emerald-700', 5=>'bg-brand-green-100 text-brand-green-800'];
                                    @endphp
                                    <span class="text-[9px] font-bold px-1.5 py-0.5 rounded-full {{ $badgeColors[$fb->rating] }}">{{ $labels[$fb->rating] }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 max-w-[240px]">
                                @if ($fb->ulasan_kepuasan)
                                    <p class="text-slate-600 italic leading-relaxed line-clamp-2" title="{{ $fb->ulasan_kepuasan }}">"{{ $fb->ulasan_kepuasan }}"</p>
                                @else
                                    <span class="text-slate-300 text-[10px]">— Tidak ada komentar —</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-slate-400 whitespace-nowrap">
                                {{ $fb->updated_at->translatedFormat('d M Y H:i') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($feedbacks->hasPages())
                <div class="px-6 py-4 border-t border-slate-100">
                    {{ $feedbacks->appends(request()->query())->links() }}
                </div>
            @endif
        @endif
    </div>

</div>
@endsection
