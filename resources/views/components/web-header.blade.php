<header class="w-full h-[60px] fixed z-[10] flex items-center bg-slate-900/[0.9]">
    <x-web-container class="flex items-center justify-between">
        <div>
            <a href="/" class="h-[50px]">
                <img src="{{ asset('assets/movix-logo.svg') }}" alt="">
            </a>
        </div>
        <div class="flex">
            <a href="{{ url('/') }}" class="mx-[15px] text-white font-bold hover:text-red-400">Home</a>
            <a href="{{ url('movie') }}" class="mx-[15px] text-white font-bold hover:text-red-400">Movies</a>
            <a href="{{ url('movie') }}" class="mx-[15px] text-white font-bold hover:text-red-400">Series</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="mx-[15px] text-red-400 font-bold hover:text-white">Dashboard</a>
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
        
                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
        
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{ url('login') }}" class="mx-[15px] text-red-400 font-bold hover:text-white">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ url('register') }}" class="mx-[15px] text-red-400 font-bold hover:text-white">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </x-web-container>
</header>