@extends('layouts.admin')

@section('title', 'Kelola Informasi Kontak')

@section('header-left')
<h2 class="text-slate-800 font-bold text-sm font-display tracking-tight">Halaman Administrasi</h2>
@endsection

@section('content')
<!-- HEADER SUMMARY -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Informasi Kontak</h1>
        <p class="text-slate-500 text-xs mt-1">Perbarui nomor telepon, alamat email, jam operasional, alamat kantor, dan kontak WhatsApp resmi PPID Universitas Baiturrahmah.</p>
    </div>
</div>

<!-- Alert Messages -->
@if (session('success'))
<div class="flex items-center p-4 mb-4 text-emerald-800 border-l-4 border-emerald-500 bg-emerald-50 rounded-xl shadow-sm transition-all" role="alert">
    <svg class="flex-shrink-0 w-5 h-5 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>
    <div class="text-xs font-semibold">
        {{ session('success') }}
    </div>
</div>
@endif

<div class="space-y-6">
    <form action="{{ route('admin.contact.update') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 md:p-8 space-y-6">
        @csrf
        
        <div>
            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider mb-4">Informasi Kontak & Jam Operasional</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Nomor Telepon PPID</label>
                    <input type="text" name="contact_phone" value="{{ setting('contact_phone', '(0751) 4641913') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Alamat Email PPID</label>
                    <input type="email" name="contact_email" value="{{ setting('contact_email', 'ppid@unbrah.ac.id') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                </div>

                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Jam Operasional Pelayanan</label>
                    <input type="text" name="contact_hours" value="{{ setting('contact_hours', 'Senin - Jumat: 08:00 - 16:00 WIB') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                </div>
            </div>
        </div>

        <div>
            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider mb-4">Nomor WhatsApp Center</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Nomor WhatsApp (Format: 628xxxxxxxxx)</label>
                    <input type="text" name="whatsapp_number" value="{{ setting('whatsapp_number', config('services.whatsapp.number', '628116313712')) }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                    <p class="text-[10px] text-slate-400 mt-1">Pastikan menggunakan kode negara tanpa tanda "+" di depan (misal: 628116313712).</p>
                </div>
            </div>
        </div>

        <div>
            <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider mb-4">Alamat Kantor PPID</h3>
            <div class="space-y-2">
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Alamat Lengkap Kantor</label>
                <textarea name="contact_address" rows="4" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-y" required>{{ setting('contact_address', 'Jl. Raya By Pass KM 15, Aie Pacah, Kec. Koto Tangah, Kota Padang, Sumatera Barat 25176') }}</textarea>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end">
            <button type="submit" class="px-6 py-3.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform active:scale-95 flex items-center space-x-2 text-xs cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                <span>Simpan Perubahan Kontak</span>
            </button>
        </div>
    </form>
</div>
@endsection
