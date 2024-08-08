@extends('layouts.app')

@section('title', 'Register')

@section('main')
<article class="w-full h-[450px] md:h-[700px] flex items-center relative">
    <x-web-container>
        <section class="max-w-[800px] mx-auto flex flex-col gap-6 items-center text-center relative">
            <h3 class="font-black text-[50px] md:text-4xl">{{ __('messages.register') }}</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-ui.label for="name" class="text-start">
                        {{ __('Nombre') }}
                    </x-ui.label>
                    <x-ui.input type="text" name="name" id="name" :value="old('name')" required autofocus autocomplete="name" />
                    @error('name')
                        <x-ui.input-error>{{ $message }}</x-ui.input-error>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-ui.label for="email" class="text-start">
                        {{ __('messages.email') }}
                    </x-ui.label>
                    <x-ui.input type="email" name="email" id="email" :value="old('email')" required autocomplete="username" />
                    @error('email')
                        <x-ui.input-error>{{ $message }}</x-ui.input-error>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-ui.label for="password" class="text-start">
                        {{ __('messages.password') }}
                    </x-ui.label>
                    <x-ui.input type="password" name="password" id="password" required autocomplete="new-password" />
                    @error('password')
                        <x-ui.input-error>{{ $message }}</x-ui.input-error>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-ui.label for="password_confirmation" class="text-start">
                        {{ __('Confirmar Contraseña') }}
                    </x-ui.label>
                    <x-ui.input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <x-ui.input-error>{{ $message }}</x-ui.input-error>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-backoffice.link :href="route('login')" class="text-slate-400" :value="__('¿Ya tienes una cuenta?')" />

                    <x-primary-button class="ms-4">
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </x-web-container>
</article>
@endsection
