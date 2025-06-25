<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarEmprestimoRequest;
use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Usuario;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprestimos = Emprestimo::with('livro', 'usuario')
            ->paginate(20)
            ->withQueryString();
        return view('pages.emprestimos.index', compact('emprestimos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuario::all();
        $livros = Livro::all();
        return view('pages.emprestimos.create', compact('usuarios', 'livros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastrarEmprestimoRequest $request)
    {
        $emprestimo = Emprestimo::create($request->validated());
        if ($emprestimo) {
            return redirect()
                ->route('emprestimos.edit', $emprestimo)
                ->with('success', 'Empréstimo cadastrado com sucesso');
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao cadastrar o empréstimo'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprestimo $emprestimo)
    {
        $usuarios = Usuario::all();
        $livros = Livro::all();
        return view('pages.livros.edit', compact('usuarios', 'livros', 'emprestimo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprestimo $emprestimo)
    {
        $usuarios = Usuario::all();
        $livros = Livro::all();
        return view('pages.livros.edit', compact('usuarios', 'livros', 'emprestimo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CadastrarEmprestimoRequest $request, Emprestimo $emprestimo)
    {
        $emprestimo = Emprestimo::update($request->validated());
        if ($emprestimo) {
            return redirect()
                ->route('emprestimos.edit', $emprestimo)
                ->with('success', 'Empréstimo cadastrado com sucesso');
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao cadastrar o empréstimo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprestimo $emprestimo)
    {
        if ($emprestimo->delete()) {
            return redirect(route('emprestimos.index'))
                ->with('success', 'Empréstimo excluído com sucesso');
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao excluir o empréstimo'));
    }
}
