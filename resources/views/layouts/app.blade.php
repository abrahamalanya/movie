<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white">
    <header class="w-full h-[60px] fixed z-[10] flex items-center bg-slate-900/[0.9]">
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
    <main class="">
        <article class="w-full h-[450px] md:h-[700px] flex items-center relative">
            <section class="w-full h-full absolute top-0 left-0 opacity-25 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1536440136628-849c177e76a1?q=80&w=1925&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt=""
                    class="absolute top-0 left-0 object-none object-center"> {{-- w-full h-full --}}
            </section>
            <div class="w-full h-[250px] absolute left-0 bottom-0 bg-gradient-to-t from-slate-900"></div>
            <section class="w-full max-w-[1200px] mx-auto px-5">
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
            </section>
        </article>
        <article class="relative mb-[70px]">
            @for ($j = 0; $j < 4; $j++)
                <section class="w-full max-w-[1200px] mx-auto px-5 flex items-center justify-between mb-5">
                    <span class="text-2xl text-normal">Trending</span>
                    <section class="h-[34px] bg-white rounded-[20px] p-[2px]">
                        <div class="flex items-center h-[30px] relative">
                            <span class="h-full flex text-black items-center justify-center w-[100px] text-sm relative z-[1] cursor-pointer">aaaa</span>
                        </div>
                    </section>
                </section>
                <section class="w-full max-w-[1200px] mx-auto px-5 mb-[50px] relative">
                    <div class="hidden xl:block absolute top-[44%] left-[-2%] text-[30px] cursor-pointer opacity-50 z-[1] hover:opacity-80 -translate-y-1/2" onclick="navigation({{$j}}, 'left')"><</div>
                    <div class="hidden xl:block absolute top-[44%] right-[-2%] text-[30px] cursor-pointer opacity-50 z-[1] hover:opacity-80 -translate-y-1/2" onclick="navigation({{$j}}, 'right')">></div>
                    <section class="flex gap-3 md:gap-5 -mr-5 -ml-5 px-5 md:m-0 md:p-0 overflow-y-hidden xl:overflow-hidden rounded-2xl relative" id="carouselContainer{{$j}}">
                        @for ($i = 0; $i < 20; $i++)
                            <div class="w-[125px] cursor-pointer md:w-[calc(25%-15px)] lg:w-[calc(20%-16px)] shrink-0">
                                <div class="relative w-full aspect-[1/1.5] bg-cover bg-center mb-[30px] flex items-end justify-between p-[10px]">
                                    <img src="https://image.tmdb.org/t/p/original/4vc8wOf2yG9TiXoJpvz2fJHOmHA.jpg" alt="" class="absolute top-0 left-0 w-full h-full rounded-xl overflow-hidden">
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-xs md:text-xl mb-[10px] leading-6 truncate">Challengers</span>
                                    <span class="text-[14px] opacity-50">Apr 18, 2024</span>
                                </div>
                            </div>
                        @endfor
                    </section>
                </section>
            @endfor
        </article>
    </main>
    <footer class="bg-black py-[50px] text-white relative">
        <section class="w-full max-w-[1200px] mx-auto px-5 flex flex-col items-center">
            <ul class="list-none flex items-center justify-center gap-4 md:gap-[30px] mb-5 md:mb-[30px]">
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
            </div>
            <ul class="flex items-center justify-center gap-3">
                <a href="/">
                    <li class="w-[50px] h-[50px] rounded-full bg-black flex items-center justify-center cursor-pointer duration-300 hover:text-red-400 shadow-on-hoverIcon">A</li>
                </a>
                <a href="/">
                    <li class="w-[50px] h-[50px] rounded-full bg-black flex items-center justify-center cursor-pointer duration-300 hover:text-red-400 shadow-on-hoverIcon">B</li>
                </a>
                <a href="/">
                    <li class="w-[50px] h-[50px] rounded-full bg-black flex items-center justify-center cursor-pointer duration-300 hover:text-red-400 shadow-on-hoverIcon">C</li>
                </a>
                <a href="/">
                    <li class="w-[50px] h-[50px] rounded-full bg-black flex items-center justify-center cursor-pointer duration-300 hover:text-red-400 shadow-on-hoverIcon">D</li>
                </a>
            </ul>
        </section>
        <article class="">

        </article>
    </footer>
    <script>
        // Suponiendo que tu contenedor del carrusel tenga el ID 'carouselContainer'
        const navigation = (key, dir) => {
            const container = document.getElementById('carouselContainer'+key);

            const scrollAmount = 
                dir === "left" 
                    ? container.scrollLeft - (container.offsetWidth + 20)
                    : container.scrollLeft + (container.offsetWidth + 20);

            container.scrollTo({
                left: scrollAmount,
                behavior: "smooth",
            });
        };
    </script>
</body>
</html>