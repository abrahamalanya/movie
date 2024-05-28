<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('movie');
});
Route::get('/movie', function () {
    return view('movies.index');
});
