<x-web-container class="flex items-center justify-between mb-5">
    <span class="text-2xl text-normal font-semibold">Trending</span>
</x-web-container>
<x-web-container class="mb-[50px] relative">
    <x-movie-tape-navigation class="left-[-4%]" onclick="navigation({{$j}}, 'left')">
        <i class="fa-solid fa-chevron-left"></i>
    </x-movie-tape-navigation>
    <x-movie-tape-navigation class="right-[-4%]" onclick="navigation({{$j}}, 'right')">
        <i class="fa-solid fa-chevron-right"></i>
    </x-movie-tape-navigation>
    <section class="flex gap-3 md:gap-5 -mr-5 -ml-5 px-5 md:m-0 md:p-0 overflow-y-hidden xl:overflow-hidden rounded-2xl relative" id="carouselContainer{{$j}}">
        @for ($i = 0; $i < 20; $i++)
            <x-movie-card>
                <x-slot:title>Undefined</x-slot>
                <x-slot:release_date>Apr 18, 2024</x-slot>
                <x-slot:poster>https://image.tmdb.org/t/p/original/4vc8wOf2yG9TiXoJpvz2fJHOmHA.jpg</x-slot>
                <x-slot:rating>7.3</x-slot>
            </x-movie-card>
        @endfor
    </section>
</x-web-container>
