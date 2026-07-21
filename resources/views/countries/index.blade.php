@extends('layouts.app')

@section('title', 'Manajemen Negara')

@section('content')

<div class="mb-8 flex items-center justify-between">

    <div>

        <h1 class="text-4xl font-bold text-white">
            Manajemen Negara
        </h1>

        <p class="text-violet-300 mt-2">
            Kelola seluruh data negara yang digunakan pada sistem.
        </p>

    </div>

    <div class="flex gap-3">

        @if(Auth::user()->role == 'admin')

<a href="{{ route('countries.create') }}"
   class="...">

    + Tambah Negara

</a>

@endif

        <a href="{{ route('countries.import') }}"
           class="bg-cyan-600 hover:bg-cyan-700 transition px-6 py-3 rounded-2xl text-white font-semibold">

            ⟳ Import REST Countries API

        </a>

    </div>

</div>

@if(session('success'))

<div class="mb-6 rounded-2xl bg-green-500/20 border border-green-500/30 p-4 text-green-300">

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div class="mb-6 rounded-2xl bg-red-500/20 border border-red-500/30 p-4 text-red-300">

    {{ session('error') }}

</div>

@endif

<div class="card-purple p-6 rounded-3xl overflow-hidden">

    <table class="w-full text-left">

        <thead>

            <tr class="border-b border-violet-700">

                <th class="py-4 text-violet-300">Negara</th>

                <th class="py-4 text-violet-300">Kode</th>

                <th class="py-4 text-violet-300">Mata Uang</th>

                <th class="py-4 text-violet-300">Wilayah</th>

                <th class="py-4 text-violet-300">Bahasa</th>

                <th class="py-4 text-violet-300">Status</th>

                <th class="py-4 text-center text-violet-300">

                    Aksi

                </th>

            </tr>

        </thead>

        <tbody>

        @forelse($countries as $country)

            <tr class="border-b border-violet-800">

                <td class="py-5 text-white">

                    {{ $country->country_name }}

                </td>

                <td class="text-violet-200">

                    {{ $country->country_code }}

                </td>

                <td class="text-violet-200">

                    {{ $country->currency_code }}

                    @if($country->currency_name)

                        <br>

                        <small class="text-violet-400">

                            {{ $country->currency_name }}

                        </small>

                    @endif

                </td>

                <td class="text-violet-200">

                    {{ $country->region }}

                </td>

                <td class="text-violet-200">

                    {{ $country->language }}

                </td>

                <td>

                    @if($country->is_active)

                        <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">

                            Aktif

                        </span>

                    @else

                        <span class="bg-red-500/20 text-red-300 px-3 py-1 rounded-full text-sm">

                            Nonaktif

                        </span>

                    @endif

                </td>

                <td class="text-center">

                    @if(Auth::user()->role == 'admin')

<a href="{{ route('countries.edit',$country->id) }}"
   class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-500 text-white">

    ✏️ Edit

</a>

@endif

                    @if(Auth::user()->role == 'admin')

<form
    action="{{ route('countries.destroy',$country->id) }}"
    method="POST">

    @csrf
    @method('DELETE')

    <button
        class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-500 text-white">

        🗑 Hapus

    </button>

</form>

@endif

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7"
                    class="py-12 text-center text-violet-400">

                    Belum ada data negara.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection