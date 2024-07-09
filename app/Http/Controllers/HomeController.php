<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::orderByDesc('id')->paginate(15);
        $moviesTop = Movie::orderByDesc('id')->limit(10)->get();

        return view('home', compact('movies', 'moviesTop'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = Movie::where('title', 'like', '%'.$query.'%')->orderByDesc('id')->paginate(15);
        $moviesTop = Movie::orderByDesc('id')->limit(10)->get();

        return view('home', compact('movies', 'moviesTop'));
    }

    public function film(Movie $movie)
    {
        return view('film', compact('movie'));
    }
}
