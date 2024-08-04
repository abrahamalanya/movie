@extends('layouts.app')

@section('main')
    <x-backoffice.container class="py-20 flex gap-5 flex-col">
        <a href="{{ route('movie.index') }}">Regresar</a>

        <form action="{{ route('movie.update', $movie) }}" method="POST">
            @csrf
            @method('put')
            <section class="flex gap-2">
                <article class="w-1/2">
                    {{-- Titulo --}}
                    <div class="mb-4">
                        <x-ui.label for="title">
                            {{ __('Título') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="title" id="title" value="{{ $movie->title }}" />
                        @error('title')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Synopsis --}}
                    <div>
                        <x-ui.label for="synopsis">
                            {{ __('Sinopsis') }}
                        </x-ui.label>
                        <x-ui.texarea name="synopsis" id="synopsis" cols="30" rows="10" value="{{ $movie->synopsis }}" />
                        @error('synopsis')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                </article>
                <article class="w-1/2">
                    {{-- Url --}}
                    <div class="mb-4">
                        <x-ui.label for="url">
                            {{ __('Enlace') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="url" id="url" value="{{ $movie->url }}" />
                        @error('url')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Trailer --}}
                    <div class="mb-4">
                        <x-ui.label for="trailer">
                            {{ __('Trailer') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="trailer" id="trailer" value="{{ $movie->trailer }}" />
                        @error('trailer')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Géneros de película --}}
                    <div class="mb-4">
                        @php
                            $data = $genres;
                            $datavalue = $genresMovie;
                        @endphp
                        <x-ui.label for="genre">
                            {{ __('Género') }}
                        </x-ui.label>
                        <x-ui.select name="genre[]" id="genre" :$data :$datavalue multiple="multiple" />
                        @error('genre')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                </article>
            </section>
            <x-ui.button type="submit">
                {{ __('Guardar') }}
            </x-ui.button>
        </form>
    </x-backoffice.container>
@endsection
@section('script')
    <script>
        $('#genre').select2({
            placeholder: 'Seleccionar'
        });
    </script>
@endsection
