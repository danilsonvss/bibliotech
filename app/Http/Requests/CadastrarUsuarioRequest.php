<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CadastrarUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('usuarios', 'email')->ignore($this->usuario),
            ],
            'numero_cadastro' => [
                'required',
                'min:1',
                'max:255',
                Rule::unique('usuarios', 'numero_cadastro')->ignore($this->usuario),
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'nome' => 'Nome',
            'email' => 'E-mail',
            'numero_cadastro' => 'Número do cadastro',
        ];
    }
}
