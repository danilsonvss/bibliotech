@extends('layout')

@section('title', 'Livros')

@section('content')

@section('page-title', 'Livros')

<div class="flex flex-row gap-1 h-10">
    <form class="flex-1 h-full">
        <input type="text" class="w-full border border-gray-400 rounded" name="busca" />
        @isset($generos)
            <select>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                @endforeach
            </select>
        @endisset
    </form>
    <a href="{{ route('livros.create') }}">
        <x-buttons.accent-button>
            <div class="icon">
                <x-icons.book-plus />
            </div>
            <span class="hidden sm:inline-block">Cadastrar</span>
        </x-buttons.accent-button>
    </a>
</div>

<div class="my-5">
    {{ $livros }}
</div>

@endsection
