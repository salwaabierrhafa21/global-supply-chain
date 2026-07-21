<nav
    class="flex justify-between items-center px-10 py-6">

    <div>

        <h2
            class="text-3xl font-bold text-white">
            Dashboard
        </h2>

        <p
            class="text-violet-300 mt-1">

            Selamat datang!

        </p>

    </div>

    <div class="px-6 py-3 rounded-full bg-white/10 text-white">

    {{ Auth::user()->name }}

    <span class="text-violet-300 text-sm">
        ({{ ucfirst(Auth::user()->role) }})
    </span>

</div>

</nav>