<section class="flex justify-between">
    <h3 class="text-2xl font-semibold uppercase">{{ $movie->title }}</h3>
    <x-backoffice.link-button :href="url('/')" :value="__('Regresar')" />
</section>
<section class="flex flex-col gap-4">
    <section class="shrink-0">
        @if($movie->url != '')
            @if(str_contains($movie->url, 'youtube') || str_contains($movie->url, 'youtu.be'))
                <div class="plyr__video-embed" id="player">
                    <iframe
                        src="{{ $movie->url }}?origin={{ request()->getSchemeAndHttpHost() }}&iv_load_policy=3&modestbranding=1&rel=0"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>
                </div>
            @elseif(Str::endsWith($movie->url, ['.mp4', '.mkv']))
                <video id="player"
                    playsinline controls
                    data-poster="{{ asset('storage/'.$movie->poster) }}"
                    class="w-full h-[700px]">
                    @if(Str::endsWith($movie->url, '.mp4'))
                        <source src="{{ $movie->url }}" type="video/mp4" />
                    @elseif(Str::endsWith($movie->url, '.mkv'))
                        <source src="{{ $movie->url }}" type="video/mkv" />
                    @endif
                </video>
            @endif
        @endif
    </section>
    <section class="flex gap-2">
        <section class="w-1/6">
            <a href="javascript:;" class="w-[150px] cursor-pointer md:w-[calc(25%-15px)] lg:w-[calc(20%-16px)] shrink-0">
                <section class="relative w-full aspect-[1/1.5] bg-cover bg-center mb-[10px] flex items-end justify-between p-[10px]">
                    <img alt="{{ $movie->title }}"
                        class="absolute top-0 left-0 w-full h-full object-cover rounded-xl overflow-hidden"
                        @if($movie->poster) src="{{ asset('storage/'.$movie->poster) }}" @else src="{{ asset('assets/no-poster.png') }}" @endif>
                    <section class="w-full relative">
                        <div class="w-[53px] h-[53px] text-xs bg-cyan-600 rounded-full flex flex-col justify-center items-center">
                            @if ($movie->type === 1)
                            <i class="fa-solid fa-film"></i> {{ __('Película') }}
                            @else
                            <i class="fa-solid fa-clapperboard"></i> {{ __('Serie') }}
                            @endif
                        </div>
                    </section>
                    <section class="w-full relative flex gap-[5px] flex-wrap justify-end left-[-20px] md:left-[5px]">
                        @foreach ($movie->genres as $genre)
                            <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap lowercase">
                                {{ $genre->name }}
                            </span>
                        @endforeach
                    </section>
                </section>
            </a>
        </section>
        <section class="flex flex-col items-start w-5/6">
            <article>
                <h5 class="text-2xl">{{ __(Carbon\Carbon::parse($movie->release_date)->format('Y')) }}</h5>
            </article>
            <article>
                <button class="w-[100px] h-[40px] rounded-r-[30px] text-base outline-none border-none font-medium bg-gradient-to-r hover:bg-gradient-to-l from-cyan-500 to-cyan-800"
                    type="button"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'open-trailer')">
                    {{ __('Ver Trailer') }}
                </button>
                <x-ui.modal name="open-trailer">
                    <section class="h-[500px]">
                        @php $videoId = basename($movie->trailer) @endphp
                        <iframe
                            src="https://www.youtube.com/embed/{{ $videoId }}?si=VGO6llKfPfyIUCyd"
                            title="{{ $movie->title }}"
                            frameborder="0"
                            class="w-full h-full"></iframe>
                    </section>
                </x-ui.modal>
            </article>
            <article>
                <article class="w-full relative flex gap-[5px] flex-wrap mt-4">
                    @foreach ($movie->genres as $item)
                        <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap">{{ $item->name }}</span>
                    @endforeach
                </article>
            </article>
            <article class="flex flex-col gap-2">
                <h5 class="text-3xl font-bold">Synopsis</h5>
                <p class="mb-5 text-lg font-normal leading-normal overflow-y-auto h-32">{{ $movie->synopsis }}</p>
            </article>
        </section>
    </section>
</section>
<script>
    const player = new Plyr('#player');
</script>
