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
        return $this->hasMany(Genero::class);
    }
}
