{{-- <section class="w-full md:w-[400px] md:px-8 shrink-0">
    <div class="relative w-full aspect-[1/1.5] bg-cover bg-center flex items-end justify-between p-[10px]">
        <img src="https://image.tmdb.org/t/p/original/4vc8wOf2yG9TiXoJpvz2fJHOmHA.jpg" alt="" class="absolute top-0 left-0 w-full h-full rounded-xl overflow-hidden">
    </div>
</section> --}}
<section class="w-full md:w-[800px] md:px-8 shrink-0">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/xLetJpcjHS0?si=ZE9EPeJ585Z092g1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="w-full h-[600px]"></iframe>
</section>
<section class="flex flex-col justify-between items-start">
    <article>
        <h3 class="text-5xl font-semibold">{{ $movie->title }} ({{ $movie->release_date }})</h3>
        {{-- <h4 class="text-slate-700 text-2xl font-bold">The future of humanity is in her hands.</h4> --}}
    </article>
    <article class="w-full relative flex gap-[5px] flex-wrap">
        @foreach ($movie->genres as $item)
            <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap">{{ $item->name }}</span>
            {{-- <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap">Action</span>
            <span class="relative flex flex-wrap justify-end bg-red-500 py-[3px] px-[5px] text-xs rounded text-white whitespace-nowrap">Adventure</span> --}}
        @endforeach
    </article>
    {{-- <article class="relative bg-white text-slate-900 rounded-full border-2">
        <div class="relative w-10 h-10 md:w-[80px] md:h-[80px] rounded-full border-4 border-yellow-600 p-[4px] flex justify-center content-center">
            <span class="text-[1rem] md:text-[2.5rem] font-bold">7.3</span>
        </div>
    </article> --}}
    <article>
        <h5 class="text-3xl font-bold">Synopsis</h5>
        <p class="mb-5 text-lg font-normal leading-normal">{{ $movie->synopsis }}</p>
        <div class="py-2 flex gap-4 border border-transparent border-b-slate-800">
            {{-- <div>
                <span class="text-lg font-bold">Status:</span>
                <span class="text-gray-400 text-lg font-bold">Released</span>
            </div> --}}
            <div>
                <span class="text-lg font-bold">Release Date:</span>
                <span class="text-gray-400 text-lg font-bold">{{ $movie->release_date }}</span>
            </div>
            {{-- <div>
                <span class="text-lg font-bold">Runtime:</span>
                <span class="text-gray-400 text-lg font-bold">2h</span>
            </div> --}}
        </div>
        {{-- <div class="py-2 flex gap-4 border border-transparent border-b-slate-800">
            <div>
                <span class="text-lg font-bold">Director:</span>
                <span class="text-gray-400 text-lg font-bold">Brad Peyton</span>
            </div>
        </div>
        <div class="py-2 flex gap-4 border border-transparent border-b-slate-800">
            <div>
                <span class="text-lg font-bold">Writer:</span>
                <span class="text-gray-400 text-lg font-bold">Leo Sardarian, Aron Eli Coleite</span>
            </div>
        </div> --}}
    </article>
</section>
