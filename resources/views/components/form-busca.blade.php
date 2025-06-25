<div class="flex flex-row items-center gap-1 my-4">
    <form method="GET" class="flex-1" id="formBusca">
        <x-inputs.input placeholder="Digite aqui sua busca">
            <input type="text" class="flex-1 p-1" placeholder="Digite aqui sua busca" name="busca"
                value="{{ request('busca') }}" />

            <x-buttons.ghost-button type="button">
                <div class="icon">
                    <x-icons.close />
                </div>
            </x-buttons.ghost-button>
            <x-buttons.accent-button>
                <div class="icon">
                    <x-icons.search />
                </div>
            </x-buttons.accent-button>
        </x-inputs.input>
    </form>
</div>
