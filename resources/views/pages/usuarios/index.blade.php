<x-layout title="Usuários" page-title="Usuários">
    <x-pages.page-actions>
        <x-pages.page-breadcrumbs>
            <x-pages.breadcrumb-item>
                <a href="{{ route('home') }}" class="text-blue-500">Início</a>
            </x-pages.breadcrumb-item>

            <x-pages.breadcrumb-divider />

            <x-pages.breadcrumb-item>
                Usuários
            </x-pages.breadcrumb-item>
        </x-pages.page-breadcrumbs>

        <a href="{{ route('usuarios.create') }}">
            <x-buttons.accent-button>
                <div class="icon">
                    <x-icons.book-plus />
                </div>
                <span class="hidden sm:inline-block text-xs">Novo livro</span>
            </x-buttons.accent-button>
        </a>
    </x-pages.page-actions>

    <div class="flex flex-row items-center gap-1 my-4">
        <form class="flex flex-row items-center flex-1 h-full border border-gray-400 rounded py-0">
            <input type="text" class="w-full py-2 px-1 h-full" placeholder="Digite aqui sua busca" name="busca" />
            <div class="flex flex-row gap-3 items-center p-1">
                <x-buttons.accent-button>
                    <div class="icon">
                        <x-icons.search />
                    </div>
                </x-buttons.accent-button>
            </div>
        </form>
    </div>

    <div class="my-5">
        {{ $usuarios }}
    </div>
</x-layout>
