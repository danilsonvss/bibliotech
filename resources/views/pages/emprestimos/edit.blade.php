<x-layout title="Cadastrar emprestimo" page-title="Cadastrar emprestimo">
    <x-pages.page-actions>
        <x-pages.page-breadcrumbs>
            <x-pages.breadcrumb-item>
                <a href="{{ route('home') }}" class="text-sky-500">Início</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                <a href="{{ route('emprestimos.index') }}" class="text-sky-500">Livros</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                Alterar
            </x-pages.breadcrumb-item>
        </x-pages.page-breadcrumbs>

        <x-buttons.back-button href="{{ route('emprestimos.index') }}" />
    </x-pages.page-actions>

    <x-pages.emprestimos.form :usuarios="$usuarios" :livros="$livros" :emprestimo="$emprestimo" />
</x-layout>
