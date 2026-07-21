@extends('layouts.app')

@section('title', 'News')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <i class="fas fa-newspaper"></i>
            Global News
        </h2>

        <form action="{{ route('news.index') }}" method="GET" class="d-flex">

            <input
                type="text"
                name="q"
                class="form-control me-2"
                placeholder="economy, logistics, geopolitics..."
                value="{{ $query }}"
            >

            <button class="btn btn-primary">
                Search
            </button>

        </form>

    </div>

    @if($error)

        <div class="alert alert-danger">

            {{ $error }}

        </div>

    @endif

    @if(count($articles)==0)

        <div class="alert alert-warning">

            Tidak ada berita ditemukan.

        </div>

    @endif

    <div class="row">

        @foreach($articles as $article)

        <div class="col-md-6 col-lg-4 mb-4">

            <div class="card h-100 shadow-sm">

                @if(!empty($article['image']))

                    <img
                        src="{{ $article['image'] }}"
                        class="card-img-top"
                        style="height:220px;object-fit:cover;"
                    >

                @endif

                <div class="card-body d-flex flex-column">

                    <h5 class="card-title">

                        {{ $article['title'] }}

                    </h5>

                    <small class="text-muted">

                        {{ $article['source']['name'] ?? '-' }}

                        |

                        {{ \Carbon\Carbon::parse($article['publishedAt'])->format('d M Y H:i') }}

                    </small>

                    <p class="card-text mt-3">

                        {{ $article['description'] }}

                    </p>

                    <div class="mt-auto">

                        <a
                            href="{{ $article['url'] }}"
                            target="_blank"
                            class="btn btn-success w-100"
                        >

                            Read More

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection