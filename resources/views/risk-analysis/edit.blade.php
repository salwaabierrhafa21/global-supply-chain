@extends('layouts.app')

@section('title', 'Edit Risk Event')

@section('content')

<div class="space-y-8">

    <!-- Heading -->

    <div>

        <h1 class="text-4xl font-bold text-white">
            ✏️ Edit Risk Event
        </h1>

        <p class="text-violet-300 mt-2">
            Perbarui informasi risiko rantai pasok global.
        </p>

    </div>

    <!-- Validation Error -->

    @if ($errors->any())

        <div class="rounded-xl border border-red-500 bg-red-500/20 p-5">

            <ul class="list-disc list-inside text-red-300">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <!-- Form -->

    <div class="card-purple p-8">

        <form
            action="{{ route('risk-analysis.update',$risk->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Negara -->

                <div>

                    <label class="block text-violet-300 mb-2">

                        Negara

                    </label>

                    <select
                        name="country_id"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">

                        @foreach($countries as $country)

                            <option
                                value="{{ $country->id }}"
                                {{ $risk->country_id == $country->id ? 'selected' : '' }}>

                                {{ $country->country_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Jenis -->

                <div>

                    <label class="block text-violet-300 mb-2">

                        Jenis Risiko

                    </label>

                    <input
                        type="text"
                        name="event_type"
                        value="{{ old('event_type',$risk->event_type) }}"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">

                </div>

                <!-- Judul -->

                <div class="md:col-span-2">

                    <label class="block text-violet-300 mb-2">

                        Judul

                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title',$risk->title) }}"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">

                </div>

                <!-- Deskripsi -->

                <div class="md:col-span-2">

                    <label class="block text-violet-300 mb-2">

                        Deskripsi

                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">{{ old('description',$risk->description) }}</textarea>

                </div>

                <!-- Severity -->

                <div>

                    <label class="block text-violet-300 mb-2">

                        Severity

                    </label>

                    <select
                        name="severity"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">

                        <option value="Low"
                            {{ $risk->severity=='Low' ? 'selected' : '' }}>

                            Low

                        </option>

                        <option value="Medium"
                            {{ $risk->severity=='Medium' ? 'selected' : '' }}>

                            Medium

                        </option>

                        <option value="High"
                            {{ $risk->severity=='High' ? 'selected' : '' }}>

                            High

                        </option>

                    </select>

                </div>

                <!-- Risk Score -->

                <div>

                    <label class="block text-violet-300 mb-2">

                        Risk Score

                    </label>

                    <input
                        type="number"
                        name="risk_score"
                        value="{{ old('risk_score',$risk->risk_score) }}"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">

                </div>

                <!-- Source -->

                <div>

                    <label class="block text-violet-300 mb-2">

                        Source

                    </label>

                    <input
                        type="text"
                        name="source"
                        value="{{ old('source',$risk->source) }}"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">

                </div>

                <!-- API Source -->

                <div>

                    <label class="block text-violet-300 mb-2">

                        API Source

                    </label>

                    <input
                        type="text"
                        name="api_source"
                        value="{{ old('api_source',$risk->api_source) }}"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">

                </div>

                <!-- Event Date -->

                <div>

                    <label class="block text-violet-300 mb-2">

                        Event Date

                    </label>

                    <input
                        type="date"
                        name="event_date"
                        value="{{ old('event_date', \Carbon\Carbon::parse($risk->event_date)->format('Y-m-d')) }}"
                        class="w-full rounded-xl bg-[#1E1A46] border border-violet-600 text-white p-3">

                </div>

            </div>

            <!-- Button -->

            <div class="mt-8 flex gap-4">

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-violet-600 hover:bg-violet-500 transition text-white font-semibold">

                    💾 Update Risk Event

                </button>

                <a
                    href="{{ route('risk-analysis.index') }}"
                    class="px-6 py-3 rounded-xl bg-gray-600 hover:bg-gray-500 transition text-white">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection