<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EconomicData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EconomicDataController extends Controller
{
    /**
     * Menampilkan daftar data ekonomi
     */
    public function index()
    {
        $economicData = EconomicData::with('country')
            ->orderByDesc('recorded_at')
            ->get();

        return view('economic-data.index', compact('economicData'));
    }

    /**
     * Menampilkan form tambah data
     */
    public function create()
    {
        $countries = Country::orderBy('country_name')->get();

        return view('economic-data.create', compact('countries'));
    }

    /**
     * Menyimpan data ekonomi
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'gdp' => 'required|numeric',
            'inflation_rate' => 'required|numeric',
            'unemployment_rate' => 'required|numeric',
            'economic_growth' => 'required|numeric',
            'recorded_at' => 'required|date',
        ]);

        EconomicData::create($request->all());

        return redirect()->route('economic-data.index')
            ->with('success', 'Data ekonomi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail data
     */
    public function show($id)
    {
        $economicData = EconomicData::with('country')->findOrFail($id);

        return view('economic-data.show', compact('economicData'));
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        $economicData = EconomicData::findOrFail($id);

        $countries = Country::orderBy('country_name')->get();

        return view('economic-data.edit', compact('economicData', 'countries'));
    }

    /**
     * Mengupdate data ekonomi
     */
    public function update(Request $request, $id)
    {
        $economicData = EconomicData::findOrFail($id);

        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'gdp' => 'required|numeric',
            'inflation_rate' => 'required|numeric',
            'unemployment_rate' => 'required|numeric',
            'economic_growth' => 'required|numeric',
            'recorded_at' => 'required|date',
        ]);

        $economicData->update($request->all());

        return redirect()->route('economic-data.index')
            ->with('success', 'Data ekonomi berhasil diperbarui.');
    }

    /**
     * Menghapus data ekonomi
     */
    public function destroy($id)
    {
        $economicData = EconomicData::findOrFail($id);

        $economicData->delete();

        return redirect()->route('economic-data.index')
            ->with('success', 'Data ekonomi berhasil dihapus.');
    }

    /**
     * Import data dari World Bank API
     */
    public function import()
    {
        // Cari negara Indonesia
        $country = Country::where('country_name', 'Indonesia')->first();

        if (!$country) {

            return redirect()->route('economic-data.index')
                ->with('error', 'Negara Indonesia belum ada di database.');
        }

        /*
        |--------------------------------------------------------------------------
        | World Bank Indicators
        |--------------------------------------------------------------------------
        */

        $indicators = [

            'gdp' => 'NY.GDP.MKTP.CD',

            'inflation_rate' => 'FP.CPI.TOTL.ZG',

            'population' => 'SP.POP.TOTL',

            'exports' => 'NE.EXP.GNFS.CD',

            'imports' => 'NE.IMP.GNFS.CD',

        ];

        $result = [];

        foreach ($indicators as $field => $indicator) {

            $response = Http::get(
                "https://api.worldbank.org/v2/country/IDN/indicator/{$indicator}?format=json"
            );

            $result[$field] = 0;

            if ($response->successful()) {

                $json = $response->json();

                if (isset($json[1])) {

                    foreach ($json[1] as $item) {

                        if (!is_null($item['value'])) {

                            $result[$field] = $item['value'];

                            break;

                        }

                    }

                }

            }

        }

        /*
        |--------------------------------------------------------------------------
        | Simpan ke Database
        |--------------------------------------------------------------------------
        */

        EconomicData::create([

            'country_id' => $country->id,

            'gdp' => $result['gdp'],

            'inflation_rate' => $result['inflation_rate'],

            'unemployment_rate' => 0,

            'economic_growth' => 0,

            'population' => $result['population'],

            'exports' => $result['exports'],

            'imports' => $result['imports'],

            'recorded_at' => now()->toDateString(),

        ]);

        return redirect()->route('economic-data.index')
            ->with('success', 'Data World Bank berhasil diimport.');
    }
}