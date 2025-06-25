<x-layout title="Cadastrar usuário" page-title="Cadastrar usuário">
    <x-pages.page-actions>
        <x-pages.page-breadcrumbs>
            <x-pages.breadcrumb-item>
                <a href="{{ route('home') }}" class="text-sky-500">Início</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                <a href="{{ route('usuarios.index') }}" class="text-sky-500">Usuários</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                Cadastrar usuário
            </x-pages.breadcrumb-item>
        </x-pages.page-breadcrumbs>

        <x-buttons.back-button href="{{ route('usuarios.index') }}" />
    </x-pages.page-actions>

    <x-pages.usuarios.form />
</x-layout>
