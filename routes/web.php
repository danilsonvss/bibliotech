<?php

use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::fallback(fn() => redirect(route('home')));

Route::get('/', fn() => view('pages.home'))->name('home');

Route::resources([
    'livros' => LivroController::class,
    'usuarios' => UsuarioController::class,
    'emprestimos' => EmprestimoController::class,
]);