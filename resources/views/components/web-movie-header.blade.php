<section>
    <h3 class="text-5xl font-semibold uppercase">{{ $movie->title }}</h3>
    <h5 class="text-2xl">{{ __(Carbon\Carbon::parse($movie->release_date)->format('Y')) }}</h5>
</section>
<section class="flex flex-row gap-4">
    <section class="w-full md:w-[900px] shrink-0">
        @php
            $origin = request()->getSchemeAndHttpHost();
        @endphp
        <div class="plyr__video-embed" id="player">
            @if($movie->url != '')
                <iframe 
                    src="{{ $movie->url }}?origin={{ $origin }}&iv_load_policy=3&modestbranding=1&rel=0"
                    allowfullscreen
                    allow="autoplay">
                </iframe>
            @endif
        </div>
    </section>
    <section class="flex flex-col items-start">
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
                        {{-- allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" --}}
                        {{-- referrerpolicy="strict-origin-when-cross-origin" --}}
                        {{-- allowfullscreen --}}
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
        <article class="">
            <h5 class="text-3xl font-bold">Synopsis</h5>
            <p class="mb-5 text-lg font-normal leading-normal">{{ $movie->synopsis }}</p>
        </article>
    </section>
</section>
<script>
    const player = new Plyr('#player', {
        youtube: {
            noCookie: true,
            rel: 0,
            showinfo: 0
        }
    });
</script>
