@props(['value'])

<x-web-container x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="relative">
    <div {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400']) }} role="alert">
        {{ $value ?? $slot }}
    </div>
</x-web-container>
