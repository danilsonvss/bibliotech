<x-layout title="Usuários" page-title="Usuários">
    <x-pages.page-actions>
        <x-pages.page-breadcrumbs>
            <x-pages.breadcrumb-item>
                <a href="{{ route('home') }}" class="text-sky-500">Início</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                Usuários
            </x-pages.breadcrumb-item>
        </x-pages.page-breadcrumbs>

        <a href="{{ route('usuarios.create') }}">
            <x-buttons.ghost-button>
                <div class="icon">
                    <x-icons.user-plus />
                </div>
                <span class="hidden sm:inline-block text-xs">Novo usuário</span>
            </x-buttons.ghost-button>
        </a>
    </x-pages.page-actions>

    <x-form-busca />

    <div class="my-5">
        {{ $usuarios }}
    </div>
</x-layout>
