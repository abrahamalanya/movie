@extends('layouts.app')

@section('title', 'Login')

@section('main')
    <article class="w-full h-[450px] md:h-[700px] flex items-center relative">
        <x-web-container>
            <section class="max-w-[800px] mx-auto flex flex-col gap-6 items-center text-center relative">
                <h3 class="font-black text-[50px] md:text-4xl">{{ __('messages.login') }}</h3>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-ui.label for="email" class="text-start">
                            {{ __('messages.email') }}
                        </x-ui.label>
                        <x-ui.input type="email" name="email" id="email" :value="old('email')" required autofocus autocomplete="username" />
                        @error('email')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-ui.label for="password" class="text-start">
                            {{ __('messages.password') }}
                        </x-ui.label>
                        <x-ui.input type="password" name="password" id="password" required autocomplete="current-password" />
                        @error('password')
                            <x-ui.input-error>{{ $message }}</x-ui.input-error>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    {{-- <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <x-backoffice.link :href="route('password.request')" class="text-slate-400" :value="__('¿Olvidaste tu contraseña?')" />
                        @endif

                        <x-primary-button class="ms-3">
                            {{ __('messages.login') }}
                        </x-primary-button>
                    </div>
                </form>
            </section>
        </x-web-container>
    </article>
@endsection
