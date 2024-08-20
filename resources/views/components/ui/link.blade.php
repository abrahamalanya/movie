@props(['value', 'href'])

<a href="{{ $href ?? 'javascript:;' }}" {{ $attributes->merge(['class' => 'hover:text-cyan-500 font-bold']) }}>
    {{ $value ?? $slot }}
</a>