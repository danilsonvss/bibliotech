@aware(['usuario' => null]) {{-- usuario pode ser null em create --}}

<form class="flex flex-col w-full sm:w-[400px] gap-3 my-3"
    action="{{ isset($usuario) ? route('usuarios.update', $usuario) : route('usuarios.store') }}" method="POST">

    @csrf
    @if (isset($usuario))
        @method('PUT')
    @endif

    <x-inputs.text-input name="nome" placeholder="Nome" :value="old('nome', $usuario->nome ?? '')" />
    <x-inputs.text-input type="email" placeholder="E-mail" name="email" :value="old('email', $usuario->email ?? '')" />
    <x-inputs.text-input placeholder="E-mail" name="numero_cadastro" :value="old('numero_cadastro', $usuario->numero_cadastro ?? '')" />

    <div class="flex flex-col sm:flex-row justify-end">
        <x-buttons.accent-button type="submit" class="py-2 px-5 text-sm">
            {{ isset($usuario) ? 'Atualizar' : 'Cadastrar' }}
        </x-buttons.accent-button>
    </div>
</form>
