<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BeritaController extends Controller
{
    /**
     * Base URL for the Unbrah News API.
     */
    private const API_BASE = 'https://unbrah.ac.id/api/berita';

    /**
     * Fetch the latest N news items for use on the homepage.
     * Returns empty array on failure — view handles graceful fallback.
     */
    public static function fetchLatest(int $limit = 4): array
    {
        try {
            $response = Http::timeout(8)->get(self::API_BASE, ['limit' => $limit]);
            if ($response->successful()) {
                return $response->json()['data'] ?? [];
            }
        } catch (\Exception $e) {
            // silent — homepage will fall back to empty state
        }
        return [];
    }

    /**
     * Display paginated news listing.
     */
    public function index(Request $request)
    {
        $page   = max(1, (int) $request->query('page', 1));
        $search = trim($request->query('search', ''));
        $tag    = trim($request->query('tag', ''));
        $limit  = 12;

        try {
            $params = ['page' => $page, 'limit' => $limit];
            if ($search) $params['search'] = $search;
            if ($tag)    $params['tag']    = $tag;

            $response = Http::timeout(10)->get(self::API_BASE, $params);

            if ($response->successful()) {
                $json       = $response->json();
                $beritaList = $json['data']        ?? [];
                $pagination = $json['pagination']  ?? [];
            } else {
                $beritaList = [];
                $pagination = [];
            }
        } catch (\Exception $e) {
            $beritaList = [];
            $pagination = [];
        }

        return view('user.berita', compact('beritaList', 'pagination', 'search', 'tag', 'page'));
    }

    /**
     * Display a single news article by ID.
     */
    public function show(Request $request, string $id)
    {
        try {
            $response = Http::timeout(10)->get(self::API_BASE . '/' . $id);

            if ($response->successful()) {
                $json    = $response->json();
                $article = $json['data'] ?? null;
            } else {
                $article = null;
            }
        } catch (\Exception $e) {
            $article = null;
        }

        // Fetch a few related articles (latest, exclude current)
        $related = [];
        try {
            $relResp = Http::timeout(8)->get(self::API_BASE, ['limit' => 4]);
            if ($relResp->successful()) {
                $allRecent = $relResp->json()['data'] ?? [];
                $related   = array_filter($allRecent, fn($b) => $b['id'] !== $id);
                $related   = array_slice(array_values($related), 0, 3);
            }
        } catch (\Exception $e) {
            // silent — sidebar berita terkait just won't show
        }

        return view('user.berita-detail', compact('article', 'id', 'related'));
    }
}
