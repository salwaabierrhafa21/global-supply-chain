@extends('layouts.app')

@section('title', 'Currency Exchange')

@section('content')

<div class="mb-8">

    <h1 class="text-4xl font-bold text-white">
        Kurs Mata Uang Real-Time
    </h1>

    <p class="text-violet-300 mt-2">
        Data diambil dari ExchangeRate API.
    </p>

</div>

@if(isset($error))

<div class="bg-red-500/20 border border-red-500 rounded-xl p-4 mb-6 text-red-300">
    {{ $error }}
</div>

@endif

<div class="card-purple p-6 rounded-3xl">

    <div class="mb-6">

        <p class="text-violet-300">
            Mata Uang Dasar :
            <strong class="text-white">
                {{ $base }}
            </strong>
        </p>

        <p class="text-violet-300">
            Update Terakhir :
            <strong class="text-white">
                {{ $updated }}
            </strong>
        </p>

    </div>

    <table class="w-full text-left">

        <thead>

            <tr class="border-b border-violet-700">

                <th class="py-4 text-violet-300">
                    Mata Uang
                </th>

                <th class="py-4 text-violet-300">
                    Nilai Tukar
                </th>

            </tr>

        </thead>

        <tbody>

        @foreach($rates as $code => $rate)

            <tr class="border-b border-violet-800">

                <td class="py-3 text-white">
                    {{ $code }}
                </td>

                <td class="text-violet-200">
                    {{ number_format($rate,4) }}
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection