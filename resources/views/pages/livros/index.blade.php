<x-layout title="Livros" page-title="Livros">
    <x-pages.page-actions>
        <x-pages.page-breadcrumbs>
            <x-pages.breadcrumb-item>
                <a href="{{ route('home') }}" class="text-blue-500">Início</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                Livros
            </x-pages.breadcrumb-item>
        </x-pages.page-breadcrumbs>

        <a href="{{ route('livros.create') }}">
            <x-buttons.accent-button>
                <div class="icon">
                    <x-icons.book-plus />
                </div>
                <span class="hidden sm:inline-block text-xs">Novo livro</span>
            </x-buttons.accent-button>
        </a>
    </x-pages.page-actions>

    <x-form-busca />

    {{ $livros }}

</x-layout>
