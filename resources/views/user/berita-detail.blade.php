@extends('layouts.frontend')

@php
    $newsData = [
        1 => [
            "title" => "Universitas Baiturrahmah Sukses Gelar Forum Sosialisasi E-PPID Untuk Peningkatan Kualitas Layanan Informasi Publik",
            "category" => "Seminar",
            "date" => "22 Juni 2026",
            "author" => "Humas Unbrah",
            "hashtag" => "#e-ppid",
            "image" => "/images/slider1.png",
            "content" => '
                <p class="mb-4"><strong>PADANG</strong> - Universitas Baiturrahmah sukses menyelenggarakan Forum Sosialisasi terpadu mengenai peningkatan kapabilitas pemanfaatan portal digital E-PPID (Pejabat Pengelola Informasi dan Dokumentasi). Sosialisasi ini dihadiri oleh jajaran pimpinan rektorat, staf administrasi akademik, serta perwakilan mahasiswa dari berbagai fakultas.</p>
                <p class="mb-4">Rektor Universitas Baiturrahmah dalam sambutannya menekankan pentingnya keterbukaan informasi publik sebagai bentuk komitmen kepatuhan terhadap Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik. Dengan tersedianya sistem yang modern, terintegrasi, dan mudah diakses, diharapkan masyarakat umum dan sivitas akademika dapat mengajukan permohonan informasi tanpa prosedur birokrasi yang rumit.</p>
                <p class="mb-4">"Platform E-PPID ini kami rancang untuk memangkas waktu verifikasi. Dulu pengajuan secara fisik memakan waktu hingga beberapa hari, namun kini status permohonan bisa dipantau langsung secara real-time lewat nomor tiket unik yang dikirim otomatis melalui email pemohon," tutur perwakilan tim IT pengembang.</p>
                <p class="mb-4">Dalam forum ini, diperkenalkan pula fitur Lacak Status Tiket dan Survei Kepuasan yang telah ditambahkan. Diharapkan dengan hadirnya inovasi ini, tata kelola administrasi Unbrah semakin akuntabel dan transparan ke depannya.</p>
            '
        ],
        2 => [
            "title" => "Kolaborasi UNBRAH & Pemkot Padang Mengenai Integrasi Data PPID Terbuka Daerah",
            "category" => "Kerja Sama",
            "date" => "18 Juni 2026",
            "author" => "Humas Unbrah",
            "hashtag" => "#kerjasama",
            "image" => "/images/slider2.png",
            "content" => '
                <p class="mb-4"><strong>PADANG</strong> - Pejabat Pengelola Informasi dan Dokumentasi (PPID) Universitas Baiturrahmah secara resmi menjalin kolaborasi strategis dengan Dinas Komunikasi dan Informatika (Diskominfo) Pemerintah Kota Padang. Kerja sama ini ditujukan untuk membangun ekosistem data pendidikan terbuka daerah yang saling terintegrasi.</p>
                <p class="mb-4">Kerja sama ini mencakup kesepakatan sinkronisasi data statistik penelitian perguruan tinggi yang relevan dengan pembangunan wilayah Kota Padang, transparansi penggunaan anggaran dana hibah riset, serta penyediaan fasilitas pengaduan terpadu bagi warga yang memanfaatkan fasilitas kampus.</p>
                <p class="mb-4">Kepala Diskominfo Kota Padang menyambut baik inisiatif ini. Menurut beliau, integrasi antara institusi perguruan tinggi swasta seperti Universitas Baiturrahmah dengan PPID utama daerah merupakan langkah progresif dalam mendorong inklusi data publik yang dapat digunakan secara maksimal oleh mahasiswa, akademisi, maupun pengambil kebijakan daerah.</p>
                <p class="mb-4">Pertemuan ini diakhiri dengan penandatanganan nota kesepahaman (MoU) dan demonstrasi sistem sinkronisasi API antar-portal informasi yang diproyeksikan akan aktif sepenuhnya mulai triwulan depan.</p>
            '
        ],
        3 => [
            "title" => "Bimtek Standardisasi Pelayanan Informasi Publik Pejabat Daerah Sumatera Barat",
            "category" => "Seminar",
            "date" => "12 Juni 2026",
            "author" => "Humas Unbrah",
            "hashtag" => "#bimtek",
            "image" => "/images/slider3.png",
            "content" => '
                <p class="mb-4"><strong>PADANG</strong> - Bertempat di Auditorium Kampus Universitas Baiturrahmah Padang, berlangsung Bimbingan Teknis (Bimtek) Standardisasi Pelayanan Informasi Publik yang diikuti oleh puluhan perwakilan pengelola PPID dari instansi pemerintah, BUMD, dan perguruan tinggi swasta se-Sumatera Barat.</p>
                <p class="mb-4">Materi utama bimtek berfokus pada penyelesaian sengketa informasi publik, klasifikasi informasi yang dikecualikan sesuai dengan regulasi negara, serta implementasi sistem arsip dokumen digital yang andal.</p>
                <p class="mb-4">"Bimtek ini sangat penting untuk menyamakan persepsi antar-pejabat pengelola informasi. Setiap pemohon informasi berhak mendapatkan kepastian waktu dan bentuk pelayanan yang profesional," jelas Ketua Komisi Informasi Provinsi Sumatera Barat selaku narasumber utama.</p>
                <p class="mb-4">Dengan adanya acara standardisasi ini, para petugas PPID Universitas Baiturrahmah diharapkan dapat mengoptimalkan SOP layanan, merespons keberatan pemohon secara prosedural, serta meminimalisir potensi sengketa informasi di kemudian hari.</p>
            '
        ],
        4 => [
            "title" => "Universitas Baiturrahmah Rilis Portal Data Publik Resmi Terintegrasi",
            "category" => "Umum",
            "date" => "05 Juni 2026",
            "author" => "Humas Unbrah",
            "hashtag" => "#portal-data",
            "image" => "/images/slider1.png",
            "content" => '
                <p class="mb-4"><strong>PADANG</strong> - Universitas Baiturrahmah mengumumkan perilisan portal data publik terintegrasi yang dapat diakses secara terbuka melalui situs resmi PPID. Portal data ini menyediakan kumpulan berkas digital seperti Laporan Keuangan Tahunan, Rencana Kerja Organisasi (RKA), serta statistik kelulusan alumni mahasiswa.</p>
                <p class="mb-4">Tujuan perancangan portal ini adalah mempermudah akses bagi mahasiswa yang membutuhkan data akademik resmi untuk keperluan riset, serta meningkatkan akuntabilitas publik di lingkungan civitas akademika Unbrah.</p>
                <p class="mb-4">"Semua dokumen yang disajikan telah melalui proses klasifikasi kelayakan uji konsekuensi publik. Kami berkomitmen untuk memperbarui isi portal secara berkala agar masyarakat senantiasa memperoleh data yang valid dan mutakhir," ujar Sekretaris PPID Unbrah.</p>
                <p class="mb-4">Masyarakat dapat langsung mengunduh berkas dengan format PDF secara gratis melalui tautan kategori \'Dokumen Resmi\' yang ada di menu navigasi utama situs PPID.</p>
            '
        ],
        5 => [
            "title" => "Penerimaan Penghargaan PPID Award Kategori Kampus Terinformatif Tahun 2026",
            "category" => "Prestasi",
            "date" => "28 Mei 2026",
            "author" => "Humas Unbrah",
            "hashtag" => "#prestasi",
            "image" => "/images/slider2.png",
            "content" => '
                <p class="mb-4"><strong>PADANG</strong> - Universitas Baiturrahmah kembali menorehkan prestasi membanggakan di tingkat daerah dengan dinobatkannya sebagai salah satu pemenang PPID Award 2026 kategori "Kampus Swasta Terinformatif" yang diselenggarakan oleh Komisi Informasi Provinsi.</p>
                <p class="mb-4">Penghargaan prestisius ini diserahkan langsung oleh pimpinan komisi informasi kepada Rektor Unbrah. Kriteria penilaian meliputi kecepatan respons pemenuhan hak informasi, kejelasan alur pengajuan, tata letak tata kelola situs web yang user-friendly, serta transparansi publikasi laporan kinerja.</p>
                <p class="mb-4">"Pencapaian ini merupakan buah kerja keras seluruh tim PPID Unbrah yang senantiasa berbenah melayani publik. Penghargaan ini menjadi motivasi kami untuk terus melakukan inovasi teknologi, salah satunya dengan digitalisasi penuh layanan permohonan," ungkap Rektor dengan rasa syukur.</p>
                <p class="mb-4">Acara penyerahan penghargaan ini juga turut dihadiri oleh jajaran rektorat, dekanat, serta perwakilan humas instansi pemerintahan daerah.</p>
            '
        ],
        6 => [
            "title" => "Sosialisasi Alur Pengajuan Keberatan Pelayanan Informasi Bagi Mahasiswa Baru",
            "category" => "Event",
            "date" => "15 Mei 2026",
            "author" => "Humas Unbrah",
            "hashtag" => "#mahasiswa",
            "image" => "/images/slider3.png",
            "content" => '
                <p class="mb-4"><strong>Guna memberikan pemahaman yang menyeluruh sejak awal masa studi, PPID Universitas Baiturrahmah menggelar sosialisasi khusus bagi mahasiswa baru mengenai alur pengajuan keluhan dan keberatan atas layanan informasi publik.</p>
                <p class="mb-4">Sosialisasi ini mengulas langkah-langkah prosedural jika mahasiswa mendapati permohonan data penelitiannya ditolak oleh petugas PPID, atau jika terdapat keterlambatan penyediaan berkas melebihi batas waktu 10 hari kerja yang telah ditetapkan.</p>
                <p class="mb-4">"Mahasiswa baru perlu menyadari bahwa mereka memiliki hak konstitusional atas informasi akademik yang bersifat umum. Melalui menu \'Pengajuan Keberatan\' di situs web, mereka dapat secara resmi melayangkan pengaduan yang akan diproses langsung oleh atasan PPID," jelas pemateri sosialisasi.</p>
                <p class="mb-4">Kegiatan ini berlangsung interaktif dengan disediakannya sesi tanya jawab serta simulasi tata cara pengisian formulir pengaduan online lewat gawai masing-masing.</p>
            '
        ],
        7 => [
            "title" => "Kajian Dhuha Bulanan Civitas Akademika Universitas Baiturrahmah Menuju Kampus Religius",
            "category" => "Kajian Dhuha",
            "date" => "10 Mei 2026",
            "author" => "Humas Unbrah",
            "hashtag" => "#religius",
            "image" => "/images/slider1.png",
            "content" => '
                <p class="mb-4"><strong>PADANG</strong> - Dalam rangka membina karakter spiritual seluruh sivitas akademika, Universitas Baiturrahmah menyelenggarakan Kajian Dhuha Bulanan di Masjid Baiturrahmah Kampus Padang. Kegiatan keagamaan rutin ini diikuti dengan antusias oleh jajaran rektorat, dosen, karyawan, serta mahasiswa.</p>
                <p class="mb-4">Kajian kali ini menghadirkan ustadz ternama daerah yang mengulas tema pentingnya menjaga keseimbangan antara menuntut ilmu keduniaan dengan pemenuhan kewajiban ukhrawi. Rektor Unbrah mengapresiasi kehadiran para peserta dan mengajak semuanya menjadikan kajian ini sebagai sarana pembersihan hati sekaligus mempererat tali silaturahmi antar-unit kerja.</p>
                <p class="mb-4">"Kami ingin mewujudkan lingkungan belajar yang tidak hanya unggul secara intelektual tetapi juga kokoh secara spiritual. Kegiatan ibadah bersama ini merupakan fondasi dasar Unbrah menuju visi kampus religius yang berdaya saing," tutur Rektor.</p>
                <p class="mb-4">Kegiatan ini berlangsung khidmat sejak pagi hari, diawali dengan shalat Dhuha berjamaah dan diakhiri dengan doa bersama untuk kemajuan institusi serta kesejahteraan seluruh civitas akademika.</p>
            '
        ],
        8 => [
            "title" => "Aksi Sosial Donor Darah Mahasiswa Universitas Baiturrahmah Peduli Sesama",
            "category" => "Sosial",
            "date" => "01 Mei 2026",
            "author" => "Humas Unbrah",
            "hashtag" => "#sosial",
            "image" => "/images/slider2.png",
            "content" => '
                <p class="mb-4"><strong>PADANG</strong> - Departemen Kemahasiswaan bekerja sama dengan Unit Kegiatan Mahasiswa (UKM) KSR-PMI dan Unit Transfusi Darah PMI Kota Padang menggelar aksi kemanusiaan donor darah massal bertajuk \'Unbrah Peduli Sesama\' di Hall Kampus.</p>
                <p class="mb-4">Aksi sosial yang digelar selama dua hari ini sukses menarik minat ratusan pendaftar, baik dari kalangan mahasiswa aktif, dosen, maupun staf kependidikan. Tim medis berhasil mengumpulkan lebih dari 150 kantong darah sehat yang siap disalurkan ke rumah sakit daerah yang membutuhkan.</p>
                <p class="mb-4">"Kebutuhan stok darah di Padang terus meningkat. Melalui aksi sosial berkala ini, kami berharap Universitas Baiturrahmah dapat memberikan kontribusi nyata yang bermanfaat langsung bagi keselamatan jiwa sesama masyarakat," jelas ketua panitia pelaksana donor darah.</p>
                <p class="mb-4">Selain donor darah, panitia juga menyediakan stan konsultasi kesehatan gratis bagi pemohon yang ingin memeriksa golongan darah, kadar hemoglobin, serta tekanan darah.</p>
            '
        ]
    ];

    $article = $newsData[$id] ?? null;
@endphp

@section('title')
    {{ $article ? $article['title'] : 'Detail Berita' }} | PPID Universitas Baiturrahmah
@endsection

@section('content')
@if (!$article)
    <!-- ERROR STATE / NOT FOUND -->
    <div class="py-24 bg-slate-50 min-h-[70vh] flex items-center justify-center">
        <div class="text-center space-y-6 max-w-md p-8 bg-white rounded-3xl border border-slate-200/60 shadow-lg">
            <div class="w-16 h-16 bg-red-50 text-red-650 rounded-2xl flex items-center justify-center mx-auto">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <h2 class="text-2xl font-bold font-display text-slate-900">Berita Tidak Ditemukan</h2>
            <p class="text-slate-500 text-sm">Maaf, artikel berita dengan ID {{ $id }} tidak dapat ditemukan atau telah dihapus.</p>
            <a href="/berita" class="inline-block px-6 py-3 bg-[#5D7D06] hover:bg-[#4E6805] text-white font-bold text-xs rounded-xl shadow-md cursor-pointer transition-colors border-0">Kembali ke Berita</a>
        </div>
    </div>
@else
    <!-- DETAIL NEWS CONTENT -->
    <div class="bg-slate-50 min-h-screen py-8 text-slate-800">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-12 space-y-6">
            
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-[11px] sm:text-xs text-slate-500 font-medium">
                <a href="/" class="hover:text-brand-green-700 transition-colors">Beranda</a>
                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                <a href="/berita" class="hover:text-brand-green-700 transition-colors">Berita</a>
                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                <span class="text-slate-400 line-clamp-1 flex-1 sm:flex-none">{{ $article['title'] }}</span>
            </nav>

            <!-- Grid Layout (Content & Sidebar) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <!-- Main News Area (Left: col-span-2) -->
                <article class="lg:col-span-2 bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200/50 space-y-6">
                    <!-- Tag / Category -->
                    <div>
                        <span class="bg-brand-green-900/10 text-brand-green-900 font-extrabold text-[10px] tracking-wider uppercase px-3 py-1.5 rounded-lg inline-block">
                            {{ $article['category'] }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-xl sm:text-3xl md:text-4xl font-bold font-display text-slate-900 leading-tight">
                        {{ $article['title'] }}
                    </h1>

                    <!-- Meta information (Date, Author) -->
                    <div class="flex flex-wrap items-center gap-4 text-xs text-slate-450 border-y border-slate-100 py-3.5">
                        <span class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-brand-green-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="font-medium">{{ $article['date'] }}</span>
                        </span>
                        <span class="text-slate-300 hidden sm:inline">•</span>
                        <span class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-brand-green-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span class="font-medium">Ditulis oleh: {{ $article['author'] }}</span>
                        </span>
                        <span class="text-slate-300 hidden sm:inline">•</span>
                        <span class="bg-brand-green-50 text-brand-green-900 font-bold px-2 py-0.5 rounded text-[10px]">
                            {{ $article['hashtag'] }}
                        </span>
                    </div>

                    <!-- Featured Image -->
                    <div class="relative overflow-hidden rounded-2xl shadow-md h-72 sm:h-96 md:h-[450px]">
                        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Article Body Content -->
                    <div class="text-slate-700 text-sm leading-relaxed space-y-4 font-light pt-2">
                        {!! $article['content'] !!}
                    </div>
                </article>

                <!-- Sidebar Area (Right: col-span-1) -->
                <aside class="lg:col-span-1 space-y-6">
                    
                    <!-- Share Card -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/50 space-y-4">
                        <h3 class="text-slate-900 font-bold font-display text-sm pb-2 border-b border-slate-100 flex items-center space-x-2">
                            <svg class="w-4 h-4 text-brand-green-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 10.742l-4.085-2.043m0 6.603l4.086-2.043M19 12a3 3 0 11-6 0 3 3 0 016 0zm-6-5a3 3 0 11-6 0 3 3 0 016 0zm0 10a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Bagikan Berita</span>
                        </h3>
                        <!-- Share icons grid -->
                        <div class="flex items-center space-x-3.5">
                            <!-- WA -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($article['title'] . ' - ' . url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center transition-all transform hover:scale-105">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.733-1.455L0 24zm6.79-4.796c1.65.981 3.268 1.498 4.962 1.499 5.51 0 9.995-4.485 9.999-9.996.002-2.67-1.038-5.18-2.926-7.07C16.994 1.745 14.489 1.7 12.007 1.7c-5.514 0-10.002 4.487-10.006 10.002-.001 1.83.501 3.559 1.455 5.097l-.988 3.606 3.79-.994zm11.722-6.87c-.301-.15-1.78-.877-2.056-.977-.276-.1-.476-.15-.676.15-.2.3-.778.977-.954 1.177-.176.2-.351.226-.651.076-.3-.15-1.267-.467-2.413-1.488-.891-.795-1.492-1.777-1.667-2.077-.176-.3-.019-.462.13-.611.135-.134.301-.351.451-.527.15-.176.2-.3.3-.5.1-.2.05-.375-.025-.526-.075-.15-.676-1.629-.926-2.228-.244-.588-.492-.507-.676-.516-.174-.008-.375-.01-.576-.01-.2 0-.527.075-.802.375-.276.3-1.052 1.026-1.052 2.5 0 1.475 1.077 2.9 1.227 3.1.15.2 2.122 3.24 5.14 4.548.718.311 1.277.496 1.714.635.722.229 1.378.196 1.9.119.58-.087 1.78-.727 2.03-1.429.25-.7.25-1.3 1.175-1.429-.075-.125-.226-.276-.526-.426z"/></svg>
                            </a>
                            <!-- FB -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-blue-600 hover:bg-blue-700 text-white flex items-center justify-center transition-all transform hover:scale-105">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <!-- X -->
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($article['title']) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-900 hover:bg-black text-white flex items-center justify-center transition-all transform hover:scale-105">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <!-- Instagram -->
                            <a href="https://www.instagram.com/universitasbaiturrahmah/" target="_blank" class="w-10 h-10 rounded-full bg-gradient-to-tr from-yellow-500 via-pink-500 to-purple-600 text-white flex items-center justify-center transition-all transform hover:scale-105 hover:opacity-90">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                        </div>

                        <!-- Copy link button -->
                        <button onclick="copyToClipboard()" class="w-full py-2.5 px-4 rounded-xl border border-brand-green-900/30 text-brand-green-900 hover:bg-brand-green-900/5 text-xs font-bold transition-all flex items-center justify-center space-x-2 cursor-pointer bg-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg>
                            <span>Salin Tautan Berita</span>
                        </button>
                    </div>

                    <!-- Related News Card -->
                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200/50 space-y-4">
                        <h3 class="text-slate-900 font-bold font-display text-sm pb-2 border-b border-slate-100 flex items-center space-x-2">
                            <span class="w-3.5 h-[2px] bg-brand-green-900 inline-block"></span>
                            <span>Berita Terkait</span>
                        </h3>
                        
                        <div class="space-y-4">
                            @php
                                $relatedCount = 0;
                            @endphp
                            @foreach ($newsData as $otherId => $item)
                                @if ($otherId != $id && $relatedCount < 3)
                                    @php $relatedCount++; @endphp
                                    <div class="group flex space-x-3.5 items-start pb-3 border-b border-slate-100 last:border-0 last:pb-0">
                                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-16 h-16 rounded-xl object-cover flex-shrink-0 group-hover:scale-103 transition-transform duration-300">
                                        <div class="space-y-1">
                                            <span class="text-[9px] font-bold text-brand-green-900 uppercase tracking-wider block">
                                                {{ $item['category'] }}
                                            </span>
                                            <a href="/berita/{{ $otherId }}" class="block">
                                                <h4 class="font-bold text-xs text-slate-850 group-hover:text-brand-green-700 transition-colors line-clamp-2 leading-snug">
                                                    {{ $item['title'] }}
                                                </h4>
                                            </a>
                                            <span class="text-[9px] text-slate-400 block font-medium">{{ $item['date'] }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- PMB Banner Card -->
                    <div class="bg-gradient-to-br from-brand-green-900 to-brand-green-950 rounded-3xl p-6 shadow-md border border-brand-gold-500/20 text-white relative overflow-hidden space-y-4 group">
                        <div class="absolute top-[-50px] right-[-50px] w-32 h-32 bg-brand-gold-500/10 rounded-full blur-2xl"></div>
                        <h4 class="font-bold font-display text-base tracking-tight leading-snug">Penerimaan<br>Mahasiswa Baru</h4>
                        <p class="text-xs text-slate-350 leading-relaxed font-light">Bergabunglah bersama keluarga besar Universitas Baiturrahmah. Pendaftaran mahasiswa baru TA 2026/2027 telah dibuka.</p>
                        <a href="https://pmb.unbrah.ac.id" target="_blank" class="inline-flex items-center space-x-1.5 bg-brand-green-900 hover:bg-brand-green-950 text-white font-bold text-[10px] uppercase tracking-wider px-4 py-2.5 rounded-xl shadow transition-colors cursor-pointer border-0">
                            <span>Daftar Sekarang</span>
                            <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>

                </aside>

            </div>

        </div>
    </div>

    <!-- Alert / Toast Toast -->
    <script>
        function copyToClipboard() {
            const el = document.createElement('textarea');
            el.value = window.location.href;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);

            // Display SweetAlert2 Toast or simple custom alert if loaded
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Tautan berita disalin!',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
            } else {
                alert('Tautan berita berhasil disalin ke papan klip!');
            }
        }
    </script>
@endif
@endsection
