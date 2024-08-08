<select {{ $attributes->merge(['class' => 'w-full text-sm rounded-lg bg-gray-700 border border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500']) }}>
    {{ $slot }}
</select>
