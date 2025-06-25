@props(['active' => false])

<li>
    <a {{ $attributes->merge(['class' => "nav-item flex flex-row items-center gap-2 text-white text-sm hover:{} p-1 rounded"]) }}>
        {{ $slot }}
    </a>
</li>
