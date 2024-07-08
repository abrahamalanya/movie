@props(['value' => ''])
<textarea {{ $attributes->merge(['class' => 'w-full bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500 rounded-lg text-sm']) }}>
    {{ $value }}
</textarea>
