@props(['data'])

@php
    $selected = old($attributes->get('name')) ?? request()->query($attributes->get('name'));
@endphp

<select {{ $attributes->merge(['class' => 'w-full text-sm rounded-lg bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500']) }}>
    <option value="">--Seleccionar--</option>
    @foreach ($data as $item)
        <option
            value="{{ $item->id }}"
            {{ (string) $selected === (string) $item->id ? 'selected' : '' }}>
            {{ $item->name }}
        </option>
    @endforeach
</select>
