<button
    {{ $attributes->merge(['class' => 'flex flex-row justify-center items-center text-center rounded font-bold text-sky-500 hover:bg-sky-200 text-center p-1 cursor-pointer items-center']) }}>
    {{ $slot }}
</button>
