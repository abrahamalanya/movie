<a href="{{ route('film', $item->id) }}" class="w-[125px] cursor-pointer md:w-[calc(25%-15px)] lg:w-[calc(20%-16px)] shrink-0">
    <div class="relative w-full aspect-[1/1.5] bg-cover bg-center mb-[10px] flex items-end justify-between p-[10px]">
        <img src="{{ $item->poster }}" alt="{{ $item->title }}" class="absolute top-0 left-0 w-full h-full object-cover rounded-xl overflow-hidden">
        <div class="w-full relative flex gap-[5px] flex-wrap justify-end left-[-20px] md:left-[5px]">
            @foreach ($item->genres as $genre)
                <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap lowercase">
                    {{ $genre->name }}
                </span>
            @endforeach
        </div>
    </div>
    <div class="flex flex-col">
        <span class="capitalize text-xs md:text-xl mb-[10px] leading-6 truncate font-semibold">{{ $item->title }}</span>
    </div>
</a>