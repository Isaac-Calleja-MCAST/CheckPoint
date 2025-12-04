@extends('layouts.main')

@section('content')

    <div class="card shadow-sm p-4">

        <div class="row g-4">

            <!-- COVER IMAGE -->
            <div class="col-md-3 d-flex justify-content-center">
                <div class="border rounded" style="width: 200px; height: 260px; overflow: hidden;">
                    @if ($bookmark->game && $bookmark->game->coverimage_path)
                        <img src="{{ asset($bookmark->game->coverimage_path) }}" alt="Game Cover"
                            class="img-fluid w-100 h-100 object-fit-cover">
                    @else
                        <div class="d-flex justify-content-center align-items-center h-100 text-muted">
                            No Image
                        </div>
                    @endif
                </div>
            </div>

            <!-- TEXT CONTENT -->
            <div class="col-md-9">

                <h3 class="fw-bold mb-1">
                    {{ $bookmark->game->title ?? 'Unknown Game' }}
                </h3>

                <p class="text-muted mb-3">
                    {{ $bookmark->game->platform ?? 'Unknown Platform' }}
                </p>

                <hr>

                <h4 class="fw-bold mt-3 mb-2">
                    {{ $bookmark->name ?? 'Untitled Bookmark' }}
                </h4>

                <p class="mb-4" style="white-space: pre-line;">
                    {{ $bookmark->bookmark_text ?? 'No notes for this bookmark.' }}
                </p>

                <hr>

                <p class="text-muted small mb-1">
                    Created: {{ $bookmark->created_at->format('F j, Y') }}
                </p>
                <p class="text-muted small">
                    Last Updated: {{ $bookmark->updated_at->format('F j, Y') }}
                </p>

            </div>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <a href="{{ route('bookmarks.index') }}" class="btn btn-outline-secondary mt-3">← Back to Bookmarks</a>

@endsection