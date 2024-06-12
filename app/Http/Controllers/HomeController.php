<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Obtener películas con su promedio de calificaciones usando una subconsulta
        $movies = Movie::select('movies.*', DB::raw('AVG(reviews.rating) as average_rating'))
            ->leftJoin('reviews', 'movies.id', '=', 'reviews.movie_id')
            ->groupBy('movies.id')
            ->paginate(15);
        return view('home', compact('movies'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $movies = Movie::select('movies.*', DB::raw('AVG(reviews.rating) as average_rating'))
            ->leftJoin('reviews', 'movies.id', '=', 'reviews.movie_id')
            ->groupBy('movies.id')
            ->where('title', 'like', '%'.$query.'%')
            ->paginate(15);

        return view('home', compact('movies'));
    }
}
