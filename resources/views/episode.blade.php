@extends('layouts.app')

@section('title', $movie->title)

@section('main')
    <x-web-container class="pt-[60px] flex gap-5 flex-col mb-10">
        <x-web-serie-header :$movie :$firstEpisode :$episodesBySeason/>
    </x-web-container>
@endsection
