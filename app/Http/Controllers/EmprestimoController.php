<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtualizarEmprestimoRequest;
use App\Http\Requests\CadastrarEmprestimoRequest;
use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->get('busca');
        $emprestimos = Emprestimo::when($busca, function ($query) use ($busca) {
            $query->buscar($busca);
        })
            ->with('livro', 'usuario')
            ->paginate(20)
            ->withQueryString();

        return view('pages.emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $livros = Livro::disponivel()->get();
        return view('pages.emprestimos.create', compact('usuarios', 'livros'));
    }

    public function store(CadastrarEmprestimoRequest $request)
    {
        $emprestimo = Emprestimo::create($request->validated());
        if ($emprestimo) {
            return redirect()
                ->route('emprestimos.edit', $emprestimo)
                ->with('success', __('Empréstimo cadastrado com sucesso'));
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao cadastrar o empréstimo'));
    }

    public function show(Emprestimo $emprestimo)
    {
        $usuarios = Usuario::all();
        $livros = Livro::disponivel()->get();
        return view('pages.emprestimos.edit', compact('usuarios', 'livros', 'emprestimo'));
    }

    public function edit(Emprestimo $emprestimo)
    {
        return view('pages.emprestimos.edit', compact('emprestimo'));
    }

    public function update(AtualizarEmprestimoRequest $request, Emprestimo $emprestimo)
    {
        if ($emprestimo->update($request->validated())) {
            return redirect()
                ->route('emprestimos.edit', $emprestimo)
                ->with('success', __('Empréstimo cadastrado com sucesso'));
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao cadastrar o empréstimo'));
    }

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
