<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the permohonan.
    /**
     * Helper to get reports filtered by category.
     */
    private function getCategoryData($kategori)
    {
        $query = Permohonan::where('kategori', $kategori);
        $permohonans = $query->orderBy('created_at', 'desc')->get();

        // Calculate counts for this specific category
        $counts = [
            'total' => Permohonan::where('kategori', $kategori)->count(),
            'pending' => Permohonan::where('kategori', $kategori)->where('status', 'Pending')->count(),
            'ditinjau' => Permohonan::where('kategori', $kategori)->where('status', 'Ditinjau')->count(),
            'selesai' => Permohonan::where('kategori', $kategori)->where('status', 'Selesai')->count(),
            'ditolak' => Permohonan::where('kategori', $kategori)->where('status', 'Ditolak')->count(),
        ];

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

        // Calculate sidebar counts for all categories dynamically
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        return compact('permohonans', 'counts', 'reports', 'sidebarCounts');
    }

    /**
     * Display a listing of the permohonan.
     */
    public function permohonanIndex()
    {
        $data = $this->getCategoryData('permohonan');
        return view('admin.permohonan', $data);
    }

    /**
     * Display a listing of the keberatan.
     */
    public function keberatanIndex()
    {
        $data = $this->getCategoryData('keberatan');
        return view('admin.keberatan', $data);
    }

    /**
     * Display a listing of the penyalahgunaan.
     */
    public function penyalahgunaanIndex()
    {
        $data = $this->getCategoryData('penyalahgunaan');
        return view('admin.penyalahgunaan', $data);
    }

    /**
     * Display a listing of the pengaduan.
     */
    public function pengaduanIndex()
    {
        $data = $this->getCategoryData('pengaduan');
        return view('admin.pengaduan', $data);
    }

    /**
     * Show the detailed information for a specific permohonan (AJAX/JSON).
     */
    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $permohonan
        ]);
    }

    /**
     * Update the status and add tanggapan/response.
     */
    public function updateStatus(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Pending,Ditinjau,Selesai,Ditolak',
            'tanggapan' => 'nullable|string',
        ]);

        $permohonan->update([
            'status' => $request->status,
            'tanggapan' => $request->tanggapan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status permohonan berhasil diperbarui.',
            'data' => $permohonan
        ]);
    }

    /**
     * Store a newly created permohonan (Frontend submission).
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nik' => 'required|string|max:20',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'kategori' => 'required|string|in:permohonan,keberatan,penyalahgunaan,pengaduan',
            'perincian' => 'required|string',
            'bentuk_informasi' => 'nullable|string',
            'cara_mendapatkan' => 'nullable|string',
            'file_bukti' => 'nullable|file|mimes:png,jpg,jpeg,pdf|max:5120',
        ]);

        // Generate unique ticket number
        $rand = rand(10000, 99999);
        $prefix = strtoupper(substr($request->kategori, 0, 3));
        if ($request->kategori === 'pengaduan') {
            $prefix = 'LAD'; // Matching mock data prefix
        }
        $ticketNumber = "#UNBRAH-{$prefix}-{$rand}";

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file_bukti')) {
            $file = $request->file('file_bukti');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            
            // Ensure target folder exists
            if (!File::exists(public_path('uploads'))) {
                File::makeDirectory(public_path('uploads'), 0755, true);
            }
            
            $file->move(public_path('uploads'), $filename);
            $filePath = '/uploads/' . $filename;
        }

        // Determine dynamic subject if not provided
        $subjek = $request->subjek;
        if (empty($subjek)) {
            $subjek = Str::limit($request->perincian, 50);
        }

        $permohonan = Permohonan::create([
            'ticket_number' => $ticketNumber,
            'nama' => $request->nama,
            'email' => $request->email,
            'nik' => $request->nik,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'kategori' => $request->kategori,
            'subjek' => $subjek,
            'perincian' => $request->perincian,
            'bentuk_informasi' => $request->bentuk_informasi,
            'cara_mendapatkan' => $request->cara_mendapatkan,
            'file_bukti' => $filePath,
            'status' => 'Pending',
        ]);

        return response()->json([
            'success' => true,
            'ticket_number' => $ticketNumber,
            'message' => 'Laporan berhasil dikirim.'
        ]);
    }

    /**
     * Display the profile edit page.
     */
    public function profilIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        return view('admin.tentang', compact('sidebarCounts'));
    }

    /**
     * Display the Informasi Publik Berkala management page.
     */
    public function informasiPublikBerkalaIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        return view('admin.informasi-publik-berkala', compact('sidebarCounts'));
    }

    /**
     * Display the Informasi Serta Merta management page.
     */
    public function informasiSertaMertaIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        return view('admin.informasi-serta-merta', compact('sidebarCounts'));
    }

    /**
     * Display the Informasi Tersedia Setiap Saat management page.
     */
    public function informasiTersediaSetiapSaatIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        return view('admin.informasi-tersedia-setiap-saat', compact('sidebarCounts'));
    }

    /**
     * Display the PPID Gallery management page.
     */
    public function galeriIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        return view('admin.galeri', compact('sidebarCounts'));
    }

    /**
     * Display the Slide Show management page.
     */
    public function slideShowIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        return view('admin.slide-show', compact('sidebarCounts'));
    }

    /**
     * Display the Profil PPID edit page.
     */
    public function profilPpidIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        $checkpointsJson = setting('profil_ppid_checkpoints');
        $checkpoints = [];
        if ($checkpointsJson) {
            $checkpoints = json_decode($checkpointsJson, true);
        }
        
        if (empty($checkpoints)) {
            $checkpoints = [
                ['title' => 'Layanan Informasi Cepat', 'desc' => 'Proses verifikasi dokumen cepat dan transparan.'],
                ['title' => 'Akses Terbuka & Efisien', 'desc' => 'Dapat diakses secara online dari mana saja dan kapan saja.'],
                ['title' => 'Pendokumentasian Akurat', 'desc' => 'Arsip digital terdokumentasi dengan standar keamanan tinggi.'],
                ['title' => 'Dukungan Civitas Akademika', 'desc' => 'Terintegrasi dengan seluruh unit kerja pelayanan universitas.'],
            ];
        }

        return view('admin.profil-ppid', compact('sidebarCounts', 'checkpoints'));
    }

    /**
     * Display the Agenda Kegiatan edit page.
     */
    public function agendaKegiatanIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        $agendaJson = setting('agenda_kegiatan_list');
        $agendas = [];
        if ($agendaJson) {
            $agendas = json_decode($agendaJson, true);
        }
        
        if (empty($agendas)) {
            $agendas = [
                [
                    'date' => '15 Juli 2026',
                    'title' => 'Sosialisasi Keterbukaan Informasi',
                    'desc' => 'Seminar dan workshop keterbukaan dokumen publik bagi seluruh jajaran struktural universitas.',
                    'location' => 'Kampus Unbrah'
                ],
                [
                    'date' => '28 Juli 2026',
                    'title' => 'Bimbingan Teknis Pengelola Data',
                    'desc' => 'Pelatihan operasional sistem informasi arsip bagi sekretariat fakultas untuk kecepatan layanan informasi.',
                    'location' => 'Gedung Rektorat'
                ],
                [
                    'date' => '12 Agustus 2026',
                    'title' => 'Audit Transparansi Berkala',
                    'desc' => 'Pemeriksaan ketersediaan berkas publik bersama Komisi Informasi Sumatera Barat untuk penilaian kepatuhan.',
                    'location' => 'Ruang VIP Senat'
                ],
                [
                    'date' => '25 Agustus 2026',
                    'title' => 'Evaluasi & Laporan PPID Tahunan',
                    'desc' => 'Penyusunan laporan tahunan indeks kepuasan layanan informasi masyarakat di lingkungan Unbrah.',
                    'location' => 'Aula Rektorat'
                ]
            ];
        }

        return view('admin.agenda-kegiatan', compact('sidebarCounts', 'agendas'));
    }

    /**
     * Update website profile content dynamically.
     */
    public function profilUpdate(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                
                // Ensure target folder exists
                if (!\Illuminate\Support\Facades\File::exists(public_path('uploads'))) {
                    \Illuminate\Support\Facades\File::makeDirectory(public_path('uploads'), 0755, true);
                }
                
                $file->move(public_path('uploads'), $filename);
                \App\Models\Setting::setValue($key, '/uploads/' . $filename);
            } else {
                if (is_array($value)) {
                    $value = json_encode($value);
                }
                \App\Models\Setting::setValue($key, $value);
            }
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Konten profil PPID berhasil diperbarui.'
            ]);
        }

        return redirect()->back()->with('success', 'Konten profil PPID berhasil diperbarui.');
    }

    /**
     * Display the Dokumen management page.
     */
    public function dokumenIndex()
    {
        $sidebarCounts = [
            'permohonan' => Permohonan::where('kategori', 'permohonan')->count(),
            'keberatan' => Permohonan::where('kategori', 'keberatan')->count(),
            'penyalahgunaan' => Permohonan::where('kategori', 'penyalahgunaan')->count(),
            'pengaduan' => Permohonan::where('kategori', 'pengaduan')->count(),
        ];

        return view('admin.dokumen', compact('sidebarCounts'));
    }

    /**
     * Upload a file via AJAX.
     */
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png,webp|max:10240', // max 10MB
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            
            if (!\Illuminate\Support\Facades\File::exists(public_path('uploads'))) {
                \Illuminate\Support\Facades\File::makeDirectory(public_path('uploads'), 0755, true);
            }
            
            $file->move(public_path('uploads'), $filename);
            return response()->json([
                'success' => true,
                'path' => '/uploads/' . $filename,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded.'], 400);
    }
}
