<?php

namespace App\Mail;

use App\Models\Permohonan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PermohonanStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $permohonan;

    /**
     * Create a new message instance.
     */
    public function __construct(Permohonan $permohonan)
    {
        $this->permohonan = $permohonan;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $statusLabel = $this->permohonan->status;
        $subjectPrefix = "Pembaruan Status";
        
        if ($statusLabel === 'Pending') {
            $statusLabel = 'Menunggu Verifikasi';
            $subjectPrefix = 'Konfirmasi Pengajuan';
        } else if ($statusLabel === 'Ditinjau') {
            $statusLabel = 'Sedang Ditinjau';
        }

        return $this->subject("[PPID Unbrah] {$subjectPrefix} Laporan {$this->permohonan->ticket_number} - {$statusLabel}")
                    ->view('emails.status-permohonan');
    }
}
