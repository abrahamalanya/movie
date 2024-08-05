<footer class="py-5">
    <x-web-container class="flex justify-center">
        {{-- <ul class="list-none flex items-center justify-center gap-4 md:gap-[30px] mb-5 md:mb-[30px]">
            <li class="cursor-pointer text-xs md:text-base hover:text-red-400 duration-200">Terms Of Use</li>
            <li class="cursor-pointer text-xs md:text-base hover:text-red-400 duration-200">Privacy-Policy</li>
            <li class="cursor-pointer text-xs md:text-base hover:text-red-400 duration-200">About</li>
            <li class="cursor-pointer text-xs md:text-base hover:text-red-400 duration-200">Blog</li>
            <li class="cursor-pointer text-xs md:text-base hover:text-red-400 duration-200">FAQ</li>
        </ul>
        <div class="text-center text-xs md:text-sm leading-5 opacity-50 max-w-[800px] mb-5 md:mb-[30px]">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                Nam qui voluptatem explicabo vero sapiente, cum necessitatibus
                iusto dolor quam perspiciatis dolore numquam fugit, doloribus veniam ullam 
                velit facilis quos accusantium.</p>
        </div> --}}
        {{-- <ul class="flex items-center justify-center gap-3">
            <a href="/">
                <li class="w-[50px] h-[50px] rounded-full bg-black flex items-center justify-center cursor-pointer duration-300 hover:text-red-400 shadow-on-hoverIcon">B</li>
            </a>
            <a href="/">
                <li class="w-[50px] h-[50px] rounded-full bg-black flex items-center justify-center cursor-pointer duration-300 hover:text-red-400 shadow-on-hoverIcon">C</li>
            </a>
            <a href="/">
                <li class="w-[50px] h-[50px] rounded-full bg-black flex items-center justify-center cursor-pointer duration-300 hover:text-red-400 shadow-on-hoverIcon">D</li>
            </a>
        </ul> --}}
        <p>Desarrollado por <a href="{{ url('/') }}" class="font-bold duration-300 hover:text-red-400">{{ __('@') }}{{ config('app.name', 'HuancaPlus') }}</a></p>
    </x-web-container>
</footer>