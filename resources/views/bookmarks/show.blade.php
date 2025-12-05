@extends('layouts.main')

@section('content')

<div class="card shadow-sm p-4">
    <div class="row g-4">

        <!-- COVER IMAGE -->
        <div class="col-md-3 d-flex justify-content-center">
            <div class="border rounded" style="width: 240px; height: 320px; overflow: hidden;">
                @if ($bookmark->game && $bookmark->game->coverimage_path)
                    <img src="{{ asset($bookmark->game->coverimage_path) }}" alt="Game Cover" class="img-fluid w-100 h-100 object-fit-cover">
                @else
                    <div class="d-flex justify-content-center align-items-center h-100 text-muted">
                        No Image
                    </div>
                @endif
            </div>
        </div>

        <!-- TEXT CONTENT -->
        <div class="col-md-6">
            <h3 class="fw-bold mb-1">{{ $bookmark->game->title ?? 'Unknown Game' }}</h3>
            <p class="text-muted mb-3">{{ $bookmark->game->platform ?? 'Unknown Platform' }}</p>

            <hr>

            <h4 class="fw-bold mt-3 mb-2">{{ $bookmark->name ?? 'Untitled Bookmark' }}</h4>
            <p class="mb-4" style="white-space: pre-line;">
                {{ $bookmark->bookmark_text ?? 'No notes for this bookmark.' }}
            </p>

            <hr>
            <p class="text-muted small mb-1">Created: {{ $bookmark->created_at->format('F j, Y') }}</p>
            <p class="text-muted small">Last Updated: {{ $bookmark->updated_at->format('F j, Y') }}</p>
        </div>

        <!-- ACTION BUTTONS -->
        <div class="col-md-3 d-flex flex-column align-items-end px-3">
            <a href="{{ route('bookmarks.edit', ['id' => $bookmark->id]) }}" class="btn btn-outline-primary btn-sm mb-1">Edit</a>
            <a href="{{ route('bookmarks.destroy', ['id' => $bookmark->id]) }}" class="btn-delete btn btn-outline-danger btn-sm" data-type="bookmark">Delete</a>
        </div>

    </div>
</div>

<a href="{{ route('bookmarks.index') }}" class="btn btn-outline-secondary mt-3">← Back to Bookmarks</a>

<!-- Hidden form for Delete -->
<form id="form-delete" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

@endsection
