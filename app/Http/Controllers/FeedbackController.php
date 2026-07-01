<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Admin dashboard: list all submitted feedback/ratings with stats.
     */
    public function adminIndex(Request $request)
    {
        $query = Permohonan::whereNotNull('rating')->orderByDesc('updated_at');

        // Optional filter by rating star
        if ($request->filled('rating')) {
            $query->where('rating', (int) $request->rating);
        }

        $feedbacks    = $query->paginate(15);
        $allFeedbacks = Permohonan::whereNotNull('rating')->get(['rating']);

        return view('admin.feedback', compact('feedbacks', 'allFeedbacks'));
    }

    /**
     * Display the satisfaction survey form or a fallback page if access is blocked.
     */
    public function show($ticketNumber)
    {
        // Normalize ticket number (ensure leading #)
        $normalizedTicket = str_starts_with($ticketNumber, 'UNBRAH-') ? '#' . $ticketNumber : $ticketNumber;

        $permohonan = Permohonan::where('ticket_number', $normalizedTicket)->first();

        // Guard 1: ticket does not exist
        if (!$permohonan) {
            return response(
                view('user.survei-fallback', ['reason' => 'not_found']),
                404
            );
        }

        // Guard 2: ticket exists but not yet resolved
        if ($permohonan->status !== 'Selesai') {
            return response(
                view('user.survei-fallback', [
                    'reason'      => 'not_finished',
                    'permohonan'  => $permohonan,
                ]),
                403
            );
        }

        // Guard 3: user already submitted a rating for this ticket
        if (!is_null($permohonan->rating)) {
            return response(
                view('user.survei-fallback', [
                    'reason'      => 'already_rated',
                    'permohonan'  => $permohonan,
                ]),
                200  // 200 so no browser error — content is valid, just already done
            );
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
