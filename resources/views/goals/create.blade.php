@extends('layouts.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Add Goal</h2>
    </div>

    <div class="card shadow-sm p-4">
        <form>

            <!-- SELECT GAME -->
            <div class="mb-3">
                <label class="form-label fw-bold">Game</label>
                <select class="form-select" disabled>
                    <option>Select a Game</option>
                </select>
                <small class="text-muted">*Disabled until backend is implemented</small>
            </div>

            <!-- GOAL TEXT -->
            <div class="mb-3">
                <label class="form-label fw-bold">Goal</label>
                <textarea class="form-control" rows="3" placeholder="Write your goal here..." disabled></textarea>
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('goals.index') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
                <button class="btn btn-primary disabled" disabled>
                    Save Goal
                </button>
            </div>

        </form>
    </div>

@endsection