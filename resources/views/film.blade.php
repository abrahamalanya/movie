@extends('layouts.app')

@section('title', 'Movie')

@section('main')
    <x-web-container class="pt-[100px] flex gap-5 flex-col mb-10">
        <x-web-movie-header :$movie></x-web-movie-header>
    </x-web-container>
@endsection
