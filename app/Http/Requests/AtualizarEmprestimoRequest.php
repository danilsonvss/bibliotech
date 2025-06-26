<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtualizarEmprestimoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'devolvido' => 'nullable|in:0,1',
            'data_devolucao' => 'nullable|required_if:devolvido,1|date|after_or_equal:data_emprestimo',
        ];
    }

    public function attributes(): array
    {
        return [
            'devolvido' => 'Devolvido',
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
