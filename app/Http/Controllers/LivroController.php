<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarLivroRequest;
use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(Request $request)
    {
        $livros = Livro::buscar($request->get('busca'))
            ->paginate(20)
            ->withQueryString();
        return view('pages.livros.index', compact('livros'));
    }

    public function create()
    {
        $generos = Genero::all();
        return view('pages.livros.create', compact('generos'));
    }

    public function store(CadastrarLivroRequest $request)
    {
        $livro = Livro::create($request->validated());
        if ($livro) {
            $livro->generos()->attach($request->validated('generos'));
            return redirect()
                ->route('livros.edit', $livro)
                ->with('success', 'Livro cadastrado com sucesso');
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao cadastrar o livro'));
    }

    public function show(Livro $livro)
    {
        $generos = Genero::all();
        return view('pages.livros.edit', compact('livro', 'generos'));
    }

    public function edit(Livro $livro)
    {
        $generos = Genero::all();
        return view('pages.livros.edit', compact('livro', 'generos'));
    }

    public function update(CadastrarLivroRequest $request, Livro $livro)
    {
        if ($livro->update($request->validated())) {
            $livro->generos()->sync($request->validated('generos'));
            return redirect()
                ->back()
                ->with('success', __('Livro alterado com sucesso'));
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao alterar o livro'));
    }

    public function destroy(Livro $livro)
    {
        if ($livro->delete()) {
            return redirect(route('livros.index'))
                ->with('success', 'Livro excluído com sucesso');
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao excluir o usuário'));
    }
}
