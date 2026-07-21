@extends('layouts.app')

@section('title', 'Jalur Pelayaran')

@section('content')

<div class="mb-8 flex items-center justify-between">

    <div>
        <h1 class="text-4xl font-bold text-white">
            Jalur Pelayaran
        </h1>

        <p class="text-violet-300 mt-2">
            Kelola jalur pengiriman antar pelabuhan.
        </p>
    </div>

    <a href="{{ route('shipping-routes.create') }}"
        class="bg-violet-600 hover:bg-violet-700 px-6 py-3 rounded-2xl text-white font-semibold">

        + Tambah Jalur

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

                <th class="py-4 text-violet-300">Pelabuhan Asal</th>

                <th class="py-4 text-violet-300">Pelabuhan Tujuan</th>

                <th class="py-4 text-violet-300">Jarak (Km)</th>

                <th class="py-4 text-violet-300">Estimasi Hari</th>

                <th class="py-4 text-violet-300">Biaya Dasar</th>

                <th class="py-4 text-violet-300">Status</th>

                <th class="py-4 text-center text-violet-300">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($routes as $route)

            <tr class="border-b border-violet-800">

                <td class="py-5 text-white">
                    {{ $route->originPort?->port_name ?? '-' }}
                </td>

                <td class="text-violet-200">
                    {{ $route->destinationPort?->port_name ?? '-' }}
                </td>

                <td class="text-violet-200">
                    {{ number_format($route->distance_km,2) }}
                </td>

                <td class="text-violet-200">
                    {{ $route->estimated_days }} Hari
                </td>

                <td class="text-violet-200">
                    Rp {{ number_format($route->base_cost,0,',','.') }}
                </td>

                <td>

                    @if($route->status)

                        <span class="text-green-400">
                            Aktif
                        </span>

                    @else

                        <span class="text-red-400">
                            Nonaktif
                        </span>

                    @endif

                </td>

                <td class="text-center">

                    <a href="{{ route('shipping-routes.edit', $route) }}"
                        class="text-cyan-300 hover:text-cyan-200 mr-4">

                        Edit

                    </a>

                    <form action="{{ route('shipping-routes.destroy', $route) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Yakin ingin menghapus jalur ini?')"
                            class="text-red-400 hover:text-red-300">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7" class="py-10 text-center text-violet-400">

                    Belum ada jalur pelayaran.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection