<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\BookmarkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route for Home
Route::get('/', function () {return view('welcome');})->name('home');

// Route for Unique Feature [Search Games by Title]
Route::get('/games/search', [GameController::class, 'search'])->name('games.search');

// Routes for Games
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
// Routes for Reviews
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');

// Routes for Guides
Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/create', [GuideController::class, 'create'])->name('guides.create');
Route::get('/guides/{id}', [GuideController::class, 'show'])->name('guides.show');

// Routes for Goals
Route::get('/goals', [GoalController::class, 'index'])->name('goals.index');
Route::get('/goals/create', [GoalController::class, 'create'])->name('goals.create');
Route::get('/goals/{id}', [GoalController::class, 'show'])->name('goals.show');

// Routes for Bookmarks
Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
Route::get('/bookmarks/create', [BookmarkController::class, 'create'])->name('bookmarks.create');
Route::get('/bookmarks/{id}', [BookmarkController::class, 'show'])->name('bookmarks.show');
