@if ($items->count() === 0)
    <div class="flex flex-row gap-2 items-center bg-sky-100 font-normal text-zinc-600 p-3 rounded">
        <x-icons.info /> Nenhum {{ $name }} cadastrado.
    </div>
@endif
