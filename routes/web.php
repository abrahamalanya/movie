<?php

use App\Http\Controllers\Backoffice\GenreController;
use App\Http\Controllers\Backoffice\MovieController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/film/{movie}', [HomeController::class, 'film'])->name('film');
Route::get('/episode/{episode}', [HomeController::class, 'episode'])->name('episode');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Eliminar una vez actualizado la base de datos
Route::get('/updatemovie', [HomeController::class, 'updatemovie'])->name('updatemovie');
Route::get('/updateserie', [HomeController::class, 'updateserie'])->name('updateserie');

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
    Route::resource('backoffice/genres', GenreController::class)->names([
        'index' => 'genre.index',
        'create' => 'genre.create',
        'store' => 'genre.store',
        'show' => 'genre.show',
        'edit' => 'genre.edit',
        'update' => 'genre.update',
        'destroy' => 'genre.destroy',
    ]);
    Route::resource('backoffice/users', UserController::class)->names([
        'index' => 'user.index',
        'create' => 'user.create',
        'store' => 'user.store',
        'show' => 'user.show',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'destroy' => 'user.destroy',
    ]);
});

require __DIR__.'/auth.php';
