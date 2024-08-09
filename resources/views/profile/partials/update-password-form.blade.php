<section>
    <header>
        <h2 class="text-lg font-medium text-gray-100">
            {{ __('Actualizar Contraseña') }}
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-400">
            {{ __('Utilice una contraseña larga y aleatoria por seguridad.') }}
        </p> --}}
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6">
        @csrf
        @method('put')

        <div class="mb-4">
            <x-ui.label for="update_password_current_password">
                {{ __('Contraseña Actual') }}
            </x-ui.label>
            <x-ui.input type="password"
                name="update_password_current_password"
                id="update_password_current_password"
                autocomplete="current-password" />
            @error('update_password_current_password')
                <x-ui.input-error>{{ $message }}</x-ui.input-error>
            @enderror
        </div>

        <div class="mb-4">
            <x-ui.label for="update_password_password">
                {{ __('Nueva Contraseña') }}
            </x-ui.label>
            <x-ui.input type="password"
                name="update_password_password"
                id="update_password_password"
                autocomplete="new-password" />
            @error('update_password_password')
                <x-ui.input-error>{{ $message }}</x-ui.input-error>
            @enderror
        </div>

        <div class="mb-4">
            <x-ui.label for="update_password_password_confirmation">
                {{ __('Confirmar Contraseña') }}
            </x-ui.label>
            <x-ui.input type="password"
                name="update_password_password_confirmation"
                id="update_password_password_confirmation"
                autocomplete="new-password" />
            @error('update_password_password_confirmation')
                <x-ui.input-error>{{ $message }}</x-ui.input-error>
            @enderror
        </div>

        @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-400"
            >{{ __('Contraseña Actualizada.') }}</p>
        @endif
        <x-ui.button type="submit">
            {{ __('Guardar') }}
        </x-ui.button>
    </form>
</section>
