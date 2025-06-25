<header class="header sticky bg-indigo-500 p-3 shadow-md">
    <x-container>
        <div class="flex flex-row gap-1 justify-between">
            <h1 class="text-2xl text-white font-bold">Biblio<strong class="font-light">tech</strong></h1>
            <nav>
                <ul class="navbar flex flex-row gap-3 list-none">
                    <li>
                        <a href="{{ route('home') }}" class="nav-item flex flex-row items-center gap-2 text-white text-sm hover:bg-indigo-400 p-1 rounded">
                            <x-icons.home /> <span class="hidden sm:inline-block">Início</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('emprestimos.index') }}" class="nav-item flex flex-row items-center gap-2 text-white text-sm hover:bg-indigo-400 p-1 rounded">
                            <x-icons.book-up /> <span class="hidden sm:inline-block">Empréstimos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('usuarios.index') }}" class="nav-item flex flex-row items-center gap-2 text-white text-sm hover:bg-indigo-400 p-1 rounded">
                            <x-icons.users /> <span class="hidden sm:inline-block">Usuários</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('livros.index') }}" class="nav-item flex flex-row items-center gap-2 text-white text-sm hover:bg-indigo-400 p-1 rounded">
                            <x-icons.books /> <span class="hidden sm:inline-block">Livros</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </x-container>
</header>
