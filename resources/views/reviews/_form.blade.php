<!-- SELECT GAME -->
<div class="mb-3">
    <label class="form-label fw-bold">Game</label>
    <select name="game_id" class="form-select" required>
        <option value="">Select a Game</option>
        @foreach($games as $game)
            <option value="{{ $game->id }}" {{ old('game_id', $review->game_id ?? '') == $game->id ? 'selected' : '' }}>
                {{ $game->title }} ({{ $game->platform }})
            </option>
        @endforeach
    </select>
</div>

<!-- RATING -->
<div class="mb-3">
    <label class="form-label fw-bold">Rating (1–10)</label>
    <select name="rating" class="form-select" required>
        @for($i = 1; $i <= 10; $i++)
            <option value="{{ $i }}" {{ old('rating', $review->rating ?? '') == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
    </select>
</div>

<!-- REVIEW TEXT -->
<div class="mb-3">
    <label class="form-label fw-bold">Review</label>
    <textarea name="review_text" class="form-control" rows="5"
        required>{{ old('review_text', $review->review_text ?? '') }}</textarea>
</div>

<hr>

<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary">Cancel</a>
    <button type="submit" class="btn btn-primary">Save Review</button>
</div>