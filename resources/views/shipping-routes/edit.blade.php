@extends('layouts.app')

@section('title', 'Edit Jalur Pelayaran')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-white">
            Edit Jalur Pelayaran
        </h1>

        <p class="text-violet-300 mt-2">
            Perbarui data jalur pengiriman.
        </p>

    </div>

    @if ($errors->any())

    <div class="mb-6 rounded-2xl bg-red-500/20 border border-red-500/30 p-4 text-red-300">

        <ul>

            @foreach ($errors->all() as $error)

                <li>• {{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="card-purple p-8 rounded-3xl">

        <form action="{{ route('shipping-routes.update', $shippingRoute) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="block text-violet-300 mb-2">
                        Pelabuhan Asal
                    </label>

                    <select
                        name="origin_port_id"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                        @foreach($ports as $port)

                            <option value="{{ $port->id }}"
                                {{ $shippingRoute->origin_port_id == $port->id ? 'selected' : '' }}>

                                {{ $port->port_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Pelabuhan Tujuan
                    </label>

                    <select
                        name="destination_port_id"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                        @foreach($ports as $port)

                            <option value="{{ $port->id }}"
                                {{ $shippingRoute->destination_port_id == $port->id ? 'selected' : '' }}>

                                {{ $port->port_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Jarak (Km)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="distance_km"
                        value="{{ $shippingRoute->distance_km }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Estimasi Hari
                    </label>

                    <input
                        type="number"
                        name="estimated_days"
                        value="{{ $shippingRoute->estimated_days }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div class="col-span-2">

                    <label class="block text-violet-300 mb-2">
                        Biaya Dasar
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="base_cost"
                        value="{{ $shippingRoute->base_cost }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div class="col-span-2">

                    <label class="inline-flex items-center">

                        <input
                            type="checkbox"
                            name="status"
                            class="mr-2"
                            {{ $shippingRoute->status ? 'checked' : '' }}>

                        <span class="text-violet-300">
                            Jalur Aktif
                        </span>

                    </label>

                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button
                    type="submit"
                    class="bg-violet-600 hover:bg-violet-700 px-6 py-3 rounded-xl text-white font-semibold">

                    Update

                </button>

                <a href="{{ route('shipping-routes.index') }}"
                    class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl text-white">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection