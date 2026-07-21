<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $country = Country::first();

        if (!$country) {
            return view('weather.index', [
                'weather' => null,
                'country' => null
            ]);
        }

        $response = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude' => $country->latitude,
            'longitude' => $country->longitude,
            'current' => 'temperature_2m,rain,wind_speed_10m'
        ]);

        if (!$response->successful()) {
            return view('weather.index', [
                'weather' => null,
                'country' => $country
            ]);
        }

        return view('weather.index', [
            'weather' => $response->json()['current'],
            'country' => $country
        ]);
    }
}