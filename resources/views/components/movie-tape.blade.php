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
        @foreach ($moviesTop as $item)
            <x-movie-card :$item>
                <x-slot:title>{{ $item->title }}</x-slot>
                <x-slot:release_date>{{ $item->release_date }}</x-slot>
                <x-slot:poster>{{ $item->poster }}</x-slot>
                <x-slot:rating>{{ number_format($item->average_rating, 2) }}</x-slot>
            </x-movie-card>
        @endforeach
    </section>
</x-web-container>
