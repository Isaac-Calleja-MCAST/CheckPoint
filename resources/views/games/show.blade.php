@extends('layouts.main')

@section('content')

    <div class="card shadow-sm p-4">

        <div class="row">
            <!-- LEFT: COVER + BASIC INFO -->
            <div class="col-md-4 d-flex flex-column align-items-center text-center">

                {{-- Cover Image --}}
                <div class="border rounded mb-3" style="width: 180px; height: 240px; overflow: hidden;">
                    @if ($game->coverimage_path)
                        <img src="{{ asset($game->coverimage_path) }}" alt="Cover Image"
                            class="img-fluid h-100 w-100 object-fit-cover">
                    @else
                        <div class="d-flex justify-content-center align-items-center h-100 text-muted">
                            No Image
                        </div>
                    @endif
                </div>

                <h3 class="fw-bold">{{ $game->title }}</h3>

                <p class="mb-1"><strong>Genre:</strong> {{ $game->genre }}</p>
                <p class="mb-1"><strong>Platform:</strong> {{ $game->platform }}</p>

                <p class="mb-1">
                    <strong>Playtime:</strong>
                    {{ number_format($game->playtime, 2) }} hours
                </p>

            </div>

            <!-- RIGHT: DETAILS -->
            <div class="col-md-8">

                <h5 class="text-secondary">Game Details</h5>
                <hr>

                <p class="fs-5"><strong>Released:</strong> {{ $game->release_year }}</p>

                <p class="fs-6 mb-2">
                    <strong>Started On:</strong>
                    {{ $game->started_on ? \Carbon\Carbon::parse($game->started_on)->format('F j, Y') : '—' }}
                </p>

                <p class="fs-6 mb-4">
                    <strong>Completed On:</strong>
                    {{ $game->completed_on ? \Carbon\Carbon::parse($game->completed_on)->format('F j, Y') : '—' }}
                </p>

                <!-- ACTION BUTTONS -->
                <div class="mt-4">

                    <h5 class="text-secondary">Actions</h5>
                    <hr>

                    <div class="d-flex flex-wrap gap-2">

                        <!-- Edit -->
                        <a href="{{ route('games.edit', ['id' => $game->id]) }}" class="btn btn-outline-primary">
                            Edit
                        </a>


                        <!-- Delete (not functional yet) -->
                        <button class="btn btn-outline-danger" disabled>
                            Delete
                        </button>

                        <!-- Add Bookmark -->
                        <a href="{{ route('bookmarks.create', ['game_id' => $game->id]) }}" class="btn btn-secondary">
                            Add Bookmark
                        </a>

                        <!-- Add Review -->
                        <a href="{{ route('reviews.create', ['game_id' => $game->id]) }}" class="btn btn-secondary">
                            Add Review
                        </a>

                        <!-- Add Guide -->
                        <a href="{{ route('guides.create', ['game_id' => $game->id]) }}" class="btn btn-secondary">
                            Add Guide
                        </a>

                        <!-- Add Goal -->
                        <a href="{{ route('goals.create', ['game_id' => $game->id]) }}" class="btn btn-secondary">
                            Add Goal
                        </a>

                    </div>

                </div>


            </div>

        </div>
    </div>
    <!-- BACK BUTTON -->
    <a href="{{ route('games.index') }}" class="btn btn-outline-secondary mt-3">← Back to Games</a>
    </div>

@endsection