@extends('layouts.backoffice')

@section('main')
    <x-backoffice.container class="flex gap-5 flex-col">
        <section>
            <x-backoffice.link :href="route('movie.index')" :value="__('Regresar')" />
        </section>

        <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
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
                            {{ __('Enlace') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="url" id="url" value="{{ old('url') }}" />
                        @error('url')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Genero de película --}}
                    <div class="mb-4">
                        @php
                            $data = $genres;
                        @endphp
                        <x-ui.label for="genre">
                            {{ __('Género') }}
                        </x-ui.label>
                        <x-ui.select name="genre" id="genre" :$data />
                        @error('genre')
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
                </article>
            </section>
            <x-ui.button type="submit">
                {{ __('Guardar') }}
            </x-ui.button>
        </form>
    </x-web-container>
@endsection
