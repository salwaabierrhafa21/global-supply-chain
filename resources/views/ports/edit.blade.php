@extends('layouts.app')

@section('title', 'Edit Pelabuhan')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-white">
            Edit Pelabuhan
        </h1>

        <p class="text-violet-300 mt-2">
            Perbarui informasi pelabuhan.
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

        <form action="{{ route('ports.update', $port) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                <div class="col-span-2">

                    <label class="block text-violet-300 mb-2">
                        Negara
                    </label>

                    <select
                        name="country_id"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                        @foreach($countries as $country)

                            <option
                                value="{{ $country->id }}"
                                {{ $port->country_id == $country->id ? 'selected' : '' }}>

                                {{ $country->country_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Nama Pelabuhan
                    </label>

                    <input
                        type="text"
                        name="port_name"
                        value="{{ old('port_name', $port->port_name) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Kota
                    </label>

                    <input
                        type="text"
                        name="city"
                        value="{{ old('city', $port->city) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Kode Pelabuhan
                    </label>

                    <input
                        type="text"
                        name="port_code"
                        value="{{ old('port_code', $port->port_code) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Latitude
                    </label>

                    <input
                        type="number"
                        step="0.0000001"
                        name="latitude"
                        value="{{ old('latitude', $port->latitude) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div>

                    <label class="block text-violet-300 mb-2">
                        Longitude
                    </label>

                    <input
                        type="number"
                        step="0.0000001"
                        name="longitude"
                        value="{{ old('longitude', $port->longitude) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                </div>

                <div class="col-span-2">

                    <label class="inline-flex items-center gap-3 text-white">

                        <input
                            type="checkbox"
                            name="status"
                            value="1"
                            {{ $port->status ? 'checked' : '' }}>

                        Pelabuhan Aktif

                    </label>

                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button
                    type="submit"
                    class="bg-violet-600 hover:bg-violet-700 px-6 py-3 rounded-xl text-white font-semibold">

                    Simpan Perubahan

                </button>

                <a
                    href="{{ route('ports.index') }}"
                    class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl text-white">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection 