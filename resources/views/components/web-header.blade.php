<header class="w-full h-[60px] fixed z-[10] flex items-center bg-slate-900/[0.9]">
    <x-web-container class="flex items-center justify-between">
        <div>
            <a href="/" class="h-[50px]">
                <img src="{{ asset('assets/movix-logo.svg') }}" alt="">
            </a>
        </div>
        <div class="flex gap-5 items-center">
            <x-ui.link :href="url('/')" :value="__('messages.home')" />
            <x-ui.link :href="url('/?type=film')" :value="__('messages.movies')" />
            <x-ui.link :href="url('/?type=serie')" :value="__('messages.series')" />
            @if (Route::has('login'))
                @auth
                    <x-ui.link :href="route('dashboard')" class="text-cyan-300" :value="__('messages.profile')" />
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center p-1 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-200 bg-gray-800 hover:text-cyan-400 focus:outline-none transition ease-in-out duration-150">
                                    <div class="flex gap-2 items-center">
                                        <img alt="{{ explode(' ', auth()->user()->name)[0] }}"
                                            class="w-[30px] h-[30px] object-cover rounded-full overflow-hidden"
                                            @if(auth()->user()->avatar) src="{{ asset('storage/'.auth()->user()->avatar) }}" @else src="{{ asset('assets/avatar.png') }}" @endif>
                                        <div>{{ explode(' ', auth()->user()->name)[0] }}</div>
                                    </div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                @role(['system', 'backoffice'])
                                    <x-dropdown-link :href="route('movie.index')">
                                        {{ __('Administrar Películas') }}
                                    </x-dropdown-link>
                                @endrole
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('messages.edit') }} {{ __('messages.account') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('messages.logout') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    {{-- Enlace anterior --}}
                    {{-- <a href="{{ url('login') }}" class="mx-[15px] text-red-400 font-bold hover:text-white">{{ __('messages.login') }}</a> --}}

                    <x-ui.link 
                        class="text-cyan-300"
                        :value="__('messages.login')"
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'open-login')" />
                    <x-ui.modal name="open-login" maxWidth="sm" :show="$errors->any()" focusable>
                        <x-auth.form-login />
                    </x-ui.modal>

                    {{-- @if (Route::has('register'))
                        <a href="{{ url('register') }}" class="mx-[15px] text-red-400 font-bold hover:text-white">{{ __('messages.register') }}</a>
                    @endif --}}
                @endauth
            @endif
        </div>
    </x-web-container>
</header>