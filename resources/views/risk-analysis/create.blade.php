@extends('layouts.app')

@section('title', 'Tambah Risk Event')

@section('content')

<div class="space-y-8">

    <!-- Heading -->
    <div>

        <h1 class="text-4xl font-bold text-white">
            ➕ Tambah Risk Event
        </h1>

        <p class="text-violet-300 mt-2">
            Tambahkan data risiko baru ke dalam sistem monitoring rantai pasok global.
        </p>

    </div>

    <!-- Card -->
    <div class="card-purple p-8">

        @if ($errors->any())

            <div class="mb-6 rounded-xl bg-red-500/20 border border-red-500 p-4">

                <ul class="list-disc list-inside text-red-300">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form
            action="{{ route('risk-analysis.store') }}"
            method="POST"
            class="space-y-6">

            @csrf

            <!-- Negara -->
            <div>

                <label class="block text-violet-200 mb-2">

                    Negara

                </label>

                <select
                    name="country_id"
                    class="w-full rounded-xl bg-[#1E184A] border border-violet-600 text-white px-4 py-3">

                    <option value="">-- Pilih Negara --</option>

                    @foreach($countries as $country)

                        <option
                            value="{{ $country->id }}"
                            {{ old('country_id') == $country->id ? 'selected' : '' }}>

                            {{ $country->country_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Jenis Risiko -->
            <div>

                <label class="block text-violet-200 mb-2">

                    Jenis Risiko

                </label>

                <input
                    type="text"
                    name="event_type"
                    value="{{ old('event_type') }}"
                    placeholder="Contoh : Cuaca, Logistik, Geopolitik"
                    class="w-full rounded-xl bg-[#1E184A] border border-violet-600 text-white px-4 py-3">

            </div>

            <!-- Judul -->
            <div>

                <label class="block text-violet-200 mb-2">

                    Judul

                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Masukkan judul risiko"
                    class="w-full rounded-xl bg-[#1E184A] border border-violet-600 text-white px-4 py-3">

            </div>

            <!-- Deskripsi -->
            <div>

                <label class="block text-violet-200 mb-2">

                    Deskripsi

                </label>

                <textarea
                    name="description"
                    rows="4"
                    placeholder="Jelaskan risiko yang terjadi..."
                    class="w-full rounded-xl bg-[#1E184A] border border-violet-600 text-white px-4 py-3">{{ old('description') }}</textarea>

            </div>

            <!-- Source -->
            <div>

                <label class="block text-violet-200 mb-2">

                    Source

                </label>

                <input
                    type="text"
                    name="source"
                    value="{{ old('source') }}"
                    placeholder="CNN, Reuters, Bloomberg, dll"
                    class="w-full rounded-xl bg-[#1E184A] border border-violet-600 text-white px-4 py-3">

            </div>

            <!-- API Source -->
            <div>

                <label class="block text-violet-200 mb-2">

                    API Source

                </label>

                <input
                    type="text"
                    name="api_source"
                    value="{{ old('api_source') }}"
                    placeholder="GNews API, Open-Meteo API, World Bank API"
                    class="w-full rounded-xl bg-[#1E184A] border border-violet-600 text-white px-4 py-3">

            </div>

            <!-- Event Date -->
            <div>

                <label class="block text-violet-200 mb-2">

                    Tanggal Kejadian

                </label>

                <input
                    type="date"
                    name="event_date"
                    value="{{ old('event_date', date('Y-m-d')) }}"
                    class="w-full rounded-xl bg-[#1E184A] border border-violet-600 text-white px-4 py-3">

            </div>

            <!-- Informasi -->
            <div class="rounded-xl bg-violet-900/40 border border-violet-600 p-5">

                <h3 class="text-white font-semibold mb-2">

                    Informasi

                </h3>

                <p class="text-violet-300 text-sm leading-6">

                    Setelah data disimpan, sistem akan menghitung secara otomatis:

                </p>

                <ul class="mt-3 list-disc list-inside text-violet-300 text-sm space-y-1">

                    <li>Weather Score</li>

                    <li>Inflation Score</li>

                    <li>Currency Score</li>

                    <li>News Score</li>

                    <li>Total Risk Score</li>

                    <li>Severity (Low / Medium / High)</li>

                </ul>

            </div>

            <!-- Button -->
            <div class="flex gap-4 pt-6">

                <a
                    href="{{ route('risk-analysis.index') }}"
                    class="px-6 py-3 rounded-xl bg-gray-600 hover:bg-gray-500 transition text-white">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-8 py-3 rounded-xl bg-violet-600 hover:bg-violet-500 transition text-white font-semibold">

                    Simpan Risk Event

                </button>

            </div>

        </form>

    </div>

</div>

@endsection