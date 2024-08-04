@extends('layouts.app')

@section('main')
    <x-backoffice.container class="py-20 flex gap-5 flex-col">
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('Registrar película') }}</h2>
            <x-backoffice.link :href="route('movie.index')" :value="__('Regresar')" />
        </section>

        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data" id="movieForm">
            @csrf
            <section class="flex gap-2">
                <article class="w-1/2">
                    {{-- Titulo --}}
                    <div class="mb-4">
                        <x-ui.label for="title">
                            {{ __('Título') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="title" id="title" value="{{ old('title') }}" />
                        @error('title')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Synopsis --}}
                    <div>
                        <x-ui.label for="synopsis">
                            {{ __('Sinopsis') }}
                        </x-ui.label>
                        <x-ui.texarea name="synopsis" id="synopsis" cols="30" rows="10" value="{{ old('synopsis') }}" />
                        @error('synopsis')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                </article>
                <article class="w-1/2">
                    {{-- Url --}}
                    <div class="mb-4">
                        <x-ui.label for="url">
                            {{ __('Enlace de Película') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="url" id="url" value="{{ old('url') }}" />
                        @error('url')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Trailer --}}
                    <div class="mb-4">
                        <x-ui.label for="trailer">
                            {{ __('Trailer') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="trailer" id="trailer" value="{{ old('trailer') }}" />
                        @error('trailer')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Poster --}}
                    <div class="mb-4">
                        <x-ui.label for="poster">
                            {{ __('Imagen') }}
                        </x-ui.label>
                        <x-ui.input type="file" name="poster" id="poster" />
                        @error('poster')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Géneros de película --}}
                    <div class="mb-4">
                        <div class="flex justify-between">
                            <h2 class="text-2xl font-bold">{{ __('Géneros') }}</h2>
                            <x-backoffice.link href="javascript:;" onclick="addGenre()" class="text-xl" :value="__('+')" />
                        </div>
                        <div id="contSelectsGenres" class="flex flex-col gap-2"></div>
                        <input type="hidden" name="genre" id="genre" value="">
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
    </x-web-container>
@endsection
@section('script')
    <script>
        function addGenre() {
            let genres = @json($genres);
            let contSelectsGenres = document.getElementById('contSelectsGenres');
            let options = '';
            genres.forEach(function (genre) {
                options += `<option value="${genre.id}">${genre.name}</option>`;
            });
            let select = `<select class="w-full text-sm rounded-lg bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500">
                    ${options}
                </select>`;

            let newDiv = document.createElement('div');
            newDiv.classList.add('flex', 'items-center', 'gap-2');
            newDiv.innerHTML = select + `<x-backoffice.link href="javascript:;" class="remove-genre text-red-500" :value="__('x')" />`;

            contSelectsGenres.appendChild(newDiv);

            newDiv.querySelector('.remove-genre').addEventListener('click', function() {
                newDiv.remove();
            });
        }
        document.getElementById('movieForm').addEventListener('submit', function(event) {
            let selects = document.querySelectorAll('#contSelectsGenres select');
            let genresArray = [];
            selects.forEach(function(select) {
                genresArray.push(select.value);
            });

            let genresJson = JSON.stringify(genresArray);
            document.getElementById('genre').value = genresJson;
        });
    </script>
@endsection
