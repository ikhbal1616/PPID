<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display the satisfaction survey form.
     */
    public function show($ticketNumber)
    {
        // Normalize ticket number (ensure leading #)
        $normalizedTicket = str_starts_with($ticketNumber, 'UNBRAH-') ? '#' . $ticketNumber : $ticketNumber;
        
        $permohonan = Permohonan::where('ticket_number', $normalizedTicket)->first();
        
        if (!$permohonan) {
            abort(404, 'Tiket laporan tidak ditemukan.');
        }

        // Guard: only resolved tickets can be rated
        if ($permohonan->status !== 'Selesai') {
            return redirect('/')->with('error', 'Evaluasi kepuasan pelanggan hanya dapat diisi untuk laporan yang telah selesai diproses.');
        }

        // Guard: prevent double ratings
        if (!is_null($permohonan->rating)) {
            return redirect('/')->with('info', 'Anda telah memberikan penilaian kepuasan untuk tiket ini sebelumnya. Terima kasih!');
        }

        return view('user.survei', compact('permohonan'));
    }

    /**
     * Store feedback rating and review in the database.
     */
    public function store(Request $request, $ticketNumber)
    {
        $normalizedTicket = str_starts_with($ticketNumber, 'UNBRAH-') ? '#' . $ticketNumber : $ticketNumber;
        $permohonan = Permohonan::where('ticket_number', $normalizedTicket)->first();

        if (!$permohonan) {
            return response()->json([
                'success' => false,
                'message' => 'Tiket laporan tidak ditemukan.'
            ], 404);
        }

        if ($permohonan->status !== 'Selesai') {
            return response()->json([
                'success' => false,
                'message' => 'Evaluasi hanya dapat dilakukan untuk laporan yang telah berstatus Selesai.'
            ], 422);
        }

        if (!is_null($permohonan->rating)) {
            return response()->json([
                'success' => false,
                'message' => 'Penilaian kepuasan untuk tiket ini sudah pernah dikirimkan sebelumnya.'
            ], 422);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan_kepuasan' => 'nullable|string|max:1000',
        ]);

        $permohonan->update([
            'rating' => $request->rating,
            'ulasan_kepuasan' => $request->ulasan_kepuasan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Terima kasih banyak atas partisipasi Anda! Penilaian Anda sangat berharga bagi kami.'
        ]);
    }
}
