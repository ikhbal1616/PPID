@extends('layouts.admin')

@section('title', 'Kelola Galeri PPID')

@section('header-left')
<h2 class="text-slate-800 font-bold text-sm font-display tracking-tight">Halaman Administrasi</h2>
@endsection

@section('content')
<!-- HEADER SUMMARY -->
                <div>
                    <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Galeri Foto PPID</h1>
                    <p class="text-slate-500 text-xs mt-1">Tambahkan, edit, dan hapus foto dokumentasi kegiatan PPID Universitas Baiturrahmah secara dinamis.</p>
                </div>

                <!-- Success Popup Modal -->
                @if (session('success'))
                <div id="success-save-modal" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4">
                    <!-- Backdrop -->
                    <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-md transition-opacity duration-300"></div>

                    <!-- Modal Content Card -->
                    <div class="relative transform overflow-hidden rounded-3xl bg-gradient-to-br from-brand-green-900 to-brand-green-950 border border-brand-green-800/50 text-center shadow-2xl p-8 max-w-sm w-full transition-all duration-300 scale-100 opacity-100 z-10 flex flex-col items-center">
                        
                        <!-- Success Pulsing Icon -->
                        <div class="w-16 h-16 rounded-full bg-emerald-500/10 flex items-center justify-center mb-5 relative shrink-0">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500/10 opacity-75"></span>
                            <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white relative z-10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Header and Description -->
                        <h3 class="text-base font-bold text-white tracking-wide font-display">Berhasil Disimpan</h3>
                        <p class="text-[11px] text-emerald-100/75 mt-2.5 mb-6 leading-relaxed max-w-xs">
                            Seluruh perubahan foto kegiatan PPID, deskripsi, tanggal, dan kategorisasi telah diperbarui ke sistem database secara permanen.
                        </p>

                        <!-- Action Button -->
                        <button onclick="closeSuccessSaveModal()" class="w-full py-2.5 bg-white hover:bg-slate-100 active:scale-[0.98] text-brand-green-950 text-xs font-bold rounded-xl transition-all duration-300 shadow-md cursor-pointer">
                            Selesai
                        </button>
                    </div>
                </div>
                <script>
                    function closeSuccessSaveModal() {
                        const modal = document.getElementById('success-save-modal');
                        if (modal) {
                            modal.classList.add('pointer-events-none');
                            modal.style.transition = 'opacity 300ms ease-out';
                            modal.style.opacity = '0';
                            setTimeout(() => modal.remove(), 300);
                        }
                    }
                </script>
                @endif

                <!-- SAVE ALL FORM (Hidden, auto-saved in background) -->
                <form action="{{ route('admin.galeri.update') }}" method="POST" id="main-submit-form" class="hidden">
                    @csrf
                    <!-- Hidden input to store JSON list values -->
                    <input type="hidden" name="galeri_list" id="galeri_list_input">
                </form>

                <!-- GRID LIST FOR PHOTOS -->
                <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 space-y-6">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                        <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider">Daftar Foto Galeri</h3>
                        <button type="button" onclick="createNewPhoto()" class="px-4 py-2 bg-brand-green-900 hover:bg-brand-green-900 text-white text-xs font-bold rounded-xl flex items-center space-x-1.5 transition-all shadow-md transform hover:-translate-y-0.5 active:scale-95 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                            <span>Tambah Foto</span>
                        </button>
                    </div>

                    <!-- Dynamic list containers -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="galeri-list-container">
                        <!-- Dynamic items injected here -->
                    </div>
                </div>
@endsection

@section('scripts')
<script>


        // Live formatted date
        window.addEventListener('DOMContentLoaded', () => {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('live-date').innerText = new Date().toLocaleDateString('id-ID', options);

            const form = document.getElementById('main-submit-form');
            if (form) {
                form.addEventListener('submit', () => {
                    isDirty = false;
                });
            }
        });

        

        // Default Fallback Data if Setting is empty
        const defaultGaleri = [
            {
                "title": "Sosialisasi E-PPID dan Keterbukaan Informasi",
                "category": "sosialisasi",
                "date": "2026-07-15",
                "description": "Workshop pelaksanaan tata laksana dan bimbingan teknis standar pelayanan publik bagi seluruh dekanat dan pengelola data fakultas.",
                "image_url": "/images/slider3.png"
            },
            {
                "title": "Rapat Evaluasi Program Kerja Tahunan",
                "category": "rapat",
                "date": "2026-08-22",
                "description": "Pertemuan koordinasi tim pelaksana PPID Universitas Baiturrahmah dalam merancang target kepatuhan informasi publik semester berikutnya.",
                "image_url": "/images/slider2.png"
            },
            {
                "title": "Visitasi Komisi Informasi Sumatera Barat",
                "category": "monev",
                "date": "2026-09-10",
                "description": "Monitoring dan verifikasi langsung berkas serta ketersediaan dokumen publik di ruang sekretariat PPID Unbrah oleh Komisioner KI Sumbar.",
                "image_url": "/images/slider1.png"
            },
            {
                "title": "Pelayanan Informasi Terpadu Mahasiswa",
                "category": "layanan",
                "date": "2026-10-05",
                "description": "Petugas PPID melayani permohonan salinan data registrasi akademik mahasiswa secara cepat, santun, dan gratis di loket layanan.",
                "image_url": "/images/slider2.png"
            },
            {
                "title": "Bimbingan Teknis Kearsipan Digital",
                "category": "sosialisasi",
                "date": "2026-10-18",
                "description": "Bimbingan penginputan data pendukung kinerja institusi bagi tenaga kependidikan demi keselarasan sistem informasi terpadu.",
                "image_url": "/images/slider1.png"
            },
            {
                "title": "Penerimaan Penghargaan Keterbukaan Informasi",
                "category": "monev",
                "date": "2026-11-12",
                "description": "Penyerahan piagam penghargaan kategori Perguruan Tinggi Swasta Paling Informatif dalam PPID Award tingkat wilayah.",
                "image_url": "/images/slider3.png"
            }
        ];

        let galeriItems = [];
        let editingPhotoIndex = null;
        let isDirty = false;

        try {
            const rawData = {!! json_encode(setting('galeri_list')) !!};
            if (rawData) {
                galeriItems = JSON.parse(rawData);
            } else {
                galeriItems = defaultGaleri;
            }
        } catch(e) {
            galeriItems = defaultGaleri;
        }

        const categoryLabelMap = {
            'sosialisasi': 'Sosialisasi & Bimtek',
            'rapat': 'Rapat Kerja',
            'monev': 'Monitoring & Evaluasi',
            'layanan': 'Layanan Publik'
        };

        // Render Galeri Cards
        function renderGaleriList() {
            const container = document.getElementById('galeri-list-container');
            const input = document.getElementById('galeri_list_input');
            if (!container || !input) return;

            input.value = JSON.stringify(galeriItems);
            container.innerHTML = '';

            if (galeriItems.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full p-8 text-center text-xs text-slate-400 font-medium bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        Belum ada Foto Kegiatan yang ditambahkan. Silakan klik tombol "Tambah Foto".
                    </div>
                `;
                return;
            }

            galeriItems.forEach((item, index) => {
                const cardEl = document.createElement('div');
                cardEl.className = "bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm flex flex-col group hover:border-slate-300 hover:shadow-md transition-all duration-200";

                const displayDate = item.date ? formatDateIndo(item.date) : '-';
                const labelCategory = categoryLabelMap[item.category] || item.category;

                cardEl.innerHTML = `
                    <div class="relative h-44 bg-slate-100 overflow-hidden shrink-0 border-b border-slate-100">
                        <img src="${item.image_url || '/images/slider1.png'}" alt="${escapeHtml(item.title)}" class="w-full h-full object-cover">
                        <span class="absolute top-2.5 left-2.5 bg-brand-green-800 text-white text-[9px] font-bold px-2 py-0.5 rounded-lg shadow-sm">
                            ${escapeHtml(labelCategory)}
                        </span>
                    </div>
                    <div class="p-4 flex-grow flex flex-col justify-between space-y-4">
                        <div class="space-y-1.5">
                            <span class="text-[9px] text-slate-400 font-bold tracking-wider block uppercase">${escapeHtml(displayDate)}</span>
                            <h4 class="font-bold text-slate-800 text-xs leading-snug truncate-2-lines">${escapeHtml(item.title)}</h4>
                            <p class="text-[10px] text-slate-500 font-light leading-relaxed truncate-3-lines">${escapeHtml(item.description || '-')}</p>
                        </div>
                        <div class="flex items-center justify-end space-x-1 pt-2 border-t border-slate-100">
                            <button type="button" onclick="editPhotoItem(${index})" class="p-1 rounded-lg hover:bg-brand-green-50 text-brand-green-600 transition-colors cursor-pointer" title="Edit Foto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                            <button type="button" onclick="deletePhotoItem(${index})" class="p-1 rounded-lg hover:bg-rose-50 text-rose-500 transition-colors cursor-pointer" title="Hapus Foto">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </div>
                    </div>
                `;

                container.appendChild(cardEl);
            });
        }

        // Open Modal
        function createNewPhoto() {
            cancelPhotoEdit();
            
            const modal = document.getElementById('photo-modal');
            const container = document.getElementById('photo-modal-container');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        // Close Modal
        function closePhotoModal() {
            const modal = document.getElementById('photo-modal');
            const container = document.getElementById('photo-modal-container');
            
            container.classList.remove('scale-100', 'opacity-100');
            container.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Save Photo
        function savePhotoItem() {
            const title = document.getElementById('photo-title').value.trim();
            const category = document.getElementById('photo-category').value;
            const date = document.getElementById('photo-date').value;
            const description = document.getElementById('photo-desc').value.trim();
            const image_url = document.getElementById('photo-image-url').value.trim();

            if (!title) {
                showErrorModalPopup('Gagal Menyimpan', 'Judul kegiatan wajib diisi.');
                return;
            }
            if (!category) {
                showErrorModalPopup('Gagal Menyimpan', 'Kategori kegiatan wajib dipilih.');
                return;
            }
            if (!date) {
                showErrorModalPopup('Gagal Menyimpan', 'Tanggal kegiatan wajib diisi.');
                return;
            }
            if (!image_url) {
                showErrorModalPopup('Gagal Menyimpan', 'Silakan pilih dan unggah file foto terlebih dahulu.');
                return;
            }

            if (editingPhotoIndex !== null) {
                galeriItems[editingPhotoIndex] = { title, category, date, description, image_url };
                cancelPhotoEdit();
                closePhotoModal();
                renderGaleriList();
                saveToServerAsync("Berhasil Diperbarui", "Foto kegiatan telah berhasil diperbarui di database.");
            } else {
                galeriItems.push({ title, category, date, description, image_url });
                closePhotoModal();
                renderGaleriList();
                saveToServerAsync("Berhasil Ditambahkan", "Foto kegiatan baru telah berhasil disimpan ke database.");
            }
        }

        // Edit mode
        function editPhotoItem(index) {
            const item = galeriItems[index];
            if (!item) return;

            editingPhotoIndex = index;
            document.getElementById('photo-title').value = item.title;
            document.getElementById('photo-category').value = item.category;
            document.getElementById('photo-date').value = item.date;
            document.getElementById('photo-desc').value = item.description || '';
            document.getElementById('photo-image-url').value = item.image_url;

            // Preview
            const previewContainer = document.getElementById('photo-preview-container');
            const previewImg = document.getElementById('photo-preview-img');
            previewImg.src = item.image_url;
            previewContainer.classList.remove('hidden');

            document.getElementById('photo-upload-status').innerText = "Selesai: File sudah diunggah";
            document.getElementById('photo-upload-status').className = "text-[10px] text-emerald-600 font-semibold";

            document.getElementById('form-photo-title').innerText = "Form Edit Foto Galeri";
            document.getElementById('save-photo-btn-text').innerText = "Simpan Perubahan";

            // Open Modal
            const modal = document.getElementById('photo-modal');
            const container = document.getElementById('photo-modal-container');
            modal.classList.remove('hidden');
            setTimeout(() => {
                container.classList.remove('scale-95', 'opacity-0');
                container.classList.add('scale-100', 'opacity-100');
            }, 50);
        }

        // Delete photo
        function deletePhotoItem(index) {
            if (confirm('Apakah Anda yakin ingin menghapus foto kegiatan ini?')) {
                galeriItems.splice(index, 1);
                renderGaleriList();
                saveToServerAsync("Berhasil Dihapus", "Foto kegiatan telah berhasil dihapus dari database.");
            }
        }

        // Cancel Edit
        function cancelPhotoEdit() {
            editingPhotoIndex = null;
            document.getElementById('photo-title').value = '';
            document.getElementById('photo-category').value = '';
            document.getElementById('photo-date').value = '';
            document.getElementById('photo-desc').value = '';
            document.getElementById('photo-image-url').value = '';
            document.getElementById('photo-file-uploader').value = '';
            document.getElementById('photo-preview-container').classList.add('hidden');
            document.getElementById('photo-preview-img').src = '';
            document.getElementById('photo-upload-status').innerText = "Belum ada berkas diunggah.";
            document.getElementById('photo-upload-status').className = "text-[10px] text-slate-400 font-medium";
            document.getElementById('form-photo-title').innerText = "Form Tambah Foto Galeri";
            document.getElementById('save-photo-btn-text').innerText = "Simpan Foto";
        }

        // AJAX upload file
        function uploadPhotoBerkas(input) {
            const file = input.files[0];
            const statusEl = document.getElementById('photo-upload-status');
            const urlEl = document.getElementById('photo-image-url');
            const previewContainer = document.getElementById('photo-preview-container');
            const previewImg = document.getElementById('photo-preview-img');
            
            if (!file) return;

            // Check if file size exceeds 2MB
            if (file.size > 2 * 1024 * 1024) {
                showErrorModalPopup('Gagal Mengunggah', 'Ukuran gambar tidak boleh melebihi 2MB.');
                statusEl.innerText = "Gagal: Melebihi 2MB.";
                statusEl.className = "text-[10px] text-rose-500 font-semibold";
                input.value = '';
                return;
            }

            statusEl.innerText = "Mengunggah...";
            statusEl.className = "text-[10px] text-brand-green-600 font-semibold";

            const formData = new FormData();
            formData.append('file', file);
            formData.append('_token', '{{ csrf_token() }}');

            fetch('{{ route("admin.upload-file") }}', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    urlEl.value = data.path;
                    statusEl.innerText = "Selesai: " + file.name;
                    statusEl.className = "text-[10px] text-emerald-600 font-semibold";
                    
                    // Show Preview
                    previewImg.src = data.path;
                    previewContainer.classList.remove('hidden');
                } else {
                    alert('Gagal mengunggah file: ' + data.message);
                    statusEl.innerText = "Gagal mengunggah.";
                    statusEl.className = "text-[10px] text-rose-500 font-semibold";
                }
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan saat mengunggah file.');
                statusEl.innerText = "Gagal mengunggah.";
                statusEl.className = "text-[10px] text-rose-500 font-semibold";
            });
        }

        function showSaveToast() {
            const existingToast = document.getElementById('save-toast-reminder');
            if (existingToast) existingToast.remove();

            const toast = document.createElement('div');
            toast.id = 'save-toast-reminder';
            toast.className = "fixed bottom-5 right-5 z-50 bg-emerald-600 text-white text-xs font-semibold px-5 py-3.5 rounded-2xl shadow-xl transition-opacity duration-500 flex items-center space-x-2";
            toast.innerHTML = `
                <svg class="w-4 h-4 text-emerald-100 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Perubahan disimpan secara lokal. Klik tombol <strong class="underline">Simpan Perubahan</strong> di atas untuk menyimpan ke database!</span>
            `;
            document.body.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 6000);
        }

        function formatDateIndo(dateStr) {
            if (!dateStr) return '';
            try {
                const parts = dateStr.split('-');
                if (parts.length !== 3) return dateStr;
                const months = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];
                const day = parseInt(parts[2]);
                const month = months[parseInt(parts[1]) - 1];
                const year = parts[0];
                return `${day} ${month} ${year}`;
            } catch(e) {
                return dateStr;
            }
        }

        function escapeHtml(text) {
            if (!text) return '';
            return text
                .toString()
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }

        function showSuccessModalPopup(title, message) {
            const existing = document.getElementById("js-success-popup-modal");
            if (existing) existing.remove();

            const modal = document.createElement("div");
            modal.id = "js-success-popup-modal";
            modal.className = "fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4";
            modal.innerHTML = `
                <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-md transition-opacity duration-300"></div>
                <div class="relative transform overflow-hidden rounded-3xl bg-gradient-to-br from-brand-green-900 to-brand-green-950 border border-brand-green-800/50 text-center shadow-2xl p-8 max-w-sm w-full transition-all duration-300 scale-100 opacity-100 z-10 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-emerald-500/10 flex items-center justify-center mb-5 relative shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500/10 opacity-75"></span>
                        <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center text-white relative z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-base font-bold text-white tracking-wide font-display">${title}</h3>
                    <p class="text-[11px] text-emerald-100/75 mt-2.5 mb-6 leading-relaxed max-w-xs text-center">
                        ${message}
                    </p>
                    <button onclick="closeJsSuccessPopupModal()" class="w-full py-2.5 bg-white hover:bg-slate-100 active:scale-[0.98] text-brand-green-950 text-xs font-bold rounded-xl transition-all duration-300 shadow-md cursor-pointer">
                        Selesai
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
        }

        function closeJsSuccessPopupModal() {
            const modal = document.getElementById("js-success-popup-modal");
            if (modal) {
                modal.classList.add("pointer-events-none");
                modal.style.transition = "opacity 300ms ease-out";
                modal.style.opacity = "0";
                setTimeout(() => modal.remove(), 300);
            }
        }

        function showErrorModalPopup(title, message) {
            const existing = document.getElementById("js-error-popup-modal");
            if (existing) existing.remove();

            const modal = document.createElement("div");
            modal.id = "js-error-popup-modal";
            modal.className = "fixed inset-0 z-[100] overflow-y-auto flex items-center justify-center p-4";
            modal.innerHTML = `
                <div class="fixed inset-0 bg-slate-950/80 backdrop-blur-md transition-opacity duration-300"></div>
                <div class="relative transform overflow-hidden rounded-3xl bg-gradient-to-br from-rose-900 to-rose-950 border border-rose-800/50 text-center shadow-2xl p-8 max-w-sm w-full transition-all duration-300 scale-100 opacity-100 z-10 flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-rose-500/10 flex items-center justify-center mb-5 relative shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-500/10 opacity-75"></span>
                        <div class="w-10 h-10 rounded-full bg-rose-500 flex items-center justify-center text-white relative z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-base font-bold text-white tracking-wide font-display">${title}</h3>
                    <p class="text-[11px] text-rose-100/75 mt-2.5 mb-6 leading-relaxed max-w-xs text-center">
                        ${message}
                    </p>
                    <button onclick="closeJsErrorPopupModal()" class="w-full py-2.5 bg-white hover:bg-slate-100 active:scale-[0.98] text-rose-950 text-xs font-bold rounded-xl transition-all duration-300 shadow-md cursor-pointer">
                        Selesai
                    </button>
                </div>
            `;
            document.body.appendChild(modal);
        }

        function closeJsErrorPopupModal() {
            const modal = document.getElementById("js-error-popup-modal");
            if (modal) {
                modal.classList.add("pointer-events-none");
                modal.style.transition = "opacity 300ms ease-out";
                modal.style.opacity = "0";
                setTimeout(() => modal.remove(), 300);
            }
        }

        function saveToServerAsync(successTitle, successMessage) {
            const input = document.getElementById("galeri_list_input");
            if (input) {
                input.value = JSON.stringify(galeriItems);
            }
            
            const form = document.getElementById("main-submit-form");
            if (!form) return;

            const formData = new FormData(form);
            fetch(form.action, {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    isDirty = false;
                    if (successTitle && successMessage) {
                        showSuccessModalPopup(successTitle, successMessage);
                    }
                } else {
                    showErrorModalPopup("Gagal Menyimpan", "Gagal menyimpan ke server: " + data.message);
                }
            })
            .catch(err => {
                console.error(err);
                showErrorModalPopup("Gagal Menyimpan", "Koneksi ke server terputus.");
            });
        }

        // Render initially
        renderGaleriList();
</script>
@endsection
