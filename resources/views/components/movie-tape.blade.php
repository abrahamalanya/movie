<x-web-container class="flex items-center justify-between mb-5">
    <span class="text-2xl text-normal font-semibold">Trending</span>
    {{-- <section class="h-[34px] bg-white rounded-[20px] p-[2px]">
        <div class="flex items-center h-[30px] relative">
            <span class="h-full flex text-black items-center justify-center w-[100px] text-sm relative z-[1] cursor-pointer">aaaa</span>
        </div>
    </section> --}}
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
            <x-movie-card></x-movie-card>
        @endfor
    </section>
</x-web-container>
