@extends('layouts.main')

@section('content')

    <!-- HEADER & SORTING UI -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Goals</h2>

        <form method="GET" class="d-flex align-items-center gap-3 mb-3">

            <span class="fw-bold">Sort by</span>

            <!-- Sort Direction -->
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

            <!-- Sortable Column Dropdown -->
            <select name="sort" class="form-select w-auto" onchange="this.form.submit()">
                @foreach ($sortable as $column)
                    <option value="{{ $column }}" {{ $sort === $column ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $column)) }}
                    </option>
                @endforeach
            </select>

            <!-- Add Goal button -->
            <a href="{{ route('goals.create') }}" class="btn btn-primary">
                Add Goal
            </a>
        </form>
    </div>

    <!-- GOALS LIST -->
    @if ($goals->isEmpty())
        <p class="text-muted">No goals found.</p>
    @else
        @foreach ($goals as $goal)
            <div class="card mb-3 shadow-sm position-relative">
                <a href="{{ route('goals.show', $goal->id) }}" class="stretched-link"></a>

                <div class="row g-0 align-items-center">

                    <!-- COVER IMAGE -->
                    <div class="col-md-2 d-flex align-items-center justify-content-center p-2">
                        <div class="border rounded" style="width: 120px; height: 160px; overflow: hidden;">
                            @if ($goal->game && $goal->game->coverimage_path)
                                <img src="{{ asset($goal->game->coverimage_path) }}" class="img-fluid w-100 h-100 object-fit-cover">
                            @else
                                <div class="d-flex justify-content-center align-items-center h-100 text-muted small">No Image</div>
                            @endif
                        </div>
                    </div>

                    <!-- MAIN CONTENT -->
                    <div class="col-md-7 d-flex align-items-center">
                        <div class="p-3">
                            <h5 class="mb-1 fw-bold">
                                {{ $goal->game->title ?? 'Unknown Game' }}
                            </h5>

                            <p class="text-muted mb-1 small">
                                {{ $goal->goal_text }}
                            </p>

                            <p class="text-muted mb-0 small">
                                Status:
                                <span class="{{ $goal->completed ? 'text-success' : 'text-danger' }}">
                                    {{ $goal->completed ? 'Completed' : 'Incomplete' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- ACTION BUTTONS (disabled) -->
                    <div class="col-md-3 d-flex flex-column align-items-end px-3">
                        <a class="btn btn-outline-primary btn-sm mb-1 disabled">Edit</a>
                        <button class="btn btn-outline-danger btn-sm disabled">Delete</button>
                    </div>

                </div>
            </div>
        @endforeach
    @endif

@endsection