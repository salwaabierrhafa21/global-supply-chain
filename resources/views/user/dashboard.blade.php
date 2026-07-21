@extends('layouts.user')

@section('content')

<div class="space-y-8">

    <!-- Heading -->
    <div>

        <h1 class="text-4xl font-bold text-white">
    Dashboard User
</h1>

<p class="text-violet-300 mt-2">
    Selamat datang di Sistem Monitoring Rantai Pasok Global.
    Pantau informasi cuaca, ekonomi, nilai tukar, berita, dan risiko secara realtime.
</p>

    </div>

    <!-- Peta Rantai Pasok Global -->

<div class="card-purple p-6">

    <div class="flex items-center justify-between mb-6">

        <div>

            <h2 class="text-2xl font-bold text-white">
                🌍 Peta Rantai Pasok Global
            </h2>

            <p class="text-violet-300 mt-2">
                Memantau negara, pelabuhan, serta jalur pelayaran secara real-time.
            </p>

        </div>

        <span
            class="px-4 py-2 rounded-full bg-emerald-500/20 text-emerald-300 text-sm font-semibold">

            ● Real-Time

        </span>

    </div>

    <div
        id="worldMap"
        class="h-[520px] rounded-3xl overflow-hidden border border-violet-500/20">
    </div>

</div>

        
    <!-- Widget Cuaca & Nilai Tukar -->

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Cuaca -->

<div class="card-purple p-6">

    <div class="flex justify-between items-center">

        <div>

            <h2 class="text-2xl font-bold text-white">
                🌤 Cuaca Saat Ini
            </h2>

            <p class="text-violet-300 mt-2">
                Informasi cuaca wilayah Jakarta.
            </p>

        </div>

        <span class="text-violet-300">

            {{ now()->format('d M Y H:i') }}

        </span>

    </div>

    <div class="flex items-center justify-between mt-8">

        <div class="text-7xl">

            @if(($weather['rain'] ?? 0) > 0)

                🌧️

            @else

                ☀️

            @endif

        </div>

        <div class="text-right">

            <h1 class="text-5xl font-bold text-white">

                {{ $weather['temperature_2m'] ?? '-' }}°C

            </h1>

            <p class="text-violet-300 mt-2">

                @if(($weather['rain'] ?? 0) > 0)

                    Hujan

                @else

                    Cerah

                @endif

            </p>

        </div>

    </div>

    <div class="grid grid-cols-3 gap-4 mt-8">

        <div class="glass rounded-2xl p-4 text-center">

            <p class="text-violet-400 text-sm">

                Curah Hujan

            </p>

            <h3 class="text-white font-bold mt-2">

                {{ $weather['rain'] ?? 0 }} mm

            </h3>

        </div>

        <div class="glass rounded-2xl p-4 text-center">

            <p class="text-violet-400 text-sm">

                Kecepatan Angin

            </p>

            <h3 class="text-white font-bold mt-2">

                {{ $weather['wind_speed_10m'] ?? '-' }} km/j

            </h3>

        </div>

        <div class="glass rounded-2xl p-4 text-center">

            <p class="text-violet-400 text-sm">

                Status

            </p>

            <h3 class="text-white font-bold mt-2">

                @if(($weather['rain'] ?? 0) > 0)

                    Rain

                @else

                    Clear

                @endif

            </h3>

        </div>

    </div>

</div>
        <!-- Nilai Tukar -->

<div class="card-purple p-6">

    <div class="flex justify-between items-center">

        <div>

            <h2 class="text-2xl font-bold text-white">
                💱 Nilai Tukar Mata Uang
            </h2>

            <p class="text-violet-300 mt-2">
                Kurs mata uang internasional (Realtime API).
            </p>

        </div>

        <span class="text-violet-300">

            {{ now()->format('d M Y') }}

        </span>

    </div>

    <div class="space-y-4 mt-8">

        <div class="glass rounded-2xl p-5 flex justify-between">

            <span class="text-violet-300">

                USD → IDR

            </span>

            <span class="text-white font-bold">

                @if($currency)

                    Rp {{ number_format($currency['rates']['IDR'],0,',','.') }}

                @else

                    -

                @endif

            </span>

        </div>

        <div class="glass rounded-2xl p-5 flex justify-between">

            <span class="text-violet-300">

                Update

            </span>

            <span class="text-green-400 font-semibold">

                Live API

            </span>

        </div>

        <div class="glass rounded-2xl p-5 flex justify-between">

            <span class="text-violet-300">

                Base Currency

            </span>

            <span class="text-white font-bold">

                USD

            </span>

        </div>

        <div class="glass rounded-2xl p-5 flex justify-between">

            <span class="text-violet-300">

                Status

            </span>

            <span class="text-green-400 font-bold">

                Online

            </span>

        </div>

    </div>

</div>

<!-- Grafik Severity -->

<div class="card-purple p-6">

    <h2 class="text-2xl font-bold text-white mb-6">

        📊 Distribusi Severity Risk

    </h2>

    <div class="h-96">

        <canvas id="severityChart"></canvas>

    </div>

</div>

    @push('scripts')

<script>

document.addEventListener("DOMContentLoaded", function () {

    /*
    |--------------------------------------------------------------------------
    | Leaflet Map
    |--------------------------------------------------------------------------
    */

    const map = L.map('worldMap', {

        zoomControl: true

    }).setView([20, 0], 2);

    L.tileLayer(

        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

        {

            maxZoom: 18,

            attribution: '&copy; OpenStreetMap Contributors'

        }

    ).addTo(map);

    /*
    |--------------------------------------------------------------------------
    | Severity Chart
    |--------------------------------------------------------------------------
    */

    const severityChart = document.getElementById('severityChart');

    if (severityChart) {

        new Chart(severityChart, {

            type: 'doughnut',

            data: {

                labels: [

                    'High',

                    'Medium',

                    'Low'

                ],

                datasets: [{

                    data: [

                        {{ $highRisk }},

                        {{ $mediumRisk }},

                        {{ $lowRisk }}

                    ],

                    backgroundColor: [

                        '#ef4444',

                        '#facc15',

                        '#22c55e'

                    ],

                    borderWidth: 2

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {

                        labels: {

                            color: '#ffffff'

                        }

                    }

                }

            }

        });

    }

});

</script>

@endpush

@endsection