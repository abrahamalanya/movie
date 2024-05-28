@extends('layouts.app')

@section('title', 'Movie')

@section('main')
    <article class="w-full h-[450px] md:h-[700px] flex items-center relative">
        <section class="w-full h-full absolute top-0 left-0 opacity-25 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                class="absolute top-0 left-0 object-none object-center"> {{-- w-full h-full --}}
        </section>
        <div class="w-full h-[250px] absolute left-0 bottom-0 bg-gradient-to-t from-slate-900"></div>
        <x-web-container>
            <section class="max-w-[800px] mx-auto flex flex-col items-center text-center relative">
                <span class="font-black text-[50px] md:text-[90px] mb-[10px] md:mb-0">Welcome</span>
                <span class="font-medium text-[18px] md:text-[24px] mb-[40px]">
                    Millons of movies , TV shows and people to discover.
                    Explore Now.
                </span>
                <section class="w-full flex items-center">
                    <input type="text" placeholder='Search for movie or tv shows....'
                        class="w-[calc(100%-100px)] md:w-[calc(100%-150px)] h-[50px] md:h-[60px] bg-white text-black px-[15px] md:px-[30px]
                        rounded-l-[30px] text-[14px] md:text-[20px] outline-none border-none font-medium">
                    <button class="w-[100px] md:w-[150px] h-[50px] md:h-[60px]
                        rounded-r-[30px] text-[18px] md:text-[20px] outline-none border-none font-medium bg-gradient-to-r from-orange-400 to-red-500">Search</button>
                </section>
            </section>
        </x-web-container>
    </article>
    <article class="relative mb-[70px]">
        @for ($j = 0; $j < 4; $j++)
            <x-movie-tape :$j></x-movie-tape>
        @endfor
    </article>
@endsection
