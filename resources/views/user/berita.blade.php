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
                <form method="GET" action="{{ route('berita.index') }}" id="search-form">
                    <input type="text" name="search" id="search-input" value="{{ $search }}" placeholder="Cari judul berita atau deskripsi..." class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs pl-12 pr-4 py-4 rounded-2xl shadow-sm outline-none transition-all duration-300" oninput="delayedSearch()">
                    <input type="hidden" name="tag" id="tag-hidden" value="{{ $tag }}">
                </form>
                <div class="absolute left-4 top-4 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <!-- Category Filter Tags (maps to API 'tag' parameter) -->
            <div class="flex flex-wrap items-center gap-2" id="category-filters">
                @php
                    $tags = ['all' => 'Semua', 'News' => 'News', 'Prestasi' => 'Prestasi', 'Event' => 'Event', 'Kerja Sama' => 'Kerja Sama', 'Sosial' => 'Sosial', 'Pengumuman' => 'Pengumuman'];
                @endphp
                @foreach ($tags as $tagKey => $tagLabel)
                    @php $isActive = ($tagKey === 'all' && !$tag) || $tag === $tagKey; @endphp
                    <a href="{{ route('berita.index', array_merge(request()->only('search'), $tagKey === 'all' ? [] : ['tag' => $tagKey])) }}"
                       class="category-btn px-4 py-2.5 rounded-xl text-xs font-bold transition-all duration-300 cursor-pointer border border-transparent
                              {{ $isActive ? 'bg-brand-green-900 text-white shadow-md shadow-brand-green-900/20' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                        {{ $tagLabel }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="news-grid">
            @forelse ($beritaList as $berita)
            <div class="news-card bg-white rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col justify-between"
                 data-category="{{ strtolower($berita['tag'] ?? 'umum') }}"
                 data-title="{{ strtolower($berita['title'] ?? '') }}">
                <div>
                    <!-- Image -->
                    <div class="relative overflow-hidden h-56">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 opacity-60"></div>
                        <img src="{{ $berita['image'] }}" alt="{{ $berita['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy" onerror="this.src='/images/slider1.png'">
                        <span class="absolute top-4 left-4 z-20 bg-brand-green-900 text-white font-bold text-[10px] tracking-widest uppercase px-3 py-1.5 rounded-lg">
                            {{ $berita['tag'] ?? 'Berita' }}
                        </span>
                    </div>
                    <!-- Body -->
                    <div class="p-6 space-y-3">
                        <div class="flex items-center space-x-3 text-xs text-slate-400">
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>{{ $berita['date'] ?? '-' }}</span>
                            </span>
                            <span>•</span>
                            <span class="flex items-center space-x-1">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>{{ $berita['author'] ?? 'Humas Unbrah' }}</span>
                            </span>
                        </div>
                        <h3 class="font-bold font-display text-slate-900 text-base sm:text-lg group-hover:text-brand-green-600 transition-colors leading-snug line-clamp-2">
                            {{ $berita['title'] }}
                        </h3>
                        <p class="text-slate-500 text-xs leading-relaxed line-clamp-3">
                            {{ $berita['excerpt'] ?? '' }}
                        </p>
                    </div>
                </div>
                <!-- Action -->
                <div class="px-6 pb-6 pt-4 border-t border-slate-100/60 flex items-center justify-between">
                    <a href="/berita/{{ $berita['id'] }}" class="text-brand-green-900 hover:text-brand-green-950 font-bold text-xs flex items-center space-x-1 cursor-pointer group/link transition-colors">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-3.5 h-3.5 transform group-hover/link:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <span class="text-[10px] text-slate-400 font-semibold font-mono">#{{ strtolower(str_replace(' ', '-', $berita['tag'] ?? 'berita')) }}</span>
                </div>
            </div>
            @empty
            <!-- Empty / Error State -->
            <div class="col-span-3 text-center py-20 bg-white rounded-3xl border border-slate-200/50 shadow-sm max-w-md mx-auto space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800 text-base">Berita Tidak Tersedia</h3>
                <p class="text-slate-500 text-xs px-6">Berita sedang tidak dapat dimuat. Pastikan koneksi internet tersedia atau coba lagi nanti.</p>
                <a href="{{ route('berita.index') }}" class="inline-block px-5 py-2.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold text-xs rounded-xl shadow-md cursor-pointer transition-colors border-0">Muat Ulang</a>
            </div>
            @endforelse
        </div>

        <!-- Empty Search State -->
        <div id="empty-state" class="hidden text-center py-20 bg-white rounded-3xl border border-slate-200/50 shadow-sm max-w-md mx-auto space-y-4">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="font-bold text-slate-800 text-base">Berita Tidak Ditemukan</h3>
            <p class="text-slate-500 text-xs px-6">Maaf, kami tidak dapat menemukan berita yang sesuai dengan kata kunci yang Anda cari.</p>
            <button onclick="resetFilters()" class="px-5 py-2.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold text-xs rounded-xl shadow-md cursor-pointer transition-colors border-0">Lihat Semua Berita</button>
        </div>

        <!-- Pagination -->
        @if (!empty($pagination) && ($pagination['totalPages'] ?? 1) > 1)
        <div class="flex items-center justify-center space-x-2 pt-4">
            @if ($page > 1)
                <a href="{{ route('berita.index', array_merge(request()->only('search', 'tag'), ['page' => $page - 1])) }}"
                   class="px-4 py-2.5 bg-white border border-slate-200 text-slate-700 hover:bg-brand-green-50 hover:border-brand-green-300 text-xs font-bold rounded-xl transition-all shadow-sm">
                    ← Sebelumnya
                </a>
            @endif
            <span class="px-4 py-2.5 bg-brand-green-900 text-white text-xs font-bold rounded-xl shadow">
                {{ $page }} / {{ $pagination['totalPages'] ?? 1 }}
            </span>
            @if ($page < ($pagination['totalPages'] ?? 1))
                <a href="{{ route('berita.index', array_merge(request()->only('search', 'tag'), ['page' => $page + 1])) }}"
                   class="px-4 py-2.5 bg-white border border-slate-200 text-slate-700 hover:bg-brand-green-50 hover:border-brand-green-300 text-xs font-bold rounded-xl transition-all shadow-sm">
                    Selanjutnya →
                </a>
            @endif
        </div>
        @endif
    </div>
</section>
<script>
    // Debounced server-side search
    let searchTimer = null;
    function delayedSearch() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
            document.getElementById('search-form').submit();
        }, 600);
    }

    // Client-side title filter (instant within current page results)
    function filterNews() {
        const query = document.getElementById('search-input').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.news-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const cardTitle = card.getAttribute('data-title').toLowerCase();
            if (cardTitle.includes(query)) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        const emptyState = document.getElementById('empty-state');
        const newsGrid   = document.getElementById('news-grid');
        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
            newsGrid.classList.add('hidden');
        } else {
            emptyState.classList.add('hidden');
            newsGrid.classList.remove('hidden');
        }
    }

    function resetFilters() {
        window.location.href = '{{ route("berita.index") }}';
    }
</script>
@endsection
