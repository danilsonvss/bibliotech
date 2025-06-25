<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarUsuarioRequest;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::paginate(20)->withQueryString();
        return view('pages.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('pages.usuarios.create');
    }

    public function store(CadastrarUsuarioRequest $request)
    {
        $usuario = Usuario::create($request->validated());
        if ($usuario) {
            return redirect()
                ->route('usuarios.edit', $usuario)
                ->with('success', __('Usuario cadastrado com sucesso'));
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao cadastrar o usuário'));
    }

    public function show(Usuario $usuario)
    {
        return view('pages.usuarios.edit', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        return view('pages.usuarios.edit', compact('usuario'));
    }

    public function update(CadastrarUsuarioRequest $request, Usuario $usuario)
    {
        if ($usuario->update($request->validated())) {
            return redirect()
                ->back()
                ->with('success', __('Usuário alterado com sucesso'));
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao alterar o usuário'));
    }

    public function destroy(Usuario $usuario)
    {
        if ($usuario->delete()) {
            return redirect()
                ->route('usuarios.index')
                ->with('success', __('Usuário excluído com sucesso'));
        }
        return redirect()
            ->back()
            ->with('error', __('Falha ao excluir o usuário'));
    }
}
