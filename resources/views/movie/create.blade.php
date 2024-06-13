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

        <form action="{{ route('movie.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control text-slate-900" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="synopsis">Sinopsis</label>
                <textarea name="synopsis" id="synopsis" class="form-control text-slate-900">{{ old('synopsis') }}</textarea>
                @error('synopsis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="release_date">Fecha de Lanzamiento</label>
                <input type="date" name="release_date" id="release_date" class="form-control text-slate-900" value="{{ old('release_date') }}">
                @error('release_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="poster">Poster</label>
                <input type="text" name="poster" id="poster" class="form-control text-slate-900" value="{{ old('poster') }}">
                @error('poster')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <select name="genre" id="genre" class="form-control text-slate-900">
                    @foreach ($genres as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" name="genre" id="genre" class="form-control text-slate-900" value="{{ old('genre') }}"> --}}
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </x-web-container>
@endsection
