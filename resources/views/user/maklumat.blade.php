@extends('layouts.frontend')

@section('title', 'Maklumat Pelayanan PPID')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Maklumat Pelayanan PPID <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Pernyataan komitmen resmi kami dalam menyelenggarakan pelayanan informasi publik yang bersih, transparan, dan terpercaya.
            </p>
        </div>
    </section>

    <!-- MAKLUMAT CONTENT SECTION -->
    <section class="py-20 bg-white text-slate-800 relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">
                
                <!-- Left Column: Maklumat Charter Card (Takes 5 cols) -->
                <div class="lg:col-span-5 flex">
                    <div class="w-full bg-white text-slate-800 rounded-[24px] p-6 md:p-8 border border-slate-150 shadow-[0_10px_35px_rgba(0,0,0,0.03)] hover:shadow-[0_15px_45px_rgba(0,0,0,0.06)] transition-all duration-300 flex flex-col justify-between relative overflow-hidden h-full">
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <span class="block text-brand-green-700 font-bold text-[10px] md:text-xs uppercase tracking-widest font-display">Maklumat Pelayanan Informasi Publik</span>
                                <h2 class="text-xl md:text-2xl font-extrabold font-display leading-tight tracking-normal text-slate-800">
                                    PERNYATAAN KOMITMEN PELAYANAN
                                </h2>
                            </div>
                            
                            <!-- Divider Line -->
                            <div class="w-full border-t border-slate-100 my-2"></div>
                            
                            <!-- The Pledge Text -->
                            <p class="text-sm sm:text-base text-slate-600 font-light leading-relaxed italic font-display">
                                "{{ trim(setting('maklumat_text', 'Kami pengelola PPID Universitas Baiturrahmah dengan ini menyatakan sanggup menyelenggarakan pelayanan informasi publik secara profesional, transparan, cepat, tepat waktu, dan akuntabel sesuai dengan ketentuan perundang-undangan demi mewujudkan kepuasan publik.'), ' "') }}"
                            </p>
                        </div>
                        
                        <!-- Authority/Signature representation -->
                        <div class="pt-6 mt-6 border-t border-slate-100 flex flex-col space-y-0.5">
                            <span class="text-[9px] text-slate-400 tracking-widest uppercase font-bold">Ditetapkan oleh</span>
                            <span class="text-xs sm:text-sm font-bold text-brand-green-700 tracking-wider">PPID Universitas Baiturrahmah</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column: 4 Pillars of Commitment (Takes 7 cols) -->
                <div class="lg:col-span-7 flex flex-col justify-between space-y-8">
                    <div class="space-y-3">
                        <span class="text-brand-green-600 font-bold text-xs uppercase tracking-widest">Prinsip Pelayanan Kami</span>
                        <h3 class="text-2xl sm:text-3xl font-bold font-display text-slate-900 leading-tight">4 Pilar Komitmen PPID Universitas Baiturrahmah</h3>
                        <p class="text-slate-500 text-xs sm:text-sm font-light leading-relaxed">
                            Kami mendedikasikan standar pelayanan terbaik untuk memastikan hak informasi Anda terpenuhi melalui empat nilai dasar berikut:
                        </p>
                    </div>
                    
                    @php
                        $pillars = json_decode(setting('pillars_list'), true);
                        if (empty($pillars)) {
                            $pillars = [
                                [
                                    "title" => "Transparansi Mutlak",
                                    "icon" => "eye",
                                    "desc" => "Menyediakan informasi publik secara terbuka tanpa mempersulit prosedur, kecuali informasi yang dikecualikan hukum."
                                ],
                                [
                                    "title" => "Ketepatan & Kecepatan",
                                    "icon" => "clock",
                                    "desc" => "Merespon permohonan informasi secepatnya dalam tenggat maksimal regulasi (10 + 7 hari kerja)."
                                ],
                                [
                                    "title" => "Keadilan & Kesetaraan",
                                    "icon" => "scale",
                                    "desc" => "Melayani adil tanpa diskriminasi suku, agama, ras, golongan, selama tidak melanggar hukum."
                                ],
                                [
                                    "title" => "Bebas Pungutan Biaya",
                                    "icon" => "check",
                                    "desc" => "Tanpa pungutan liar. Biaya penggandaan data fisik (hardcopy) sepenuhnya ditanggung pemohon."
                                ]
                            ];
                        }
                    @endphp

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach ($pillars as $p)
                            @php
                                $iconSvg = '';
                                if ($p['icon'] === 'eye') {
                                    $iconSvg = '<svg class="w-6 h-6 text-brand-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>';
                                } elseif ($p['icon'] === 'clock') {
                                    $iconSvg = '<svg class="w-6 h-6 text-brand-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
                                } elseif ($p['icon'] === 'scale') {
                                    $iconSvg = '<svg class="w-6 h-6 text-brand-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 009 11V5a2 2 0 00-2-2H4a2 2 0 00-2 2v6a12 12 0 004.538 9.387m12.822-.099A13.915 13.915 0 0019 11V5a2 2 0 00-2-2h-3a2 2 0 00-2 2v6a12 12 0 004.538 9.387m-4.538-2.677L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>';
                                } else { // check
                                    $iconSvg = '<svg class="w-6 h-6 text-brand-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138z"></path></svg>';
                                }
                            @endphp
                            <div class="bg-white border border-slate-100 rounded-[20px] p-5 hover:shadow-md transition-all duration-300 flex items-start space-x-4">
                                <div class="w-12 h-12 rounded-xl bg-[#f0faf2] border border-[#e2f5e7] flex items-center justify-center shrink-0 shadow-sm">
                                    {!! $iconSvg !!}
                                </div>
                                <div class="space-y-1">
                                    <h4 class="font-bold text-slate-800 text-xs sm:text-sm">{{ $p['title'] }}</h4>
                                    <p class="text-slate-500 text-[11px] sm:text-xs font-light leading-relaxed">
                                        {{ $p['desc'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER SECTION -->
@endsection
