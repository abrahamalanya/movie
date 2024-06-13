<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::orderByDesc('id')->paginate(15);
        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('movie.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'El título es obligatorio.',
            'title.string' => 'El título debe ser una cadena de texto.',
            'title.max' => 'El título no puede tener más de 255 caracteres.',
            'synopsis.required' => 'La sinopsis es obligatoria.',
            'release_date.required' => 'La fecha de lanzamiento es obligatoria.',
            'release_date.date' => 'La fecha de lanzamiento debe ser una fecha válida.',
            'poster.string' => 'El poster debe ser una cadena de texto.',
            'poster.max' => 'El poster no puede tener más de 255 caracteres.',
        ];
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'release_date' => 'required|date',
            'poster' => 'nullable|string|max:255',
        ], $messages);

        $movie = Movie::create($validated);

        $movie->genres()->attach(request('genre'));
        dd($movie);

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
        return view('movie.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'release_date' => 'required|date',
            'poster' => 'nullable|string|max:255',
        ]);

        $movie->update($validated);

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
