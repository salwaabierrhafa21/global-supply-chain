@extends('layouts.app')

@section('title', 'Analisis Risiko')

@section('content')

<div class="space-y-8">

    <!-- Heading -->
    <div class="flex justify-between items-center">

        <div>

            <h1 class="text-4xl font-bold text-white">
                ⚠️ Analisis Risiko Global
            </h1>

            <p class="text-violet-300 mt-2">
                Monitoring risiko rantai pasok berdasarkan data cuaca, ekonomi,
                logistik, dan geopolitik.
            </p>

        </div>

        @if(Auth::user()->role == 'admin')

    <a href="{{ route('risk-analysis.create') }}"
       class="px-6 py-3 rounded-xl bg-violet-600 hover:bg-violet-500 transition text-white font-semibold">

        + Tambah Risk Event

    </a>

@endif

    </div>

    <!-- Statistik -->

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="card-purple p-6">
            <p class="text-violet-300 text-sm">Total Risiko</p>
            <h2 class="text-4xl font-bold text-white mt-3">
                {{ $risks->count() }}
            </h2>
        </div>

        <div class="card-purple p-6">
            <p class="text-violet-300 text-sm">Risiko Tinggi</p>
            <h2 class="text-4xl font-bold text-red-400 mt-3">
                {{ $risks->where('severity','High')->count() }}
            </h2>
        </div>

        <div class="card-purple p-6">
            <p class="text-violet-300 text-sm">Risiko Sedang</p>
            <h2 class="text-4xl font-bold text-yellow-400 mt-3">
                {{ $risks->where('severity','Medium')->count() }}
            </h2>
        </div>

        <div class="card-purple p-6">
            <p class="text-violet-300 text-sm">Risiko Rendah</p>
            <h2 class="text-4xl font-bold text-green-400 mt-3">
                {{ $risks->where('severity','Low')->count() }}
            </h2>
        </div>

    </div>

    @if(session('success'))

        <div class="rounded-xl bg-green-500/20 border border-green-500 p-4 text-green-300">

            {{ session('success') }}

        </div>

    @endif

    <!-- Grafik -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    <!-- Pie Chart -->
    <div class="card-purple p-6">

        <h2 class="text-2xl font-bold text-white mb-6">

            Distribusi Risiko

        </h2>

        <div class="h-64 flex justify-center items-center">

            <canvas id="riskPieChart"></canvas>

        </div>

    </div>

    <!-- Bar Chart -->
    <div class="card-purple p-6">

        <h2 class="text-2xl font-bold text-white mb-6">

            Statistik Risiko

        </h2>

        <div class="h-80">

            <canvas id="riskBarChart"></canvas>

        </div>

    </div>

</div>

    <!-- Table -->

    <div class="card-purple p-6">

        <h2 class="text-2xl font-bold text-white mb-6">

            Daftar Risk Event

        </h2>

        <div class="overflow-x-auto">

            <table class="w-full table-auto">

                <thead>

                    <tr class="border-b border-violet-600 text-violet-300">

                        <th class="py-4 px-3 text-left w-40">
                            Negara
                        </th>

                        <th class="py-4 px-3 text-left w-32">
                            Jenis
                        </th>

                        <th class="py-4 px-3 text-left min-w-[260px]">
                            Judul
                        </th>

                        <th class="py-4 px-3 text-center w-28">
                            Severity
                        </th>

                        <th class="py-4 px-3 text-center w-20">
                            Score
                        </th>

                        <th class="py-4 px-3 text-left w-32">
                            Source
                        </th>

                        <th class="py-4 px-3 text-left w-28">
                            API
                        </th>

                        <th class="py-4 px-3 text-center w-36">
                            Tanggal
                        </th>

                        <th class="py-4 px-3 text-center w-40">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($risks as $risk)

                        <tr class="border-b border-violet-800 hover:bg-violet-900/30 transition">

                            <td class="py-5 px-3 text-white font-medium">

                                {{ $risk->country->country_name }}

                            </td>

                            <td class="py-5 px-3 text-violet-200">

                                {{ $risk->event_type }}

                            </td>

                            <td class="py-5 px-3 text-white">

                                <div class="break-words">

                                    {{ $risk->title }}

                                </div>

                            </td>

                            <td class="py-5 px-3 text-center">

                                @if($risk->severity == 'High')

                                    <span class="px-3 py-1 rounded-full bg-red-500/20 text-red-400 text-sm">

                                        High

                                    </span>

                                @elseif($risk->severity == 'Medium')

                                    <span class="px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-300 text-sm">

                                        Medium

                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full bg-green-500/20 text-green-400 text-sm">

                                        Low

                                    </span>

                                @endif

                            </td>

                            <td class="py-5 px-3 text-center text-white font-semibold">

                                {{ $risk->risk_score }}

                            </td>

                            <td class="py-5 px-3 text-violet-200">

                                {{ $risk->source }}

                            </td>

                            <td class="py-5 px-3 text-violet-200">

                                {{ $risk->api_source ?? '-' }}

                            </td>

                            <td class="py-5 px-3 text-center text-violet-200">

                                {{ \Carbon\Carbon::parse($risk->event_date)->format('d M Y') }}

                            </td>

                            <td class="py-5 px-3">

    @if(Auth::user()->role == 'admin')

        <div class="flex justify-center gap-2">

            <!-- Edit -->
            <a href="{{ route('risk-analysis.edit', $risk->id) }}"
               class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-500 transition text-white text-sm">

                ✏️ Edit

            </a>

            <!-- Delete -->
            <form
                action="{{ route('risk-analysis.destroy', $risk->id) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus Risk Event ini?')">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-500 transition text-white text-sm">

                    🗑 Hapus

                </button>

            </form>

        </div>

    @else

        <span class="text-violet-300 font-medium">

            View Only

        </span>

    @endif

</td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9"
                                class="py-10 text-center text-violet-300">

                                Belum ada data Risk Event.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

const highRisk = {{ $highRisk }};
const mediumRisk = {{ $mediumRisk }};
const lowRisk = {{ $lowRisk }};

/* =========================
   Pie Chart
========================= */

new Chart(document.getElementById('riskPieChart'), {

    type: 'pie',

    data: {

        labels: ['High', 'Medium', 'Low'],

        datasets: [{

            data: [

                highRisk,

                mediumRisk,

                lowRisk

            ],

            backgroundColor: [

                '#ef4444',

                '#facc15',

                '#22c55e'

            ],

            borderWidth: 0

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                labels: {

                    color: '#ffffff',

                    font: {

                        size: 14

                    }

                }

            }

        }

    }

});

/* =========================
   Bar Chart
========================= */

new Chart(document.getElementById('riskBarChart'), {

    type: 'bar',

    data: {

        labels: [

            'High',

            'Medium',

            'Low'

        ],

        datasets: [{

            label: 'Jumlah Risk Event',

            data: [

                highRisk,

                mediumRisk,

                lowRisk

            ],

            backgroundColor: [

                '#ef4444',

                '#facc15',

                '#22c55e'

            ],

            borderRadius: 8

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        scales: {

            y: {

                beginAtZero: true,

                ticks: {

                    color: '#ffffff'

                },

                grid: {

                    color: '#444'

                }

            },

            x: {

                ticks: {

                    color: '#ffffff'

                },

                grid: {

                    display: false

                }

            }

        },

        plugins: {

            legend: {

                labels: {

                    color: '#ffffff'

                }

            }

        }

    }

});

</script>

@endpush