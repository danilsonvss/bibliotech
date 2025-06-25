<x-layout title="Empréstimos" page-title="Empréstimos">
    <x-pages.page-actions>
        <x-pages.page-breadcrumbs>
            <x-pages.breadcrumb-item>
                <a href="{{ route('home') }}" class="text-blue-500">Início</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                Empréstimos
            </x-pages.breadcrumb-item>
        </x-pages.page-breadcrumbs>

        <a href="{{ route('emprestimos.create') }}">
            <x-buttons.accent-button>
                <div class="icon">
                    <x-icons.book-up />
                </div>
                <span class="hidden sm:inline-block text-xs">Novo empréstimo</span>
            </x-buttons.accent-button>
        </a>
    </x-pages.page-actions>

    <x-form-busca />

    <div class="my-5">
        {{ $emprestimos }}
    </div>
</x-layout>
