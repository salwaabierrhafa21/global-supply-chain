<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index()
    {
        $apiKey = config('services.exchange_rate.key');

        $response = Http::get(
            "https://v6.exchangerate-api.com/v6/{$apiKey}/latest/USD"
        );

        if (!$response->successful()) {

            return view('currency.index', [
                'rates' => [],
                'error' => 'Gagal mengambil data kurs.'
            ]);

        }

        $json = $response->json();

        return view('currency.index', [
            'rates' => $json['conversion_rates'],
            'base' => $json['base_code'],
            'updated' => $json['time_last_update_utc'],
        ]);
    }
}