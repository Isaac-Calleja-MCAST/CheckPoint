@extends('layouts.main')

@section('content')

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Game</h2>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm p-4">
        <form action="{{ route('games.update', $game->id) }}" method="POST">
            @method('PUT')
            @csrf
            @include('games._form')
        </form>
    </div>

@endsection