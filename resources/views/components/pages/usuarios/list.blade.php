<ul class="list-none gap-3">
    @foreach ($usuarios as $usuario)
        <li class="flex flex-row items-center justify-between px-2 py-2 hover:bg-zinc-300 rounded">
            <div class="flex flex-col">
                {{ $usuario->nome }}
                <span class="text-xs text-sky-500 font-bold">{{ $usuario->email }}</span>
            </div>

            <div class="flex gap-2 items-center">
                <a href="{{ route('usuarios.edit', $usuario) }}">
                    <x-buttons.ghost-button>
                        <div class="icon">
                            <x-icons.edit />
                        </div>
                    </x-buttons.ghost-button>
                </a>

                {{-- Botão excluir sem formulário --}}
                <form action="{{ route('usuarios.destroy', $usuario) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <x-buttons.ghost-button class="excluir-btn text-red-500 hover:text-red-800 cursor-pointer"
                        data-titulo="{{ $usuario->titulo }}">
                        <div class="icon text-red-400">
                            <x-icons.trash />
                        </div>
                    </x-buttons.ghost-button>
                </form>
            </div>
        </li>
    @endforeach
</ul>

<x-pages.empty :items="$usuarios" name="usuario" />