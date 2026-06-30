<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\PermohonanController;

Route::get('/', function () {
    return view('user.halaman-utama');
});

Route::get('/profil', function () {
    return view('user.profil');
});

Route::get('/visi-misi', function () {
    return view('user.visi-misi');
});

Route::get('/struktur-organisasi', function () {
    return view('user.struktur');
});

Route::get('/tugas-fungsi', function () {
    return view('user.tugas-fungsi');
});

Route::get('/ppid-dalam-angka', function () {
    return view('user.ppid-dalam-angka');
});

Route::get('/regulasi', function () {
    return view('user.regulasi');
});

Route::get('/maklumat-pelayanan', function () {
    return view('user.maklumat');
});

Route::get('/zona-integrasi', function () {
    return view('user.zona-integrasi');
});

Route::get('/informasi-publik-berkala', function () {
    return view('user.informasi-publik-berkala');
});

Route::get('/informasi-serta-merta', function () {
    return view('user.informasi-serta-merta');
});

Route::get('/informasi-tersedia-setiap-saat', function () {
    return view('user.informasi-tersedia-setiap-saat');
});

Route::get('/galeri', function () {
    return view('user.galeri');
});

Route::get('/dokumen', function () {
    return view('user.dokumen');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Permohonan (Public Forms submission)
Route::post('/permohonan', [PermohonanController::class, 'store'])->name('permohonan.store');

// Protected Admin Routes
Route::middleware(['auth'])->group(function () {
    
    // All Roles (Admin, Petugas, Pimpinan) can access Dashboard and Reports
    Route::middleware(['role:admin,petugas,pimpinan'])->group(function () {
        Route::get('/admin', function () {
            $permohonans = \App\Models\Permohonan::orderBy('created_at', 'desc')->get();
            $reports = $permohonans->map(function($p) {
                return [
                    'db_id' => $p->id,
                    'id' => $p->ticket_number,
                    'nama' => $p->nama,
                    'nik' => $p->nik,
                    'email' => $p->email,
                    'telepon' => $p->telepon,
                    'alamat' => $p->alamat,
                    'kategori' => $p->kategori,
                    'subjek' => $p->subjek,
                    'tanggal' => $p->created_at->translatedFormat('d F Y'),
                    'status' => $p->status,
                    'perincian' => $p->perincian,
                    'bentuk_informasi' => $p->bentuk_informasi,
                    'cara_mendapatkan' => $p->cara_mendapatkan,
                    'file_bukti' => $p->file_bukti,
                    'tanggapan' => $p->tanggapan,
                ];
            });
            return view('admin.dashboard', compact('permohonans', 'reports'));
        })->name('admin.dashboard');

        Route::get('/admin/permohonan', [PermohonanController::class, 'permohonanIndex'])->name('admin.permohonan.index');
        Route::get('/admin/keberatan', [PermohonanController::class, 'keberatanIndex'])->name('admin.keberatan.index');
        Route::get('/admin/penyalahgunaan', [PermohonanController::class, 'penyalahgunaanIndex'])->name('admin.penyalahgunaan.index');
        Route::get('/admin/pengaduan', [PermohonanController::class, 'pengaduanIndex'])->name('admin.pengaduan.index');
        Route::get('/admin/permohonan/{id}', [PermohonanController::class, 'show'])->name('admin.permohonan.show');
        Route::post('/admin/permohonan/{id}/update', [PermohonanController::class, 'updateStatus'])->name('admin.permohonan.update');
    });

    // Content Managers (Admin & Petugas) can edit Website Content
    Route::middleware(['role:admin,petugas'])->group(function () {
        Route::get('/admin/tentang', [PermohonanController::class, 'profilIndex'])->name('admin.tentang.index');
        Route::post('/admin/tentang/update', [PermohonanController::class, 'profilUpdate'])->name('admin.tentang.update');
        Route::get('/admin/slide-show', [PermohonanController::class, 'slideShowIndex'])->name('admin.slide-show.index');
        Route::post('/admin/slide-show/update', [PermohonanController::class, 'profilUpdate'])->name('admin.slide-show.update');
        
        // New content routes added by teammate
        Route::get('/admin/profil-ppid', [PermohonanController::class, 'profilPpidIndex'])->name('admin.profil-ppid.index');
        Route::post('/admin/profil-ppid/update', [PermohonanController::class, 'profilUpdate'])->name('admin.profil-ppid.update');
        Route::get('/admin/agenda-kegiatan', [PermohonanController::class, 'agendaKegiatanIndex'])->name('admin.agenda-kegiatan.index');
        Route::post('/admin/agenda-kegiatan/update', [PermohonanController::class, 'profilUpdate'])->name('admin.agenda-kegiatan.update');
        
        Route::post('/admin/upload-file', [PermohonanController::class, 'uploadFile'])->name('admin.upload-file');

        Route::get('/admin/informasi-publik-berkala', [PermohonanController::class, 'informasiPublikBerkalaIndex'])->name('admin.informasi-publik-berkala.index');
        Route::post('/admin/informasi-publik-berkala/update', [PermohonanController::class, 'profilUpdate'])->name('admin.informasi-publik-berkala.update');

        Route::get('/admin/informasi-serta-merta', [PermohonanController::class, 'informasiSertaMertaIndex'])->name('admin.informasi-serta-merta.index');
        Route::post('/admin/informasi-serta-merta/update', [PermohonanController::class, 'profilUpdate'])->name('admin.informasi-serta-merta.update');

        Route::get('/admin/informasi-tersedia-setiap-saat', [PermohonanController::class, 'informasiTersediaSetiapSaatIndex'])->name('admin.informasi-tersedia-setiap-saat.index');
        Route::post('/admin/informasi-tersedia-setiap-saat/update', [PermohonanController::class, 'profilUpdate'])->name('admin.informasi-tersedia-setiap-saat.update');

        Route::get('/admin/galeri', [PermohonanController::class, 'galeriIndex'])->name('admin.galeri.index');
        Route::post('/admin/galeri/update', [PermohonanController::class, 'profilUpdate'])->name('admin.galeri.update');

        Route::get('/admin/dokumen', [PermohonanController::class, 'dokumenIndex'])->name('admin.dokumen.index');
        Route::post('/admin/dokumen/update', [PermohonanController::class, 'profilUpdate'])->name('admin.dokumen.update');
    });
});


