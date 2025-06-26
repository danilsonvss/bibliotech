<?php

namespace Tests\Feature;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Usuario;
use Carbon\Carbon;
use Tests\TestCase;

class EmprestimoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pagina_inicial_de_emprestimos_renderiza(): void
    {
        $response = $this->get(route('emprestimos.index'));
        $response->assertSeeText('Empréstimos');
        $response->assertViewIs('pages.emprestimos.index');
        $response->assertStatus(200);
    }

    public function test_pagina_de_cadastro_de_emprestimos_renderiza(): void
    {
        $response = $this->get(route('emprestimos.create'));
        $response->assertSeeText('Cadastrar empréstimo');
        $response->assertViewIs('pages.emprestimos.create');
        $response->assertStatus(200);
    }

    public function test_valida_campos_obrigatorios_de_um_emprestimo(): void
    {
        $data = [];
        $response = $this->post(route('emprestimos.store'), $data);
        $response->assertRedirect();
        $response->assertSessionHasErrors([
            'usuario_id',
            'livro_id',
            'data_limite_devolucao',
            'data_emprestimo',
        ]);
    }

    public function test_cria_um_emprestimo(): void
    {
        $usuario = Usuario::factory()->create();
        $livro = Livro::factory()->create();

        $data = [
            'usuario_id' => $usuario->id,
            'livro_id' => $livro->id ,
            'data_limite_devolucao' => '2025-06-30 23:59:59',
            'data_emprestimo' => '2025-06-25 23:59:59',
        ];
        $response = $this->post('/emprestimos', $data);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
    }

    public function test_pagina_de_edicao_de_emprestimos_renderiza(): void
    {
        $usuario = Usuario::factory()->create();
        $livro = Livro::factory()->create();

        $emprestimo = Emprestimo::factory()->create([
            'usuario_id' => $usuario->id,
            'livro_id' => $livro->id ,
            'data_limite_devolucao' => '2025-06-30 23:59:59',
            'data_emprestimo' => '2025-06-25 23:59:59',
        ]);
        $response = $this->get(route('emprestimos.edit', ['emprestimo' => $emprestimo->id]));
        $response->assertSeeText('Alterar empréstimo');
        $response->assertViewIs('pages.emprestimos.edit');
        $response->assertStatus(200);
    }

    public function test_altera_o_status_de_um_emprestimo(): void
    {
        $usuario = Usuario::factory()->create();
        $livro = Livro::factory()->create();

        $emprestimo = Emprestimo::factory()->create([
            'usuario_id' => $usuario->id,
            'livro_id' => $livro->id ,
            'data_limite_devolucao' => '2025-06-20 23:59:59',
            'data_emprestimo' => '2025-06-25 23:59:59',
            'devolvido' => 0,
        ]);

        $data = [
            'devolvido' => 1,
            'data_devolucao' => '2025-06-25 23:59:59',
        ];

        $response = $this->put(route('emprestimos.update', [
            'emprestimo' => $emprestimo->id
        ]), $data);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
    }
}
