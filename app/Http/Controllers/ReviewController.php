<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Show all reviews
    public function index(Request $request)
    {
        $sortable = [
            'game_title',
            'rating',
            'created_at',
            'updated_at',
        ];

        $sort = $request->get('sort', 'game_title');
        if (!in_array($sort, $sortable)) {
            $sort = 'game_title';
        }

        $direction = $request->get('direction', 'asc');
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc';
        }

        $reviews = Review::with('game');

        if ($sort === 'game_title') {
            $reviews = $reviews->join('games', 'games.id', '=', 'reviews.game_id')
                ->orderBy('games.title', $direction)
                ->select('reviews.*');
        } else {
            $reviews = $reviews->orderBy("reviews.$sort", $direction);
        }

        $reviews = $reviews->get();

        return view('reviews.index', compact('reviews', 'sortable', 'sort', 'direction'));
    }



    // Show form to create a new review
    public function create()
    {
        return view('reviews.create');
    }

    // Show a specific review
    public function show($id)
    {
        $review = Review::find($id);
        return view('reviews.show', compact('review'));
    }
}
