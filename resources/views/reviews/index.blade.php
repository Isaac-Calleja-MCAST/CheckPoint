@extends('layouts.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Reviews</h2>

        <!-- ▼ FILTER SECTION (LEFT) ▼ -->
        <form method="GET" class="d-flex align-items-center gap-3">

            <span class="fw-bold">Filter by</span>

            <!-- Preserve sorting -->
            <input type="hidden" name="sort" value="{{ $sort }}">
            <input type="hidden" name="direction" value="{{ $direction }}">

            <!-- Game Filter -->
            <select name="game_id" class="form-select w-auto" onchange="this.form.submit()">
                <option value="">All Games</option>
                @foreach ($games as $game)
                    <option value="{{ $game->id }}" {{ request('game_id') == $game->id ? 'selected' : '' }}>
                        {{ $game->title }}
                    </option>
                @endforeach
            </select>

            <!-- Platform Filter -->
            <select name="platform" class="form-select w-auto" onchange="this.form.submit()">
                <option value="">All Platforms</option>
                @foreach ($platforms as $platform)
                    <option value="{{ $platform }}" {{ request('platform') == $platform ? 'selected' : '' }}>
                        {{ $platform }}
                    </option>
                @endforeach
            </select>

        </form>

        <!-- ▼ SORTING + ADD BUTTON (RIGHT) ▼ -->
        <div class="d-flex align-items-center gap-3">

            <form method="GET" class="d-flex align-items-center gap-3">

                <span class="fw-bold">Sort by</span>

                <!-- Preserve filters -->
                <input type="hidden" name="game_id" value="{{ request('game_id') }}">
                <input type="hidden" name="platform" value="{{ request('platform') }}">

                <div class="d-flex flex-column">
                    <button type="submit" name="direction" value="asc"
                        class="btn btn-outline-primary py-0 {{ $direction === 'asc' ? 'active' : '' }}">
                        ▲
                    </button>
                    <button type="submit" name="direction" value="desc"
                        class="btn btn-outline-primary py-0 {{ $direction === 'desc' ? 'active' : '' }}">
                        ▼
                    </button>
                </div>

                <select name="sort" class="form-select w-auto" onchange="this.form.submit()">
                    @foreach ($sortable as $column)
                        <option value="{{ $column }}" {{ $sort === $column ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $column)) }}
                        </option>
                    @endforeach
                </select>

            </form>

            <a href="{{ route('reviews.index') }}" class="btn btn-primary">Reset</a>
            <a href="{{ route('reviews.create') }}" class="btn btn-primary">Add Review</a>

        </div>
    </div>


    @if ($reviews->isEmpty())
        <p class="text-muted">No reviews found.</p>
    @else
        @foreach ($reviews as $review)
            <div class="card mb-3 shadow-sm position-relative">
                <div class="row g-0 align-items-center">

                    <!-- COVER IMAGE -->
                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                        <div class="border rounded" style="width: 120px; height: 160px; overflow: hidden;">
                            @if ($review->game && $review->game->coverimage_path)
                                <img src="{{ asset($review->game->coverimage_path) }}" class="img-fluid w-100 h-100 object-fit-cover">
                            @else
                                <div class="d-flex justify-content-center align-items-center h-100 text-muted small">No Image</div>
                            @endif
                        </div>
                    </div>

                    <!-- MAIN CONTENT -->
                    <div class="col-md-7 d-flex align-items-center">
                        <div class="p-3">
                            <h5 class="mb-1 fw-bold">
                                <a href="{{ route('reviews.show', $review->id) }}" class="text-decoration-none text-dark">
                                    {{ $review->game->title ?? 'Unknown Game' }}
                                </a>
                            </h5>

                            <p class="text-muted mb-1 small">
                                Rating: ⭐ {{ $review->rating }}/10
                            </p>

                            <p class="text-muted mb-0 small">
                                {{ Str::limit($review->review_text, 120) }}
                            </p>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="col-md-3 d-flex flex-column align-items-end px-3">
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-outline-primary btn-sm mb-1">
                            Edit
                        </a>
                        <a href="{{ route('reviews.destroy', $review->id) }}" class="btn-delete btn btn-outline-danger btn-sm"
                            data-type="review">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    <!-- Hidden delete form -->
    <form id="form-delete" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

@endsection