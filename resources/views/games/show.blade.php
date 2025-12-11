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


                        <!-- Delete -->
                        <a href="{{ route('games.destroy', ['id' => $game->id]) }}"
                            class="btn-delete btn btn-outline-danger" data-type="game">
                            Delete
                        </a>



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

    {{-- ▼▼ RAWG API SECTION — START ▼▼ --}}
    @if ($apiInfo)
        <div class="card shadow-sm p-4 mt-4">
            <h4 class="fw-bold mb-3">Additional Information</h4>

            {{-- Background Image --}}
            @if (!empty($apiInfo['background_image']))
                <div class="mb-3">
                    <img src="{{ $apiInfo['background_image'] }}" class="img-fluid rounded shadow">
                </div>
            @endif

            {{-- About / Description --}}
            @if (!empty($apiInfo['about']))
                <h5 class="fw-bold mt-4">About</h5>
                <p>{{ $apiInfo['about'] }}</p>
            @endif

            {{-- Screenshots --}}
            @if (!empty($apiInfo['screenshots']))
                <h5 class="fw-bold mt-4">Screenshots</h5>
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($apiInfo['screenshots'] as $shot)
                        <img src="{{ $shot['image'] }}" width="240" class="rounded shadow">
                    @endforeach
                </div>
            @endif

            {{-- Developers --}}
            @if (!empty($apiInfo['developers']))
                <h5 class="fw-bold mt-4">Developers</h5>
                <p>
                    @foreach ($apiInfo['developers'] as $dev)
                        <span class="badge bg-secondary">{{ $dev['name'] }}</span>
                    @endforeach
                </p>
            @endif

            {{-- Publishers --}}
            @if (!empty($apiInfo['publishers']))
                <h5 class="fw-bold mt-4">Publishers</h5>
                <p>
                    @foreach ($apiInfo['publishers'] as $pub)
                        <span class="badge bg-secondary">{{ $pub['name'] }}</span>
                    @endforeach
                </p>
            @endif

            {{-- Metacritic --}}
            @if (!empty($apiInfo['metacritic']))
                <p class="mt-3">
                    <strong>Metacritic Score:</strong> {{ $apiInfo['metacritic'] }}
                </p>
            @endif
        </div>
    @else
        <p class="text-muted mt-4">RAWG data not available for this game.</p>
    @endif
    {{-- ▲▲ RAWG API SECTION — END ▲▲ --}}

    <!-- BACK BUTTON -->
    <a href="{{ route('games.index') }}" class="btn btn-outline-secondary mt-3">← Back to Games</a>
    </div>

    <form id="form-delete" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

@endsection