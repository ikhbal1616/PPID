@extends('layouts.admin')

@section('title', 'Penyalahgunaan Wewenang')

@section('header-left')
<div class="relative w-64 md:w-80">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" id="table-search" oninput="handleSearch(this.value)" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs pl-9 pr-3 py-2 rounded-xl transition-all outline-none" placeholder="Cari tiket, nama pemohon, atau subjek...">
                    </div>
    <!-- DETAIL PANEL MODAL -->
    <div id="slide-over" class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto hidden" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0" id="slide-over-backdrop" onclick="closeSlideOver()"></div>

        <!-- Panel Content (Centered Modal) -->
        <div class="relative w-full max-w-5xl bg-white rounded-3xl shadow-2xl flex flex-col justify-between transform scale-95 opacity-0 transition-all duration-300 ease-out border border-slate-100 max-h-[90vh] overflow-hidden" id="slide-over-container">

                <!-- Panel Header -->
                <div class="bg-gradient-to-r from-brand-green-900 to-brand-green-950 px-6 py-5 flex justify-between items-center text-white shrink-0">
                    <div>
                        <h3 class="text-base font-bold font-display" id="detail-ticket-id">Detail Laporan</h3>
                        <p class="text-[10px] text-brand-gold-500 tracking-wider uppercase font-semibold mt-0.5" id="detail-category-header">Kategori Pengajuan</p>
                    </div>
                    <button onclick="closeSlideOver()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <!-- Two-Column Grid Body -->
                <div class="flex-1 grid grid-cols-1 md:grid-cols-2 overflow-hidden min-h-0">
                    <!-- Left Column (Scrollable details and form inputs) -->
                    <div class="overflow-y-auto p-6 space-y-6 text-xs leading-relaxed text-slate-600 border-r border-slate-100">
                        <!-- Status Header Indicator -->
                        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 flex justify-between items-center">
                            <span class="font-bold text-slate-500 uppercase tracking-wider text-[10px]">Status Berkas Saat Ini:</span>
                            <span id="detail-status-badge" class="px-3 py-1 rounded-full text-[10px] font-bold">Pending</span>
                        </div>

                        <!-- Identitas Pemohon -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Identitas Pemohon</h4>
                            <div class="grid grid-cols-3 gap-y-2 text-slate-700">
                                <span class="text-slate-400 font-semibold">Nama Lengkap</span>
                                <span class="col-span-2 font-bold" id="detail-nama">-</span>

                                <span class="text-slate-400 font-semibold">NIK (No. KTP)</span>
                                <span class="col-span-2 font-mono" id="detail-nik">-</span>

                                <span class="text-slate-400 font-semibold">Alamat Email</span>
                                <span class="col-span-2 text-brand-green-700 font-semibold font-mono" id="detail-email">-</span>

                                <span class="text-slate-400 font-semibold">Nomor WhatsApp</span>
                                <span class="col-span-2 font-mono" id="detail-telepon">-</span>

                                <span class="text-slate-400 font-semibold">Alamat Lengkap</span>
                                <span class="col-span-2 text-[11px]" id="detail-alamat">-</span>
                            </div>
                        </div>

                        <!-- Perincian Laporan -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Isi Pesan / Perincian</h4>
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 text-slate-800 font-medium shadow-inner whitespace-pre-line" id="detail-perincian">
                                -
                            </div>
                        </div>

                        <!-- Bentuk Informasi / Cara Mendapatkan (Only visible for permohonan) -->
                        <div class="space-y-3 hidden" id="detail-delivery-container">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Metode Pengiriman & Salinan</h4>
                            <div class="grid grid-cols-3 gap-y-2 text-slate-700">
                                <span class="text-slate-400 font-semibold">Bentuk Salinan</span>
                                <span class="col-span-2 font-bold" id="detail-bentuk-salinan">-</span>

                                <span class="text-slate-400 font-semibold">Cara Ambil</span>
                                <span class="col-span-2 font-bold" id="detail-cara-ambil">-</span>
                            </div>
                        </div>

                        <!-- Lampiran Berkas -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Lampiran Berkas Pendukung</h4>
                            <div id="detail-file-container">
                                <!-- Link of file -->
                            </div>
                        </div>

                        <!-- Ganti Status Administrasi -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Ubah Status Laporan</h4>
                            <div id="detail-status-actions" class="flex flex-wrap gap-2 pt-1">
                                <!-- Dynamic buttons -->
                            </div>
                            <input type="hidden" id="detail-select-status">
                        </div>


                        <!-- Formulir Tanggapan Resmi -->
                        <div class="space-y-3">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Tulis Tanggapan Resmi</h4>
                            <textarea id="detail-response-text" rows="4" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-xl transition-all outline-none resize-none" placeholder="Tanggapan resmi..."></textarea>
                        </div>

                        <!-- Lampiran Tanggapan Resmi -->
                        <div class="space-y-3" id="detail-response-file-container">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider border-b border-slate-100 pb-1">Lampirkan Berkas Pendukung (Opsional)</h4>
                            <input type="file" id="detail-response-file" class="w-full bg-slate-50 border border-slate-200 text-slate-800 text-xs px-3 py-2 rounded-xl transition-all outline-none">
                            <div id="detail-response-file-preview" class="text-[11px] text-brand-green-700 font-semibold mt-1.5 hidden">
                                <!-- Link download file tanggapan -->
                            </div>
                        </div>

                    </div>

                    <!-- Right Column (Document / Image Preview) -->
                    <div class="p-6 bg-slate-50 flex flex-col justify-start max-h-[100%] overflow-y-auto space-y-4">
                        <div class="flex justify-between items-center border-b border-slate-200 pb-2">
                            <h4 class="font-bold text-[11px] text-slate-800 uppercase tracking-wider">Pratinjau Berkas Pendukung</h4>
                            <div id="detail-download-btn-container"></div>
                        </div>
                        <div id="detail-preview-container" class="flex-1 flex items-center justify-center border border-slate-200 rounded-2xl bg-white p-4 overflow-hidden min-h-[350px] shadow-sm">
                            <div class="text-slate-400 font-medium italic text-center">Tidak ada lampiran dokumen untuk pratinjau.</div>
                        </div>
                    </div>
                </div>

                <!-- Panel Actions Footer (For closing/cancelling, status submission is handled by dynamic buttons now) -->
                <div class="p-6 border-t border-slate-100 bg-slate-50 flex items-center justify-end space-x-3 shrink-0">
                    <button onclick="closeSlideOver()" class="px-5 py-2.5 rounded-full border border-slate-200 text-slate-500 hover:bg-slate-100 text-xs font-semibold transition-colors cursor-pointer">Tutup / Kembali</button>
                </div>
            </div>
    </div>

@endsection

@section('content')
<!-- HEADER SUMMARY -->
                <div class="flex flex-col md:flex-row md:items-center justify-between space-y-2 md:space-y-0">
                    <div>
                        <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Penyalahgunaan Wewenang</h1>
                        <p class="text-slate-500 text-xs">Kelola verifikasi, tanggapan, dan penyelesaian laporan penyalahgunaan wewenang secara online.</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="/" target="_blank" class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 font-semibold text-xs px-4 py-2.5 rounded-xl shadow-sm transition-all cursor-pointer flex items-center space-x-2">
                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            <span>Lihat Situs Utama</span>
                        </a>
                    </div>
                </div>

                <!-- METRIC CARDS ROW (Grid of 4) -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Metric Card 1 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex items-center space-x-4">
                        <div class="p-3 bg-brand-green-50 rounded-xl text-brand-green-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Total Laporan</span>
                            <span class="text-xl sm:text-2xl font-bold font-display text-slate-800" id="metric-total">0</span>
                        </div>
                    </div>

                    <!-- Metric Card 2 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex items-center space-x-4">
                        <div class="p-3 bg-amber-50 rounded-xl text-amber-600 relative">
                            <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Menunggu</span>
                            <span class="text-xl sm:text-2xl font-bold font-display text-slate-800" id="metric-pending">0</span>
                        </div>
                    </div>

                    <!-- Metric Card 3 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex items-center space-x-4">
                        <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Ditinjau</span>
                            <span class="text-xl sm:text-2xl font-bold font-display text-slate-800" id="metric-review">0</span>
                        </div>
                    </div>

                    <!-- Metric Card 4 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-5 flex items-center space-x-4">
                        <div class="p-3 bg-emerald-50 rounded-xl text-emerald-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Tuntas</span>
                            <span class="text-xl sm:text-2xl font-bold font-display text-slate-800" id="metric-resolved">0</span>
                        </div>
                    </div>
                </div>

                <!-- MAIN DATA TABLE CARD -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
                    
                    <!-- Table controls & Filter Tab Bar -->
                    <div class="p-6 border-b border-slate-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <h2 class="text-lg font-bold font-display text-slate-800 leading-tight">Daftar Pengajuan Masuk</h2>
                        
                        <!-- Status Tabs -->
                        <div class="flex flex-wrap gap-1.5 text-xs font-bold text-slate-500 bg-slate-100 rounded-xl p-1 w-fit">
                            <button onclick="setStatusFilter('all')" id="tab-all" class="tab-btn px-4 py-2 rounded-lg bg-white text-slate-800 shadow-sm transition-all cursor-pointer">Semua Status</button>
                            <button onclick="setStatusFilter('Pending')" id="tab-Pending" class="tab-btn px-4 py-2 rounded-lg hover:bg-white/50 hover:text-slate-800 transition-all cursor-pointer">Pending</button>
                            <button onclick="setStatusFilter('Ditinjau')" id="tab-Ditinjau" class="tab-btn px-4 py-2 rounded-lg hover:bg-white/50 hover:text-slate-800 transition-all cursor-pointer">Ditinjau</button>
                            <button onclick="setStatusFilter('Selesai')" id="tab-Selesai" class="tab-btn px-4 py-2 rounded-lg hover:bg-white/50 hover:text-slate-800 transition-all cursor-pointer">Selesai</button>
                            <button onclick="setStatusFilter('Ditolak')" id="tab-Ditolak" class="tab-btn px-4 py-2 rounded-lg hover:bg-white/50 hover:text-slate-800 transition-all cursor-pointer">Ditolak</button>
                        </div>
                    </div>

                    <!-- Responsive Table -->
                    <div class="overflow-x-auto w-full">
                        <table class="w-full text-left text-xs border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-[10px] font-bold text-slate-400 uppercase tracking-widest border-b border-slate-200">
                                    <th class="px-6 py-4">Tiket ID</th>
                                    <th class="px-6 py-4">Pemohon</th>
                                    <th class="px-6 py-4">Kategori</th>
                                    <th class="px-6 py-4">Subjek / Perihal</th>
                                    <th class="px-6 py-4">Tanggal Masuk</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-body" class="divide-y divide-slate-200 font-medium text-slate-700">
                                <!-- Javascript dynamically populates rows from the SQLite database array -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination / Table stats footer -->
                    <div class="p-6 border-t border-slate-200 flex items-center justify-between text-xs text-slate-400">
                        <span id="table-entries-info">Menampilkan 0 entri laporan</span>
                    </div>
                </div>
@endsection

@section('scripts')
<script>
// --- 1. POPULATE DATABASE RECORDS FROM LARAVEL ---
        const reports = @json($reports);

        // --- 2. CONTROLLERS STATE & VARIABLES ---
        let currentStatusFilter = 'all'; // Status Filter (Pending, Ditinjau, Selesai, Ditolak)
        let currentSearchQuery = '';
        let activeSelectedReport = null;

        // Parse category filter from URL query param if present
        window.addEventListener('DOMContentLoaded', () => {
            renderTable();
            updateCounts();
            
            // Set current formatted date
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('live-date').innerText = new Date().toLocaleDateString('id-ID', options);
        });

        // Toggle Sidebar visibility (Mobile responsive)
        

        // Sidebar counts & Metrics updater
        function updateCounts() {
            const total = reports.length;
            const pending = reports.filter(r => r.status === 'Pending').length;
            const ditinjau = reports.filter(r => r.status === 'Ditinjau').length;
            const selesai = reports.filter(r => r.status === 'Selesai').length;

            document.getElementById('metric-total').innerText = total;
            document.getElementById('metric-pending').innerText = pending;
            document.getElementById('metric-review').innerText = ditinjau;
            document.getElementById('metric-resolved').innerText = selesai;

            // Sidebar counts from database PHP
            const countPermohonan = {{ $sidebarCounts['permohonan'] }};
            const countKeberatan = {{ $sidebarCounts['keberatan'] }};
            const countPenyalahgunaan = {{ $sidebarCounts['penyalahgunaan'] }};
            const countPengaduan = {{ $sidebarCounts['pengaduan'] }};

            document.getElementById('sidebar-count-permohonan').innerText = countPermohonan;
            document.getElementById('sidebar-count-keberatan').innerText = countKeberatan;
            document.getElementById('sidebar-count-penyalahgunaan').innerText = countPenyalahgunaan;
            document.getElementById('sidebar-count-pengaduan').innerText = countPengaduan;
        }

        // --- 3. FILTER & SEARCH HANDLERS ---

        function setStatusFilter(statusType) {
            currentStatusFilter = statusType;
            
            // Toggle active style on tab buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-white', 'text-slate-800', 'shadow-sm');
                btn.classList.add('hover:bg-white/50', 'hover:text-slate-800');
            });

            const activeBtn = document.getElementById(`tab-${statusType}`);
            if (activeBtn) {
                activeBtn.classList.remove('hover:bg-white/50', 'hover:text-slate-800');
                activeBtn.classList.add('bg-white', 'text-slate-800', 'shadow-sm');
            }

            renderTable();
        }

        function handleSearch(query) {
            currentSearchQuery = query.toLowerCase().trim();
            renderTable();
        }

        // --- 4. TABLE RENDERER ---
        function renderTable() {
            const tbody = document.getElementById('table-body');
            tbody.innerHTML = '';

            // Filter logic
            let filteredReports = reports.filter(report => {
                const matchesStatus = (currentStatusFilter === 'all' || report.status === currentStatusFilter);
                const matchesSearch = (
                    report.id.toLowerCase().includes(currentSearchQuery) ||
                    report.nama.toLowerCase().includes(currentSearchQuery) ||
                    report.subjek.toLowerCase().includes(currentSearchQuery) ||
                    report.email.toLowerCase().includes(currentSearchQuery)
                );
                return matchesStatus && matchesSearch;
            });

            // Update Info label
            document.getElementById('table-entries-info').innerText = `Menampilkan ${filteredReports.length} entri laporan`;

            // Populate rows
            if (filteredReports.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" class="text-center py-12 text-slate-400 font-medium">
                            Tidak ada pengajuan yang cocok dengan kriteria pencarian/filter ini.
                        </td>
                    </tr>
                `;
                return;
            }

            filteredReports.forEach(report => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/80 transition-colors border-b border-slate-100';

                // Status Badge styling
                let badgeClass = '';
                if (report.status === 'Pending') badgeClass = 'bg-amber-100 text-amber-700';
                else if (report.status === 'Ditinjau') badgeClass = 'bg-blue-100 text-blue-700';
                else if (report.status === 'Selesai') badgeClass = 'bg-emerald-100 text-emerald-700';
                else if (report.status === 'Ditolak') badgeClass = 'bg-rose-100 text-rose-700';

                let categoryName = report.kategori;
                if (report.kategori === 'penyalahgunaan') categoryName = 'Penyalahgunaan Wewenang';
                else if (report.kategori === 'permohonan') categoryName = 'Permohonan';
                else if (report.kategori === 'keberatan') categoryName = 'Keberatan';
                else if (report.kategori === 'pengaduan') categoryName = 'Pengaduan';

                tr.innerHTML = `
                    <td class="px-6 py-4 font-mono font-bold text-brand-green-700">${report.id}</td>
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-900">${report.nama}</div>
                        <div class="text-[10px] text-slate-400 font-light mt-0.5">${report.email}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="capitalize bg-slate-100 text-slate-600 text-[10px] font-bold px-2.5 py-1 rounded-md">${categoryName}</span>
                    </td>
                    <td class="px-6 py-4 max-w-xs truncate font-semibold text-slate-800">${report.subjek}</td>
                    <td class="px-6 py-4 text-slate-500 font-light">${report.tanggal}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center space-x-1 px-2.5 py-1 rounded-full text-[10px] font-bold ${badgeClass}">
                            <span class="w-1.5 h-1.5 rounded-full ${report.status === 'Pending' || report.status === 'Ditinjau' ? 'animate-pulse' : ''} ${report.status === 'Pending' ? 'bg-amber-500' : report.status === 'Ditinjau' ? 'bg-blue-500' : report.status === 'Selesai' ? 'bg-emerald-500' : 'bg-rose-500'}"></span>
                            <span>${report.status}</span>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button onclick="openSlideOver('${report.id}')" class="px-3.5 py-1.5 bg-brand-green-50 text-brand-green-700 border border-brand-green-100 hover:bg-brand-green-600 hover:text-white rounded-lg font-bold text-[11px] shadow-sm transition-all hover:scale-105 cursor-pointer">Lihat Detail</button>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // --- 5. SLIDE-OVER CONTROL LOGIC ---
        function openSlideOver(ticketId) {
            const report = reports.find(r => r.id === ticketId);
            if (!report) return;

            activeSelectedReport = report;

            // Fill text elements
            document.getElementById('detail-ticket-id').innerText = `Detail Laporan ${report.id}`;
            document.getElementById('detail-category-header').innerText = `Kategori ${report.kategori.toUpperCase()}`;
            document.getElementById('detail-nama').innerText = report.nama;
            document.getElementById('detail-nik').innerText = report.nik;
            document.getElementById('detail-email').innerText = report.email;
            document.getElementById('detail-telepon').innerText = report.telepon;
            document.getElementById('detail-alamat').innerText = report.alamat;
            document.getElementById('detail-perincian').innerText = report.perincian;

            // Fill delivery options if category is permohonan
            const deliveryContainer = document.getElementById('detail-delivery-container');
            if (report.kategori === 'permohonan' && report.bentuk_informasi) {
                deliveryContainer.classList.remove('hidden');
                document.getElementById('detail-bentuk-salinan').innerText = report.bentuk_informasi;
                document.getElementById('detail-cara-ambil').innerText = report.cara_mendapatkan;
            } else {
                deliveryContainer.classList.add('hidden');
            }

            // Status Badge in slide-over
            let badgeClass = '';
            if (report.status === 'Pending') badgeClass = 'bg-amber-100 text-amber-700';
            else if (report.status === 'Ditinjau') badgeClass = 'bg-blue-100 text-blue-700';
            else if (report.status === 'Selesai') badgeClass = 'bg-emerald-100 text-emerald-700';
            else if (report.status === 'Ditolak') badgeClass = 'bg-rose-100 text-rose-700';

            const statusBadge = document.getElementById('detail-status-badge');
            statusBadge.className = `px-3 py-1 rounded-full text-[10px] font-bold ${badgeClass}`;
            statusBadge.innerText = report.status;

            // Select active status dropdown value
            document.getElementById('detail-select-status').value = report.status;

            // Fill response text area
            document.getElementById('detail-response-text').value = report.tanggapan || '';
            
            // --- DYNAMIC SEQUENTIAL WORKFLOW ACTIONS ---
            const actionsContainer = document.getElementById('detail-status-actions');
            const responseTextarea = document.getElementById('detail-response-text');
            const hiddenStatusInput = document.getElementById('detail-select-status');
            const responseFileInput = document.getElementById('detail-response-file');
            const responseFilePreview = document.getElementById('detail-response-file-preview');

            actionsContainer.innerHTML = '';
            responseTextarea.disabled = false;
            responseTextarea.placeholder = "Tulis tanggapan resmi...";
            if (responseFileInput) {
                responseFileInput.value = '';
                responseFileInput.disabled = false;
            }
            if (responseFilePreview) {
                if (report.file_tanggapan) {
                    responseFilePreview.innerHTML = `
                        <a href="${report.file_tanggapan}" target="_blank" class="inline-flex items-center space-x-1 hover:underline text-brand-green-700">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span>Unduh Berkas Lampiran Tanggapan</span>
                        </a>
                    `;
                    responseFilePreview.classList.remove('hidden');
                } else {
                    responseFilePreview.classList.add('hidden');
                }
            }

            if (report.status === 'Pending') {
                responseTextarea.disabled = true;
                if (responseFileInput) responseFileInput.disabled = true;
                responseTextarea.placeholder = "Tanggapan hanya dapat ditulis setelah laporan ditinjau.";
                actionsContainer.innerHTML = `
                    <button type="button" onclick="submitResponse('Ditinjau')" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-xs font-bold transition-all cursor-pointer shadow-md flex items-center space-x-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        <span>Mulai Tinjau Laporan</span>
                    </button>
                `;
            } else if (report.status === 'Ditinjau') {
                actionsContainer.innerHTML = `
                    <button type="button" onclick="submitResponse('Selesai')" class="px-5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold transition-all cursor-pointer shadow-md flex items-center space-x-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        <span>Selesaikan Laporan</span>
                    </button>
                    <button type="button" onclick="submitResponse('Ditolak')" class="px-5 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-xs font-bold transition-all cursor-pointer shadow-md flex items-center space-x-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span>Tolak Laporan</span>
                    </button>
                `;
            } else {
                responseTextarea.disabled = true;
                if (responseFileInput) responseFileInput.disabled = true;
                responseTextarea.placeholder = "Status laporan telah terkunci.";
                actionsContainer.innerHTML = `
                    <span class="text-xs font-bold text-slate-400 italic">Status laporan telah terkunci (${report.status})</span>
                `;
            }
            

            // Handle file attachments link
            const fileContainer = document.getElementById('detail-file-container');
            if (report.file_bukti) {
                const extension = report.file_bukti.split('.').pop().toLowerCase();
                const iconBg = extension === 'pdf' ? 'bg-rose-100 text-rose-600' : 'bg-blue-100 text-blue-600';
                
                fileContainer.innerHTML = `
                    <a href="${report.file_bukti}" target="_blank" class="flex items-center space-x-3 bg-slate-50 hover:bg-slate-100 border border-slate-200 hover:border-slate-300 rounded-xl p-3 transition-colors cursor-pointer">
                        <div class="w-10 h-10 rounded-lg ${iconBg} flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs font-bold text-slate-800 truncate">${report.file_bukti.split('/').pop()}</p>
                            <p class="text-[10px] text-slate-400 uppercase">${extension} File</p>
                        </div>
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </a>
                `;
            } else {
                fileContainer.innerHTML = `
                    <div class="text-slate-400 font-medium italic py-2">Tidak ada lampiran dokumen.</div>
                `;
            }

            // Handle preview container and download button
            const previewContainer = document.getElementById('detail-preview-container');
            const downloadBtnContainer = document.getElementById('detail-download-btn-container');
            if (report.file_bukti) {
                const extension = report.file_bukti.split('.').pop().toLowerCase();
                const isImage = ['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(extension);
                
                // Show download button
                downloadBtnContainer.innerHTML = `
                    <a href="${report.file_bukti}" download class="inline-flex items-center space-x-1.5 px-3 py-1.5 bg-brand-green-50 text-brand-green-700 hover:bg-brand-green-600 hover:text-white rounded-lg font-bold text-[10px] transition-all duration-200 border border-brand-green-100 shadow-sm cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        <span>Unduh Berkas</span>
                    </a>
                `;

                if (isImage) {
                    previewContainer.innerHTML = `
                        <img src="${report.file_bukti}" alt="Pratinjau Berkas" class="max-w-full max-h-[350px] object-contain rounded-xl shadow-sm border border-slate-200">
                    `;
                } else if (extension === 'pdf') {
                    previewContainer.innerHTML = `
                        <iframe src="${report.file_bukti}" class="w-full h-[350px] rounded-xl border border-slate-200" frameborder="0"></iframe>
                    `;
                } else {
                    previewContainer.innerHTML = `
                        <div class="text-center p-4">
                            <div class="w-16 h-16 mx-auto rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            </div>
                            <p class="text-xs font-bold text-slate-800">${report.file_bukti.split('/').pop()}</p>
                            <p class="text-[10px] text-slate-400 uppercase mt-1">${extension} File</p>
                        </div>
                    `;
                }
            } else {
                downloadBtnContainer.innerHTML = '';
                previewContainer.innerHTML = `
                    <div class="text-slate-400 font-medium italic text-center">Tidak ada lampiran dokumen untuk pratinjau.</div>
                `;
            }

            // Open animations
            const slideOver = document.getElementById('slide-over');
            const backdrop = document.getElementById('slide-over-backdrop');
            const container = document.getElementById('slide-over-container');

            slideOver.classList.remove('hidden');
            setTimeout(() => {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        function closeSlideOver() {
            const backdrop = document.getElementById('slide-over-backdrop');
            const container = document.getElementById('slide-over-container');

            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                document.getElementById('slide-over').classList.add('hidden');
            }, 300);
        }

        // --- 6. AJAX DB UPDATE ---
        function submitResponse(targetStatus) {
            if (!activeSelectedReport) return;

            const tanggapanText = document.getElementById('detail-response-text').value.trim();

            if ((targetStatus === 'Selesai' || targetStatus === 'Ditolak') && !tanggapanText) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Tanggapan Wajib',
                    text: 'Tanggapan resmi wajib diisi untuk menyelesaikan/menolak laporan.'
                });
                return;
            }

            // Show Loading Screen
            Swal.fire({
                title: 'Memproses...',
                text: 'Mohon tunggu, sedang memperbarui status dan mengirim email notifikasi.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Prepare FormData for file upload
            const formData = new FormData();
            formData.append('status', targetStatus);
            formData.append('tanggapan', tanggapanText);
            
            const fileInput = document.getElementById('detail-response-file');
            if (fileInput && fileInput.files[0]) {
                formData.append('file_tanggapan', fileInput.files[0]);
            }

            // Submit via AJAX
            fetch(`/admin/permohonan/${activeSelectedReport.db_id}/update`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Update local state
                    const index = reports.findIndex(r => r.db_id === activeSelectedReport.db_id);
                    if (index !== -1) {
                        reports[index].status = targetStatus;
                        reports[index].tanggapan = tanggapanText;
                        if (data.data && data.data.file_tanggapan) {
                            reports[index].file_tanggapan = data.data.file_tanggapan;
                        }
                    }
                    
                    // Re-render
                    renderTable();
                    if (typeof updateCounts === 'function') updateCounts();
                    if (typeof updateMetrics === 'function') updateMetrics();
                    closeSlideOver();
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'Status dan tanggapan laporan berhasil diperbarui.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Gagal memperbarui status: ' + data.message
                    });
                }
            })
            .catch(err => {
                console.error(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan!',
                    text: 'Terjadi kesalahan saat menyimpan tanggapan.'
                });
            });
        }
        
        </script>
@endsection
