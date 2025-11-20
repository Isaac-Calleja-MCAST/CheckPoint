<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    // Show all bookmarks
    public function index() {
        $bookmarks = Bookmark::all();
        return view('bookmarks.index', compact('bookmarks'));
    }

    // Show form to create a new bookmark
    public function create() {
        return view('bookmarks.create');
    }

    // Show a specific bookmark
    public function show($id) {
        $bookmark = Bookmark::find($id);
        return view('bookmarks.show', compact('bookmark'));
    }
}
