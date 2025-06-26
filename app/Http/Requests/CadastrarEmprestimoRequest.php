<?php

namespace App\Http\Requests;

use App\Rules\LivroDisponivel;
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
            'usuario_id' => 'required|exists:usuarios,id',
            'livro_id' => [
                'required',
                'exists:livros,id',
                new LivroDisponivel(),
            ],
            'devolvido' => 'nullable|in:0,1',
            'data_limite_devolucao' => 'required|date|after_or_equal:data_emprestimo',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'nullable|required_if:devolvido,1|date|after_or_equal:data_emprestimo',
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

    public function messages(): array
    {
        return [
            'data_devolucao.required_if' => 'Quando o campo "Devolvido" for marcado, a data de devolução é obrigatória.',
        ];
    }
}
