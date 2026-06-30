<?php

namespace Database\Seeders;

use App\Models\Permohonan;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'ticket_number' => '#UNBRAH-PER-18491',
                'nama' => 'Ahmad Fauzi',
                'nik' => '1306020509890001',
                'email' => 'fauzi@gmail.com',
                'telepon' => '081290328812',
                'alamat' => 'Jl. Khatib Sulaiman No. 42, Kota Padang',
                'kategori' => 'permohonan',
                'subjek' => 'Berkas Statuta Universitas Baiturrahmah 2025',
                'perincian' => 'Saya ingin meminta berkas Statuta Universitas Baiturrahmah tahun 2025 untuk keperluan penelitian tesis pascasarjana saya mengenai tata kelola hukum perguruan tinggi swasta di Sumatera Barat. Terima kasih.',
                'bentuk_informasi' => 'Salinan Informasi (Hardcopy / Softcopy)',
                'cara_mendapatkan' => 'Mengirim Lewat Email (Softcopy)',
                'file_bukti' => '/uploads/bukti_identitas_ktp.pdf',
                'status' => 'Selesai',
                'tanggapan' => 'Permohonan disetujui. Berkas statuta terlampir telah dikirimkan ke email pemohon.',
                'created_at' => Carbon::parse('2026-06-22 09:30:00'),
            ],
            [
                'ticket_number' => '#UNBRAH-KEB-90231',
                'nama' => 'Rina Anggraini',
                'nik' => '1306034807950002',
                'email' => 'rina.angg@yahoo.com',
                'telepon' => '085274110398',
                'alamat' => 'Perumahan Aia Pacah Permai Blok C/4, Padang',
                'kategori' => 'keberatan',
                'subjek' => 'Keberatan atas keterlambatan data akreditasi fakultas kedokteran',
                'perincian' => 'Saya mengajukan keberatan karena permohonan informasi saya mengenai nilai rincian akreditasi Fakultas Kedokteran Unbrah belum dijawab padahal sudah melewati 14 hari kerja.',
                'bentuk_informasi' => null,
                'cara_mendapatkan' => null,
                'file_bukti' => '/uploads/surat_keberatan.pdf',
                'status' => 'Pending',
                'tanggapan' => null,
                'created_at' => Carbon::parse('2026-06-21 11:20:00'),
            ],
            [
                'ticket_number' => '#UNBRAH-PEN-88321',
                'nama' => 'Budi Santoso',
                'nik' => '1306051512960003',
                'email' => 'budi.santoso@students.unbrah.ac.id',
                'telepon' => '082384992100',
                'alamat' => 'Kost Syariah Asri, Belakang Rektorat Unbrah, Padang',
                'kategori' => 'penyalahgunaan',
                'subjek' => 'Laporan dugaan pemotongan dana beasiswa prestasi',
                'perincian' => 'Melaporkan adanya indikasi pungutan liar/pemotongan dana beasiswa prestasi mahasiswa angkatan 2024 di tingkat fakultas sebesar Rp 250.000 dengan dalih administrasi kegiatan.',
                'bentuk_informasi' => null,
                'cara_mendapatkan' => null,
                'file_bukti' => '/uploads/bukti_kkn_pemotongan.pdf',
                'status' => 'Ditinjau',
                'tanggapan' => null,
                'created_at' => Carbon::parse('2026-06-19 14:15:00'),
            ],
            [
                'ticket_number' => '#UNBRAH-LAD-33921',
                'nama' => 'Siti Rahma',
                'nik' => '1306045501900004',
                'email' => 'siti.rahma@gmail.com',
                'telepon' => '081374523910',
                'alamat' => 'Jl. Tunggul Hitam No. 15, Kec. Koto Tangah, Padang',
                'kategori' => 'pengaduan',
                'subjek' => 'Keluhan fasilitas pendingin udara (AC) di perpustakaan lantai 2 mati',
                'perincian' => 'Sudah hampir 2 minggu AC di ruang baca utama perpustakaan lantai 2 mati total. Hal ini membuat ruangan sangat panas dan mahasiswa terganggu saat belajar. Mohon segera diperbaiki.',
                'bentuk_informasi' => null,
                'cara_mendapatkan' => null,
                'file_bukti' => null,
                'status' => 'Selesai',
                'tanggapan' => 'Terima kasih atas masukannya. AC pada perpustakaan lantai 2 sudah diservis dan berfungsi normal kembali.',
                'created_at' => Carbon::parse('2026-06-18 10:05:00'),
            ],
            [
                'ticket_number' => '#UNBRAH-PER-77291',
                'nama' => 'Dedi Kurnia',
                'nik' => '1306012010880005',
                'email' => 'dedi.kurnia@outlook.com',
                'telepon' => '08126743912',
                'alamat' => 'Perum Korpri Blok F-12, Koto Lalang, Padang',
                'kategori' => 'permohonan',
                'subjek' => 'Laporan Rencana Strategis (Renstra) Unbrah 2026-2030',
                'perincian' => 'Memohon dokumen softcopy PDF Rencana Strategis (Renstra) Universitas Baiturrahmah periode 2026-2030 untuk dipelajari sebagai materi kajian perencanaan tata kota dan keterpaduan kampus.',
                'bentuk_informasi' => 'Salinan Informasi (Hardcopy / Softcopy)',
                'cara_mendapatkan' => 'Mengirim Lewat Email (Softcopy)',
                'file_bukti' => '/uploads/ktp_dedi_kurnia.jpg',
                'status' => 'Ditinjau',
                'tanggapan' => null,
                'created_at' => Carbon::parse('2026-06-15 16:40:00'),
            ],
            [
                'ticket_number' => '#UNBRAH-KEB-48190',
                'nama' => 'Mega Wahyuni',
                'nik' => '1306076208920006',
                'email' => 'mega.wahyuni@gmail.com',
                'telepon' => '081390321288',
                'alamat' => 'Jl. Dr. Sutomo No. 12, Padang Timur, Padang',
                'kategori' => 'keberatan',
                'subjek' => 'Keberatan penolakan informasi rincian anggaran program KKN',
                'perincian' => 'Mengajukan keberatan karena permohonan informasi saya mengenai rincian aliran pengeluaran dana KKN 2025 ditolak secara sepihak oleh Humas dengan alasan dokumen rahasia universitas.',
                'bentuk_informasi' => null,
                'cara_mendapatkan' => null,
                'file_bukti' => '/uploads/dokumen_penolakan.pdf',
                'status' => 'Ditolak',
                'tanggapan' => 'Dokumen rincian program KKN bersifat internal universitas dan dikecualikan untuk publik.',
                'created_at' => Carbon::parse('2026-06-10 08:50:00'),
            ],
        ];

        foreach ($data as $item) {
            Permohonan::create($item);
        }
    }
}
