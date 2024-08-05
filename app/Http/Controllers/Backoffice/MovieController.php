<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Genre;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::orderByDesc('id')->paginate(20);
        return view('backoffice.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('backoffice.movie.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        // Guarda la imagen en la carpeta 'movies'
        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('movies', 'public');
        }

        $movie = Movie::create([
            'title' => request('title'),
            'synopsis' => request('synopsis'),
            'url' => request('url'),
            'release_date' => now(),
            'poster' => $path,
        ]);

        if (!is_null(request('genre'))) {
            $genresArray = json_decode(request('genre'), true);
            $movie->genres()->attach($genresArray);
        }

        return redirect()->route('movie.index')->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genresMovie = [];
        foreach ($movie->genres as $value) {
            $genresMovie[] = $value->id;
        }
        $genres = Genre::all();
        return view('backoffice.movie.edit', compact('movie', 'genres', 'genresMovie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $movie->title = request('title');
        $movie->synopsis = request('synopsis');
        $movie->url = request('url');
        $movie->trailer = request('trailer');
        $movie->save();

        if (!is_null(request('genre'))) {
            $genresArray = json_decode(request('genre'), true);
            $movie->genres()->sync($genresArray);
        }

        return redirect()->route('movie.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movie.index')->with('success', 'Movie deleted successfully.');
    }
}
