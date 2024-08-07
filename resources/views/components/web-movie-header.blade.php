<section class="w-full md:w-[900px] md:px-8 shrink-0">
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
<section class="flex flex-col justify-between items-start">
    <article>
        <h3 class="text-5xl font-semibold uppercase">{{ $movie->title }}</h3>
        <article class="w-full relative flex gap-[5px] flex-wrap mt-4">
            @foreach ($movie->genres as $item)
                <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap">{{ $item->name }}</span>
            @endforeach
        </article>
    </article>
    <article>
        <h5 class="text-3xl font-bold">Synopsis</h5>
        <p class="mb-5 text-lg font-normal leading-normal">{{ $movie->synopsis }}</p>
    </article>
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
