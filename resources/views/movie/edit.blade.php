@extends('layouts.app')

@section('title', 'Movie Create')

@section('main')
    <x-web-container class="pt-[100px] flex gap-5 flex-col mb-10">
        <a href="{{ route('movie.index') }}">Regresar</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movie.update', $movie) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control text-slate-900" value="{{ $movie->title }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="synopsis">Sinopsis</label>
                <textarea name="synopsis" id="synopsis" class="form-control text-slate-900">{{ $movie->synopsis }}</textarea>
                @error('synopsis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="release_date">Fecha de Lanzamiento</label>
                <input type="date" name="release_date" id="release_date" class="form-control text-slate-900" value="{{ $movie->release_date }}">
                @error('release_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="poster">Poster</label>
                <input type="text" name="poster" id="poster" class="form-control text-slate-900" value="{{ $movie->poster }}">
                @error('poster')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </x-web-container>
@endsection
