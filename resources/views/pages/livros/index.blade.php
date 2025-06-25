@extends('layout')

@section('title', 'Livros')

@section('content')

@section('page-title', 'Livros')

<div class="flex flex-row justify-between">
    <ul class="flex flex-row gap-1 list-none text-xs font-bold">
        <li>
            <a href="{{ route('home') }}" class="text-blue-500">Início</a>
        </li>

        <li class="text-gray-400">/</li>

        <li class="text-gray-400">
            Livros
        </li>
    </ul>

    <a href="{{ route('livros.create') }}">
        <x-buttons.accent-button>
            <div class="icon">
                <x-icons.book-plus />
            </div>
            <span class="hidden sm:inline-block text-xs">Novo livro</span>
        </x-buttons.accent-button>
    </a>
</div>

<div class="flex flex-row items-center gap-1 my-4">
    <form class="flex flex-row items-center flex-1 h-full border border-gray-400 rounded py-0">
        <input type="text" class="w-full py-2 px-1 h-full" placeholder="Digite aqui sua busca" name="busca" />
        <div class="flex flex-row gap-3 items-center p-1">
            <x-buttons.accent-button>
                <div class="icon">
                    <x-icons.search />
                </div>
            </x-buttons.accent-button>
        </div>
    </form>
</div>

<div class="my-5">
    {{ $livros }}
</div>

@endsection
