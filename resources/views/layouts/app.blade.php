<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="w-full h-[60px] fixed z-[10] flex items-center">
        <nav class="w-full max-w-[1200px] mx-auto px-5 flex items-center justify-between">
            <div>
                <a href="/" class="h-[50px]">
                    <img src="{{ asset('assets/movix-logo.svg') }}" alt="">
                </a>
            </div>
            <div class="flex">
                <a href="/" class="mx-[15px] text-white font-bold hover:text-red-400">Movie</a>
                <a href="#" class="mx-[15px] text-white font-bold hover:text-red-400">Tv Shows</a>
            </div>
        </nav>
    </header>
    <main class="w-full h-[450px] md:h-[700px] flex items-center relative bg-slate-900 text-white">
        <article class="w-full max-w-[1200px] mx-auto px-5">
            <section class="max-w-[800px] mx-auto flex flex-col items-center text-center relative">
                <span class="font-black text-[50px] md:text-[90px] mb-[10px] md:mb-0">Welcome</span>
                <span class="font-medium text-[18px] md:text-[24px] mb-[40px]">
                    Millons of movies , TV shows and people to discover.
                    Explore Now.
                </span>
                <section class="w-full flex items-center">
                    <input type="text" placeholder='Search for movie or tv shows....'
                        class="w-[calc(100%-100px)] md:w-[calc(100%-150px)] h-[50px] md:h-[60px] bg-white text-black px-[15px] md:px-[30px]
                        rounded-l-[30px] text-[14px] md:text-[20px] outline-none border-none font-medium">
                    <button class="w-[100px] md:w-[150px] h-[50px] md:h-[60px]
                        rounded-r-[30px] text-[18px] md:text-[20px] outline-none border-none font-medium bg-gradient-to-r from-orange-400 to-red-500">Search</button>
                </section>
            </section>
        </article>
    </main>
</body>
</html>