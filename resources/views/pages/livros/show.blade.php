@extends('layout')

@section('title', 'Livros')

@section('content')
@section('page-title', 'Livros')
<nav>
    <ul class="flex flex-row gap-1 list-none text-xs font-bold">
        <li>
            <a href="{{ route('home') }}" class="text-blue-500">Início</a>
        </li>

        <li class="text-gray-400">/</li>

        <li>
            <a href="{{ route('livros.index') }}" class="text-blue-500">Livros</a>
        </li>

        <li class="text-gray-400">/</li>

        <li class="text-gray-400">
            {{ $livro->nome }}
        </li>
    </ul>

    <div class="my-4">
        <h3 class="font-2xl font-bold">{{ $livro->nome }}</h3>
    </div>
</nav>

@endsection
