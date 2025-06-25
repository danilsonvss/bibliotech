<?php

namespace App\Http\Requests;

use App\Models\Livro;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'titulo' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('livros', 'titulo')->ignore($this->livro),
            ],
            'autor' => 'required|min:3|max:255',
            'numero_registro' => [
                'required',
                Rule::unique('livros', 'numero_registro')->ignore($this->livro),
            ],
            'generos' => 'required|array',
            'generos.*' => 'integer|exists:generos,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'titulo' => 'Título',
            'autor' => 'Autor',
            'numero_registro' => 'Número de registro',
            'generos' => 'Gêneros',
        ];
    }
}
