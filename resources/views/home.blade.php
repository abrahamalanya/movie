@extends('layouts.app')

@section('title', 'Movie')

@section('main')
    <article class="w-full h-[450px] md:h-[350px] flex items-center relative">
        <section class="w-full h-full absolute top-0 left-0 opacity-25 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                class="absolute top-0 left-0 object-none object-center">
        </section>
        <div class="w-full h-[250px] absolute left-0 bottom-0 bg-gradient-to-t from-slate-900"></div>
        <x-web-container>
            <section class="max-w-[800px] mx-auto flex flex-col items-center text-center relative">
                <span class="font-black text-[50px] md:text-6xl mb-[10px] md:mb-0">{{ __('messages.welcome') }}</span>
                <span class="font-medium text-[18px] md:text-base mb-6">{{ __('messages.millons of movies and series, explore now.') }}</span>
                <form class="w-full flex items-center" action="{{ route('search') }}" method="GET">
                    <input type="text" name="query" placeholder='{{ __('messages.search for movie or tv shows...') }}' value="{{ request('query') }}"
                        class="w-[calc(100%-100px)] md:w-[calc(100%-150px)] h-[40px] md:h-[50px] bg-white text-black px-[15px] md:px-[30px]
                        rounded-l-[30px] text-[14px] md:text-[20px] outline-none border-none font-medium">
                    <button type="submit" class="w-[100px] md:w-[150px] h-[40px] md:h-[50px]
                        rounded-r-[30px] text-[18px] md:text-[20px] outline-none border-none font-medium bg-gradient-to-r from-orange-400 to-red-500">{{ __('messages.search') }}</button>
                </form>
            </section>
        </x-web-container>
    </article>
    <article class="relative mb-8">
        @php $j = 0; @endphp
        <x-movie-tape :$j :$moviesTop></x-movie-tape>
    </article>
    <article class="relative">
        <x-web-container class="relative">
            <section class="w-full flex flex-wrap gap-3 md:gap-5">
                @foreach ($movies as $item)
                    <x-movie-card :$item />
                @endforeach
                </section>
            <section class="w-full my-10">
                {{ $movies->appends(['query' => request('query')])->links() }}
            </section>
        </x-web-container>
    </article>
@endsection
