<?php

use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth'])->group(function () {
Route::prefix('api')->group(function () {
    Route::resources([
        'generos' => GeneroController::class,
        'livros' => LivroController::class,
        'usuarios' => UsuarioController::class,
        'emprestimos' => EmprestimoController::class,
    ]);
});
