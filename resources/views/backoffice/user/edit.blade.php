@extends('layouts.backoffice')

@section('backoffice')
    <x-backoffice.container class="flex gap-5 flex-col">
        <section class="py-2 flex flex-row justify-between items-center">
            <h2 class="text-2xl font-bold">{{ __('Editar usuario') }}</h2>
            <x-backoffice.link-button :href="route('user.index')" :value="__('Regresar')" />
        </section>

        <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data" id="movieForm">
            @csrf
            @method('put')
            <section class="flex gap-2">
                <article class="w-1/2">
                    {{-- Name --}}
                    <div class="mb-4">
                        <x-ui.label for="name">
                            {{ __('Nombre') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="name" id="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                        @error('name')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Email Address --}}
                    <div class="mb-4">
                        <x-ui.label for="email">
                            {{ __('messages.email') }}
                        </x-ui.label>
                        <x-ui.input type="email" name="email" id="email" value="{{ $user->email }}" required autocomplete="username" />
                        @error('email')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Password --}}
                    <div class="mb-4">
                        <x-ui.label for="password" class="text-start">
                            {{ __('messages.password') }}
                        </x-ui.label>
                        <x-ui.input type="password" name="password" id="password" autocomplete="new-password" />
                        @error('password')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                </article>
                <article class="w-1/2">
                    {{-- Phone --}}
                    <div class="mb-4">
                        <x-ui.label for="phone" class="text-start">
                            {{ __('Nro. Celular') }}
                        </x-ui.label>
                        <x-ui.input type="text" name="phone" id="phone" value="{{ $user->phone }}" required autocomplete="phone" />
                        @error('phone')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>
                    {{-- Avatar --}}
                    <div class="mb-4">
                        <x-ui.label for="poster">
                            {{ __('Imagen Actual') }}
                        </x-ui.label>
                        <img alt="{{ $user->name }}"
                        class="w-[100px] h-[100px] object-cover rounded-xl overflow-hidden"
                        @if($user->avatar) src="{{ asset('storage/'.$user->avatar) }}" @else src="{{ asset('assets/avatar.png') }}" @endif>
                    </div>
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
    </x-backoffice.container>
@endsection
