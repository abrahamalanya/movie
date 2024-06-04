<header class="w-full h-[60px] fixed z-[10] flex items-center bg-slate-900/[0.9]">
    <x-web-container class="flex items-center justify-between">
        <div>
            <a href="/" class="h-[50px]">
                <img src="{{ asset('assets/movix-logo.svg') }}" alt="">
            </a>
        </div>
        <div class="flex">
            <a href="{{ url('movie') }}" class="mx-[15px] text-white font-bold hover:text-red-400">Movie</a>
        </div>
    </x-web-container>
</header>