<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Global Supply Chain</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

<div class="flex">

    @include('partials.sidebar')

    <div class="flex-1">

        @include('partials.navbar')

        <main class="px-10 pb-10">

            @yield('content')

        </main>

    </div>

</div>


<script type="module">
    import { createIcons } from 'lucide';
    import * as icons from 'lucide';

    createIcons({
        icons
    });
</script>


</body>

</html>