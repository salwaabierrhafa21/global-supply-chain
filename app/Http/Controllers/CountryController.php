<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}