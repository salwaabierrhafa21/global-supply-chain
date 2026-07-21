<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Global Supply Chain</title>

    {{-- Vite --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    {{-- Leaflet CSS --}}
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""
    />

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="bg-[#0f0c29]">

<div class="flex min-h-screen">

    {{-- Sidebar User --}}
@include('partials.user-sidebar')

<div class="flex-1">

    {{-- Navbar User --}}
    @include('partials.user-navbar')

        {{-- Content --}}
        <main class="px-10 py-8">

            @yield('content')

        </main>

    </div>

</div>

{{-- Leaflet JS --}}
<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin="">
</script>

{{-- Script dari setiap halaman --}}
@stack('scripts')

{{-- Lucide Icons --}}
<script type="module">

    import { createIcons } from 'lucide';
    import * as icons from 'lucide';

    createIcons({
        icons
    });

</script>

</body>
</html>