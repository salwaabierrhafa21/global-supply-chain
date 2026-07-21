@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <!-- Heading -->
    <div>

        <h1 class="text-4xl font-bold text-white">
            Dashboard Pemantauan Rantai Pasok Global
        </h1>

        <p class="text-violet-300 mt-2">
            Memantau data ekonomi, logistik, dan rantai pasok global.
        </p>

    </div>

    <!-- Statistic Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Negara -->
        <div class="card-purple p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-violet-300 text-sm">
                        Negara
                    </p>

                    <h2 class="text-4xl font-bold text-white mt-2">
                        {{ $countryCount }}
                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-violet-500/20 flex items-center justify-center text-3xl">
                    🌍
                </div>

            </div>

        </div>

        <!-- Data Ekonomi -->
        <div class="card-purple p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-violet-300 text-sm">
                        Data Ekonomi
                    </p>

                    <h2 class="text-4xl font-bold text-white mt-2">
                        {{ $economicCount }}
                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-indigo-500/20 flex items-center justify-center text-3xl">
                    📊
                </div>

            </div>

        </div>

        <!-- Jalur Pelayaran -->
        <div class="card-purple p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-violet-300 text-sm">
                        Jalur Pelayaran
                    </p>

                    <h2 class="text-4xl font-bold text-white mt-2">
                        {{ $shippingRouteCount }}
                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-fuchsia-500/20 flex items-center justify-center text-3xl">
                    🚢
                </div>

            </div>

        </div>

        <!-- Risiko -->
        <div class="card-purple p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-violet-300 text-sm">
                        Peringatan Risiko
                    </p>

                    <h2 class="text-4xl font-bold text-white mt-2">
                        {{ $riskCount }}
                    </h2>

                </div>

                <div class="w-16 h-16 rounded-2xl bg-red-500/20 flex items-center justify-center text-3xl">
                    ⚠️
                </div>

            </div>

        </div>

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

        <!-- Status Cepat -->

    <div class="card-purple p-8">

        <h2 class="text-3xl font-bold text-white mb-8">
            Status Cepat
        </h2>

        <div class="space-y-8">

            <div class="flex justify-between">
                <span class="text-violet-300">
                    Peringatan Cuaca
                </span>

                <span class="text-white font-bold">
                    16
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-violet-300">
                    Berita Terbaru
                </span>

                <span class="text-white font-bold">
                    24
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-violet-300">
                    Pembaruan Nilai Tukar
                </span>

                <span class="text-white font-bold">
                    8
                </span>
            </div>

            <div class="flex justify-between">
                <span class="text-violet-300">
                    Laporan Ekonomi
                </span>

                <span class="text-white font-bold">
                    12
                </span>
            </div>

        </div>

    </div>

    <!-- Analisis Ekonomi -->

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <!-- Grafik -->

        <div class="xl:col-span-2 card-purple p-6">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-2xl font-bold text-white">
                        📈 Tren Ekonomi Global
                    </h2>

                    <p class="text-violet-300 mt-2">
                        Visualisasi perkembangan indikator ekonomi dunia.
                    </p>

                </div>

                <span class="bg-violet-500/20 text-violet-200 px-4 py-2 rounded-full text-sm">
                    Tahun 2026
                </span>

            </div>

            <div class="h-80 rounded-3xl border border-dashed border-violet-500/30 flex items-center justify-center">

                <div class="text-center">

                    <div class="text-5xl mb-4">
                        📊
                    </div>

                    <h3 class="text-xl font-semibold text-white">
                        Area Grafik
                    </h3>

                    <p class="text-violet-400 mt-2">
                        Grafik ekonomi akan ditampilkan setelah integrasi World Bank API.
                    </p>

                </div>

            </div>

        </div>

        <!-- Ringkasan -->

        <div class="card-purple p-6">

            <h2 class="text-2xl font-bold text-white mb-6">
                📌 Ringkasan Ekonomi
            </h2>

            <div class="space-y-6">

                <div class="flex justify-between">

                    <span class="text-violet-300">
                        Pertumbuhan GDP
                    </span>

                    <span class="font-bold text-green-400">
                        +5.2%
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-violet-300">
                        Inflasi
                    </span>

                    <span class="font-bold text-red-400">
                        3.1%
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-violet-300">
                        Nilai Ekspor
                    </span>

                    <span class="font-bold text-white">
                        USD 182 M
                    </span>

                </div>

                <div class="flex justify-between">

                    <span class="text-violet-300">
                        Nilai Impor
                    </span>

                    <span class="font-bold text-white">
                        USD 165 M
                    </span>

                </div>

            </div>

        </div>

    </div>

        <!-- Berita Terbaru -->

    <div class="card-purple p-6">

        <div class="flex items-center justify-between mb-8">

            <div>

                <h2 class="text-2xl font-bold text-white">
                    📰 Berita Terbaru
                </h2>

                <p class="text-violet-300 mt-2">
                    Informasi terkini mengenai ekonomi dan rantai pasok global.
                </p>

            </div>

            <button
                class="bg-violet-600 hover:bg-violet-500 transition px-5 py-2 rounded-xl text-white">

                Lihat Semua

            </button>

        </div>

        <div class="grid lg:grid-cols-3 gap-6">

            <!-- Berita 1 -->

            <div class="glass rounded-3xl p-5">

                <div
                    class="h-40 rounded-2xl bg-gradient-to-br from-violet-600 to-fuchsia-500 flex items-center justify-center text-5xl">

                    🚢

                </div>

                <p class="text-violet-400 text-sm mt-5">
                    2 Jam yang Lalu
                </p>

                <h3 class="text-xl font-semibold text-white mt-2">
                    Jalur Pelayaran Global Mulai Pulih
                </h3>

                <p class="text-violet-300 mt-3">
                    Aktivitas logistik internasional mulai kembali normal setelah
                    beberapa gangguan pada jalur distribusi.
                </p>

            </div>

            <!-- Berita 2 -->

            <div class="glass rounded-3xl p-5">

                <div
                    class="h-40 rounded-2xl bg-gradient-to-br from-indigo-600 to-violet-500 flex items-center justify-center text-5xl">

                    ⛽

                </div>

                <p class="text-violet-400 text-sm mt-5">
                    Hari Ini
                </p>

                <h3 class="text-xl font-semibold text-white mt-2">
                    Harga BBM Berdampak pada Biaya Pengiriman
                </h3>

                <p class="text-violet-300 mt-3">
                    Kenaikan harga bahan bakar meningkatkan biaya operasional
                    transportasi laut di berbagai negara.
                </p>

            </div>

            <!-- Berita 3 -->

            <div class="glass rounded-3xl p-5">

                <div
                    class="h-40 rounded-2xl bg-gradient-to-br from-purple-600 to-pink-500 flex items-center justify-center text-5xl">

                    ⚓

                </div>

                <p class="text-violet-400 text-sm mt-5">
                    Kemarin
                </p>

                <h3 class="text-xl font-semibold text-white mt-2">
                    Indonesia Menambah Kapasitas Pelabuhan
                </h3>

                <p class="text-violet-300 mt-3">
                    Pengembangan pelabuhan diharapkan mampu meningkatkan efisiensi
                    distribusi barang di kawasan Asia Tenggara.
                </p>

            </div>

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

                    Rp {{ number_format($currency,2,',','.') }}

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