<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'numero_registro',
    ];

    public function generos()
    {
        return $this->belongsToMany(Genero::class);
    }

    public function scopeBuscar($query, $busca)
    {
        return $query->where(function ($q) use ($busca) {
            $q->where('titulo', 'like', '%' . $busca . '%')
                ->orWhere('autor', 'like', '%' . $busca . '%');
        })->orWhereHas('generos', function ($q) use ($busca) {
            $q->where('nome', 'like', '%' . $busca . '%');
        });
    }
}
