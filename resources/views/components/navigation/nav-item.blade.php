@php
    $active= url()->current() === $href;
    $textColor = boolval($active) === true ? 'text-indigo-500' : 'text-white';
    $bgColor = $active ? ' bg-white' : '';
    $classes = "nav-item flex flex-row items-center $bgColor $textColor gap-2 text-sm hover:bg-indigo-400 hover:text-white p-1 px-2 rounded";
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
