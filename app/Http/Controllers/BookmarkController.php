<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Game;

class BookmarkController extends Controller
{
    // Display a listing of bookmarks
    public function index(Request $request)
    {
        // Allowed sort columns
        $sortable = ['game_title', 'game_platform', 'created_at', 'updated_at'];

        // Get sort parameters from request
        $sort = $request->get('sort', 'updated_at');
        $direction = $request->get('direction', 'desc');

        // Validate input
        if (!in_array($sort, $sortable)) {
            $sort = 'updated_at';
        }

        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        // Build query
        $bookmarks = Bookmark::with('game');

        if ($sort === 'game_title') {
            $bookmarks = $bookmarks->join('games', 'games.id', '=', 'bookmarks.game_id')
                ->orderBy('games.title', $direction)
                ->select('bookmarks.*');
        } elseif ($sort === 'game_platform') {
            $bookmarks = $bookmarks->join('games', 'games.id', '=', 'bookmarks.game_id')
                ->orderBy('games.platform', $direction)
                ->select('bookmarks.*');
        } else {
            $bookmarks = $bookmarks->orderBy("bookmarks.$sort", $direction);
        }

        $bookmarks = $bookmarks->get();

        return view('bookmarks.index', compact('bookmarks', 'sort', 'direction', 'sortable'));
    }


    // Show form to create a new bookmark
    public function create()
    {
        $games = Game::orderBy('title')->get();

        return view('bookmarks.create', compact('games'));
    }


    // Show a specific bookmark
    public function show($id)
    {
        $bookmark = Bookmark::with('game')->findOrFail($id);
        return view('bookmarks.show', compact('bookmark'));
    }

    // Store a new bookmark
    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'nullable|string|max:255',
            'bookmark_text' => 'nullable|string',
        ]);

        $validated['user_id'] = 1; // For simplicity, assign to user ID 1

        Bookmark::create($validated);

        return redirect()->route('bookmarks.index')
            ->with('message', 'Bookmark created successfully.');
    }
    public function edit($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $games = Game::orderBy('title')->get();

        return view('bookmarks.edit', compact('bookmark', 'games'));
    }

    // Update an existing bookmark
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'game_id' => 'required|exists:games,id',
            'name' => 'nullable|string|max:255',
            'bookmark_text' => 'nullable|string',
        ]);

        $validated['user_id'] = 1; // keep consistent with create

        $bookmark = Bookmark::findOrFail($id);
        $bookmark->update($validated);

        return redirect()->route('bookmarks.index')
            ->with('message', 'Bookmark updated successfully.');
    }

    // Delete a bookmark
    public function destroy($id)
    {
        $bookmark = Bookmark::findOrFail($id);
        $bookmark->delete();

        return redirect()->route('bookmarks.index')
            ->with('message', 'Bookmark deleted successfully.');
    }
}
