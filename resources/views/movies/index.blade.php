@extends('layouts.app')

@section('title', 'Movie')

@section('main')
    <x-web-container class="pt-[100px] flex gap-5 flex-col md:flex-row">
        <x-web-movie-header></x-web-movie-header>
    </x-web-container>
    <x-web-container class="py-[100px]">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/xLetJpcjHS0?si=ZE9EPeJ585Z092g1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="w-full h-[600px]"></iframe>
    </x-web-container>
    <article class="relative mb-[70px]">
        @for ($j = 0; $j < 2; $j++)
            <x-movie-tape :$j></x-movie-tape>
        @endfor
    </article>
@endsection
