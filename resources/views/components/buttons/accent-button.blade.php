<button
    {{ $attributes->merge(['class' => 'flex flex-row justify-center items-center text-center rounded bg-sky-500 hover:bg-sky-400 text-white text-center shadow-md p-1 cursor-pointer items-center']) }}>
    {{ $slot }}
</button>
