<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BeritaController extends Controller
{
    /**
     * Base URL for the Unbrah News API.
     * Configurable via BERITA_API_URL in .env — useful when API is unreachable
     * from a dev machine (different network/firewall).
     */
    private static function apiBase(): string
    {
        return rtrim(config('services.berita.url', 'https://unbrah.ac.id/api/berita'), '/');
    }

    /**
     * Fetch the latest N news items for use on the homepage.
     * Returns empty array on failure — view handles graceful fallback.
     */
    public static function fetchLatest(int $limit = 4): array
    {
        try {
            $response = Http::timeout(10)->get(static::apiBase(), ['limit' => $limit]);
            if ($response->successful()) {
                return $response->json()['data'] ?? [];
            }
            Log::warning('BeritaController::fetchLatest — API responded ' . $response->status());
        } catch (\Exception $e) {
            Log::warning('BeritaController::fetchLatest — ' . $e->getMessage());
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

        $beritaList = [];
        $pagination = [];
        $apiError   = false;

        try {
            $params = ['page' => $page, 'limit' => $limit];
            if ($search) $params['search'] = $search;
            if ($tag)    $params['tag']    = $tag;

            $response = Http::timeout(10)->get(static::apiBase(), $params);

            if ($response->successful()) {
                $json       = $response->json();
                $beritaList = $json['data']       ?? [];
                $pagination = $json['pagination'] ?? [];
            } else {
                $apiError = true;
                Log::warning('BeritaController::index — API responded ' . $response->status());
            }
        } catch (\Exception $e) {
            $apiError = true;
            Log::warning('BeritaController::index — ' . $e->getMessage());
        }

        return view('user.berita', compact('beritaList', 'pagination', 'search', 'tag', 'page', 'apiError'));
    }

    /**
     * Display a single news article by ID.
     */
    public function show(Request $request, string $id)
    {
        $article  = null;
        $related  = [];
        $apiError = false;

        try {
            $response = Http::timeout(10)->get(static::apiBase() . '/' . $id);

            if ($response->successful()) {
                $article = $response->json()['data'] ?? null;
            } else {
                $apiError = true;
                Log::warning('BeritaController::show — API responded ' . $response->status() . ' for id=' . $id);
            }
        } catch (\Exception $e) {
            $apiError = true;
            Log::warning('BeritaController::show — ' . $e->getMessage());
        }

        // Fetch related articles (latest, exclude current)
        try {
            $relResp = Http::timeout(8)->get(static::apiBase(), ['limit' => 4]);
            if ($relResp->successful()) {
                $allRecent = $relResp->json()['data'] ?? [];
                $related   = array_filter($allRecent, fn($b) => $b['id'] !== $id);
                $related   = array_slice(array_values($related), 0, 3);
            }
        } catch (\Exception $e) {
            // silent — sidebar just won't show related news
        }

        return view('user.berita-detail', compact('article', 'id', 'related', 'apiError'));
    }
}
