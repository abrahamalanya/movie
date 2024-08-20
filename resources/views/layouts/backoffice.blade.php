{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Backoffice') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/606c0d38bd.js" crossorigin="anonymous"></script>
    </head>
    <body>
        @if (session('success'))
            <x-backoffice.container class="relative py-4">
                <x-backoffice.alert class="absolute z-20 top-0 right-0 font-medium">
                    {{ session('success') }}
                </x-backoffice.alert>
            </x-backoffice.container>
        @endif

        <x-backoffice.header></x-backoffice.header>
        <x-backoffice.main>
            @yield('main')
        </x-backoffice.main>
        <x-backoffice.footer></x-backoffice.footer>
    </body>
</html> --}}
@extends('layouts.app')

@section('main')
    <x-web-container class="pt-16">
        <section class="flex gap-4 border border-transparent border-t-cyan-600 pt-2">
            <x-ui.link :href="route('user.index')"><i class="fa-solid fa-user"></i> {{ __('Usuarios') }}</x-ui.link>
            <x-ui.link :href="route('movie.index')"><i class="fa-solid fa-film"></i> {{ __('messages.movies') }}</x-ui.link>
            <x-ui.link :href="route('genre.index')"><i class="fa-solid fa-user"></i> {{ __('Géneros') }}</x-ui.link>
        </section>
    </x-web-container>
    @yield('backoffice')
@endsection