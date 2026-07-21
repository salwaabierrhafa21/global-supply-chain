@extends('layouts.app')

@section('title', 'Data Ekonomi')

@section('content')

<div class="mb-8 flex items-center justify-between">

    <div>

        <h1 class="text-4xl font-bold text-white">
            Data Ekonomi
        </h1>

        <p class="text-violet-300 mt-2">
            Kelola data ekonomi setiap negara.
        </p>

    </div>

    <a href="{{ route('economic-data.create') }}"
       class="bg-violet-600 hover:bg-violet-700 transition px-6 py-3 rounded-2xl text-white font-semibold">

        + Tambah Data

    </a>

</div>

@if(session('success'))

<div class="mb-6 rounded-2xl bg-green-500/20 border border-green-500/30 p-4 text-green-300">
    {{ session('success') }}
</div>

@endif

<div class="card-purple p-6 rounded-3xl overflow-hidden">

    <table class="w-full text-left">

        <thead>

            <tr class="border-b border-violet-700">

                <th class="py-4 text-violet-300">Negara</th>

                <th class="py-4 text-violet-300">PDB (GDP)</th>

                <th class="py-4 text-violet-300">Inflasi (%)</th>

                <th class="py-4 text-violet-300">Pengangguran (%)</th>

                <th class="py-4 text-violet-300">Pertumbuhan (%)</th>

                <th class="py-4 text-violet-300">Tanggal</th>

                <th class="py-4 text-center text-violet-300">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

        @forelse($economicData as $data)

            <tr class="border-b border-violet-800">

                <td class="py-5 text-white">
                    {{ $data->country->country_name }}
                </td>

                <td class="text-violet-200">
                    {{ number_format($data->gdp,2) }}
                </td>

                <td class="text-violet-200">
                    {{ $data->inflation_rate }}
                </td>

                <td class="text-violet-200">
                    {{ $data->unemployment_rate }}
                </td>

                <td class="text-violet-200">
                    {{ $data->economic_growth }}
                </td>

                <td class="text-violet-200">
                    {{ $data->recorded_at }}
                </td>

                <td class="text-center">

                    <a href="{{ route('economic-data.edit',$data) }}"
                       class="text-cyan-300 hover:text-cyan-200 mr-4">

                        Edit

                    </a>

                    <form action="{{ route('economic-data.destroy',$data) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                            class="text-red-400 hover:text-red-300">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7"
                    class="py-12 text-center text-violet-400">

                    Belum ada data ekonomi.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection