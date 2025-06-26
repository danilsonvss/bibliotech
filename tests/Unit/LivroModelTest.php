<?php

namespace Tests\Unit;

use App\Models\Livro;
use Tests\TestCase;

class LivroModelTest extends TestCase
{
    public function test_buscar_livros(): void
    {
        Livro::factory()->create([
            'titulo' => 'Livro de Teste 1',
            'autor' => 'Autor 1',
            'numero_registro' => '123456',
        ]);
        Livro::factory()->create([
            'titulo' => 'Livro de Teste 2',
            'autor' => 'Autor 2',
            'numero_registro' => '654321',
        ]);

        $livros = Livro::buscar('Teste')->get();
        $this->assertCount(2, $livros);
    }

    public function test_listar_livros_disponiveis(): void
    {
        $usuario = \App\Models\Usuario::factory()->create();

        Livro::factory()->create([
            'titulo' => 'Livro Disponível 1',
            'autor' => 'Autor 1',
            'numero_registro' => '111111',
        ]);

        Livro::factory()->create([
            'titulo' => 'Livro Indisponível 1',
            'autor' => 'Autor 2',
            'numero_registro' => '222222',
        ]);

        $livroIndisponivel = Livro::where('titulo', 'Livro Indisponível 1')->first();
        $livroIndisponivel->emprestimos()->create([
            'devolvido' => false,
            'usuario_id' => $usuario->id,
            'data_emprestimo' => now(),
            'data_limite_devolucao' => now()->addDays(7),
        ]);

        $livrosDisponiveis = Livro::disponivel()->get();
        $this->assertCount(1, $livrosDisponiveis);
        $this->assertEquals('Livro Disponível 1', $livrosDisponiveis->first()->titulo);
    }
}
