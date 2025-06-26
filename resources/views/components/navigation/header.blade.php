<header class="header h-[50px] sticky bg-indigo-500 py-2 shadow-md">
    <x-container>
        <div class="flex flex-row gap-1 justify-between">
            <h1 class="text-2xl text-white font-bold">
                Biblio<strong class="font-light">tech</strong>
            </h1>

            <x-navigation.navbar>
                <x-navigation.nav-item href="{{ route('emprestimos.index') }}">
                    <x-icons.book-ups />
                    <span class="hidden sm:inline-block">Empréstimos</span>
                </x-navigation.nav-item>

                <x-navigation.nav-item href="{{ route('usuarios.index') }}">
                    <x-icons.users />
                    <span class="hidden sm:inline-block">Usuários</span>
                </x-navigation.nav-item>

                <x-navigation.nav-item href="{{ route('livros.index') }}">
                    <x-icons.books />
                    <span class="hidden sm:inline-block">Livros</span>
                </x-navigation.nav-item>
            </x-navigation.navbar>
        </div>
    </x-container>
</header>
