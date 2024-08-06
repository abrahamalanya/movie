<form method="POST" action="{{ route('login') }}" class="p-6">
    @csrf

    <h3 class="font-black text-[50px] md:text-2xl mb-4">{{ __('messages.login') }}</h3>

    <!-- Email Address -->
    <div>
        <x-ui.label for="email" class="text-start">
            {{ __('messages.email') }}
        </x-ui.label>
        <x-ui.input type="email" name="email" id="email" :value="old('email')" required autofocus autocomplete="username" />
        @error('email')
            <x-ui.input-error>{{ $message }}</x-ui.input-error>
        @enderror
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-ui.label for="password" class="text-start">
            {{ __('messages.password') }}
        </x-ui.label>
        <x-ui.input type="password" name="password" id="password" required autocomplete="current-password" />
        @error('password')
            <x-ui.input-error>{{ $message }}</x-ui.input-error>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-ui.button type="submit" style="width: max-content;">
            {{ __('messages.login') }}
        </x-ui.button>
    </div>
</form>
