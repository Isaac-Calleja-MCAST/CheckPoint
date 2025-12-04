@extends('layouts.main')

@section('content')

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Add Bookmark</h2>

    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm p-4">

        <!-- No action, no POST, purely UI -->
        <form>

            <!-- SELECT GAME (dropdown still needed for design consistency) -->
            <div class="mb-3">
                <label class="form-label fw-bold">Game</label>
                <select class="form-select" disabled>
                    <option>Select a Game</option>
                </select>
                <small class="text-muted">*Disabled until backend is implemented</small>
            </div>

            <!-- BOOKMARK TITLE -->
            <div class="mb-3">
                <label class="form-label fw-bold">Bookmark Title</label>
                <input type="text" class="form-control" placeholder="e.g. Final Boss Strategy" disabled>
            </div>

            <!-- BOOKMARK TEXT -->
            <div class="mb-3">
                <label class="form-label fw-bold">Notes</label>
                <textarea class="form-control" rows="5"
                          placeholder="Write your notes here..." disabled></textarea>
            </div>

            <hr>

            <!-- BUTTONS -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('bookmarks.index') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>

                <!-- Disabled Save Button -->
                <button class="btn btn-primary disabled" disabled>
                    Save Bookmark
                </button>
            </div>

        </form>

    </div>

@endsection
