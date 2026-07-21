<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EconomicData;
use App\Models\Port;
use App\Models\ShippingRoute;
use App\Models\RiskEvent;
use Illuminate\Support\Facades\Http;

class UserDashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistik
        |--------------------------------------------------------------------------
        */

        $countryCount = Country::count();
        $economicCount = EconomicData::count();
        $portCount = Port::count();
        $shippingRouteCount = ShippingRoute::count();
        $riskCount = RiskEvent::count();

        /*
        |--------------------------------------------------------------------------
        | Statistik Risiko
        |--------------------------------------------------------------------------
        */

        $highRisk = RiskEvent::where('severity', 'High')->count();
        $mediumRisk = RiskEvent::where('severity', 'Medium')->count();
        $lowRisk = RiskEvent::where('severity', 'Low')->count();

        /*
        |--------------------------------------------------------------------------
        | Data Terbaru
        |--------------------------------------------------------------------------
        */

        $latestRisks = RiskEvent::with('country')
            ->latest()
            ->take(5)
            ->get();

        $latestEconomic = EconomicData::with('country')
            ->latest('recorded_at')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Weather API
        |--------------------------------------------------------------------------
        */

        $weather = null;

        try {

            $response = Http::get(
                'https://api.open-meteo.com/v1/forecast',
                [
                    'latitude' => -6.2088,
                    'longitude' => 106.8456,
                    'current' => 'temperature_2m,rain,wind_speed_10m'
                ]
            );

            if ($response->successful()) {
                $weather = $response->json()['current'];
            }

        } catch (\Exception $e) {

            $weather = null;

        }

        /*
        |--------------------------------------------------------------------------
        | Currency API
        |--------------------------------------------------------------------------
        */

        $currency = null;

        try {

            $response = Http::get(
                'https://open.er-api.com/v6/latest/USD'
            );

            if ($response->successful()) {

                $currency = $response->json();

            }

        } catch (\Exception $e) {

            $currency = null;

        }

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view('user.dashboard', compact(

            'countryCount',
            'economicCount',
            'portCount',
            'shippingRouteCount',
            'riskCount',

            'highRisk',
            'mediumRisk',
            'lowRisk',

            'latestRisks',
            'latestEconomic',

            'weather',
            'currency'

        ));
    }
}