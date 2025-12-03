@extends('layouts.main')

@section('content')
    <h1>Game Details</h1>

    @if($game)
        <p><strong>ID:</strong> {{ $game->id }}</p>
        <p><strong>Name:</strong> {{ $game->name ?? 'No name available' }}</p>
        <p><strong>Description:</strong> {{ $game->description ?? 'No description available' }}</p>
    @else
        <p>Game not found.</p>
    @endif

    <a href="{{ route('games.index') }}">Back to Games List</a>
@endsection