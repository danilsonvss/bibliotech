@aware(['generos'])

<form class="flex flex-col w-full sm:w-[400px] gap-3 my-3" action="{{ route('livros.store') }}" method="POST">
    @csrf
    <div class="flex flex-row items-center flex-1 h-full border border-gray-400 rounded py-0">
        <input type="text" class="w-full py-2 px-1 h-full" placeholder="Titulo" name="titulo" />
    </div>

    <div class="flex flex-row items-center flex-1 h-full border border-gray-400 rounded py-0">
        <input type="text" class="w-full py-2 px-1 h-full" placeholder="Autor" name="autor" />
    </div>

    <div class="flex flex-row items-center flex-1 h-full border border-gray-400 rounded py-0">
        <input type="text" class="w-full py-2 px-1 h-full" placeholder="Número de registro" name="numero_registro" />
    </div>

    @isset($generos)
        <div class="flex flex-row gap-1 items-center justify-between flex-1 h-full border border-gray-400 rounded py-0">
            <select type="text" class="w-full py-2 px-1 h-full" placeholder="Número de registro" name="numero_registro">
                @foreach ($generos as $g)
                    <option value="{{ $g->id }}">{{ $g->nome }}</option>
                @endforeach
            </select>
            <x-buttons.accent-button type="button">
                <x-icons.plus />
                <span class="hidden sm:block">Adicionar</span>
            </x-buttons.accent-button>
        </div>
    @else
        <div class="flex flex-col items-center justify-center p-3 bg-yellow-200 text-yellow-800 rounded">
            Os gêneros não foram carregados.
        </div>
    @endisset

    <div class="flex flex-col sm:flex-row justify-end">
        <x-buttons.accent-button type="submit" class="py-2 px-5">
            Cadastrar
        </x-buttons.accent-button>
    </div>
</form>
