<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Game;

class ReviewController extends Controller
{
    // Show all reviews
    public function index(Request $request)
    {   
        // Allowed sort columns
        $sortable = ['game_title','rating','created_at','updated_at'];
        // Get sort parameters from request
        $sort = $request->get('sort', 'game_title');
        if (!in_array($sort, $sortable)) {
            $sort = 'game_title';
        }
        // Get sort direction from request
        $direction = $request->get('direction', 'asc');
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc';
        }
        // Build base query
        $reviews = Review::with('game');

        /* ---------- FILTERING ---------- */

        if ($request->filled('game_id')) {
            $reviews->where('game_id', $request->game_id);
        }

        if ($request->filled('platform')) {
            $reviews->whereHas('game', function ($q) use ($request) {
                $q->where('platform', $request->platform);
            });
        }

        if ($request->filled('rating')) {
            $reviews->where('rating', $request->rating);
        }

        /* ---------- SORTING ---------- */

        if ($sort === 'game_title') {
            $reviews = $reviews->join('games', 'games.id', '=', 'reviews.game_id')
                ->orderBy('games.title', $direction)
                ->select('reviews.*');
        } else {
            $reviews = $reviews->orderBy("reviews.$sort", $direction);
        }
        // Fetch results
        $reviews = $reviews->get();

        /* ---------- DROPDOWNS ---------- */

        $games = Game::orderBy('title')->get();
        $platforms = Game::select('platform')->distinct()->orderBy('platform')->pluck('platform');
        $ratings = range(1, 10);

        return view('reviews.index', compact('reviews','sortable','sort','direction','games','platforms','ratings'));
    }


    // Show form to create a new review
    public function create()
    {
        $games = Game::orderBy('title')->get();
        return view('reviews.create', compact('games'));
    }

    // Show a specific review
    public function show($id)
    {
        $review = Review::with('game')->findOrFail($id);
        return view('reviews.show', compact('review'));
    }

    // Store a new review
    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'rating' => 'required|integer|min:1|max:10',
            'review_text' => 'required|string',
        ]);

        $validated['user_id'] = 1;

        Review::create($validated);

        return redirect()->route('reviews.index')
            ->with('message', 'Review created successfully.');
    }
    // Show form to edit an existing review
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $games = Game::orderBy('title')->get();

        return view('reviews.edit', compact('review', 'games'));
    }
    // Update an existing review
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'rating' => 'required|integer|min:1|max:10',
            'review_text' => 'required|string',
        ]);

        $validated['user_id'] = 1;

        $review = Review::findOrFail($id);
        $review->update($validated);

        return redirect()->route('reviews.index')
            ->with('message', 'Review updated successfully.');
    }
    // Delete a review
    public function destroy($id)
    {
        Review::findOrFail($id)->delete();

        return redirect()->route('reviews.index')
            ->with('message', 'Review deleted successfully.');
    }
}
