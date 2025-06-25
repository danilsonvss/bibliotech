@if ($errors->any())
    <x-toast type="error">
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </x-toast>
@endif

@if (session()->get('success'))
    <x-toast type="success" message="{{ session()->get('success') }}" />
@endif
