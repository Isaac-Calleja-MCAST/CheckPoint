@extends('layouts.main')

@section('content')

    <h2 class="fw-bold mb-2">Search Results</h2>

    @if ($query)
        <p class="text-muted">
            Showing <strong>{{ $games->count() }}</strong> result(s) for:
            <strong>"{{ $query }}"</strong>
        </p>
    @else
        <p class="text-muted">Enter a game title in the search bar above.</p>
    @endif

    <hr>

    @if ($games->count() > 0)

        @foreach ($games as $game)
            <div class="card mb-3 shadow-sm">
                <div class="row g-0 align-items-center">

                    <!-- COVER IMAGE -->
                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                        <div class="border rounded" style="width: 120px; height: 160px; overflow: hidden;">
                            @if ($game->coverimage_path)
                                <img src="{{ asset($game->coverimage_path) }}" class="img-fluid w-100 h-100 object-fit-cover">
                            @else
                                <div class="d-flex justify-content-center align-items-center h-100 text-muted small">
                                    No Image
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- MAIN INFO -->
                    <div class="col-md-7 d-flex align-items-center">
                        <div class="p-3">
                            <a href="{{ route('games.show', $game->id) }}" class="text-decoration-none text-dark">
                                <h5 class="fw-bold mb-1">{{ $game->title }}</h5>
                            </a>

                            @if ($game->platform)
                                <p class="text-muted small mb-1">Platform: {{ $game->platform }}</p>
                            @endif

                            @if ($game->genre)
                                <p class="text-muted small mb-1">Genre: {{ $game->genre }}</p>
                            @endif

                            <p class="text-muted small mb-0">
                                @if ($game->release_year)
                                    Release Year: {{ $game->release_year }}
                                @endif

                                @if ($game->playtime)
                                    | Playtime: {{ $game->playtime }} hrs
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="col-md-3 d-flex flex-column align-items-end px-3">
                        <a class="btn btn-outline-primary btn-sm mb-1 disabled">Edit</a>
                        <button class="btn btn-outline-danger btn-sm disabled">Delete</button>
                    </div>

                </div>
            </div>
        @endforeach

    @else
        @if ($query)
            <div class="alert alert-warning mt-4">
                No games found matching "<strong>{{ $query }}</strong>".
            </div>
        @endif
    @endif

@endsection