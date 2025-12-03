@extends('layouts.main')

@section('content')

<h1 class="mb-4">Search Results</h1>

@if ($query)
    <p class="text-muted">Showing results for: <strong>{{ $query }}</strong></p>
@else
    <p class="text-muted">Enter a game title in the search bar above.</p>
@endif

<hr>

@if ($games->count() > 0)
    
    <div class="list-group">

        @foreach ($games as $game)
            <a href="{{ route('games.show', $game->id) }}" class="list-group-item list-group-item-action">
                <h5 class="fw-bold mb-1">{{ $game->title }}</h5>

                @if ($game->genre)
                    <p class="mb-1 text-secondary">Genre: {{ $game->genre }}</p>
                @endif

                @if ($game->platform)
                    <p class="mb-1 text-secondary">Platform: {{ $game->platform }}</p>
                @endif
            </a>
        @endforeach

    </div>

@else

    @if ($query)
        <div class="alert alert-warning mt-4">
            No games found matching "<strong>{{ $query }}</strong>".
        </div>
    @endif

@endif

@endsection
