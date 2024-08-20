@extends('layouts.backoffice')

@section('backoffice')
    <x-backoffice.container class="flex flex-col">
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('Géneros') }}</h2>
        </section>

        {{-- Filtros --}}
        <section>
            <form action="{{ route('genre.index') }}" method="GET">
                <div class="flex gap-2 mb-4 w-3/4">
                    <x-ui.input
                        type="text"
                        name="search_name"
                        id="search_name"
                        value="{{ request()->query('search_name') }}"
                        placeholder="Buscar género"
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
                        <th>{{ __('Género') }}</th>
                    </tr>
                </x-slot>
                <x-slot:tbody>
                    @foreach ($genres as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                        </tr>
                    @endforeach
                </x-slot>
                <x-slot:tfoot>
                </x-slot>
            </x-backoffice.table>
            <section class="pt-4">
                {{ $genres->appends(request()->query())->links() }}
            </section>
        </section>
    </x-backoffice.container>
@endsection