<?php

namespace App\Observers;

use App\Models\Usuario;
use Illuminate\Support\Facades\Cache;

class UsuarioObserver
{
    public function created(Usuario $usuario): void
    {
        Cache::forget('usuarios');
    }

    public function updated(Usuario $usuario): void
    {
        Cache::forget('usuarios');
    }

    public function deleted(Usuario $usuario): void
    {
        Cache::forget('usuarios');
    }
}
