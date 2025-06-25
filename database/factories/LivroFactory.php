<?php

namespace Database\Factories;

use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(),
            'autor' => fake()->name(),
            'numero_registro' => fake()->numerify('####'),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Livro $livro) {
            $generoIds = Genero::inRandomOrder()->limit(rand(1, 3))->pluck('id')->toArray();;
            $livro->generos()->attach($generoIds);
        });
    }
}
