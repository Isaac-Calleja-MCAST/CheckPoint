<!-- TITLE -->
<div class="mb-3">
    <label class="form-label fw-bold">Title</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
        placeholder="Game title..." value="{{ old('title', $game->title) }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- RELEASE YEAR -->
<div class="mb-3">
    <label class="form-label fw-bold">Release Year</label>
    <input type="number" name="release_year" class="form-control" placeholder="e.g. 2020"
        value="{{ old('release_year', $game->release_year) }}">
</div>

<!-- GENRE -->
<div class="mb-3">
    <label class="form-label fw-bold">Genre</label>
    <input type="text" name="genre" class="form-control" placeholder="e.g. RPG, Shooter"
        value="{{ old('genre', $game->genre) }}">
</div>

<!-- PLATFORM -->
<div class="mb-3">
    <label class="form-label fw-bold">Platform</label>
    <input type="text" name="platform" class="form-control @error('platform') is-invalid @enderror"
        placeholder="e.g. PC, PS5" value="{{ old('platform', $game->platform) }}">
    @error('platform')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- PLAYTIME -->
<div class="mb-3">
    <label class="form-label fw-bold">Playtime (hours)</label>
    <input type="number" name="playtime" class="form-control @error('playtime') is-invalid @enderror" 
    placeholder="e.g. 42" value="{{ old('playtime', $game->playtime) }}">
    @error('playtime')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- START DATE -->
<div class="mb-3">
    <label class="form-label fw-bold">Started On</label>
    <input type="date" name="started_on" class="form-control" value="{{ old('started_on', $game->started_on) }}">
</div>

<!-- COMPLETION DATE -->
<div class="mb-3">
    <label class="form-label fw-bold">Completed On</label>
    <input type="date" name="completed_on" class="form-control" value="{{ old('completed_on', $game->completed_on) }}">
</div>

<!-- COVER IMAGE PATH -->
<div class="mb-3">
    <label class="form-label fw-bold">Cover Image Path</label>
    <input type="text" name="coverimage_path" class="form-control @error('coverimage_path') is-invalid @enderror"
    placeholder="covers/DARKSOULSREMASTERED.jpg" value="{{ old('coverimage_path', $game->coverimage_path) }}">
    @error('coverimage_path')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<hr>

<!-- BUTTONS -->
<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('games.index') }}" class="btn btn-outline-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Save Game</button>
</div>