@props(['value'])

<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show" {{ $attributes->merge(['class' => 'p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400']) }} role="alert">
    {{ $value ?? $slot }}
</div>