<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    /**
     * Menampilkan daftar pelabuhan
     */
    public function index()
    {
        $ports = Port::with('country')
            ->orderBy('port_name')
            ->get();

        return view('ports.index', compact('ports'));
    }

    /**
     * Menampilkan form tambah pelabuhan
     */
    public function create()
    {
        $countries = Country::orderBy('country_name')->get();

        return view('ports.create', compact('countries'));
    }

    /**
     * Menyimpan data pelabuhan
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'port_name' => 'required|max:255',
            'city' => 'required|max:255',
            'port_code' => 'required|max:10|unique:ports,port_code',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Port::create([
            'country_id' => $request->country_id,
            'port_name' => $request->port_name,
            'city' => $request->city,
            'port_code' => strtoupper($request->port_code),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => true,
        ]);

        return redirect()->route('ports.index')
            ->with('success', 'Pelabuhan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pelabuhan
     */
    public function show(Port $port)
    {
        return redirect()->route('ports.index');
    }

    /**
     * Menampilkan form edit
     */
    public function edit(Port $port)
    {
        $countries = Country::orderBy('country_name')->get();

        return view('ports.edit', compact('port', 'countries'));
    }

    /**
     * Mengupdate data pelabuhan
     */
    public function update(Request $request, Port $port)
    {
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'port_name' => 'required|max:255',
            'city' => 'required|max:255',
            'port_code' => 'required|max:10|unique:ports,port_code,' . $port->id,
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $port->update([
            'country_id' => $request->country_id,
            'port_name' => $request->port_name,
            'city' => $request->city,
            'port_code' => strtoupper($request->port_code),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('ports.index')
            ->with('success', 'Data pelabuhan berhasil diperbarui.');
    }

    /**
     * Menghapus pelabuhan
     */
    public function destroy(Port $port)
    {
        $port->delete();

        return redirect()->route('ports.index')
            ->with('success', 'Pelabuhan berhasil dihapus.');
    }
}