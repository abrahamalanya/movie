@extends('layouts.backoffice')

@section('backoffice')
    <x-backoffice.container class="flex gap-5 flex-col">
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('Editar episodio') }}</h2>
            <x-backoffice.link-button :href="route('episode.show', $episode->movie_id)" :value="__('Regresar')" />
        </section>

        <form action="{{ route('episode.update', $episode) }}" method="POST">
            @csrf
            @method('put')
            <section class="flex gap-2">
                <article class="w-1/2">
                    {{-- Episode --}}
                    <div class="mb-4">
                        <x-ui.label for="title">
                            {{ __('Título') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="title" id="title" value="{{ $episode->title }}" />
                        @error('title')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Description --}}
                    <div>
                        <x-ui.label for="description">
                            {{ __('Descripción') }}
                        </x-ui.label>
                        <x-ui.texarea name="description" id="description" cols="30" rows="10" value="{{ $episode->description }}" />
                        @error('description')
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
                        <x-ui.input type="text" name="url" id="url" value="{{ $episode->url }}" />
                        @error('url')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Seadon --}}
                    <div class="mb-4">
                        <x-ui.label for="season_number">
                            {{ __('Número de Temporada') }}
                        </x-ui.label>
                        <x-ui.input type="number" step="1" min="1" name="season_number" id="season_number" value="{{ $episode->season_number }}" />
                        @error('season_number')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Episode --}}
                    <div class="mb-4">
                        <x-ui.label for="episode_number">
                            {{ __('Número de Episodio') }}
                        </x-ui.label>
                        <x-ui.input type="number" step="1" min="1" name="episode_number" id="episode_number" value="{{ $episode->episode_number }}" />
                        @error('episode_number')
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
