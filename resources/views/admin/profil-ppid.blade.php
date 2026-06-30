@extends('layouts.admin')

@section('title', 'Kelola Profil PPID Halaman Utama')

@section('header-left')
<h2 class="text-slate-800 font-bold text-sm font-display tracking-tight">Halaman Administrasi</h2>
@endsection

@section('content')
<!-- HEADER SUMMARY -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold font-display tracking-tight text-slate-900 leading-tight">Kelola Profil PPID (Halaman Utama)</h1>
                        <p class="text-slate-500 text-xs mt-1">Perbarui judul, deskripsi naratif, poin centang layanan, dan media video profil pada bagian beranda.</p>
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

                <!-- MODERN PILL TAB NAVIGATION (UI Reference Style) -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-2 flex items-center space-x-1 overflow-x-auto">
                    <button type="button" onclick="switchTab('narasi')" id="tab-btn-narasi" class="tab-link px-5 py-2.5 text-xs font-bold font-display rounded-xl transition-all outline-none cursor-pointer bg-slate-100 text-brand-green-700">
                        Narasi Utama
                    </button>
                    <button type="button" onclick="switchTab('layanan')" id="tab-btn-layanan" class="tab-link px-5 py-2.5 text-xs font-bold font-display rounded-xl transition-all outline-none cursor-pointer bg-transparent text-slate-500 hover:text-slate-800">
                        Poin Layanan
                    </button>
                    <button type="button" onclick="switchTab('media')" id="tab-btn-media" class="tab-link px-5 py-2.5 text-xs font-bold font-display rounded-xl transition-all outline-none cursor-pointer bg-transparent text-slate-500 hover:text-slate-800">
                        Video & Media
                    </button>
                </div>

                <div class="space-y-6">
                    <form action="{{ route('admin.profil-ppid.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden p-6 md:p-8 space-y-6">
                        @csrf
                        
                        <!-- TAB CONTENT CONTAINER -->
                        <div class="space-y-6">

                            <!-- PANEL 1: NARASI UTAMA -->
                            <div id="panel-narasi" class="tab-panel block space-y-6">
                                <div>
                                    <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider mb-4">1. Konten Teks & Narasi Utama</h3>
                                    <div class="space-y-4">
                                        <div class="space-y-2">
                                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Judul Utama</label>
                                            <input type="text" name="profil_ppid_title" value="{{ setting('profil_ppid_title', 'Mewujudkan Transparansi Informasi Akademik yang Terpercaya') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Deskripsi Profil / Narasi Lengkap</label>
                                            <textarea name="profil_ppid_description" rows="6" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none resize-y" required>{{ setting('profil_ppid_description', "Sesuai dengan amanat Undang-Undung Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (KIP), Universitas Baiturrahmah berkomitmen penuh menyediakan wadah bagi publik untuk mengakses informasi secara efisien.\n\nPejabat Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah bertugas mengkoordinasikan pengumpulan, penyimpanan, pendokumentasian, dan penyediaan layanan informasi publik yang dapat diakses oleh masyarakat umum, civitas akademika, maupun instansi terkait secara transparan dan akuntabel.") }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- PANEL 2: POIN LAYANAN -->
                            <div id="panel-layanan" class="tab-panel hidden space-y-6">
                                <div>
                                    <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider mb-4">2. Poin Layanan Utama (Centang Hijau)</h3>
                                    
                                    <div id="checkpoints-container" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        @foreach ($checkpoints as $index => $item)
                                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-4 relative checkpoint-item" data-index="{{ $index }}">
                                            <button type="button" onclick="removeCheckpoint(this)" class="absolute top-3 right-3 text-slate-400 hover:text-red-500 transition-colors cursor-pointer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                            <h4 class="font-bold text-brand-green-700 text-xs uppercase tracking-wider">Poin Centang #{{ $index + 1 }}</h4>
                                            <div class="space-y-3">
                                                <div class="space-y-1">
                                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul Poin</label>
                                                    <input type="text" name="profil_ppid_checkpoints[{{ $index }}][title]" value="{{ $item['title'] }}" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required>
                                                </div>
                                                <div class="space-y-1">
                                                    <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Keterangan/Sub-judul</label>
                                                    <input type="text" name="profil_ppid_checkpoints[{{ $index }}][desc]" value="{{ $item['desc'] }}" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <!-- Tambah Poin Button -->
                                    <div class="flex justify-start pt-6">
                                        <button type="button" onclick="addCheckpoint()" class="px-5 py-3 bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold rounded-xl transition-all cursor-pointer flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-brand-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                            <span>Tambah Poin Layanan Baru</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- PANEL 3: VIDEO & MEDIA -->
                            <div id="panel-media" class="tab-panel hidden space-y-6">
                                <div>
                                    <h3 class="font-bold text-slate-900 text-sm border-b border-slate-100 pb-3 uppercase tracking-wider mb-4">3. Media Utama & Video Profil</h3>
                                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                                        <!-- Image Preview & Selector -->
                                        <div class="md:col-span-5 space-y-3">
                                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Gambar Cover / Thumbnail Video</label>
                                            <div class="relative w-full h-44 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 flex items-center justify-center shadow-inner group">
                                                <img id="image-preview" src="{{ setting('profil_ppid_video_image', '/images/slider2.png') }}" class="w-full h-full object-cover" alt="Preview Cover">
                                                <div id="upload-spinner" class="absolute inset-0 bg-black/40 flex items-center justify-center hidden">
                                                    <svg class="animate-spin h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                                </div>
                                            </div>
                                            <input type="file" id="file-uploader" onchange="uploadSlideImage(this)" class="hidden" accept="image/*">
                                            <button type="button" onclick="document.getElementById('file-uploader').click()" class="w-full py-2.5 px-4 bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-800 text-xs font-bold rounded-xl transition-all cursor-pointer flex items-center justify-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                <span>Unggah Cover Baru</span>
                                            </button>
                                            <div class="flex items-center space-x-2">
                                                <span class="text-[9px] text-slate-400 font-bold uppercase">Atau URL:</span>
                                                <input type="text" id="slide-image-url" name="profil_ppid_video_image" value="{{ setting('profil_ppid_video_image', '/images/slider2.png') }}" oninput="updatePreviewFromUrl()" class="flex-1 bg-slate-50 border border-slate-200 rounded-lg px-2.5 py-1.5 text-[11px] focus:ring-1 focus:ring-brand-green-600 focus:bg-white transition-all outline-none">
                                            </div>
                                        </div>

                                        <!-- Text inputs for video settings -->
                                        <div class="md:col-span-7 space-y-4">
                                            <div class="space-y-2">
                                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Link Video YouTube / Video Google Drive</label>
                                                <input type="text" name="profil_ppid_video_url" value="{{ setting('profil_ppid_video_url', 'https://www.youtube.com/embed/jXZVBE2wbs0') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required placeholder="Contoh: https://www.youtube.com/embed/XXXXXX atau https://drive.google.com/file/d/XXXXXX/preview">
                                                <p class="text-[9px] text-slate-400 font-medium leading-relaxed">Penting: Gunakan format URL embed video YouTube (misalnya `https://www.youtube.com/embed/VIDEO_ID`) atau link preview Google Drive (misalnya `https://drive.google.com/file/d/FILE_ID/preview`).</p>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div class="space-y-2">
                                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Label Video (Badge)</label>
                                                    <input type="text" name="profil_ppid_video_label" value="{{ setting('profil_ppid_video_label', 'Video Profil') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                                </div>
                                                <div class="space-y-2">
                                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Deskripsi/Judul Singkat Video</label>
                                                    <input type="text" name="profil_ppid_video_title" value="{{ setting('profil_ppid_video_title', 'Panduan Alur Permohonan Informasi Publik Unbrah') }}" class="w-full bg-slate-50 border border-slate-200 focus:border-brand-green-500 focus:bg-white text-slate-800 text-xs px-3.5 py-3 rounded-xl transition-all outline-none" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        });

        // Tab Switching logic matching the requested modern UI style
        function switchTab(tabName) {
            // Hide all tab panels
            document.querySelectorAll('.tab-panel').forEach(panel => {
                panel.classList.add('hidden');
                panel.classList.remove('block');
            });
            // Show the selected tab panel
            document.getElementById(`panel-${tabName}`).classList.remove('hidden');
            document.getElementById(`panel-${tabName}`).classList.add('block');
            
            // Reset all tab button styles to inactive (transparent bg, slate text)
            document.querySelectorAll('.tab-link').forEach(btn => {
                btn.classList.remove('bg-slate-100', 'text-brand-green-700');
                btn.classList.add('bg-transparent', 'text-slate-500', 'hover:text-slate-800');
            });
            
            // Mark the active tab button (slate-100 bg, brand green text)
            const activeBtn = document.getElementById(`tab-btn-${tabName}`);
            activeBtn.classList.remove('bg-transparent', 'text-slate-500', 'hover:text-slate-800');
            activeBtn.classList.add('bg-slate-100', 'text-brand-green-700');
        }

        // DYNAMIC CHECKPOINTS JAVASCRIPT LOGIC
        let checkpointCount = {{ count($checkpoints) }};

        function addCheckpoint() {
            const container = document.getElementById('checkpoints-container');
            const newIndex = checkpointCount++;
            
            const div = document.createElement('div');
            div.className = 'p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-4 relative checkpoint-item';
            div.setAttribute('data-index', newIndex);
            div.innerHTML = `
                <button type="button" onclick="removeCheckpoint(this)" class="absolute top-3 right-3 text-slate-400 hover:text-red-500 transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                </button>
                <h4 class="font-bold text-brand-green-700 text-xs uppercase tracking-wider">Poin Centang Baru</h4>
                <div class="space-y-3">
                    <div class="space-y-1">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Judul Poin</label>
                        <input type="text" name="profil_ppid_checkpoints[${newIndex}][title]" value="" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required placeholder="Contoh: Layanan Baru">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Keterangan/Sub-judul</label>
                        <input type="text" name="profil_ppid_checkpoints[${newIndex}][desc]" value="" class="w-full bg-white border border-slate-200 focus:border-brand-green-500 text-slate-800 text-xs px-3 py-2.5 rounded-lg transition-all outline-none" required placeholder="Contoh: Deskripsi singkat dari layanan baru tersebut.">
                    </div>
                </div>
            `;
            container.appendChild(div);
            reindexCheckpoints();
        }

        function removeCheckpoint(button) {
            const item = button.closest('.checkpoint-item');
            if (item) {
                item.remove();
                reindexCheckpoints();
            }
        }

        function reindexCheckpoints() {
            const items = document.querySelectorAll('.checkpoint-item');
            items.forEach((item, index) => {
                const titleHeader = item.querySelector('h4');
                if (titleHeader) {
                    titleHeader.innerText = `Poin Centang #${index + 1}`;
                }
                const inputs = item.querySelectorAll('input');
                inputs.forEach(input => {
                    const name = input.name;
                    if (name.includes('[title]')) {
                        input.name = `profil_ppid_checkpoints[${index}][title]`;
                    } else if (name.includes('[desc]')) {
                        input.name = `profil_ppid_checkpoints[${index}][desc]`;
                    }
                });
            });
            checkpointCount = items.length;
        }

        // Live image url preview sync
        function updatePreviewFromUrl() {
            const urlInput = document.getElementById('slide-image-url').value;
            const preview = document.getElementById('image-preview');
            if (urlInput.trim() !== '') {
                preview.src = urlInput;
            } else {
                preview.src = '/images/slider2.png';
            }
        }

        // AJAX Image Upload helper
        async function uploadSlideImage(fileInput) {
            if (!fileInput.files || fileInput.files.length === 0) return;
            const file = fileInput.files[0];
            const spinner = document.getElementById('upload-spinner');
            
            // Show Spinner
            spinner.classList.remove('hidden');

            const formData = new FormData();
            formData.append('file', file);

            try {
                const response = await fetch('/admin/upload-file', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: formData
                });
                
                const result = await response.json();
                if (result.success) {
                    document.getElementById('slide-image-url').value = result.path;
                    document.getElementById('image-preview').src = result.path;
                } else {
                    alert('Gagal mengunggah gambar: ' + (result.message || 'Error tidak diketahui'));
                }
            } catch (err) {
                console.error(err);
                alert('Terjadi kesalahan koneksi saat mengunggah gambar.');
            } finally {
                spinner.classList.add('hidden');
            }
        }
</script>
@endsection
