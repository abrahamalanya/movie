<section class="w-[125px] cursor-pointer md:w-[calc(25%-15px)] lg:w-[calc(20%-16px)] shrink-0">
    <div class="relative w-full aspect-[1/1.5] bg-cover bg-center mb-[30px] flex items-end justify-between p-[10px]">
        <img src="{{ $poster }}" alt="" class="absolute top-0 left-0 w-full h-full rounded-xl overflow-hidden">
        <div class="relative top-[30px] bg-white text-slate-900 rounded-full border-2">
            <div class="relative w-10 h-10 md:w-[50px] md:h-[50px] rounded-full border-4 border-yellow-600 p-[4px] flex justify-center content-center">
                <span class="text-[1rem] md:text-[1.3rem] font-bold">{{ $rating }}</span>
            </div>
        </div>
        <div class="w-full relative flex gap-[5px] flex-wrap justify-end left-[-20px] md:left-[5px]">
            <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap">Science Fiction</span>
            <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap">Action</span>
            <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap">Adventure</span>
        </div>
    </div>
    <div class="flex flex-col">
        <span class="text-xs md:text-xl mb-[10px] leading-6 truncate font-semibold">{{ $title }}</span>
        <span class="text-[14px] opacity-50 font-semibold">{{ $release_date }}</span>
    </div>
</section>