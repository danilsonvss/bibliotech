<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarLivroRequest;
use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Support\Facades\Cache;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Cache::remember('generos', null, function () {
            return Genero::get();
        });

        $livros = Cache::remember('livros', null, function () {
            return Livro::with('generos')->get();
        });

        return view('pages.livros.index', compact('livros', 'generos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.livros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastrarLivroRequest $request)
    {
        $livro = Livro::create($request->validated());
        return redirect(route('livros.edit', ['livro' => $livro->id]))->with('success', 'Livro cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CadastrarLivroRequest $request, Livro $livro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        //
    }
}
