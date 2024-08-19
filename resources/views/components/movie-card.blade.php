<a href="{{ route('film', $item->id) }}" class="w-[150px] cursor-pointer md:w-[calc(25%-15px)] lg:w-[calc(20%-16px)] shrink-0">
    <section class="relative w-full aspect-[1/1.5] bg-cover bg-center mb-[10px] flex items-end justify-between p-[10px]">
        <img alt="{{ $item->title }}"
            class="absolute top-0 left-0 w-full h-full object-cover rounded-xl overflow-hidden"
            @if($item->poster) src="{{ asset('storage/'.$item->poster) }}" @else src="{{ asset('assets/no-poster.png') }}" @endif>
        <section class="w-full relative">
            <div class="w-[53px] h-[53px] text-xs bg-cyan-600 rounded-full flex flex-col justify-center items-center">
                @if ($item->type === 1)
                <i class="fa-solid fa-film"></i> {{ __('Película') }}
                @else
                <i class="fa-solid fa-clapperboard"></i> {{ __('Serie') }}
                @endif
            </div>
        </section>
        <section class="w-full relative flex gap-[5px] flex-wrap justify-end left-[-20px] md:left-[5px]">
            @foreach ($item->genres as $genre)
                <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap lowercase">
                    {{ $genre->name }}
                </span>
            @endforeach
        </section>
    </section>
    <section class="flex flex-col">
        <span class="capitalize text-xs md:text-xl mb-[10px] leading-6 truncate font-semibold">{{ $item->title }}</span>
    </section>
</a>