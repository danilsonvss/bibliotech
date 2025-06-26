<?php

namespace App\Rules;

use App\Models\Emprestimo;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LivroDisponivel implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $jaEmprestado = Emprestimo::where('livro_id', $value)
            ->whereHas('livro', function ($query) {
                $query->where('devolvido', false);
            })
            ->exists();

        if ($jaEmprestado) {
            $fail('Este livro já está emprestado.');
        }
    }
}
