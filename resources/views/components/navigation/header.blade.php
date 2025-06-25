<header class="header sticky bg-indigo-500 p-3 shadow-md">
    <x-container>
        <div class="flex flex-row gap-1 justify-between">
            <h1 class="text-2xl text-white font-bold">
                Biblio<strong class="font-light">tech</strong>
            </h1>

            <x-navigation.navbar>
                <x-navigation.nav-item href="{{ route('home') }}">
                    <x-icons.home />
                    <span class="hidden sm:inline-block">Início</span>
                </x-navigation.nav-item>

                <x-navigation.nav-item href="{{ route('emprestimos.index') }}">
                    <x-icons.book-up />
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
