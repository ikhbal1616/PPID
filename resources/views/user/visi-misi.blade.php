@extends('layouts.frontend')

@section('title', 'Visi & Misi')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                Visi & Misi PPID <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Panduan dan komitmen strategis kami dalam menghadirkan keterbukaan informasi di lingkungan kampus.
            </p>
        </div>
    </section>

    <!-- VISI & MISI CONTENT SECTION -->
    <section class="py-24 bg-white text-slate-800 relative overflow-hidden">
        
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
            <!-- Visi & Misi Layout (Grid) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <!-- Visi (Col span 5) -->
                <div class="lg:col-span-5 bg-gradient-to-br from-brand-green-900 to-brand-green-950 border border-brand-green-800/80 rounded-3xl p-8 flex flex-col justify-between shadow-xl">
                    <div class="space-y-6">
                        <div class="inline-flex items-center justify-center px-4 py-1 rounded-full bg-brand-gold-500/15 border border-brand-gold-500/30 text-xs font-bold text-brand-gold-500 uppercase tracking-widest">
                            Visi
                        </div>
                        <h3 class="text-2xl sm:text-3xl font-bold font-display text-white leading-snug">
                            "{{ setting('visi_text', 'Mewujudkan Pelayanan Informasi Publik Universitas Baiturrahmah yang Cepat, Transparan, Akuntabel dan Kredibel.') }}"
                        </h3>
                    </div>
                    <div class="pt-8 border-t border-brand-green-800/50 mt-8 text-slate-400 text-xs font-light tracking-wide uppercase">
                        PPID UNBRAH
                    </div>
                </div>

                <!-- Misi (Col span 7) -->
                <div class="lg:col-span-7 bg-gradient-to-br from-brand-green-900 to-brand-green-950 border border-brand-green-800/80 rounded-3xl p-8 shadow-xl flex flex-col justify-between text-white">
                    <div class="space-y-6">
                        <div class="inline-flex items-center justify-center px-4 py-1 rounded-full bg-brand-gold-500/15 border border-brand-gold-500/30 text-xs font-bold text-brand-gold-500 uppercase tracking-widest">
                            Misi
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Misi 1 -->
                            <div class="flex items-start space-x-4 group">
                                <div class="w-8 h-8 rounded-lg bg-brand-gold-500/20 border border-brand-gold-500/30 flex items-center justify-center text-brand-gold-500 font-bold text-xs shrink-0 group-hover:bg-brand-gold-500 group-hover:text-brand-green-950 transition-colors duration-300">
                                    01
                                </div>
                                <p class="text-slate-200 text-sm md:text-base leading-relaxed font-light">
                                    {{ setting('misi_1', 'Meningkatkan pengelolaan dokumentasi dan sistem pelayanan informasi publik yang terintegrasi secara digital.') }}
                                </p>
                            </div>
                            
                            <!-- Misi 2 -->
                            <div class="flex items-start space-x-4 group">
                                <div class="w-8 h-8 rounded-lg bg-brand-gold-500/20 border border-brand-gold-500/30 flex items-center justify-center text-brand-gold-500 font-bold text-xs shrink-0 group-hover:bg-brand-gold-500 group-hover:text-brand-green-950 transition-colors duration-300">
                                    02
                                </div>
                                <p class="text-slate-200 text-sm md:text-base leading-relaxed font-light">
                                    {{ setting('misi_2', 'Menyediakan akses informasi publik yang mudah, murah, tepat, akurat, dan tidak menyesatkan bagi pemohon.') }}
                                </p>
                            </div>
                            
                            <!-- Misi 3 -->
                            <div class="flex items-start space-x-4 group">
                                <div class="w-8 h-8 rounded-lg bg-brand-gold-500/20 border border-brand-gold-500/30 flex items-center justify-center text-brand-gold-500 font-bold text-xs shrink-0 group-hover:bg-brand-gold-500 group-hover:text-brand-green-950 transition-colors duration-300">
                                    03
                                </div>
                                <p class="text-slate-200 text-sm md:text-base leading-relaxed font-light">
                                    {{ setting('misi_3', 'Mengembangkan kompetensi petugas pengelola informasi publik demi kualitas pelayanan yang prima dan ramah.') }}
                                </p>
                            </div>

                            <!-- Misi 4 -->
                            <div class="flex items-start space-x-4 group">
                                <div class="w-8 h-8 rounded-lg bg-brand-gold-500/20 border border-brand-gold-500/30 flex items-center justify-center text-brand-gold-500 font-bold text-xs shrink-0 group-hover:bg-brand-gold-500 group-hover:text-brand-green-950 transition-colors duration-300">
                                    04
                                </div>
                                <p class="text-slate-200 text-sm md:text-base leading-relaxed font-light">
                                    {{ setting('misi_4', 'Mewujudkan keterbukaan informasi di lingkungan kampus secara profesional, kredibel, dan bertanggung jawab sesuai konstitusi.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
@endsection
