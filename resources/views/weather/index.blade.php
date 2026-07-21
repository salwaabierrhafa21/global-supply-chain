@extends('layouts.app')

@section('title', 'Weather Monitoring')

@section('content')

<div class="mb-8">

    <h1 class="text-4xl font-bold text-white">
        Weather Monitoring
    </h1>

    <p class="text-violet-300 mt-2">
        Monitoring kondisi cuaca secara real-time menggunakan Open-Meteo API.
    </p>

</div>

@if(!$weather)

<div class="card-purple rounded-3xl p-8">

    <p class="text-red-400 text-lg">
        Gagal mengambil data cuaca.
    </p>

</div>

@else

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <div class="card-purple rounded-3xl p-6">

        <h3 class="text-violet-300 text-lg mb-2">
            🌡 Temperatur
        </h3>

        <p class="text-4xl font-bold text-white">
            {{ $weather['temperature_2m'] }} °C
        </p>

    </div>

    <div class="card-purple rounded-3xl p-6">

        <h3 class="text-violet-300 text-lg mb-2">
            🌧 Curah Hujan
        </h3>

        <p class="text-4xl font-bold text-white">
            {{ $weather['rain'] }} mm
        </p>

    </div>

    <div class="card-purple rounded-3xl p-6">

        <h3 class="text-violet-300 text-lg mb-2">
            🌬 Kecepatan Angin
        </h3>

        <p class="text-4xl font-bold text-white">
            {{ $weather['wind_speed_10m'] }} km/h
        </p>

    </div>

</div>

<div class="card-purple rounded-3xl p-6 mt-8">

    <h3 class="text-xl font-semibold text-white mb-4">
        Informasi Data
    </h3>

    <table class="w-full">

        <tr class="border-b border-violet-700">

            <td class="py-3 text-violet-300">
                Waktu Update
            </td>

            <td class="py-3 text-white">
                {{ $weather['time'] }}
            </td>

        </tr>

        <tr class="border-b border-violet-700">

            <td class="py-3 text-violet-300">
                Sumber Data
            </td>

            <td class="py-3 text-white">
                Open-Meteo API
            </td>

        </tr>

        <tr>

            <td class="py-3 text-violet-300">
                Lokasi
            </td>

            <td class="py-3 text-white">
                {{ $country->country_name }} ({{ $country->country_code }})
            </td>

        </tr>

    </table>

</div>

@endif

@endsection