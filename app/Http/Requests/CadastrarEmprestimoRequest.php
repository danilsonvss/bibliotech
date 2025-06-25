<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarEmprestimoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'usuario_id' => 'required|exists:users,id',
            'livro_id' => 'required|exists:livros,id',
            'devolvido' => 'nullable|boolean',
            'data_limite_devolucao' => 'required|date|after_or_equals:data_emprestimo',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equals:data_emprestimo',
        ];
    }

    public function attributes(): array
    {
        return [
            'usuario_id' => 'Usuário',
            'livro_id' => 'Livro',
            'devolvido' => 'Devolvido',
            'data_limite_devolucao' => 'Data para devolução',
            'data_emprestimo' => 'Data do empréstimo',
            'data_devolucao' => 'Data da devolução',
        ];
    }
}
