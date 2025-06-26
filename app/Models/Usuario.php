<?php

namespace App\Models;

use App\Observers\UsuarioObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([UsuarioObserver::class])]
class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'numero_cadastro',
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }

    public function scopeBuscar($query, $busca)
    {
        return $query->where('nome', 'like', '%' . $busca . '%')
            ->orWhere('email', '=', $busca)
            ->orWhere('numero_cadastro', '=', $busca);
    }
}
