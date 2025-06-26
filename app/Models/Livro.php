<?php

namespace App\Models;

use App\Observers\LivroObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([LivroObserver::class])]
class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'numero_registro',
    ];

    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }

    public function generos()
    {
        return $this->belongsToMany(Genero::class);
    }

    public function scopeBuscar($query, $busca)
    {
        return $query->where(function ($q) use ($busca) {
            $q->where('titulo', 'like', '%' . $busca . '%')
                ->orWhere('autor', 'like', '%' . $busca . '%')
                ->orWhere('numero_registro', '=', $busca);
        })->orWhereHas('generos', function ($q) use ($busca) {
            $q->where('nome', 'like', '%' . $busca . '%');
        });
    }

    public function scopeDisponivel($query)
    {
        return $query->whereDoesntHave('emprestimos', function ($q) {
            $q->where('devolvido', false);
        });
    }
}
