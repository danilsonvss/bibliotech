<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarLivroRequest;
use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $livros = Livro::buscar($request->get('busca'))->with('generos')->get();
        return view('pages.livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::get();
        return view('pages.livros.create', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastrarLivroRequest $request)
    {
        $livro = Livro::create($request->validated());
        $livro->generos()->attach($request->validated('generos'));
        return redirect(route('livros.edit', ['livro' => $livro->id]))
            ->with('success', 'Livro cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        return redirect(route('livros.edit', $livro));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        $generos = Genero::get();
        return view('pages.livros.edit', compact('livro', 'generos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CadastrarLivroRequest $request, Livro $livro)
    {
        $livro->fill($request->validated());
        $livro->save();
        $livro->generos()->sync($request->validated('generos'));
        return redirect(route('livros.edit', ['livro' => $livro->id]))
            ->with('success', 'Livro alterado com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect(route('livros.index'))
            ->with('success', 'Livro excluído com sucesso');
    }
}
