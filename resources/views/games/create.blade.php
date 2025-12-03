@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Add New Game</h5>
                </div>

                <div class="card-body">

                    <!-- Form Start -->
                    <form method="POST" action="#">
                        @csrf

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <!-- Release Year -->
                        <div class="mb-3">
                            <label for="release_year" class="form-label">Release Year</label>
                            <input type="number" class="form-control" id="release_year" name="release_year" min="1900"
                                max="2100">
                        </div>

                        <!-- Genre -->
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre">
                        </div>

                        <!-- Platform -->
                        <div class="mb-3">
                            <label for="platform" class="form-label">Platform</label>
                            <input type="text" class="form-control" id="platform" name="platform">
                        </div>

                        <!-- Playtime -->
                        <div class="mb-3">
                            <label for="playtime" class="form-label">Playtime (hours)</label>
                            <input type="number" step="0.01" class="form-control" id="playtime" name="playtime">
                        </div>

                        <!-- Started On -->
                        <div class="mb-3">
                            <label for="started_on" class="form-label">Started On</label>
                            <input type="date" class="form-control" id="started_on" name="started_on">
                        </div>

                        <!-- Completed On -->
                        <div class="mb-3">
                            <label for="completed_on" class="form-label">Completed On</label>
                            <input type="date" class="form-control" id="completed_on" name="completed_on">
                        </div>

                        <!-- Cover Image Path -->
                        <div class="mb-3">
                            <label for="coverimage_path" class="form-label">Cover Image Path</label>
                            <input type="text" class="form-control" id="coverimage_path" name="coverimage_path">
                            <div class="form-text">Example: covers/DARKSOULSREMASTERED.jpg</div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('games.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                    <!-- Form End -->

                </div>
            </div>

        </div>
    </div>
@endsection