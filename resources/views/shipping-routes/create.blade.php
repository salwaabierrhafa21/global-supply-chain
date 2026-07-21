@extends('layouts.app')

@section('title', 'Tambah Jalur Pelayaran')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-white">
            Tambah Jalur Pelayaran
        </h1>

        <p class="text-violet-300 mt-2">
            Tambahkan jalur pengiriman antar pelabuhan.
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

        <form action="{{ route('shipping-routes.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-2 gap-6">

                <div>

                    <label class="block text-violet-300 mb-2">
                        Pelabuhan Asal
                    </label>

                    <select name="origin_port_id"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                        <option value="">-- Pilih Pelabuhan --</option>

                        @foreach($ports as $port)

                        <option value="{{ $port->id }}">
                            {{ $port->port_name }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Pelabuhan Tujuan
                    </label>

                    <select name="destination_port_id"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                        <option value="">-- Pilih Pelabuhan --</option>

                        @foreach($ports as $port)

                        <option value="{{ $port->id }}">
                            {{ $port->port_name }}
                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Jarak (Km)
                    </label>

                    <input type="number"
                        step="0.01"
                        name="distance_km"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Estimasi Hari
                    </label>

                    <input type="number"
                        name="estimated_days"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div class="col-span-2">

                    <label class="block text-violet-300 mb-2">
                        Biaya Dasar
                    </label>

                    <input type="number"
                        step="0.01"
                        name="base_cost"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button type="submit"
                    class="bg-violet-600 hover:bg-violet-700 px-6 py-3 rounded-xl text-white font-semibold">

                    Simpan

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