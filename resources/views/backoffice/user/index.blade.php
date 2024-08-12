@extends('layouts.backoffice')

@section('backoffice')
    <x-backoffice.container class="flex flex-col">
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('Usuarios') }}</h2>
            <x-backoffice.link-button :href="route('user.create')" :value="__('messages.add')" />
        </section>

        {{-- Filtros --}}
        <section>
            <form action="{{ route('user.index') }}" method="GET">
                <div class="flex gap-2 mb-4 w-3/4">
                    <x-ui.input
                        type="text"
                        name="search_name"
                        id="search_name"
                        value="{{ request()->query('search_name') }}"
                        placeholder="Buscar usuario"
                        class="w-[max-content]" />
                    <x-ui.input
                        type="text"
                        name="search_email"
                        id="search_email"
                        value="{{ request()->query('search_email') }}"
                        placeholder="Correo Electrónico"
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
                        <th>{{ __('Nombre') }}</th>
                        <th>{{ __('Correo Electrónico') }}</th>
                        <th>{{ __('Opciones') }}</th>
                    </tr>
                </x-slot>
                <x-slot:tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>
                                <div class="flex gap-2 items-center">
                                    <img alt="{{ $item->name }}"
                                        class="w-[30px] h-[30px] object-cover rounded-xl overflow-hidden"
                                        @if($item->avatar) src="{{ asset('storage/'.$item->avatar) }}" @else src="{{ asset('assets/avatar.png') }}" @endif>
                                    <h3 class="font-semibold lowercase text-base">{{ $item->name }}</h3>
                                </div>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="flex gap-2 items-center">
                                    <x-backoffice.link :href="route('user.edit', $item)" class="text-white" :value="__('messages.edit')" />
                                    <x-backoffice.link 
                                        class="text-white hover:text-rose-500"
                                        :value="__('messages.delete')"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'open-delete-user-{{ $item->id }}')"
                                    />
                                    <x-ui.modal name="open-delete-user-{{ $item->id }}" maxWidth="sm" :show="$errors->any()"  focusable>
                                        <form action="{{ route('user.destroy', $item) }}" method="POST" class="p-6">
                                            @csrf
                                            @method('DELETE')

                                            <h3 class="font-black text-[50px] md:text-base mb-4">{{ __('messages.delete') }}</h3>

                                            <p class="font-semibold text-xl text-gray-400">{{ __($item->title) }}</p>

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
                </x-slot>
                <x-slot:tfoot>
                </x-slot>
            </x-backoffice.table>
            <section class="pt-4">
                {{ $users->appends(request()->query())->links() }}
            </section>
        </section>
    </x-backoffice.container>
@endsection