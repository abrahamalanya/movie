@extends('layouts.backoffice')

@section('main')
    <x-backoffice.container>
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('messages.movies') }}</h2>
            <x-backoffice.link-button :href="route('movie.create')" :value="__('messages.add')" />
        </section>
        <section>
            <x-backoffice.table>
                <x-slot:thead>
                    <tr>
                        <th>Peliculas</th>
                        <th>Géneros</th>
                        <th>Opciones</th>
                    </tr>
                </x-slot>
                <x-slot:tbody>
                    @foreach ($movies as $item)
                        <tr>
                            <td>
                                <div class="flex gap-2 items-center">
                                    <img src="{{ asset('storage/'.$item->poster) }}" alt="{{ $item->title }}" class="w-[50px] h-[50px] object-cover rounded-xl overflow-hidden">
                                    <h3 class="font-semibold uppercase text-xl">{{ $item->title }}</h3>
                                </div>
                            </td>
                            <td>
                                @foreach ($item->genres as $genre)
                                    <span class="bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap lowercase">
                                        {{ $genre->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <x-backoffice.link-button :href="route('movie.edit', $item)" class="bg-slate-500 hover:bg-slate-600 focus:ring-slate-300" :value="__('messages.edit')" />
                                    <form action="{{ route('movie.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-backoffice.button type="submit" class="bg-rose-500 hover:bg-rose-600 focus:ring-rose-300" :value="__('messages.delete')" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
                <x-slot:tfoot>
                </x-slot>
            </x-backoffice.table>
        </section>
        <section>
            {{ $movies->links() }}
        </section>
    </x-backoffice.container>
@endsection