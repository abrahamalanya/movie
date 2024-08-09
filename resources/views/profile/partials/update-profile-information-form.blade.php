<section>
    <header>
        <h2 class="text-lg font-medium text-gray-100">
            {{ __('Actualizar Información') }}
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-400">
            {{ __("Actualice la información de su cuenta.") }}
        </p> --}}
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6">
        @csrf
        @method('patch')

        <div class="mb-4">
            <x-ui.label for="name">
                {{ __('Nombre') }}
            </x-ui.label>
            <x-ui.input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <x-ui.input-error>{{ $message }}</x-ui.input-error>
            @enderror
        </div>

        <div class="mb-4">
            <x-ui.label for="email">
                {{ __('messages.email') }}
            </x-ui.label>
            <x-ui.input type="text" name="email" id="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <x-ui.input-error>{{ $message }}</x-ui.input-error>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-cyan-400"
            >{{ __('Información  Actualizado.') }}</p>
        @endif
        <x-ui.button type="submit">
            {{ __('Actualizar') }}
        </x-ui.button>
    </form>
</section>
