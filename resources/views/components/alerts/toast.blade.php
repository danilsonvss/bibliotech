@php
    $types = [
        'success' => [
            'bg' => 'bg-green-100',
            'text' => 'text-green-800',
            'icon' => 'x-icons.success',
        ],
        'error' => [
            'bg' => 'bg-red-100',
            'text' => 'text-red-800',
            'icon' => 'x-icons.error',
        ],
        'warning' => [
            'bg' => 'bg-yellow-100',
            'text' => 'text-yellow-800',
            'icon' => 'x-icons.warning',
        ],
        'info' => [
            'bg' => 'bg-blue-100',
            'text' => 'text-blue-800',
            'icon' => 'x-icons.info',
        ],
    ];

    $toastType = collect(['success', 'error', 'warning', 'info'])->first(fn($type) => session()->has($type));
    $message = session($toastType);
@endphp

@if ($toastType && $message)
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition
        class="fixed top-5 right-5 z-50 w-full max-w-sm p-4 rounded-lg shadow-lg flex items-start gap-3 {{ $types[$toastType]['bg'] }} border {{ $types[$toastType]['text'] }}"
        role="alert">

        @component($types[$toastType]['icon'])

            <div class="flex-1 text-sm">
                {{ $message }}
            </div>

            <button @click="show = false" class="ml-2 hover:opacity-75">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
