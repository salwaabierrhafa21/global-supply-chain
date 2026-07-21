<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EconomicData;
use App\Models\Port;
use App\Models\ShippingRoute;
use App\Models\RiskEvent;

class DashboardController extends Controller
{
    public function index()
    {
        $countryCount = Country::count();

        $economicCount = EconomicData::count();

        $portCount = Port::count();

        $shippingRouteCount = ShippingRoute::count();

        $riskCount = RiskEvent::count();

        return view('dashboard.index', compact(
            'countryCount',
            'economicCount',
            'portCount',
            'shippingRouteCount',
            'riskCount'
        ));
    }
}