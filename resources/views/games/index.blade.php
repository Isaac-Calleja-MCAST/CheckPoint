@extends('layouts.main')

@section('content')
    <h1>Games List</h1>

    <p>This page will display all games.</p>

    <a href="{{ route('games.create') }}">Create New Game</a>
@endsection