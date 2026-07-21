<aside class="w-72 min-h-screen bg-[#1B1740]/90 backdrop-blur-xl border-r border-white/10 shadow-2xl">

    <div class="p-8">

        <h1 class="text-2xl font-bold text-white">
            Global Supply
        </h1>

        <p class="text-violet-300 mt-1">
            User Panel
        </p>

    </div>

    <nav class="mt-8">

        <a href="{{ route('user.dashboard') }}"
           class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30">

            Dashboard

        </a>

        <a href="{{ route('weather.index') }}"
           class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30">

            Cuaca

        </a>

        <a href="{{ route('news.index') }}"
           class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30">

            Berita

        </a>

        <a href="{{ route('currency.index') }}"
           class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30">

            Nilai Tukar

        </a>

        <a href="{{ route('risk-analysis.index') }}"
           class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30">

            Analisis Risiko

        </a>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button
                class="w-full text-left px-8 py-4 text-red-300 hover:bg-red-500/20">

                Logout

            </button>

        </form>

    </nav>

</aside>