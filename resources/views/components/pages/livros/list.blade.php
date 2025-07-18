<ul class="list-none gap-3">
    @foreach ($livros as $livro)
        <li class="flex flex-row items-center justify-between px-2 py-2 hover:bg-zinc-700 rounded">
            <div class="flex flex-col">
                {{ $livro->titulo }}
                <span class="text-xs text-sky-500 font-bold">{{ $livro->numero_registro }}</span>
            </div>
            <div class="flex gap-2 items-center">
                <a href="{{ route('livros.edit', $livro) }}">
                    <x-buttons.ghost-button>
                        <div class="icon">
                            <x-icons.edit />
                        </div>
                    </x-buttons.ghost-button>
                </a>

                {{-- Botão excluir sem formulário --}}
                <form action="{{ route('livros.destroy', $livro) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <x-buttons.ghost-button class="excluir-btn text-red-500 hover:text-red-800 cursor-pointer">
                        <div class="icon text-red-400">
                            <x-icons.trash />
                        </div>
                    </x-buttons.ghost-button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

<x-pages.empty :items="$livros" name="livro" />
