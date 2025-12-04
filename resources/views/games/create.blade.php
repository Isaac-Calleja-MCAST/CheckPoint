@extends('layouts.main')

@section('content')

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Add New Game</h2>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm p-4">
        <form>

            <!-- TITLE -->
            <div class="mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" class="form-control" placeholder="Game title..." disabled>
            </div>

            <!-- RELEASE YEAR -->
            <div class="mb-3">
                <label class="form-label fw-bold">Release Year</label>
                <input type="number" class="form-control" placeholder="e.g. 2020" disabled>
            </div>

            <!-- GENRE -->
            <div class="mb-3">
                <label class="form-label fw-bold">Genre</label>
                <input type="text" class="form-control" placeholder="e.g. RPG, Shooter" disabled>
            </div>

            <!-- PLATFORM -->
            <div class="mb-3">
                <label class="form-label fw-bold">Platform</label>
                <input type="text" class="form-control" placeholder="e.g. PC, PS5" disabled>
            </div>

            <!-- PLAYTIME -->
            <div class="mb-3">
                <label class="form-label fw-bold">Playtime (hours)</label>
                <input type="number" class="form-control" placeholder="e.g. 42" disabled>
            </div>

            <!-- START DATE -->
            <div class="mb-3">
                <label class="form-label fw-bold">Started On</label>
                <input type="date" class="form-control" disabled>
            </div>

            <!-- COMPLETION DATE -->
            <div class="mb-3">
                <label class="form-label fw-bold">Completed On</label>
                <input type="date" class="form-control" disabled>
            </div>

            <!-- COVER IMAGE PATH -->
            <div class="mb-3">
                <label class="form-label fw-bold">Cover Image Path</label>
                <input type="text" class="form-control" placeholder="covers/DARKSOULSREMASTERED.jpg" disabled>
                <small class="text-muted">*Disabled until backend is implemented</small>
            </div>

            <hr>

            <!-- BUTTONS -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('games.index') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>

                <button class="btn btn-primary disabled" disabled>
                    Save Game
                </button>
            </div>

        </form>
    </div>

@endsection