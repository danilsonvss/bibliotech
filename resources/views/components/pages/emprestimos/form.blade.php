@aware(['generos', 'emprestimo' => null]) {{-- emprestimo pode ser null em create --}}

<form class="flex flex-col w-full sm:w-[400px] gap-3 my-3"
    action="{{ isset($emprestimo) ? route('emprestimos.update', $emprestimo) : route('emprestimos.store') }}"
    method="POST">

    @csrf
    @if (isset($emprestimo))
        @method('PUT')
    @endif

    @if ($usuarios && !isset($emprestimo))
        <label for="usuario_id" class="text-sm">Usuário</label>
        <x-inputs.input>
            <select type="text" name="usuario_id" class="w-full py-2 px-1 h-full">
                <option value=""></option>
                @foreach ($usuarios as $u)
                    <optgroup label="{{ $u->numero_cadastro }} - {{ $u->nome }}">
                        <option value="{{ $u->id }}"
                            {{ collect(old('usuarios', isset($emprestimo) ? $usuarios->pluck('id')->toArray() : []))->contains($u->id)
                                ? 'selected'
                                : '' }}>
                            {{ $u->email }}
                        </option>
                    </optgroup>
                @endforeach
            </select>
        </x-inputs.input>
    @endif

    @if ($livros && !isset($emprestimo))
        <label for="livro_id" class="text-sm">Livro</label>
        <x-inputs.input>
            <select type="text" name="livro_id" class="w-full py-2 px-1 h-full">
                <option value=""></option>
                @foreach ($livros as $l)
                    <option value="{{ $l->id }}"
                        {{ collect(old('livros', isset($emprestimo) ? $livros->pluck('id')->toArray() : []))->contains($l->id)
                            ? 'selected'
                            : '' }}>
                        {{ $l->numero_registro }} - {{ $l->titulo }}
                    </option>
                @endforeach
            </select>
        </x-inputs.input>
    @else
        <label for="livro_id" class="text-sm">Livro</label>
        <div>
            {{ $emprestimo->livro->numero_registro }} - {{ $emprestimo->livro->titulo }}
        </div>
        <label for="livro_id" class="text-sm">Usuário</label>
        <div>
            {{ $emprestimo->usuario->numero_cadastro }} - {{ $emprestimo->usuario->nome }}
        </div>
    @endif

    @if (!isset($emprestimo))
        <label for="data_emprestimo" class="flex flex-col gap-2 text-sm">
            Data do empréstimo
            <x-inputs.text-input type="datetime-local" placeholder="Data do empréstimo" name="data_emprestimo"
                :value="old('data_emprestimo', $emprestimo->data_emprestimo ?? '')" />
        </label>
        <label for="data_limite_devolucao" class="flex flex-col gap-2 text-sm">
            Data limite da devolução
            <x-inputs.text-input type="datetime-local" placeholder="Data da devolução" name="data_limite_devolucao"
                :value="old('data_limite_devolucao', $emprestimo->data_limite_devolucao ?? '')" />
        </label>
    @endif

    <label for="data_devolucao" class="flex flex-col gap-2 text-sm">
        Data da devolução
        <x-inputs.text-input type="datetime-local" placeholder="Data da devolução" name="data_devolucao"
            :value="old('data_devolucao', $emprestimo->data_devolucao ?? '')" />
    </label>

    <label for="devolvido" class="flex flex-row items-center gap-2 text-sm">
        <input type="hidden" name="devolvido" value="0">
        <input type="checkbox" id="devolvido" name="devolvido" value="1"
            {{ old('devolvido', $emprestimo && ($emprestimo->devolvido || $emprestimo->data_devolucao)) ? 'checked' : '' }}>
        Devolvido
    </label>

    <div class="flex flex-col sm:flex-row justify-end">
        <x-buttons.accent-button type="submit" class="py-2 px-5 text-sm">
            {{ isset($emprestimo) ? 'Atualizar' : 'Cadastrar' }}
        </x-buttons.accent-button>
    </div>
</form>
