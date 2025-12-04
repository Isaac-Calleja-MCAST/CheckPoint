@extends('layouts.main')

@section('content')

    <!-- MATCHED HEADER & SORTING UI -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Bookmarks</h2>

        <!-- Sorting Form -->
        <form method="GET" class="d-flex align-items-center gap-3 mb-3">

            <!-- Label -->
            <span class="fw-bold">Sort by</span>

            <!-- Arrow buttons (vertical stack) -->
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

            <!-- Column Dropdown -->
            <select name="sort" class="form-select w-auto" onchange="this.form.submit()">
                @foreach ($sortable as $column)
                    <option value="{{ $column }}" {{ $sort === $column ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $column)) }}
                    </option>
                @endforeach
            </select>

            <!-- Add Bookmark button -->
            <a href="{{ route('bookmarks.create') }}" class="btn btn-primary">
                Add Bookmark
            </a>

        </form>
    </div>

    <!-- BOOKMARK LIST -->
    @if ($bookmarks->isEmpty())
        <p class="text-muted">No bookmarks found.</p>
    @else
        @foreach ($bookmarks as $bookmark)
            <div class="card mb-3 shadow-sm">
                <div class="row g-0 align-items-center">

                    <!-- COVER IMAGE -->
                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                        <div class="border rounded" style="width: 120px; height: 160px; overflow: hidden;">
                            @if ($bookmark->game && $bookmark->game->coverimage_path)
                                <img src="{{ asset($bookmark->game->coverimage_path) }}" class="img-fluid w-100 h-100 object-fit-cover">
                            @else
                                <div class="d-flex justify-content-center align-items-center h-100 text-muted small">
                                    No Image
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- MAIN CONTENT -->
                    <div class="col-md-7 d-flex align-items-center">
                        <div class="p-3">
                            <a href="{{ route('bookmarks.show', $bookmark->id) }}" class="text-decoration-none text-dark">
                                <h5 class="mb-1 fw-bold">
                                    {{ $bookmark->game->title ?? 'Unknown Game' }}
                                    – {{ $bookmark->name ?? 'Untitled Bookmark' }}
                                </h5>
                            </a>

                            <p class="text-muted mb-1 small">
                                Platform: {{ $bookmark->game->platform ?? 'Unknown' }}
                            </p>

                            <p class="text-muted mb-0 small">
                                Created: {{ $bookmark->created_at->format('F j, Y') }} |
                                Updated: {{ $bookmark->updated_at->format('F j, Y') }}
                            </p>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS -->
                    <div class="col-md-3 d-flex flex-column align-items-end px-3">
                        <a class="btn btn-outline-primary btn-sm mb-1 disabled">Edit</a>
                        <button class="btn btn-outline-danger btn-sm disabled">Delete</button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection