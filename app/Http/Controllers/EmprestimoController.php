<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarEmprestimoRequest;
use App\Models\Emprestimo;
use Illuminate\Support\Facades\Cache;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprestimos = Cache::remember('emprestimos', null, function () {
            return Emprestimo::with('livro', 'usuario')->get();
        });
        return view('pages.emprestimos.index', compact('emprestimos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastrarEmprestimoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CadastrarEmprestimoRequest $request, Emprestimo $emprestimo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprestimo $emprestimo)
    {
        //
    }
}
