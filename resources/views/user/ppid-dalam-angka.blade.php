@extends('layouts.frontend')

@section('title', 'PPID Dalam Angka')

@section('content')
<!-- HERO SECTION -->
    <section class="relative bg-gradient-to-br from-brand-green-950 to-brand-green-900 py-12 text-white overflow-hidden shadow-xl">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 space-y-3">
            <h1 class="text-3xl sm:text-5xl md:text-6xl font-bold font-display tracking-tight text-white leading-tight drop-shadow">
                PPID Dalam Angka <br class="hidden sm:inline">
                <span class="bg-gradient-to-r from-brand-gold-500 to-brand-gold-100 bg-clip-text text-transparent">Universitas Baiturrahmah</span>
            </h1>
            <p class="text-base md:text-lg text-slate-300/90 max-w-none mx-auto font-light leading-relaxed">
                Visualisasi data dan transparansi performa pelayanan informasi publik Universitas Baiturrahmah secara real-time.
            </p>
        </div>
    </section>

    <!-- STATISTICS CONTENT SECTION -->
    <section class="py-20 bg-white text-slate-800 relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10 space-y-16">

            <!-- 4 Grid Core Metrics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Total requests -->
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-brand-green-50 text-brand-green-700 flex items-center justify-center shrink-0 shadow-sm group-hover:bg-brand-green-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <span class="text-2xl sm:text-3xl font-extrabold text-slate-900 block font-display">{{ setting('angka_total_permohonan', '342') }}</span>
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mt-1">Total Permohonan</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400 font-light mt-4 pt-3 border-t border-slate-200/50">Seluruh permohonan masuk secara online & offline.</p>
                </div>

                <!-- Card 2: Completed -->
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-brand-green-50 text-brand-green-700 flex items-center justify-center shrink-0 shadow-sm group-hover:bg-brand-green-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="text-2xl sm:text-3xl font-extrabold text-brand-green-700 block font-display">{{ setting('angka_selesai_tindaklanjut', '328') }}</span>
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mt-1">Selesai Ditindaklanjuti</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400 font-light mt-4 pt-3 border-t border-slate-200/50">Diterima dan dokumen berhasil diserahkan.</p>
                </div>

                <!-- Card 3: Rejected -->
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-brand-green-50 text-brand-green-700 flex items-center justify-center shrink-0 shadow-sm group-hover:bg-brand-green-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div>
                            <span class="text-2xl sm:text-3xl font-extrabold text-red-600 block font-display">{{ setting('angka_ditolak_dikecualikan', '14') }}</span>
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mt-1">Ditolak / Dikecualikan</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400 font-light mt-4 pt-3 border-t border-slate-200/50">Dokumen rahasia / melanggar privasi UU KIP.</p>
                </div>

                <!-- Card 4: Average response time -->
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-brand-green-50 text-brand-green-700 flex items-center justify-center shrink-0 shadow-sm group-hover:bg-brand-green-600 group-hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="text-2xl sm:text-3xl font-extrabold text-brand-gold-500 block font-display">{{ setting('angka_rata_waktu_proses', '4.8 Hari') }}</span>
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider block mt-1">Rata-rata Waktu Proses</span>
                        </div>
                    </div>
                    <p class="text-[11px] text-slate-400 font-light mt-4 pt-3 border-t border-slate-200/50">Jauh di bawah batas maksimal (10 hari kerja).</p>
                </div>
            </div>

            <!-- Charts/Breakdown Section (Tailwind Progress Bars) -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 pt-8">
                <!-- Left Chart: Applicant Categories -->
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-8 shadow-sm space-y-6">
                    <h3 class="font-bold text-slate-800 text-lg font-display">Permohonan Berdasarkan Kategori Pemohon</h3>
                    
                    <div class="space-y-4">
                        <!-- Category 1 -->
                        <div class="space-y-1">
                            <div class="flex justify-between text-xs font-bold text-slate-600">
                                <span>Masyarakat Umum</span>
                                <span>154 Pemohon (45%)</span>
                            </div>
                            <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                <div class="bg-brand-green-700 h-full rounded-full" style="width: 45%"></div>
                            </div>
                        </div>

                        <!-- Category 2 -->
                        <div class="space-y-1">
                            <div class="flex justify-between text-xs font-bold text-slate-600">
                                <span>Mahasiswa Universitas</span>
                                <span>128 Pemohon (37%)</span>
                            </div>
                            <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                <div class="bg-brand-green-600 h-full rounded-full" style="width: 37%"></div>
                            </div>
                        </div>

                        <!-- Category 3 -->
                        <div class="space-y-1">
                            <div class="flex justify-between text-xs font-bold text-slate-600">
                                <span>Lembaga Swadaya / Pers</span>
                                <span>42 Pemohon (12%)</span>
                            </div>
                            <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                <div class="bg-brand-gold-500 h-full rounded-full" style="width: 12%"></div>
                            </div>
                        </div>

                        <!-- Category 4 -->
                        <div class="space-y-1">
                            <div class="flex justify-between text-xs font-bold text-slate-600">
                                <span>Dosen / Akademisi</span>
                                <span>18 Pemohon (6%)</span>
                            </div>
                            <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                <div class="bg-slate-400 h-full rounded-full" style="width: 6%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Chart: Request Channels -->
                <div class="bg-slate-50 border border-slate-100 rounded-3xl p-8 shadow-sm space-y-6">
                    <h3 class="font-bold text-slate-800 text-lg font-display">Saluran Penerimaan Permohonan</h3>
                    
                    <div class="space-y-4">
                        <!-- Channel 1 -->
                        <div class="space-y-1">
                            <div class="flex justify-between text-xs font-bold text-slate-600">
                                <span>Portal Online (Website PPID)</span>
                                <span>245 Pengajuan (72%)</span>
                            </div>
                            <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                <div class="bg-brand-green-700 h-full rounded-full" style="width: 72%"></div>
                            </div>
                        </div>

                        <!-- Channel 2 -->
                        <div class="space-y-1">
                            <div class="flex justify-between text-xs font-bold text-slate-600">
                                <span>WhatsApp Center PPID</span>
                                <span>68 Pengajuan (20%)</span>
                            </div>
                            <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                <div class="bg-brand-green-500 h-full rounded-full" style="width: 20%"></div>
                            </div>
                        </div>

                        <!-- Channel 3 -->
                        <div class="space-y-1">
                            <div class="flex justify-between text-xs font-bold text-slate-600">
                                <span>Datang Langsung (Meja Layanan)</span>
                                <span>29 Pengajuan (8%)</span>
                            </div>
                            <div class="w-full bg-slate-200 h-2.5 rounded-full overflow-hidden">
                                <div class="bg-brand-gold-500 h-full rounded-full" style="width: 8%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER SECTION -->
@endsection
