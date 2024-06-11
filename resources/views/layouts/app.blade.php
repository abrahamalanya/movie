<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Movie') }} - @yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/606c0d38bd.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-slate-900 text-white">
        <x-web-header></x-web-header>
        <x-web-main>
            @yield('main')
        </x-web-main>
        <x-web-footer></x-web-footer>
        <script>
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