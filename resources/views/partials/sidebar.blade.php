<aside
    class="w-72 min-h-screen bg-[#1B1740]/90 backdrop-blur-xl border-r border-white/10 shadow-2xl">

    <div class="p-8">

        <h1 class="text-2xl font-bold text-white tracking-wide">
            Global Supply
        </h1>

        <p class="text-sm text-violet-300 mt-1">
            Chain Monitoring
        </p>

    </div>

    <nav class="mt-8">

        {{-- ========================= --}}
        {{-- DASHBOARD --}}
        {{-- ========================= --}}

        @if(Auth::user()->role == 'admin')

            <a href="/"
                class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

                Dashboard Admin

            </a>

        @else

            <a href="/user/dashboard"
                class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

                Dashboard User

            </a>

        @endif


        {{-- ========================= --}}
        {{-- MENU KHUSUS ADMIN --}}
        {{-- ========================= --}}

        @if(Auth::user()->role == 'admin')

            <a href="/countries"
                class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

                Negara

            </a>

            <a href="/economic-data"
                class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

                Data Ekonomi

            </a>

            <a href="/ports"
                class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

                Pelabuhan

            </a>

            <a href="/shipping-routes"
                class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

                Jalur Pelayaran

            </a>

        @endif


        {{-- ========================= --}}
        {{-- MENU YANG BOLEH DIAKSES SEMUA --}}
        {{-- ========================= --}}

        <a href="/weather"
            class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

            Cuaca

        </a>

        <a href="/news"
            class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

            Berita

        </a>

        <a href="/currency"
            class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

            Nilai Tukar

        </a>

        <a href="/risk-analysis"
            class="flex items-center px-8 py-4 text-violet-100 hover:bg-violet-700/30 transition rounded-l-full">

            Analisis Risiko

        </a>

        {{-- ========================= --}}
        {{-- LOGOUT --}}
        {{-- ========================= --}}

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button
                type="submit"
                class="w-full text-left flex items-center px-8 py-4 text-red-300 hover:bg-red-600/20 transition rounded-l-full">

                Logout

            </button>

        </form>

    </nav>

</aside>