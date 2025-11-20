<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    // Show all reviews
    public function index() {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    // Show form to create a new review
    public function create() {
        return view('reviews.create');
    }

    // Show a specific review
    public function show($id) {
        $review = Review::find($id);
        return view('reviews.show', compact('review'));
    }
}
