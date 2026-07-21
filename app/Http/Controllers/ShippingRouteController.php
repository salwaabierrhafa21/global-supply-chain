<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\ShippingRoute;
use Illuminate\Http\Request;

class ShippingRouteController extends Controller
{
    /**
     * Menampilkan daftar jalur pelayaran
     */
    public function index()
    {
        $routes = ShippingRoute::with(['originPort', 'destinationPort'])
            ->orderBy('id', 'desc')
            ->get();

        return view('shipping-routes.index', compact('routes'));
    }

    /**
     * Menampilkan form tambah jalur
     */
    public function create()
    {
        $ports = Port::orderBy('port_name')->get();

        return view('shipping-routes.create', compact('ports'));
    }

    /**
     * Menyimpan jalur pelayaran
     */
    public function store(Request $request)
    {
        $request->validate([
            'origin_port_id' => 'required|exists:ports,id',
            'destination_port_id' => 'required|exists:ports,id|different:origin_port_id',
            'distance_km' => 'required|numeric',
            'estimated_days' => 'required|integer',
            'base_cost' => 'required|numeric',
        ]);

        ShippingRoute::create([
            'origin_port_id' => $request->origin_port_id,
            'destination_port_id' => $request->destination_port_id,
            'distance_km' => $request->distance_km,
            'estimated_days' => $request->estimated_days,
            'base_cost' => $request->base_cost,
            'status' => true,
        ]);

        return redirect()->route('shipping-routes.index')
            ->with('success', 'Jalur pelayaran berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail
     */
    public function show(ShippingRoute $shippingRoute)
    {
        return redirect()->route('shipping-routes.index');
    }

    /**
     * Menampilkan form edit
     */
    public function edit(ShippingRoute $shippingRoute)
    {
        $ports = Port::orderBy('port_name')->get();

        return view('shipping-routes.edit', compact('shippingRoute', 'ports'));
    }

    /**
     * Mengupdate jalur pelayaran
     */
    public function update(Request $request, ShippingRoute $shippingRoute)
    {
        $request->validate([
            'origin_port_id' => 'required|exists:ports,id',
            'destination_port_id' => 'required|exists:ports,id|different:origin_port_id',
            'distance_km' => 'required|numeric',
            'estimated_days' => 'required|integer',
            'base_cost' => 'required|numeric',
        ]);

        $shippingRoute->update([
            'origin_port_id' => $request->origin_port_id,
            'destination_port_id' => $request->destination_port_id,
            'distance_km' => $request->distance_km,
            'estimated_days' => $request->estimated_days,
            'base_cost' => $request->base_cost,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('shipping-routes.index')
            ->with('success', 'Jalur pelayaran berhasil diperbarui.');
    }

    /**
     * Menghapus jalur pelayaran
     */
    public function destroy(ShippingRoute $shippingRoute)
    {
        $shippingRoute->delete();

        return redirect()->route('shipping-routes.index')
            ->with('success', 'Jalur pelayaran berhasil dihapus.');
    }
}