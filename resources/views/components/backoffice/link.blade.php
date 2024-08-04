@props(['value', 'href'])

<a href="{{ $href ?? 'javascript:;' }}" {{ $attributes->merge(['class' => 'text-white hover:text-blue-600 font-medium text-sm']) }}>
    {{ $value ?? $slot }}
</a>