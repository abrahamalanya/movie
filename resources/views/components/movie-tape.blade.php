<x-web-container class="flex items-center justify-between mb-2">
    <span class="text-2xl text-normal font-semibold">{{ __('messages.top10') }}</span>
</x-web-container>
<x-web-container class="relative">
    <x-movie-tape-navigation class="left-[-4%]" onclick="navigation({{$j}}, 'left')">
        <i class="fa-solid fa-chevron-left"></i>
    </x-movie-tape-navigation>
    <x-movie-tape-navigation class="right-[-4%]" onclick="navigation({{$j}}, 'right')">
        <i class="fa-solid fa-chevron-right"></i>
    </x-movie-tape-navigation>
    <section class="flex gap-3 md:gap-5 -mr-5 -ml-5 px-5 md:m-0 md:p-0 overflow-y-hidden xl:overflow-hidden rounded-2xl relative" id="carouselContainer{{$j}}">
        @foreach ($moviesTop as $item)
            <x-movie-card :$item />
        @endforeach
    </section>
</x-web-container>
