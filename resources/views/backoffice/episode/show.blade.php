@extends('layouts.backoffice')

@section('backoffice')
    <x-backoffice.container class="flex flex-col">
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('Episodios de ' . $movie->title) }}</h2>
            <div class="flex gap-2">
                <x-backoffice.link-button :href="route('movie.index')" :value="__('Regresar')" />
                <x-backoffice.link-button :href="route('episode.create', ['movie_id' => $movie->id])" :value="__('messages.add')" />
            </div>
        </section>

        {{-- Filtros --}}
        <section>
            <form action="{{ route('movie.index') }}" method="GET">
                <div class="flex gap-2 mb-4 w-3/4">
                    <x-ui.input
                        type="text"
                        name="search_title"
                        id="search_title"
                        value="{{ request()->query('search_title') }}"
                        placeholder="Buscar Episodio"
                        class="w-[max-content]" />
                    <x-ui.button type="submit" class="bg-sky-600 hover:bg-sky-800">
                        {{ __('Buscar') }}
                    </x-ui.button>
                </div>
            </form>
        </section>

        {{-- Tabla de películas --}}
        <section>
            <x-backoffice.table>
                <x-slot:thead>
                    <tr>
                        <th>{{ __('Temporada') }}</th>
                        <th>{{ __('Episodio Nro.') }}</th>
                        <th>{{ __('Episodio') }}</th>
                        <th>{{ __('Opciones') }}</th>
                    </tr>
                </x-slot>
                <x-slot:tbody>
                    @foreach ($episodesBySeason as $seasonNumber => $episodes)
                        @foreach ($episodes as $episode)
                            <tr>
                                <td>{{ $seasonNumber }}</td>
                                <td>{{ $episode->episode_number }}</td>
                                <td>{{ $episode->title }}</td>
                                <td>
                                    <div class="flex gap-2 items-center">
                                        <x-backoffice.link :href="route('episode.edit', $episode)" class="text-white" :value="__('messages.edit')" />
                                        <x-backoffice.link 
                                            class="text-white hover:text-rose-500"
                                            :value="__('messages.delete')"
                                            x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'open-delete-episode-{{ $episode->id }}')"
                                        />
                                        <x-ui.modal name="open-delete-episode-{{ $episode->id }}" maxWidth="sm" :show="$errors->any()"  focusable>
                                            <form action="{{ route('episode.destroy', $episode) }}" method="POST" class="p-6">
                                                @csrf
                                                @method('DELETE')

                                                <h3 class="font-black text-[50px] md:text-base mb-4">{{ __('messages.delete') }}</h3>

                                                <p class="font-semibold text-xl text-gray-400">{{ __($episode->title) }}</p>

                                                <div class="flex items-center justify-end gap-2 mt-4">
                                                    <x-ui.button type="button" class="bg-gray-500 hover:bg-gray-700" style="width: max-content" x-on:click="$dispatch('close')">
                                                        {{ __('Cancelar') }}
                                                    </x-ui.button>
                                                    <x-ui.button type="submit" class="bg-rose-500 hover:bg-rose-700" style="width: max-content">
                                                        {{ __('messages.delete') }}
                                                    </x-ui.button>
                                                </div>
                                            </form>
                                        </x-ui.modal>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </x-slot>
                <x-slot:tfoot>
                </x-slot>
            </x-backoffice.table>
        </section>
    </x-backoffice.container>
@endsection
