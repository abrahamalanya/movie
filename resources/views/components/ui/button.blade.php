<button {{ $attributes->merge(['class' => 'w-full font-medium rounded-lg text-sm text-center text-white px-5 py-2.5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800']) }}>
    {{ $slot }}
</button>
