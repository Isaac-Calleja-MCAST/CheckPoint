<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    // Show all games
    public function index(Request $request)
    {
        // Allowed sort columns
        $sortable = ['title', 'platform', 'playtime', 'release_year', 'genre'];

        // Selected sort column
        $sortColumn = $request->get('sort_column', 'title');
        if (!in_array($sortColumn, $sortable)) {
            $sortColumn = 'title';
        }

        // Sort direction
        $sortDirection = $request->get('sort_direction', 'asc');
        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'asc';
        }

        // Start query
        $query = Game::query();

        // FILTER: Platform
        if ($request->filled('platform')) {
            $query->where('platform', $request->platform);
        }

        // FILTER: Genre
        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        // FILTER: Release Year
        if ($request->filled('release_year')) {
            $query->where('release_year', $request->release_year);
        }

        // Apply sorting to the filtered query
        $games = $query->orderBy($sortColumn, $sortDirection)->get();

        // For dropdowns
        $platforms = Game::select('platform')->distinct()->pluck('platform');
        $genres = Game::select('genre')->distinct()->pluck('genre');
        $years = Game::select('release_year')->distinct()->pluck('release_year');

        return view('games.index', compact('games', 'sortColumn', 'sortDirection', 'sortable', 'platforms', 'genres', 'years'));
    }

    // Show form to create a new game
    public function create()
    {
        $game = new Game();
        return view('games.create', compact('game'));
    }

    // Show details of a specific game
    public function show($id)
    {
        $game = Game::find($id);

        $apiInfo = $this->searchRawgGame($game->title);

        return view('games.show', compact('game', 'apiInfo'));
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'release_year' => 'nullable|integer',
            'genre' => 'nullable|string|max:255',
            'playtime' => 'required|numeric',
            'started_on' => 'nullable|date',
            'completed_on' => 'nullable|date',
            'coverimage_path' => 'required|string|max:255',
        ]);

        // For simplicity, assigned user_id 1
        $validated['user_id'] = 1;

        Game::create($validated);

        return redirect()->route('games.index')
            ->with('message', 'Game created successfully.');
    }

    public function edit($id)
    {
        $game = Game::find($id);
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'release_year' => 'nullable|integer',
            'genre' => 'nullable|string|max:255',
            'playtime' => 'nullable|numeric',
            'started_on' => 'nullable|date',
            'completed_on' => 'nullable|date',
            'coverimage_path' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = 1;

        $game = Game::find($id);
        $game->update($validated);

        return redirect()->route('games.index')
            ->with('message', 'Game updated successfully.');
    }

    public function destroy($id)
    {
        $game = Game::find($id);
        $game->delete();

        return redirect()->route('games.index')
            ->with('message', 'Game deleted successfully.');
    }

    private function searchRawgGame($title)
    {
        $apiKey = config('services.rawg.key');
        $baseUrl = "https://api.rawg.io/api/games";

        $clean = strtolower(trim($title));

        $attempts = [
            $clean,
            preg_replace('/[^a-z0-9 ]/', '', $clean),
            preg_replace('/\b(x|v|i{1,3}|ii|iii|iv|vi|vii|viii|ix)\b/i', '', $clean),
        ];

        foreach ($attempts as $attempt) {

            // 1) SEARCH
            $response = Http::withHeaders([
                'User-Agent' => 'Laravel App'
            ])->get($baseUrl, [
                        'key' => $apiKey,
                        'search' => $attempt,
                    ]);

            if (!($response->ok() && isset($response['results']) && count($response['results']) > 0)) {
                continue;
            }

            $best = null;
            $bestScore = 0;

            foreach ($response['results'] as $result) {
                similar_text(strtolower($result['name']), $clean, $score);
                if ($score > $bestScore) {
                    $bestScore = $score;
                    $best = $result;
                }
            }

            if (!$best || $bestScore < 40) {
                continue;
            }

            // 2) DETAILS
            $details = Http::withHeaders([
                'User-Agent' => 'Laravel App'
            ])->get("$baseUrl/{$best['id']}", [
                        'key' => $apiKey,
                    ]);

            if (!$details->ok()) {
                continue;
            }

            $details = $details->json();

            // 3) SCREENSHOTS
            $shotsResp = Http::withHeaders([
                'User-Agent' => 'Laravel App'
            ])->get("$baseUrl/{$best['id']}/screenshots", [
                        'key' => $apiKey,
                    ]);

            $screenshots = $shotsResp->ok() ? ($shotsResp['results'] ?? []) : [];

            // Return compiled info
            return [
                'background_image' => $details['background_image'] ?? null,
                'about' => $details['description_raw'] ?? null,
                'screenshots' => $screenshots,
                'developers' => $details['developers'] ?? [],
                'publishers' => $details['publishers'] ?? [],
                'metacritic' => $details['metacritic'] ?? null,
            ];
        }

        return null;
    }


}
