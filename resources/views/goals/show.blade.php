@extends('layouts.main')

@section('content')

    <div class="card shadow-sm p-4">

        <div class="row g-4">

            <!-- COVER IMAGE -->
            <div class="col-md-3 d-flex justify-content-center">
                <div class="border rounded" style="width: 240px; height: 320px; overflow: hidden;">
                    @if ($goal->game && $goal->game->coverimage_path)
                        <img src="{{ asset($goal->game->coverimage_path) }}" alt="Game Cover"
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

                <h3 class="fw-bold mb-1">
                    {{ $goal->game->title ?? 'Unknown Game' }}
                </h3>

                <p class="text-muted mb-3">
                    {{ $goal->game->platform ?? 'Unknown Platform' }}
                </p>

                <hr>

                <h4 class="fw-bold mt-3 mb-2">Goal</h4>

                <p class="mb-4" style="white-space: pre-line;">
                    {{ $goal->goal_text ?? 'No goal text provided.' }}
                </p>

                <p class="mb-2">
                    Status:
                    <span class="{{ $goal->completed ? 'text-success' : 'text-danger' }}">
                        {{ $goal->completed ? 'Completed' : 'Incomplete' }}
                    </span>
                </p>

                <hr>

                <p class="text-muted small mb-1">
                    Created: {{ $goal->created_at->format('F j, Y') }}
                </p>
                <p class="text-muted small">
                    Last Updated: {{ $goal->updated_at->format('F j, Y') }}
                </p>

            </div>

            <!-- DISABLED ACTION BUTTONS -->
            <div class="col-md-3 d-flex flex-column align-items-end">
                <a class="btn btn-outline-primary btn-sm mb-2 disabled">Edit</a>
                <button class="btn btn-outline-danger btn-sm disabled">Delete</button>
            </div>

        </div>
    </div>

    <!-- BACK BUTTON -->
    <a href="{{ route('goals.index') }}" class="btn btn-outline-secondary mt-3">← Back to Goals</a>

@endsection