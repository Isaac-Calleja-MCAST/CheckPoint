@extends('layouts.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Add Guide</h2>
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

            <!-- GUIDE TITLE -->
            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" class="form-control" placeholder="Guide Title" disabled>
            </div>

            <!-- GUIDE TEXT -->
            <div class="mb-3">
                <label class="form-label fw-bold">Guide</label>
                <textarea class="form-control" rows="5" placeholder="Write your guide here..." disabled></textarea>
            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('guides.index') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
                <button class="btn btn-primary disabled" disabled>
                    Save Guide
                </button>
            </div>

        </form>
    </div>

@endsection