<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    public function index()
    {
        $apiKey = config('services.gnews.key');

        $query = request('q', 'economy OR logistics OR geopolitics');

        $response = Http::get('https://gnews.io/api/v4/search', [
            'q' => $query,
            'lang' => 'en',
            'country' => 'us',
            'max' => 10,
            'apikey' => $apiKey,
        ]);

        if (!$response->successful()) {
            return view('news.index', [
                'articles' => [],
                'query' => $query,
                'error' => 'Gagal mengambil data berita dari GNews API.'
            ]);
        }

        $json = $response->json();

        return view('news.index', [
            'articles' => $json['articles'] ?? [],
            'query' => $query,
            'error' => null
        ]);
    }
}