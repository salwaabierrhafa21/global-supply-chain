@extends('layouts.app')

@section('content')
<div class="p-10">

    <h1 class="text-4xl font-bold text-white mb-2">
        Edit Negara
    </h1>

    <p class="text-gray-300 mb-8">
        Perbarui data negara.
    </p>

    @if ($errors->any())
        <div class="bg-red-500 text-white rounded-lg p-4 mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('countries.update', $country) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="bg-[#2e2867] rounded-3xl p-8 space-y-6">

            <div>
                <label class="block text-white mb-2">
                    Nama Negara
                </label>

                <input
                    type="text"
                    name="country_name"
                    class="w-full rounded-xl bg-[#211d4f] text-white p-3"
                    value="{{ old('country_name', $country->country_name) }}"
                >
            </div>

            <div>
                <label class="block text-white mb-2">
                    Kode Negara
                </label>

                <input
                    type="text"
                    name="country_code"
                    class="w-full rounded-xl bg-[#211d4f] text-white p-3"
                    value="{{ old('country_code', $country->country_code) }}"
                >
            </div>

            <div>
                <label class="block text-white mb-2">
                    Mata Uang
                </label>

                <input
                    type="text"
                    name="currency_code"
                    class="w-full rounded-xl bg-[#211d4f] text-white p-3"
                    value="{{ old('currency_code', $country->currency_code) }}"
                >
            </div>

            <div>
                <label class="block text-white mb-2">
                    Wilayah
                </label>

                <input
                    type="text"
                    name="region"
                    class="w-full rounded-xl bg-[#211d4f] text-white p-3"
                    value="{{ old('region', $country->region) }}"
                >
            </div>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block text-white mb-2">
                        Latitude
                    </label>

                    <input
                        type="number"
                        step="any"
                        name="latitude"
                        class="w-full rounded-xl bg-[#211d4f] text-white p-3"
                        value="{{ old('latitude', $country->latitude) }}"
                    >
                </div>

                <div>
                    <label class="block text-white mb-2">
                        Longitude
                    </label>

                    <input
                        type="number"
                        step="any"
                        name="longitude"
                        class="w-full rounded-xl bg-[#211d4f] text-white p-3"
                        value="{{ old('longitude', $country->longitude) }}"
                    >
                </div>

            </div>

            <div class="flex gap-4 pt-4">

                <button
                    type="submit"
                    class="bg-purple-600 hover:bg-purple-700 px-8 py-3 rounded-xl text-white font-semibold"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('countries.index') }}"
                    class="bg-gray-600 hover:bg-gray-700 px-8 py-3 rounded-xl text-white"
                >
                    Batal
                </a>

            </div>

        </div>

    </form>

</div>
@endsection