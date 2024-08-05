<?php

use App\Http\Controllers\Backoffice\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Movie\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/film/{movie}', [HomeController::class, 'film'])->name('film');
Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/perfil', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Backoffice
    Route::resource('backoffice/movies', MovieController::class)->names([
        'index' => 'movie.index',
        'create' => 'movie.create',
        'store' => 'movie.store',
        'show' => 'movie.show',
        'edit' => 'movie.edit',
        'update' => 'movie.update',
        'destroy' => 'movie.destroy',
    ]);

    Route::resource('genres', GenreController::class)->names([
        'index' => 'genre.index',
        'create' => 'genre.create',
        'store' => 'genre.store',
        'show' => 'genre.show',
        'edit' => 'genre.edit',
        'update' => 'genre.update',
        'destroy' => 'genre.destroy',
    ]);
});

require __DIR__.'/auth.php';
