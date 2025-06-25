<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:usuarios,email',
            'numero_cadastro' => 'required|min:1|max:255',
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
