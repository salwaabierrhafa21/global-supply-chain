<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EconomicData;
use Illuminate\Http\Request;

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
}