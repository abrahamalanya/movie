@extends('layouts.app')

@section('title', 'Dashboard')

@section('main')
    <article class="w-full h-[450px] md:h-[700px] flex items-center relative">
        <x-web-container>
            <section class="max-w-[800px] mx-auto flex flex-col items-center text-center relative">
                <span class="font-black text-[50px] md:text-[90px] mb-[10px] md:mb-0">Dashboard</span>
                <span class="font-medium text-[18px] md:text-[24px] mb-[40px]">{{ __("You're logged in!") }}</span>
            </section>
        </x-web-container>
    </article>
@endsection
