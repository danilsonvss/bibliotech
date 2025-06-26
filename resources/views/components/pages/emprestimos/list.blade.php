<ul class="list-none gap-3">
    @foreach ($emprestimos as $emprestimo)
        <li class="flex flex-row items-center justify-between px-2 py-2 hover:bg-zinc-700 rounded">
            <div class="flex flex-col">
                {{ $emprestimo->livro->numero_registro }} - {{ $emprestimo->livro->titulo }}
                <span class="text-xs text-sky-500 font-bold">
                    {{ $emprestimo->usuario->email }}
                </span>
                <span
                    class="flex flex-row items-center justify-start text-xs text-zinc-400 font-bold {{ $emprestimo->atrasado() ? 'text-red-500' : 'text-red-500' }}">
                    @if ($emprestimo->devolvido)
                        <span class="flex flex-row items-center gap-1 icon text-green-500">
                            <x-icons.success /> Devolvido
                        </span>
                    @else
                        <span class="flex flex-row items-center gap-1 icon text-yellow-500">
                            <x-icons.warning /> Não devolvido
                        </span>
                    @endif

                    -

                    @if ($emprestimo->atrasado())
                        <span class="icon text-red-500">
                            Em atraso
                        </span>
                    @else
                        <span class="icon text-green-500">
                            Em dia
                        </span>
                    @endif
                </span>
                <span class="text-xs text-gray-400">
                    {{ $emprestimo->data_emprestimo->format('d/m/Y') }} -
                    {{ $emprestimo->data_limite_devolucao->format('d/m/Y') }}
                </span>
            </div>

            <div class="flex gap-2 items-center">
                <a href="{{ route('emprestimos.edit', $emprestimo) }}">
                    <x-buttons.ghost-button>
                        <div class="icon">
                            <x-icons.edit />
                        </div>
                    </x-buttons.ghost-button>
                </a>

                {{-- Botão excluir sem formulário --}}
                <form action="{{ route('emprestimos.destroy', $emprestimo) }}" method="post">
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

<x-pages.empty :items="$emprestimos" name="empréstimo" />
