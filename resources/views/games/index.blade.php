@extends('layouts.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Games List</h2>

        <!-- ▼ FILTER SECTION (LEFT) ▼ -->
        <form method="GET" class="d-flex align-items-center gap-3">

            <!-- Label -->
            <span class="fw-bold">Filter by</span>

            <!-- Preserve sorting -->
            <input type="hidden" name="sort_column" value="{{ request('sort_column') }}">
            <input type="hidden" name="sort_direction" value="{{ request('sort_direction') }}">

            <!-- Platform Filter -->
            <select name="platform" class="form-select w-auto" onchange="this.form.submit()">
                <option value="">All Platforms</option>
                @foreach ($platforms as $platform)
                    <option value="{{ $platform }}" {{ request('platform') == $platform ? 'selected' : '' }}>
                        {{ $platform }}
                    </option>
                @endforeach
            </select>

            <!-- Genre Filter -->
            <select name="genre" class="form-select w-auto" onchange="this.form.submit()">
                <option value="">All Genres</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                        {{ $genre }}
                    </option>
                @endforeach
            </select>

            <!-- Release Year Filter -->
            <select name="release_year" class="form-select w-auto" onchange="this.form.submit()">
                <option value="">All Years</option>
                @foreach ($years as $year)
                    <option value="{{ $year }}" {{ request('release_year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>

        </form>

        <!-- ▼ SORTING SECTION (RIGHT) ▼ -->
        <div class="d-flex align-items-center gap-3">

            <form method="GET" class="d-flex align-items-center gap-3">

                <!-- Label -->
                <span class="fw-bold">Sort by</span>

                <!-- Preserve filters -->
                <input type="hidden" name="platform" value="{{ request('platform') }}">
                <input type="hidden" name="genre" value="{{ request('genre') }}">
                <input type="hidden" name="release_year" value="{{ request('release_year') }}">

                <!-- Arrow buttons -->
                <div class="d-flex flex-column">
                    <button type="submit" name="sort_direction" value="asc"
                        class="btn btn-outline-primary py-0 {{ $sortDirection === 'asc' ? 'active' : '' }}">
                        ▲
                    </button>

                    <button type="submit" name="sort_direction" value="desc"
                        class="btn btn-outline-primary py-0 {{ $sortDirection === 'desc' ? 'active' : '' }}">
                        ▼
                    </button>
                </div>

                <!-- Sort column -->
                <select name="sort_column" class="form-select w-auto" onchange="this.form.submit()">
                    @foreach ($sortable as $column)
                        <option value="{{ $column }}" {{ $sortColumn === $column ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $column)) }}
                        </option>
                    @endforeach
                </select>

            </form>

            <!-- RESET BUTTON -->
            <a href="{{ route('games.index') }}" class="btn btn-primary">
                Reset
            </a>

        </div>

    </div>


    <!-- GAME GRID -->
    <div class="row g-4">
        @foreach ($games as $game)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ route('games.show', $game->id) }}" class="text-decoration-none">
                    <div class="border rounded shadow-sm" style="width: 210px; height: 280px; overflow: hidden;">
                        @if ($game->coverimage_path)
                            <img src="{{ asset($game->coverimage_path) }}" class="img-fluid w-100 h-100 object-fit-cover">
                        @else
                            <div class="d-flex justify-content-center align-items-center h-100 text-muted">
                                No Image
                            </div>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>

@endsection