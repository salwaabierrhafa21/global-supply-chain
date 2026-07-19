@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Global Supply Chain Dashboard
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-gray-500 text-sm">Countries</h2>

        <p class="text-4xl font-bold mt-3">
            0
        </p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-gray-500 text-sm">Economic Records</h2>

        <p class="text-4xl font-bold mt-3">
            0
        </p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-gray-500 text-sm">Shipping Routes</h2>

        <p class="text-4xl font-bold mt-3">
            0
        </p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-gray-500 text-sm">Risk Events</h2>

        <p class="text-4xl font-bold mt-3">
            0
        </p>
    </div>

</div>

@endsection