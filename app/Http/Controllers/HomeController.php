<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $query = Movie::orderByDesc('id');
        $moviesTop = null;

        // 1movie 2series
        $type = request('type');
        if ($type === 'film') {
            $query->where('type', 1);
            $moviesTop = Movie::where('type', 1)->inRandomOrder()->limit(10)->get();
        } elseif ($type === 'serie') {
            $query->where('type', 2);
            $moviesTop = Movie::where('type', 2)->inRandomOrder()->limit(10)->get();
        } else {
            $moviesTop = Movie::inRandomOrder()->limit(10)->get();
        }
        $movies = $query->paginate(15);

        return view('home', compact('movies', 'moviesTop'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $movies = Movie::where('title', 'like', '%'.$query.'%')
            ->orWhere('synopsis', 'like', '%'.$query.'%')
            ->orderByDesc('id')->paginate(15);
        return view('home', compact('movies'));
    }

    public function film(Movie $movie)
    {
        $type = $movie->type;
        if ($type === 1) {
            return view('film', compact('movie'));
        } elseif ($type === 2) {
            // Obtener el primer episodio de la serie
            $firstEpisode = Episode::where('movie_id', $movie->id)
                ->orderBy('season_number')
                ->orderBy('episode_number')
                ->first();
            // Obtener los episodios restantes organizados por temporada
            $episodesBySeason = Episode::where('movie_id', $movie->id)
                ->orderBy('season_number')
                ->orderBy('episode_number')
                ->get()
                ->groupBy('season_number');
            return view('episode', compact('movie', 'firstEpisode', 'episodesBySeason'));
        }
    }

    public function episode(Episode $episode)
    {
        $movie = Movie::find($episode->movie_id);
        $firstEpisode = Episode::find($episode->id);
        $episodesBySeason = Episode::where('movie_id', $movie->id)
            ->orderBy('season_number')
            ->orderBy('episode_number')
            ->get()
            ->groupBy('season_number');
        return view('episode', compact('movie', 'firstEpisode', 'episodesBySeason'));
    }

    // Eliminar una vez actualizado la base de datos
    public function updatemovie()
    {
        $moviesOld = DB::table('cine_pelicula')->get();
        foreach ($moviesOld as $value) {
            // Fecha de publicación
            $release_date = "{$value->fechapublicacion}-01-01";
            
            // Generar genres_json
            $genresOld = DB::table('cine_peliculacategoria')->where('idcine_pelicula', $value->id)->get();
            $genreJson = [];
            $genreIds = [];
            foreach ($genresOld as $item) {
                $genre = Genre::find($item->idcine_categoria);
                if ($genre) {
                    $genreJson[] = [
                        'id' => $genre->id,
                        'name' => $genre->name
                    ];
                    $genreIds[] = $genre->id;
                }
            }

            $movie = Movie::create([
                'title' => $value->nombre,
                'synopsis' => $value->descripcion,
                'url' => $value->urlvideo,
                'trailer' => $value->urlvideotrailer,
                'release_date' => $release_date,
                'type' => $value->idcine_tipo,
                'genres_json' => json_encode($genreJson),
            ]);

            // Relación muchos a muchos
            $movie->genres()->attach($genreIds);
        }
        DB::table('cine_pelicula')->truncate();
        DB::table('cine_peliculacategoria')->truncate();
        dd('update perfect');
    }

    public function updateserie()
    {
        $moviesOld = DB::table('cine_pelicula')->where('idcine_tipo', 2)->get();
        $moviesNow = Movie::where('type', 2)->get();

        // Crear un mapa de películas nuevas por su trailer para facilitar la búsqueda
        $moviesNowMap = $moviesNow->keyBy('trailer');

        foreach ($moviesOld as $oldMovie) {
            // Verificar si la película antigua tiene un equivalente en las películas actuales
            if (isset($moviesNowMap[$oldMovie->urlvideotrailer])) {
                $currentMovie = $moviesNowMap[$oldMovie->urlvideotrailer];

                // Obtener todos los episodios de la película antigua de una sola vez
                $episodios = DB::table('cine_episodio')->where('idcine_pelicula', $oldMovie->id)->get();

                $episodiosData = [];
                foreach ($episodios as $epi) {
                    $episodiosData[] = [
                        'season_number' => $epi->idcine_temporada,
                        'episode_number' => $epi->orden,
                        'title' => $epi->nombre,
                        'description' => $epi->descripcion,
                        'url' => $epi->urlvideo,
                        'movie_id' => $currentMovie->id,
                    ];
                }

                // Crear episodios en bloque
                if (!empty($episodiosData)) {
                    Episode::insert($episodiosData);

                    // Eliminar todos los episodios antiguos de una vez
                    DB::table('cine_episodio')->whereIn('id', $episodios->pluck('id'))->delete();
                }
            }
        }
        DB::table('cine_pelicula')->truncate();
        dd('Update episodes perfect');
    }
}
