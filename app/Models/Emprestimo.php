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

    public function atrasado()
    {
        if ($this->data_devolucao > $this->data_limite_devolucao && $this->devolvido) {
            return true;
        }

        return  ($this->data_limite_devolucao < now() && !$this->devolvido);
    }

    public function scopeBuscar($query, $busca)
    {
        return $query->where(function ($q) use ($busca) {
            $q->where('data_emprestimo', 'like', '%' . $busca . '%')
                ->orWhere('data_devolucao', 'like', '%' . $busca . '%')
                ->orWhere('data_limite_devolucao', 'like', '%' . $busca . '%');
        })
            ->orWhereHas('usuario', function ($q) use ($busca) {
                $q->where('nome', 'like', '%' . $busca . '%')
                    ->orWhere('email', 'like', '%' . $busca . '%')
                    ->orWhere('numero_cadastro', 'like', '%' . $busca . '%');
            })
            ->orWhereHas('livro', function ($q) use ($busca) {
                $q->where('titulo', 'like', '%' . $busca . '%')
                    ->orWhere('autor', 'like', '%' . $busca . '%')
                    ->orWhere('numero_registro', 'like', '%' . $busca . '%')
                    ->orWhereHas('generos', function ($q) use ($busca) {
                        $q->where('nome', 'like', '%' . $busca . '%');
                    });
            });
    }
}
