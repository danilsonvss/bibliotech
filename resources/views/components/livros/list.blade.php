<ul class="list-none gap-3">
    @foreach ($livros as $livro)
        <li class="flex flex-row items-center justify-between px-2 py-2 hover:bg-zinc-300 rounded">
            {{ $livro->titulo }}
            <a href="{{ route('livros.edit', $livro) }}">
                <x-buttons.ghost-button>
                    <div class="icon">
                        <x-icons.edit />
                    </div>
                </x-buttons.ghost-button>
            </a>
        </li>
    @endforeach
</ul>
