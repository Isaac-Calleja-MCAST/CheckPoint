@extends('layouts.main')

@section('content')
    <h1>Create a New Game</h1>

    <p>This page will be to create a new game.</p>

    <a href="{{ route('games.index') }}">Back to Games List</a>
@endsection