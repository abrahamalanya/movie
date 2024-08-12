<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'WankaPlus') }} - @yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/606c0d38bd.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css">
        <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>

        {{-- Jquery --}}
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        {{-- Select2 --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <style>
            .select2-container--default .select2-selection--single {
                background-color: rgb(55 65 81);
                border-color: rgb(75 85 99);
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #fff;
            }
            .select2-search--dropdown,
            .select2-container--default .select2-search--dropdown .select2-search__field {
                background-color: rgb(55 65 81);
            }
            .select2-results {
                background-color: rgb(15 23 42);
            }
            .select2-container--default .select2-results__option--selected {
                background-color: rgb(55 65 81);
            }
        </style>
    </head>
    <body class="bg-slate-900 text-white">
        {{-- message status --}}
        @if (session('success'))
            {{-- <x-web-container class="relative py-4"> --}}
                <x-backoffice.alert class="absolute z-20 top-0 right-0 font-medium">
                    {{ session('success') }}
                </x-backoffice.alert>
            {{-- </x-web-container> --}}
        @endif

        <x-web-header></x-web-header>
        <x-web-main>
            @yield('main')
        </x-web-main>
        <x-web-footer></x-web-footer>
        {{-- message status --}}
        {{-- @if (session('success'))
            <x-web-container class="">
                {{ session('success') }}
            </x-web-container>
        @endif --}}
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
        @yield('script')
    </body>
</html>