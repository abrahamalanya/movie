<button {{ $attributes->merge(['class' => 'w-[50px] h-[50px] bg-gradient-to-r from-cyan-500 to-cyan-800 rounded-full hover:bg-gradient-to-l
    hidden xl:block absolute top-[44%] text-[30px] cursor-pointer opacity-100 z-[1] -translate-y-1/2']) }}>
    {{ $slot }}
</button>