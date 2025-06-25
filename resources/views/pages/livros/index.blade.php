<x-layout title="Livros" page-title="Livros">
    <x-pages.page-actions>
        <x-pages.page-breadcrumbs>
            <x-pages.breadcrumb-item>
                <a href="{{ route('home') }}" class="text-sky-500">Início</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                Livros
            </x-pages.breadcrumb-item>
        </x-pages.page-breadcrumbs>

        <a href="{{ route('livros.create') }}">
            <x-buttons.ghost-button>
                <div class="icon">
                    <x-icons.book-plus />
                </div>
                <span class="hidden sm:inline-block text-xs">Novo livro</span>
            </x-buttons.ghost-button>
        </a>
    </x-pages.page-actions>

    <x-form-busca />

    <x-pages.livros.list :livros="$livros" />

</x-layout>
