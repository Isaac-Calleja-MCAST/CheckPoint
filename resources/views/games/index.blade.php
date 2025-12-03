@extends('layouts.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Games List</h2>

        <!-- Sorting Form -->
        <form method="GET" class="d-flex align-items-center gap-3 mb-3">

            <!-- Label -->
            <span class="fw-bold">Sort by</span>

            <!-- Arrow buttons (vertical stack) -->
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

            <!-- Column Dropdown -->
            <select name="sort_column" class="form-select w-auto" onchange="this.form.submit()">

                @foreach ($sortable as $column)
                    <option value="{{ $column }}" {{ $sortColumn === $column ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $column)) }}
                    </option>
                @endforeach

            </select>

        </form>
    </div>

    <!-- GAME GRID -->
    <div class="row g-4">
        @foreach ($games as $game)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">

                <a href="{{ route('games.show', $game->id) }}" class="text-decoration-none">

                    <div class="border rounded shadow-sm" style="width: 210px; height: 280px; overflow: hidden;">

                        @if ($game->coverimage_path)
                            <img src="{{ asset($game->coverimage_path) }}" alt="{{ $game->title }}"
                                class="img-fluid w-100 h-100 object-fit-cover">
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