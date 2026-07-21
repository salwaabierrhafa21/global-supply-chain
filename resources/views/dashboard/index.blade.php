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

        <!-- Economic -->
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

        <!-- Shipping -->
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

                <div class="w-16 h-16 rounded-2xl bg-fuchsia-500/20 flex items-center justify-center">
    <span class="text-3xl -translate-y-1">
        🚢
    </span>
</div>

            </div>

        </div>

        <!-- Risk -->
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
        class="h-[520px] rounded-3xl border border-violet-500/20 bg-[#18133D] flex items-center justify-center">

        <div class="text-center">

            <div class="text-6xl mb-5">

                🌍

            </div>

            <h3 class="text-2xl font-semibold text-white">

                Peta Dunia Interaktif

            </h3>

            <p class="text-violet-300 mt-3">

                Peta Leaflet akan ditampilkan pada tahap integrasi API.

            </p>

        </div>

    </div>

</div>

        <!-- Placeholder Chart -->
        <div class="h-80 rounded-3xl border border-dashed border-violet-400/30 flex items-center justify-center">

            <div class="text-center">

                <h3 class="text-xl text-violet-200 font-semibold">
                    Chart Area
                </h3>

                <p class="text-violet-400 mt-2">
                    Chart akan ditampilkan di sini pada tahap berikutnya.
                </p>

            </div>

        </div>

    </div>

    <<!-- Status Cepat -->

<div class="card-purple p-8">

    <h2 class="text-3xl font-bold text-white mb-8">
        Status Cepat
    </h2>

    <div class="space-y-8">

        <div class="flex justify-between">
            <span class="text-violet-300">Peringatan Cuaca</span>
            <span class="text-white font-bold">16</span>
        </div>

        <div class="flex justify-between">
            <span class="text-violet-300">Berita Terbaru</span>
            <span class="text-white font-bold">24</span>
        </div>

        <div class="flex justify-between">
            <span class="text-violet-300">Pembaruan Nilai Tukar</span>
            <span class="text-white font-bold">8</span>
        </div>

        <div class="flex justify-between">
            <span class="text-violet-300">Laporan Ekonomi</span>
            <span class="text-white font-bold">12</span>
        </div>

    </div>

</div>

<!-- Analisis Ekonomi -->

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-8">

    <!-- Grafik Ekonomi -->

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

            <span
                class="bg-violet-500/20 text-violet-200 px-4 py-2 rounded-full text-sm">

                Tahun 2026

            </span>

        </div>

        <div
            class="h-80 rounded-3xl border border-dashed border-violet-500/30 flex items-center justify-center">

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

            <div class="flex justify-between items-center">

                <span class="text-violet-300">

                    Pertumbuhan GDP

                </span>

                <span class="font-bold text-green-400">

                    +5.2%

                </span>

            </div>

            <div class="flex justify-between items-center">

                <span class="text-violet-300">

                    Inflasi

                </span>

                <span class="font-bold text-red-400">

                    3.1%

                </span>

            </div>

            <div class="flex justify-between items-center">

                <span class="text-violet-300">

                    Nilai Ekspor

                </span>

                <span class="font-bold text-white">

                    USD 182 M

                </span>

            </div>

            <div class="flex justify-between items-center">

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

<div class="card-purple p-6 mt-8">

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

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

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

                Real-Time

            </span>

        </div>

        <div class="flex items-center justify-between mt-8">

            <div>

                <div class="text-7xl">

                    ☀️

                </div>

            </div>

            <div class="text-right">

                <h1 class="text-5xl font-bold text-white">

                    30°C

                </h1>

                <p class="text-violet-300 mt-2">

                    Cerah

                </p>

            </div>

        </div>

        <div class="grid grid-cols-3 gap-4 mt-8">

            <div class="glass rounded-2xl p-4 text-center">

                <p class="text-violet-400 text-sm">

                    Kelembapan

                </p>

                <h3 class="text-white font-bold mt-2">

                    82%

                </h3>

            </div>

            <div class="glass rounded-2xl p-4 text-center">

                <p class="text-violet-400 text-sm">

                    Angin

                </p>

                <h3 class="text-white font-bold mt-2">

                    12 km/j

                </h3>

            </div>

            <div class="glass rounded-2xl p-4 text-center">

                <p class="text-violet-400 text-sm">

                    Tekanan

                </p>

                <h3 class="text-white font-bold mt-2">

                    1008 hPa

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

                    Kurs mata uang internasional.

                </p>

            </div>

            <span class="text-violet-300">

                Hari Ini

            </span>

        </div>

        <div class="space-y-4 mt-8">

            <div class="glass rounded-2xl p-5 flex justify-between">

                <span class="text-violet-300">

                    USD → IDR

                </span>

                <span class="text-white font-bold">

                    Rp16.250

                </span>

            </div>

            <div class="glass rounded-2xl p-5 flex justify-between">

                <span class="text-violet-300">

                    EUR → IDR

                </span>

                <span class="text-white font-bold">

                    Rp18.900

                </span>

            </div>

            <div class="glass rounded-2xl p-5 flex justify-between">

                <span class="text-violet-300">

                    JPY → IDR

                </span>

                <span class="text-white font-bold">

                    Rp111

                </span>

            </div>

            <div class="glass rounded-2xl p-5 flex justify-between">

                <span class="text-violet-300">

                    SGD → IDR

                </span>

                <span class="text-white font-bold">

                    Rp12.650

                </span>

            </div>

        </div>

    </div>

</div>

        <!-- News Item -->

        <div
            class="glass p-5 flex justify-between items-center">

            <div>

                <h3 class="text-lg font-semibold text-white">

                    Harga BBM Mempengaruhi Transportasi Laut

                </h3>

                <p class="text-violet-300 text-sm mt-2">

                    Kenaikan harga BBM memengaruhi biaya pengiriman di kawasan Asia.

                </p>

            </div>

            <span class="text-violet-400 text-sm">

                Hari Ini

            </span>

        </div>

        <!-- News Item -->

        <div
            class="glass p-5 flex justify-between items-center">

            <div>

                <h3 class="text-lg font-semibold text-white">

                    Indonesia Menambah Kapasitas Pelabuhan

                </h3>

                <p class="text-violet-300 text-sm mt-2">

                    Pengembangan pelabuhan diharapkan meningkatkan kinerja rantai pasok regional.

                </p>

            </div>

            <span class="text-violet-400 text-sm">

                Kemarin

            </span>

        </div>

    </div>

</div>

    <!-- Economic Summary -->

    <div class="card-purple p-6">

        <h2 class="text-2xl font-bold text-white mb-6">

             Ringkasan Ekonomi

        </h2>

        <div class="space-y-5">

            <div class="flex justify-between">

                <span class="text-violet-300">

                    Pertumbuhan GDP

                </span>

                <span class="text-green-400 font-bold">

                    +5.2%

                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-violet-300">

                    Inflasi

                </span>

                <span class="text-red-400 font-bold">

                    3.1%

                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-violet-300">

                    Nilai Ekspor

                </span>

                <span class="text-white font-bold">

                    USD 182B

                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-violet-300">

                    Nilai Impor

                </span>

                <span class="text-white font-bold">

                    USD 165B

                </span>

            </div>

        </div>

    </div>

</div>

@endsection