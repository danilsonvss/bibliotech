<x-layout title="Cadastrar livro" page-title="Cadastrar livro">
    <x-pages.page-actions>
        <x-pages.page-breadcrumbs>
            <x-pages.breadcrumb-item>
                <a href="{{ route('home') }}" class="text-sky-500">Início</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                <a href="{{ route('livros.index') }}" class="text-sky-500">Livros</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                Cadastrar livro
            </x-pages.breadcrumb-item>
        </x-pages.page-breadcrumbs>

        <x-buttons.back-button href="{{ route('livros.index') }}" />
    </x-pages.page-actions>

    <x-pages.livros.form :generos="$generos" />
</x-layout>
