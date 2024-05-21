<section class="w-full max-w-[1200px] mx-auto px-5 flex items-center justify-between mb-5">
    <span class="text-2xl text-normal font-semibold">Trending</span>
    <section class="h-[34px] bg-white rounded-[20px] p-[2px]">
        <div class="flex items-center h-[30px] relative">
            <span class="h-full flex text-black items-center justify-center w-[100px] text-sm relative z-[1] cursor-pointer">aaaa</span>
        </div>
    </section>
</section>
<x-web-container class="mb-[50px] relative">
    <div class="hidden xl:block absolute top-[44%] left-[-2%] text-[30px] cursor-pointer opacity-50 z-[1] hover:opacity-80 -translate-y-1/2" onclick="navigation({{$j}}, 'left')"><</div>
    <div class="hidden xl:block absolute top-[44%] right-[-2%] text-[30px] cursor-pointer opacity-50 z-[1] hover:opacity-80 -translate-y-1/2" onclick="navigation({{$j}}, 'right')">></div>
    <section class="flex gap-3 md:gap-5 -mr-5 -ml-5 px-5 md:m-0 md:p-0 overflow-y-hidden xl:overflow-hidden rounded-2xl relative" id="carouselContainer{{$j}}">
        @for ($i = 0; $i < 20; $i++)
            <x-movie-card></x-movie-card>
        @endfor
    </section>
</x-web-container>
