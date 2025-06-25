<?php

namespace App\Models;

use App\Models\Scopes\EmprestimoAtrasadoScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'livro_id',
        'devolvido',
        'data_limite_devolucao',
        'data_emprestimo',
        'data_devolucao',
    ];

    protected $casts = [
        'devolvido' => 'boolean',
        'data_limite_devolucao' => 'datetime:Y-m-d H:i:s',
        'data_emprestimo' => 'datetime:Y-m-d H:i:s',
        'data_devolucao' => 'datetime:Y-m-d H:i:s',
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new EmprestimoAtrasadoScope);
    }
}
