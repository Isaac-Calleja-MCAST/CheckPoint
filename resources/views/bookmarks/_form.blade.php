<!-- SELECT GAME -->
<div class="mb-3">
    <label class="form-label fw-bold">Game</label>
    <select name="game_id" class="form-select @error('game_id') is-invalid @enderror">
        <option value="">Select a Game</option>
        @foreach($games as $game)
            <option value="{{ $game->id }}" {{ old('game_id', $bookmark->game_id ?? '') == $game->id ? 'selected' : '' }}>
                {{ $game->title }} ({{ $game->platform }})
            </option>
        @endforeach
    </select>
    @error('game_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- BOOKMARK NAME -->
<div class="mb-3">
    <label class="form-label fw-bold">Bookmark Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        placeholder="e.g. Final Boss Strategy" value="{{ old('name', $bookmark->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- BOOKMARK TEXT -->
<div class="mb-3">
    <label class="form-label fw-bold">Notes</label>
    <textarea name="bookmark_text" class="form-control @error('bookmark_text') is-invalid @enderror" rows="5"
        placeholder="Write your notes here...">{{ old('bookmark_text', $bookmark->bookmark_text ?? '') }}</textarea>
    @error('bookmark_text')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<hr>

<!-- BUTTONS -->
<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('bookmarks.index') }}" class="btn btn-outline-secondary">
        Cancel
    </a>
    <button type="submit" class="btn btn-primary">
        Save Bookmark
    </button>
</div>