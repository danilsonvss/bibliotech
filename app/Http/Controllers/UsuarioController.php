<?php

namespace App\Http\Controllers;

use App\Http\Requests\CadastrarUsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Cache::remember('usuarios', null, function () {
            return Usuario::get();
        });
        return view('pages.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CadastrarUsuarioRequest $request)
    {
        $usuario = Usuario::create($request->validated());
        Cache::forget('usuarios');
        return redirect(route('usuarios.edit', ['usuario' => $usuario->id]))
            ->with('success', 'Usuario cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return redirect(route('usuarios.edit', $usuario));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('pages.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CadastrarUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->fill($request->validated());
        $usuario->save();
        Cache::forget('usuarios');
        return redirect(route('usuarios.edit', ['usuario' => $usuario->id]))
            ->with('success', 'Usuario alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        Cache::forget('usuarios');
        return redirect(route('usuarios.index'))
            ->with('success', 'Usuario excluído com sucesso');
    }
}
