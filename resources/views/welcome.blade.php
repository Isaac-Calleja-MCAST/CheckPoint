@extends('layouts.main')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    <!-- HERO SECTION -->
    <div class="hero-wrapper position-relative">

        <!-- Background dim overlay -->
        <div class="hero-overlay"></div>

        <div class="hero-content container text-center text-light d-flex flex-column justify-content-center">

            <h1 class="display-3 fw-bold mb-4 neon-title">
                Welcome to <span class="text-primary">Checkpoint</span>
            </h1>

            <p class="subtitle">
                Track your games, goals, guides, reviews, and bookmarks — all in one place.
            </p>

            <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="{{ route('games.index') }}" class="btn btn-primary btn-lg">
                    View Games
                </a>
                <a href="{{ route('bookmarks.index') }}" class="btn btn-outline-light btn-lg">
                    Bookmarks
                </a>
            </div>

        </div>

    </div>

@endsection