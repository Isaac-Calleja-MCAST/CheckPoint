<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    // Show all games
    public function index(Request $request)
    {
        // Allowed sort columns
        $sortable = ['title', 'platform', 'playtime', 'release_year', 'genre'];

        // Selected column (default: title)
        $sortColumn = $request->get('sort_column', 'title');
        if (!in_array($sortColumn, $sortable)) {
            $sortColumn = 'title'; // safety fallback
        }

        // Direction (default: asc)
        $sortDirection = $request->get('sort_direction', 'asc');
        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc';
        }

        // Query
        $games = Game::orderBy($sortColumn, $sortDirection)->paginate(10);

        return view('games.index', compact('games', 'sortColumn', 'sortDirection', 'sortable'));
    }


    // Show form to create a new game
    public function create()
    {
        return view('games.create');
    }

    // Show details of a specific game
    public function show($id)
    {
        $game = Game::find($id);
        return view('games.show', compact('game'));
    }

    // Search for games by title
    public function search(Request $request)
    {
        $query = trim($request->input('query'));

        // If empty input, return empty results
        if ($query === '') {
            return view('games.search_results', [
                'games' => collect(),
                'query' => '',
            ]);
        }

        // Normalize for accuracy
        $normalized = strtolower($query);

        $games = Game::whereRaw('LOWER(title) LIKE ?', ["%{$normalized}%"])
            ->orderByRaw("CASE 
            WHEN LOWER(title) = ? THEN 0
            WHEN LOWER(title) LIKE ? THEN 1
            ELSE 2
        END", [$normalized, "$normalized%"])
            ->get();

        return view('games.search_results', compact('games', 'query'));
    }

}
