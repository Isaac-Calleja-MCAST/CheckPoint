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
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');

// Routes for Reviews
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('reviews.show');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

// Routes for Guides
Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/create', [GuideController::class, 'create'])->name('guides.create');
Route::get('/guides/{id}', [GuideController::class, 'show'])->name('guides.show');
Route::post('/guides', [GuideController::class, 'store'])->name('guides.store');
Route::get('/guides/{id}/edit', [GuideController::class, 'edit'])->name('guides.edit');
Route::put('/guides/{id}', [GuideController::class, 'update'])->name('guides.update');
Route::delete('/guides/{id}', [GuideController::class, 'destroy'])->name('guides.destroy');

// Routes for Goals
Route::get('/goals', [GoalController::class, 'index'])->name('goals.index');
Route::get('/goals/create', [GoalController::class, 'create'])->name('goals.create');
Route::get('/goals/{id}', [GoalController::class, 'show'])->name('goals.show');
Route::post('/goals', [GoalController::class, 'store'])->name('goals.store');
Route::get('/goals/{id}/edit', [GoalController::class, 'edit'])->name('goals.edit');
Route::put('/goals/{id}', [GoalController::class, 'update'])->name('goals.update');
Route::delete('/goals/{id}', [GoalController::class, 'destroy'])->name('goals.destroy');

// Routes for Bookmarks
Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
Route::get('/bookmarks/create', [BookmarkController::class, 'create'])->name('bookmarks.create');
Route::get('/bookmarks/{id}', [BookmarkController::class, 'show'])->name('bookmarks.show');
Route::post('/bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
Route::get('/bookmarks/{id}/edit', [BookmarkController::class, 'edit'])->name('bookmarks.edit');
Route::put('/bookmarks/{id}', [BookmarkController::class, 'update'])->name('bookmarks.update');
Route::delete('/bookmarks/{id}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');