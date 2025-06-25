<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarLivroRequest extends FormRequest
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
            'titulo' => 'required|min:3|max:255|unique:livros,titulo',
            'autor' => 'required|min:3|max:255|unique:livros,autor',
            'numero_registro' => 'required|unique:livros,numero_registro',
            'generos' => 'required|array|exists:generos,id',
        ];
    }
}
