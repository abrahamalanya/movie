@extends('layouts.app')

@section('title', 'Login')

@section('main')
    <article class="w-full h-[450px] md:h-[700px] flex items-center relative">
        <x-web-container>
            <section class="max-w-[800px] mx-auto flex flex-col items-center text-center relative">
                <span class="font-black text-[50px] md:text-[90px] mb-[10px] md:mb-0">{{ __('messages.login') }}</span>
                <span class="font-medium text-[18px] md:text-[24px] mb-[40px]">
                    Millons of movies , TV shows and people to discover.
                    Explore Now.
                </span>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
    
                <form method="POST" action="{{ route('login') }}">
                    @csrf
    
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('messages.email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
    
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('messages.password')" />
    
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
    
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
    
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>
    
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
    
                        <x-primary-button class="ms-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </section>
        </x-web-container>
    </article>
@endsection
