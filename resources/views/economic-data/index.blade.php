@extends('layouts.app')

@section('title', 'Data Ekonomi')

@section('content')

<div class="mb-8 flex items-center justify-between">

    <div>
        <h1 class="text-4xl font-bold text-white">
            Data Ekonomi
        </h1>

        <p class="mt-2 text-violet-300">
            Kelola data ekonomi setiap negara.
        </p>
    </div>

    <div class="flex gap-4">

        <a href="{{ route('economic-data.create') }}"
           class="rounded-2xl bg-violet-600 px-6 py-3 font-semibold text-white hover:bg-violet-700">

            + Tambah Data

        </a>

        <a href="{{ route('economic-data.import') }}"
           class="rounded-2xl bg-cyan-600 px-6 py-3 font-semibold text-white hover:bg-cyan-700">

            ⟳ Import World Bank API

        </a>

    </div>

</div>

@if(session('success'))

<div class="mb-6 rounded-2xl border border-green-500/30 bg-green-500/20 p-4 text-green-300">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="mb-6 rounded-2xl border border-red-500/30 bg-red-500/20 p-4 text-red-300">

    {{ session('error') }}

</div>

@endif

<div class="card-purple rounded-3xl p-6">

    <div class="overflow-x-auto">

        <table class="min-w-full table-auto">

            <thead>

                <tr class="border-b border-violet-700">

                    <th class="px-6 py-4 text-left text-violet-300">
    Populasi
</th>

<th class="px-6 py-4 text-left text-violet-300">
    Ekspor
</th>

<th class="px-6 py-4 text-left text-violet-300">
    Impor
</th>

<th class="px-6 py-4 text-left text-violet-300">
    Pengangguran (%)
</th>

<th class="px-6 py-4 text-left text-violet-300">
    Pertumbuhan (%)
</th>

                    <th class="px-6 py-4 text-center text-violet-300">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($economicData as $data)

                <tr class="border-b border-violet-800 hover:bg-violet-900/20">

                    <td class="px-6 py-5 text-white">

                        {{ $data->country->country_name }}

                    </td>

                    <td class="px-6 py-5 text-violet-200">

                        Rp {{ number_format($data->gdp,0,',','.') }}

                    </td>

                    <td class="px-6 py-5 text-violet-200">

                        {{ number_format($data->inflation_rate,2) }}

                    </td>

                    <td class="px-6 py-5 text-violet-200">

    {{ number_format($data->population,0,',','.') }}

</td>

<td class="px-6 py-5 text-violet-200">

    {{ number_format($data->exports,0,',','.') }}

</td>

<td class="px-6 py-5 text-violet-200">

    {{ number_format($data->imports,0,',','.') }}

</td>

<td class="px-6 py-5 text-violet-200">

    {{ number_format($data->unemployment_rate,2) }}

</td>

<td class="px-6 py-5 text-violet-200">

    {{ number_format($data->economic_growth,2) }}

</td>

                    <td class="px-6 py-5 text-violet-200">

                        {{ $data->recorded_at }}

                    </td>

                    <td class="px-6 py-5 text-center">

                        <a href="{{ route('economic-data.edit',$data) }}"
                           class="mr-4 text-cyan-300 hover:text-cyan-200">

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

                    <td colspan="10"
                        class="py-10 text-center text-violet-400">

                        Belum ada data ekonomi.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection