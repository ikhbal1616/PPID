<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembaruan Status Laporan PPID</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f1f5f9;
            color: #334155;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .wrapper {
            width: 100%;
            background-color: #f1f5f9;
            padding: 40px 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }
        .header {
            background-color: #064e3b; /* Brand Green */
            background-image: linear-gradient(to right, #064e3b, #022c22);
            padding: 32px;
            text-align: center;
            border-bottom: 4px solid #d97706; /* Brand Gold accent */
        }
        .header img {
            width: 50px;
            height: auto;
            margin-bottom: 12px;
        }
        .header h1 {
            color: #ffffff;
            font-size: 20px;
            margin: 0;
            font-weight: 700;
            letter-spacing: -0.025em;
        }
        .header p {
            color: #fbbf24; /* Brand Gold */
            font-size: 11px;
            margin: 4px 0 0 0;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.1em;
        }
        .content {
            padding: 32px;
        }
        .greeting {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-top: 0;
            margin-bottom: 8px;
        }
        .intro-text {
            font-size: 13px;
            line-height: 1.6;
            color: #475569;
            margin-bottom: 24px;
        }
        .ticket-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 24px;
        }
        .ticket-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 12px;
            border-bottom: 1px dashed #f1f5f9;
            padding-bottom: 8px;
        }
        .ticket-row:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }
        .label {
            color: #64748b;
            font-weight: 600;
            width: 140px;
        }
        .value {
            color: #334155;
            font-weight: 700;
            text-align: right;
            flex-grow: 1;
        }
        .ticket-id {
            font-family: monospace;
            color: #064e3b;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            font-weight: 700;
            font-size: 10px;
            border-radius: 9999px;
            text-transform: uppercase;
        }
        .status-Pending {
            background-color: #fef3c7;
            color: #d97706;
        }
        .status-Ditinjau {
            background-color: #dbeafe;
            color: #1d4ed8;
        }
        .status-Selesai {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-Ditolak {
            background-color: #ffe4e6;
            color: #9f1239;
        }
        .response-box {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 16px;
            padding: 20px;
            margin-top: 24px;
            border-left: 4px solid #059669;
        }
        .response-title {
            font-size: 12px;
            font-weight: 700;
            color: #065f46;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
        }
        .response-text {
            font-size: 13px;
            line-height: 1.6;
            color: #0f172a;
            white-space: pre-line;
            font-style: italic;
        }
        .footer {
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 24px;
            text-align: center;
            font-size: 11px;
            color: #94a3b8;
            line-height: 1.5;
        }
        .footer a {
            color: #064e3b;
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <!-- Header Banner -->
            <div class="header">
                <img src="{{ $message->embed(public_path('images/logo_unbrah.png')) }}" alt="Logo Unbrah">
                <h1>Layanan PPID</h1>
                <p>Universitas Baiturrahmah</p>
            </div>

            <!-- Content Body -->
            <div class="content">
                <h2 class="greeting">Halo, {{ $permohonan->nama }}</h2>
                
                @if ($permohonan->status === 'Pending')
                    <p class="intro-text">
                        Terima kasih telah mengajukan laporan/permohonan informasi ke PPID Universitas Baiturrahmah. Laporan Anda telah berhasil kami terima dengan nomor tiket <strong>{{ $permohonan->ticket_number }}</strong>. Saat ini berkas Anda sedang berada dalam antrean menunggu verifikasi oleh petugas kami.
                    </p>
                @elseif ($permohonan->status === 'Ditinjau')
                    <p class="intro-text">
                        Terima kasih telah menghubungi PPID Universitas Baiturrahmah. Kami ingin menginformasikan bahwa berkas laporan/permohonan Anda saat ini <strong style="color: #d97706;">sedang ditinjau</strong> dan diproses oleh petugas kami.
                    </p>
                @elseif ($permohonan->status === 'Selesai')
                    <p class="intro-text">
                        Kabar baik! Laporan/permohonan informasi Anda telah <strong style="color: #16a34a;">selesai diproses</strong> oleh tim petugas PPID Universitas Baiturrahmah.
                    </p>
                    <div style="margin: 22px 0; text-align: center;">
                        <a href="{{ url('/evaluasi/' . str_replace('#', '', $permohonan->ticket_number)) }}" style="display: inline-block; padding: 12px 24px; background-color: #003316; color: #ffffff; text-decoration: none; border-radius: 12px; font-weight: bold; font-size: 13px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">Bantu Kami Menilai - Berikan Evaluasi Kepuasan</a>
                    </div>
                @elseif ($permohonan->status === 'Ditolak')
                    <p class="intro-text">
                        Kami ingin menginformasikan bahwa laporan/permohonan informasi Anda <strong style="color: #dc2626;">ditolak / dikecualikan</strong> oleh petugas PPID setelah melalui proses peninjauan.
                    </p>
                @endif

                <!-- Ticket Card Detail -->
                <div class="ticket-card">
                    <div class="ticket-row">
                        <span class="label">Nomor Tiket</span>
                        <span class="value ticket-id">{{ $permohonan->ticket_number }}</span>
                    </div>
                    <div class="ticket-row">
                        <span class="label">Subjek Laporan</span>
                        <span class="value">{{ $permohonan->subjek }}</span>
                    </div>
                    <div class="ticket-row">
                        <span class="label">Tanggal Laporan</span>
                        <span class="value">{{ $permohonan->created_at->format('d M Y H:i') }} WIB</span>
                    </div>
                    <div class="ticket-row">
                        <span class="label">Kategori</span>
                        <span class="value" style="text-transform: capitalize;">{{ $permohonan->kategori === 'penyalahgunaan' ? 'Penyalahgunaan Wewenang' : $permohonan->kategori }}</span>
                    </div>
                    <div class="ticket-row" style="border-bottom: none; padding-bottom: 0;">
                        <span class="label">Status Saat Ini</span>
                        <span class="value">
                            <span class="status-badge status-{{ $permohonan->status }}">
                                {{ $permohonan->status === 'Ditinjau' ? 'Sedang Ditinjau' : $permohonan->status }}
                            </span>
                        </span>
                    </div>
                </div>

                <!-- Response Box if Selesai/Ditolak -->
                @if (in_array($permohonan->status, ['Selesai', 'Ditolak']) && !empty($permohonan->tanggapan))
                    <div class="response-box">
                        <div class="response-title">Tanggapan Resmi Petugas:</div>
                        <div class="response-text">"{{ $permohonan->tanggapan }}"</div>
                        @if ($permohonan->file_tanggapan)
                            <div style="margin-top: 12px; border-top: 1px solid #bbf7d0; padding-top: 8px;">
                                <a href="{{ url($permohonan->file_tanggapan) }}" target="_blank" style="font-size: 11px; font-weight: bold; color: #065f46; text-decoration: underline;">
                                    Unduh Berkas Lampiran Jawaban Resmi
                                </a>
                            </div>
                        @endif
                    </div>
                @endif

                <p class="intro-text" style="margin-top: 24px; font-size: 12px;">
                    Anda dapat memantau perkembangan berkas Anda secara real-time melalui fitur **Cek Tiket** di halaman utama website kami dengan menggunakan Nomor Tiket di atas.
                </p>
            </div>

            <!-- Footer -->
            <div class="footer">
                Sistem Layanan Keterbukaan Informasi Publik (PPID)<br>
                <strong>Universitas Baiturrahmah</strong><br>
                Jl. Raya By Pass, KM 15, Aie Pacah, Padang, Sumatera Barat<br>
                <a href="{{ url('/') }}">kunjungi website utama</a>
            </div>
        </div>
    </div>
</body>
</html>
