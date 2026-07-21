<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-[#0f0c29] min-h-screen flex items-center justify-center">

<div class="w-full max-w-md bg-[#1E184A] rounded-3xl p-10 shadow-2xl">

    <h1 class="text-4xl text-white font-bold text-center">

        Global Supply Chain

    </h1>

    <p class="text-violet-300 text-center mt-3">

        Login ke Sistem Monitoring

    </p>

    @if ($errors->any())

        <div class="mt-6 bg-red-500/20 border border-red-500 rounded-xl p-4 text-red-300">

            {{ $errors->first() }}

        </div>

    @endif

    <form action="{{ route('login.process') }}"
          method="POST"
          class="mt-8 space-y-6">

        @csrf

        <div>

            <label class="text-violet-200">

                Email

            </label>

            <input
                type="email"
                name="email"
                required
                class="w-full mt-2 rounded-xl bg-[#0f0c29] border border-violet-600 px-4 py-3 text-white">

        </div>

        <div>

            <label class="text-violet-200">

                Password

            </label>

            <input
                type="password"
                name="password"
                required
                class="w-full mt-2 rounded-xl bg-[#0f0c29] border border-violet-600 px-4 py-3 text-white">

        </div>

        <button
            type="submit"
            class="w-full bg-violet-600 hover:bg-violet-500 py-3 rounded-xl text-white font-semibold">

            Login

        </button>

    </form>

</div>

</body>
</html>