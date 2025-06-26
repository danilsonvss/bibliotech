@aware(['generos', 'livro' => null]) {{-- livro pode ser null em create --}}

<form class="flex flex-col w-full sm:w-[400px] gap-3 my-3"
    action="{{ isset($livro) ? route('livros.update', $livro) : route('livros.store') }}" method="POST">

    @csrf
    @if (isset($livro))
        @method('PUT')
    @endif

    <x-inputs.text-input placeholder="Titulo" name="titulo" :value="old('titulo', $livro->titulo ?? '')" />
    <x-inputs.text-input placeholder="Autor" name="autor" :value="old('autor', $livro->autor ?? '')" />
    <x-inputs.text-input placeholder="Número de registro" name="numero_registro" :value="old('numero_registro', $livro->numero_registro ?? '')" />

    @isset($generos)
        <x-inputs.input>
            <select type="text" id="generoSelect" class="w-full py-2 px-1 h-full">
                @foreach ($generos as $g)
                    <option value="{{ $g->id }}"
                        {{ collect(old('generos', isset($livro) ? $livro->generos->pluck('id')->toArray() : []))->contains($g->id)
                            ? 'selected'
                            : '' }}>
                        {{ $g->nome }}
                    </option>
                @endforeach
            </select>
            <x-buttons.ghost-button type="button" id="btnAdicionar">
                <x-icons.plus />
                <span class="hidden sm:block text-xs">Adicionar</span>
            </x-buttons.ghost-button>
        </x-inputs.input>
    @else
        <div class="flex flex-col items-center justify-center p-3 bg-yellow-200 text-yellow-800 rounded">
            Os gêneros não foram carregados.
        </div>
    @endisset

    <ul id="generosList" class="space-y-1">
        @php
            $generosSelecionados = old('generos', isset($livro) ? $livro->generos->pluck('id')->toArray() : []);
        @endphp

        @foreach ($generosSelecionados as $generoId)
            @php
                $genero = $generos->firstWhere('id', $generoId);
                if (!$genero) {
                    continue;
                }
            @endphp
            <input type="hidden" name="generos[]" value="{{ $genero->id }}" id="input_genero_{{ $genero->id }}" />
            <li id="li_genero_{{ $genero->id }}"
                class="flex flex-row justify-between items-center text-sm rounded font-bold cursor-pointer p-1">
                <span>{{ $genero->nome }}</span>
                <button type="button" class="text-xs text-red-500 hover:bg-red-200 rounded font-bold p-2"
                    onclick="removerGeneroDoLivro({{ $genero->id }})">
                    Remover
                </button>
            </li>
        @endforeach
    </ul>

    <div class="flex flex-col sm:flex-row justify-end">
        <x-buttons.accent-button type="submit" class="py-2 px-5 text-sm">
            {{ isset($livro) ? 'Atualizar' : 'Cadastrar' }}
        </x-buttons.accent-button>
    </div>
</form>
