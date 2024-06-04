<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/606c0d38bd.js" crossorigin="anonymous"></script>
</head>
<body class="bg-slate-900 text-white">
    <x-web-header></x-web-header>
    <x-web-main>
        @yield('main')
    </x-web-main>
    <x-web-footer></x-web-footer>
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