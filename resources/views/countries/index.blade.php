@extends('layouts.app')

@section('content')

<div class="mb-8 flex items-center justify-between">

    <div>

        <h1 class="text-4xl font-bold text-white">
            Manajemen Negara
        </h1>

        <p class="text-violet-300 mt-2">
            Kelola seluruh data negara yang digunakan pada sistem.
        </p>

    </div>

    <a href="{{ route('countries.create') }}"
       class="bg-violet-600 hover:bg-violet-700 transition px-6 py-3 rounded-2xl text-white font-semibold">

        + Tambah Negara

    </a>

</div>


<div class="card-purple p-6 rounded-3xl overflow-hidden">

    <table class="w-full text-left">

        <thead>

            <tr class="border-b border-violet-700">

                <th class="py-4 text-violet-300">Nama Negara</th>

                <th class="py-4 text-violet-300">Kode</th>

                <th class="py-4 text-violet-300">Mata Uang</th>

                <th class="py-4 text-violet-300">Wilayah</th>

                <th class="py-4 text-violet-300">Status</th>

                <th class="py-4 text-center text-violet-300">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

        @forelse($countries as $country)

            <tr class="border-b border-violet-800">

                <td class="py-5 text-white">
                    {{ $country->country_name }}
                </td>

                <td class="text-violet-200">
                    {{ $country->country_code }}
                </td>

                <td class="text-violet-200">
                    {{ $country->currency_code }}
                </td>

                <td class="text-violet-200">
                    {{ $country->region }}
                </td>

                <td>

                    @if($country->is_active)

                        <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">
                            Aktif
                        </span>

                    @else

                        <span class="bg-red-500/20 text-red-300 px-3 py-1 rounded-full text-sm">
                            Nonaktif
                        </span>

                    @endif

                </td>

                <td class="text-center">

                    <a href="{{ route('countries.edit',$country) }}"
                       class="text-cyan-300 hover:text-cyan-200 mr-4">

                        Edit

                    </a>

                    <form action="{{ route('countries.destroy',$country) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Yakin ingin menghapus negara ini?')"
                            class="text-red-400 hover:text-red-300">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6"
                    class="py-12 text-center text-violet-400">

                    Belum ada data negara.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection