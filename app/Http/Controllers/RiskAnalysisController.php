<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EconomicData;
use App\Models\RiskEvent;
use Illuminate\Http\Request;

class RiskAnalysisController extends Controller
{
    /**
     * Menampilkan daftar Risk Event
     */
    public function index()
{
    $risks = RiskEvent::with('country')
        ->latest()
        ->get();

    $highRisk = $risks->where('severity', 'High')->count();

    $mediumRisk = $risks->where('severity', 'Medium')->count();

    $lowRisk = $risks->where('severity', 'Low')->count();

    return view('risk-analysis.index', compact(

        'risks',

        'highRisk',

        'mediumRisk',

        'lowRisk'

    ));
}

    /**
     * Form tambah Risk Event
     */
    public function create()
    {
        $countries = Country::orderBy('country_name')->get();

        return view('risk-analysis.create', compact('countries'));
    }

    /**
     * Simpan Risk Event
     */
    public function store(Request $request)
    {
        $request->validate([

            'country_id' => 'required|exists:countries,id',

            'event_type' => 'required|max:100',

            'title' => 'required|max:255',

            'description' => 'nullable',

            'source' => 'required|max:255',

            'api_source' => 'nullable|max:255',

            'event_date' => 'required|date',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Ambil Data Negara & Ekonomi
        |--------------------------------------------------------------------------
        */

        $country = Country::find($request->country_id);

        $economic = EconomicData::where('country_id', $country->id)
            ->latest()
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Weather Score (sementara simulasi)
        |--------------------------------------------------------------------------
        */

        $weatherScore = rand(10, 30);

        /*
        |--------------------------------------------------------------------------
        | Inflation Score (berdasarkan data EconomicData)
        |--------------------------------------------------------------------------
        */

        if ($economic && isset($economic->inflation_rate)) {

            if ($economic->inflation_rate > 8) {

                $inflationScore = 25;

            } elseif ($economic->inflation_rate > 5) {

                $inflationScore = 18;

            } elseif ($economic->inflation_rate > 2) {

                $inflationScore = 10;

            } else {

                $inflationScore = 5;

            }

        } else {

            $inflationScore = 10;

        }

        /*
        |--------------------------------------------------------------------------
        | Currency Score (sementara simulasi)
        |--------------------------------------------------------------------------
        */

        $currencyScore = rand(5, 10);

        /*
        |--------------------------------------------------------------------------
        | News Score (sementara simulasi)
        |--------------------------------------------------------------------------
        */

        $newsScore = rand(10, 40);

        /*
        |--------------------------------------------------------------------------
        | Total Risk Score
        |--------------------------------------------------------------------------
        */

        $riskScore =
            $weatherScore +
            $inflationScore +
            $currencyScore +
            $newsScore;

        /*
        |--------------------------------------------------------------------------
        | Severity
        |--------------------------------------------------------------------------
        */

        if ($riskScore >= 70) {

            $severity = 'High';

        } elseif ($riskScore >= 40) {

            $severity = 'Medium';

        } else {

            $severity = 'Low';

        }

        /*
        |--------------------------------------------------------------------------
        | Simpan Data
        |--------------------------------------------------------------------------
        */

        RiskEvent::create([

            'country_id' => $request->country_id,

            'event_type' => $request->event_type,

            'title' => $request->title,

            'description' => $request->description,

            'severity' => $severity,

            'weather_score' => $weatherScore,

            'inflation_score' => $inflationScore,

            'currency_score' => $currencyScore,

            'news_score' => $newsScore,

            'risk_score' => $riskScore,

            'source' => $request->source,

            'api_source' => $request->api_source,

            'event_date' => $request->event_date,

            'status' => true,

        ]);

        return redirect()
            ->route('risk-analysis.index')
            ->with('success', 'Risk Event berhasil ditambahkan.');
    }
}