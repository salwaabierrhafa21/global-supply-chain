<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Menampilkan daftar negara
     */
    public function index()
    {
        $countries = Country::orderBy('country_name')->get();

        return view('countries.index', compact('countries'));
    }

    /**
     * Menampilkan form tambah negara
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Menyimpan data negara
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|max:100',
            'country_code' => 'required|max:2|unique:countries,country_code',
            'currency_code' => 'required|max:3',
            'region' => 'required|max:100',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Country::create([
            'country_name' => $request->country_name,
            'country_code' => strtoupper($request->country_code),
            'currency_code' => strtoupper($request->currency_code),
            'region' => $request->region,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'is_active' => true,
        ]);

        return redirect()->route('countries.index')
            ->with('success', 'Negara berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update data negara
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'country_name' => 'required|max:100',
            'country_code' => 'required|max:2|unique:countries,country_code,' . $country->id,
            'currency_code' => 'required|max:3',
            'region' => 'required|max:100',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $country->update([
            'country_name' => $request->country_name,
            'country_code' => strtoupper($request->country_code),
            'currency_code' => strtoupper($request->currency_code),
            'region' => $request->region,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('countries.index')
            ->with('success', 'Data negara berhasil diperbarui.');
    }

    /**
     * Hapus negara
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')
            ->with('success', 'Negara berhasil dihapus.');
    }

    /**
     * Import data negara dari REST Countries API
     */
    public function import()
    {
        $response = Http::timeout(60)->get(
    'https://restcountries.com/api/v1/all'
);

        if (!$response->successful()) {
            return redirect()
                ->route('countries.index')
                ->with('error', 'Gagal mengambil data dari REST Countries API.');
        }

        $countries = $response->json();

        foreach ($countries as $item) {

            // Pastikan data penting ada
            if (
                !isset($item['cca2']) ||
                !isset($item['name']['common'])
            ) {
                continue;
            }

            // Currency
            $currencyCode = null;
            $currencyName = null;

            if (!empty($item['currencies']) && is_array($item['currencies'])) {

                $keys = array_keys($item['currencies']);

                if (!empty($keys)) {

                    $currencyCode = $keys[0];

                    $currencyName = $item['currencies'][$currencyCode]['name'] ?? null;
                }
            }

            // Language
            $language = null;

            if (!empty($item['languages']) && is_array($item['languages'])) {

                $language = implode(', ', array_values($item['languages']));
            }

            // Latitude & Longitude
            $latitude = 0;
            $longitude = 0;

            if (!empty($item['latlng']) && count($item['latlng']) >= 2) {

                $latitude = $item['latlng'][0];
                $longitude = $item['latlng'][1];
            }

            // Flag
            $flag = null;

            if (!empty($item['flags']['png'])) {

                $flag = $item['flags']['png'];
            }

            Country::updateOrCreate(

                [
                    'country_code' => $item['cca2']
                ],

                [
                    'country_name' => $item['name']['common'],
                    'currency_code' => $currencyCode,
                    'currency_name' => $currencyName,
                    'region' => $item['region'] ?? '-',
                    'language' => $language,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'flag' => $flag,
                    'is_active' => true,
                ]

            );
        }

        return redirect()
            ->route('countries.index')
            ->with('success', 'Data negara berhasil diimport dari REST Countries API.');
    }
}