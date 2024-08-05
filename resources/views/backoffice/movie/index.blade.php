@extends('layouts.app')

@section('main')
    <x-backoffice.container class="py-16 flex flex-col">
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('messages.movies') }}</h2>
            <x-backoffice.link-button :href="route('movie.create')" :value="__('messages.add')" />
        </section>

        {{-- Filtros --}}
        <section>
            <form action="{{ route('movie.index') }}" method="GET">
                <div class="flex gap-2 mb-4">
                    <x-ui.input
                        type="text"
                        name="search_title"
                        id="search_title"
                        value="{{ request()->query('search_title') }}"
                        placeholder="Buscar película"
                        class="w-[max-content]" />
                    <x-ui.input
                        type="number"
                        name="search_release"
                        id="search_release"
                        value="{{ request()->query('search_release') }}"
                        placeholder="Fecha de Publicación"
                        class="w-[max-content]" />
                    <x-ui.button type="submit" class="w-[max-content]">
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
                        <th>{{ __('Película') }}</th>
                        <th>{{ __('Publicación') }}</th>
                        <th>{{ __('Opciones') }}</th>
                    </tr>
                </x-slot>
                <x-slot:tbody>
                    @foreach ($movies as $item)
                        <tr>
                            <td>
                                <div class="flex gap-2 items-center">
                                    <img alt="{{ $item->title }}"
                                        class="w-[30px] h-[30px] object-cover rounded-xl overflow-hidden"
                                        @if($item->poster) src="{{ asset('storage/'.$item->poster) }}" @else src="{{ asset('assets/no-poster.png') }}" @endif>
                                    <h3 class="font-semibold lowercase text-base">{{ $item->title }}</h3>
                                </div>
                            </td>
                            <td>{{ Carbon\Carbon::parse($item->release_date)->format('Y') }}</td>
                            <td>
                                <div class="flex gap-2 items-center">
                                    <x-backoffice.link :href="route('movie.edit', $item)" class="text-white" :value="__('messages.edit')" />
                                    <form action="{{ route('movie.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-white hover:text-rose-500 font-medium text-sm" type="submit">{{ __('messages.delete') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
                <x-slot:tfoot>
                </x-slot>
            </x-backoffice.table>
            <section class="pt-4">
                {{ $movies->appends(request()->query())->links() }}
            </section>
        </section>
    </x-backoffice.container>
@endsection