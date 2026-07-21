@extends('layouts.app')

@section('title', 'Edit Data Ekonomi')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">
        <h1 class="text-4xl font-bold text-white">
            Edit Data Ekonomi
        </h1>

        <p class="text-violet-300 mt-2">
            Perbarui data ekonomi berdasarkan negara.
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-2xl bg-red-500/20 border border-red-500/30 p-4 text-red-300">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-purple p-8 rounded-3xl">

        <form action="{{ route('economic-data.update', $economicData->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                <div class="col-span-2">
                    <label class="block text-violet-300 mb-2">
                        Negara
                    </label>

                    <select
                        name="country_id"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">

                        @foreach($countries as $country)
                            <option value="{{ $country->id }}"
                                {{ old('country_id', $economicData->country_id) == $country->id ? 'selected' : '' }}>
                                {{ $country->country_name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div>
                    <label class="block text-violet-300 mb-2">
                        GDP
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="gdp"
                        value="{{ old('gdp', $economicData->gdp) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">
                </div>

                <div>
                    <label class="block text-violet-300 mb-2">
                        Inflasi (%)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="inflation_rate"
                        value="{{ old('inflation_rate', $economicData->inflation_rate) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">
                </div>

                <div>
                    <label class="block text-violet-300 mb-2">
                        Pengangguran (%)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="unemployment_rate"
                        value="{{ old('unemployment_rate', $economicData->unemployment_rate) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">
                </div>

                <div>
                    <label class="block text-violet-300 mb-2">
                        Pertumbuhan Ekonomi (%)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="economic_growth"
                        value="{{ old('economic_growth', $economicData->economic_growth) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">
                </div>

                <div class="col-span-2">
                    <label class="block text-violet-300 mb-2">
                        Tanggal Data
                    </label>

                    <input
                        type="date"
                        name="recorded_at"
                        value="{{ old('recorded_at', \Carbon\Carbon::parse($economicData->recorded_at)->format('Y-m-d')) }}"
                        class="w-full bg-violet-950/40 border border-violet-700 rounded-xl p-3 text-white">
                </div>

            </div>

            <div class="mt-8 flex gap-4">

                <button
                    type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 px-6 py-3 rounded-xl text-white font-semibold">
                    Update Data
                </button>

                <a
                    href="{{ route('economic-data.index') }}"
                    class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl text-white">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection