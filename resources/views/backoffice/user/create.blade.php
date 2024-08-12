@extends('layouts.backoffice')

@section('backoffice')
    <x-backoffice.container class="flex gap-5 flex-col">
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('Registrar usuario') }}</h2>
            <x-backoffice.link-button :href="route('user.index')" :value="__('Regresar')" />
        </section>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" id="movieForm">
            @csrf
            <section class="flex gap-2">
                <article class="w-1/2">
                    {{-- Name --}}
                    <div class="mb-4">
                        <x-ui.label for="name">
                            {{ __('Nombre') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="name" id="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                        @error('name')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Email Address --}}
                    <div class="mb-4">
                        <x-ui.label for="email">
                            {{ __('messages.email') }}
                        </x-ui.label>
                        <x-ui.input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="username" />
                        @error('email')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                </article>
                <article class="w-1/2">
                    {{-- Password --}}
                    <div class="mb-4">
                        <x-ui.label for="password" class="text-start">
                            {{ __('messages.password') }}
                        </x-ui.label>
                        <x-ui.input type="password" name="password" id="password" required autocomplete="new-password" />
                        @error('password')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Avatar --}}
                    <div class="mb-4">
                        <x-ui.label for="avatar">
                            {{ __('Imagen') }}
                        </x-ui.label>
                        <x-ui.input type="file" name="avatar" id="avatar" />
                        @error('avatar')
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