@extends('layouts.admin')

@section('title', 'Kelola Agenda Kegiatan')

@section('header-left')
<h2 class="text-slate-800 font-bold text-sm font-display tracking-tight">Halaman Administrasi</h2>
@endsection

@section('content')
<!-- HEADER SUMMARY -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Agenda Kegiatan (Halaman Utama)</h1>
                        <p class="text-slate-500 text-xs mt-1">Perbarui judul utama, deskripsi pengantar, dan daftar timeline kartu kegiatan secara interaktif.</p>
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
                    <form action="{{ route('admin.agenda-kegiatan.update') }}" method="POST" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 md:p-8 space-y-8">
                        @csrf
                        
                        <!-- HIDDEN SERIALIZED DATA INPUT -->
                        <input type="hidden" name="agenda_kegiatan_list" id="agenda-kegiatan-list-input" value="{{ json_encode($agendas) }}">

                        <!-- CONTENT CONTAINER -->
                        <div class="space-y-8">

                            <!-- SECTION 1: NARASI UTAMA -->
                            <div class="space-y-6">
                                <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider">1. Konten Teks & Narasi Utama</h3>
                                <div class="space-y-4">
                                    <div class="space-y-2">
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Judul Utama Agenda</label>
                                        <input type="text" name="agenda_kegiatan_title" value="{{ setting('agenda_kegiatan_title', 'Timeline & Jadwal Aktivitas PPID') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                    </div>

                                    <div class="space-y-2">
                                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Deskripsi Singkat / Narasi</label>
                                        <textarea name="agenda_kegiatan_desc" rows="4" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-y" required>{{ setting('agenda_kegiatan_desc', 'Ikuti jadwal pelaksanaan kegiatan, sosialisasi, dan monitoring keterbukaan informasi publik terbaru dari kami.') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- SECTION 2: DAFTAR AGENDA (LIST / TABLE VIEW WITH MODAL) -->
                            <div class="space-y-6 pt-4">
                                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                    <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider">2. Daftar Agenda Timeline</h3>
                                    <!-- Add New button opens empty modal -->
                                    <button type="button" onclick="openAgendaModal(-1)" class="px-4 py-2 bg-brand-green-700 hover:bg-brand-green-800 text-white text-xs font-bold rounded-xl transition-all cursor-pointer flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                        <span>Tambah Kegiatan Baru</span>
                                    </button>
                                </div>

                                <!-- Responsive Table Layout -->
                                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                                    <table class="min-w-full divide-y divide-slate-200 text-left text-xs text-slate-700">
                                        <thead class="bg-slate-50 font-bold uppercase text-[10px] tracking-wider text-slate-500">
                                            <tr>
                                                <th scope="col" class="px-6 py-4 w-[5%]">No</th>
                                                <th scope="col" class="px-6 py-4 w-[15%]">Tanggal</th>
                                                <th scope="col" class="px-6 py-4 w-[25%]">Nama Kegiatan</th>
                                                <th scope="col" class="px-6 py-4 w-[15%]">Lokasi</th>
                                                <th scope="col" class="px-6 py-4 w-[30%]">Deskripsi Singkat</th>
                                                <th scope="col" class="px-6 py-4 w-[10%] text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-200 bg-white" id="agenda-table-body">
                                            <!-- Dynamically filled by Javascript -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!-- SUBMIT BUTTON -->
                        <div class="pt-6 border-t border-slate-100 flex justify-end">
                            <button type="submit" class="px-6 py-3.5 bg-brand-green-700 hover:bg-brand-green-800 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform active:scale-[0.98] flex items-center space-x-2 text-xs cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                                <span>Simpan Perubahan</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- POP-UP MODAL EDIT/ADD FORM -->
                <div id="agenda-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
                    <!-- Backdrop -->
                    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeAgendaModal()"></div>

                    <!-- Modal Content Container -->
                    <div class="relative bg-white rounded-3xl max-w-lg w-full p-6 md:p-8 space-y-4 shadow-2xl z-10 mx-4 transform transition-all scale-95 opacity-0 duration-300" id="modal-container">
                        <button type="button" onclick="closeAgendaModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>

                        <h3 class="text-base font-bold text-slate-850 uppercase tracking-wider border-b border-slate-100 pb-3" id="modal-title">Edit Agenda Kegiatan</h3>

                        <div class="space-y-3 pt-2">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div class="space-y-1">
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Tanggal Kegiatan</label>
                                    <input type="text" id="modal-input-date" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required placeholder="Contoh: 15 Juli 2026">
                                </div>
                                <div class="space-y-1">
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Lokasi Kegiatan</label>
                                    <input type="text" id="modal-input-location" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required placeholder="Contoh: Aula Kampus">
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Nama/Judul Kegiatan</label>
                                <input type="text" id="modal-input-title" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required placeholder="Contoh: Sosialisasi UU KIP">
                            </div>

                            <div class="space-y-1">
                                <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Deskripsi Singkat</label>
                                <textarea id="modal-input-desc" rows="3" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none resize-y" required placeholder="Contoh: Deskripsi singkat tentang agenda."></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t border-slate-100">
                            <button type="button" onclick="closeAgendaModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold rounded-xl transition-all cursor-pointer">Batal</button>
                            <button type="button" onclick="saveAgendaModal()" class="px-4 py-2 bg-brand-green-700 hover:bg-brand-green-800 text-white text-xs font-bold rounded-xl transition-all cursor-pointer flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
@endsection

@section('scripts')
<script>
window.addEventListener('DOMContentLoaded', () => {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('live-date').innerText = new Date().toLocaleDateString('id-ID', options);
            
            // Set dynamic sidebar counts
            const counts = {!! json_encode($sidebarCounts) !!};
            if (counts) {
                document.getElementById('sidebar-count-permohonan').innerText = counts.permohonan || 0;
                document.getElementById('sidebar-count-keberatan').innerText = counts.keberatan || 0;
                document.getElementById('sidebar-count-penyalahgunaan').innerText = counts.penyalahgunaan || 0;
                document.getElementById('sidebar-count-pengaduan').innerText = counts.pengaduan || 0;
            }

            // Render initial table rows
            renderAgendaTable();
        });



        // DYNAMIC AGENDA DATA & ACTIONS
        let agendas = {!! json_encode($agendas) !!};
        let currentEditIndex = -1;

        // Render Table Body
        function renderAgendaTable() {
            const tbody = document.getElementById('agenda-table-body');
            tbody.innerHTML = '';

            if (agendas.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-slate-400 font-semibold italic">
                            Tidak ada agenda kegiatan. Silakan tambah kegiatan baru.
                        </td>
                    </tr>
                `;
                return;
            }

            agendas.forEach((item, index) => {
                const tr = document.createElement('tr');
                tr.className = 'hover:bg-slate-50/60 transition-colors';
                tr.innerHTML = `
                    <td class="px-6 py-4 font-bold text-slate-500">${index + 1}</td>
                    <td class="px-6 py-4 font-bold text-brand-green-800 text-[11px] uppercase">${escapeHtml(item.date)}</td>
                    <td class="px-6 py-4 font-semibold text-slate-900">${escapeHtml(item.title)}</td>
                    <td class="px-6 py-4 font-bold text-slate-500 uppercase text-[10px] tracking-wider">${escapeHtml(item.location)}</td>
                    <td class="px-6 py-4 text-slate-500 max-w-xs truncate">${escapeHtml(item.desc)}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center space-x-2.5">
                            <button type="button" onclick="openAgendaModal(${index})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 hover:text-slate-800 transition-colors cursor-pointer" title="Edit Kegiatan">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                            <button type="button" onclick="deleteAgendaItem(${index})" class="p-1.5 rounded-lg bg-slate-100 hover:bg-red-50 text-slate-600 hover:text-red-600 transition-colors cursor-pointer" title="Hapus Kegiatan">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            });

            // Update the hidden input field value
            document.getElementById('agenda-kegiatan-list-input').value = JSON.stringify(agendas);
        }

        // Open Modal (Index = -1 means add mode)
        function openAgendaModal(index) {
            currentEditIndex = index;
            const modal = document.getElementById('agenda-modal');
            const container = document.getElementById('modal-container');
            const title = document.getElementById('modal-title');
            
            // Inputs
            const inputDate = document.getElementById('modal-input-date');
            const inputLocation = document.getElementById('modal-input-location');
            const inputTitle = document.getElementById('modal-input-title');
            const inputDesc = document.getElementById('modal-input-desc');

            if (index === -1) {
                // Add mode
                title.innerText = 'Tambah Agenda Baru';
                inputDate.value = '';
                inputLocation.value = '';
                inputTitle.value = '';
                inputDesc.value = '';
            } else {
                // Edit mode
                title.innerText = `Edit Agenda Kegiatan #${index + 1}`;
                const data = agendas[index];
                inputDate.value = data.date;
                inputLocation.value = data.location;
                inputTitle.value = data.title;
                inputDesc.value = data.desc;
            }

            // Show Modal
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        // Close Modal
        function closeAgendaModal() {
            const modal = document.getElementById('agenda-modal');
            const container = document.getElementById('modal-container');

            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Save Modal Contents
        function saveAgendaModal() {
            const inputDate = document.getElementById('modal-input-date').value.trim();
            const inputLocation = document.getElementById('modal-input-location').value.trim();
            const inputTitle = document.getElementById('modal-input-title').value.trim();
            const inputDesc = document.getElementById('modal-input-desc').value.trim();

            if (!inputDate || !inputLocation || !inputTitle || !inputDesc) {
                alert('Semua bidang input wajib diisi!');
                return;
            }

            const item = {
                date: inputDate,
                location: inputLocation,
                title: inputTitle,
                desc: inputDesc
            };

            if (currentEditIndex === -1) {
                // Add Mode
                agendas.push(item);
            } else {
                // Edit Mode
                agendas[currentEditIndex] = item;
            }

            // Re-render
            renderAgendaTable();
            closeAgendaModal();
        }

        // Delete Item
        function deleteAgendaItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus agenda kegiatan ini?')) {
                agendas.splice(index, 1);
                renderAgendaTable();
            }
        }

        // Helper to escape HTML tags
        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }
</script>
@endsection
