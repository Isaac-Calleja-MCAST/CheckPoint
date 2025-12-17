@extends('layouts.main')

@section('content')

    <div class="card shadow-sm p-4">
        <div class="row g-4">

            <!-- COVER IMAGE -->
            <div class="col-md-3 d-flex justify-content-center">
                <div class="border rounded" style="width: 240px; height: 320px; overflow: hidden;">
                    @if ($review->game && $review->game->coverimage_path)
                        <img src="{{ asset($review->game->coverimage_path) }}" alt="Game Cover"
                            class="img-fluid w-100 h-100 object-fit-cover">
                    @else
                        <div class="d-flex justify-content-center align-items-center h-100 text-muted">
                            No Image
                        </div>
                    @endif
                </div>
            </div>

            <!-- TEXT CONTENT -->
            <div class="col-md-6">
                <h3 class="fw-bold mb-1">{{ $review->game->title ?? 'Unknown Game' }}</h3>
                <p class="text-muted mb-3">{{ $review->game->platform ?? 'Unknown Platform' }}</p>

                <hr>

                <h4 class="fw-bold mt-3 mb-2">{{ $review->review_text ?? 'Untitled Review' }}</h4>
                <p class="mb-4" style="white-space: pre-line;">
                    {{ $review->review_text ?? 'No notes for this review.' }}
                </p>

                <hr>
                <p class="text-muted small mb-1">Created: {{ $review->created_at->format('F j, Y') }}</p>
                <p class="text-muted small">Last Updated: {{ $review->updated_at->format('F j, Y') }}</p>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="col-md-3 d-flex flex-column align-items-end px-3">
                <a href="{{ route('reviews.edit', ['id' => $review->id]) }}"
                    class="btn btn-outline-primary btn-sm mb-1">Edit</a>
                <a href="{{ route('reviews.destroy', ['id' => $review->id]) }}"
                    class="btn-delete btn btn-outline-danger btn-sm" data-type="review">Delete</a>
            </div>

        </div>
    </div>

    <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary mt-3">← Back to Reviews</a>

    <!-- Hidden form for Delete -->
    <form id="form-delete" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

@endsection