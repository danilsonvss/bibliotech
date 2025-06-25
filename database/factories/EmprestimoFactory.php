<?php

namespace Database\Factories;

use App\Models\Livro;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprestimo>
 */
class EmprestimoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataEmprestimo = fake()->dateTimeBetween('-1 year', 'now');
        $devolvido = fake()->boolean();

        // Garante que o limite seja no mínimo o mesmo dia do empréstimo e no máximo +30 dias
        $dataLimiteDevolucao = fake()->dateTimeBetween($dataEmprestimo, '+30 days');

        // Se devolvido, gera data de devolução depois do empréstimo
        $dataDevolucao = $devolvido
            ? fake()->dateTimeBetween($dataEmprestimo, '+60 days')
            : null;

        return [
            'usuario_id' => Usuario::factory()->create()->id,
            'livro_id' => Livro::factory()->create()->id,
            'devolvido' => $devolvido,
            'data_emprestimo' => $dataEmprestimo,
            'data_limite_devolucao' => $dataLimiteDevolucao,
            'data_devolucao' => $dataDevolucao,
        ];
    }
}
