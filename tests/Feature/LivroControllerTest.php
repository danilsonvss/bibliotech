<?php

namespace Tests\Feature;

use App\Models\Livro;
use Database\Factories\LivroFactory;
use Tests\TestCase;

class LivroControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pagina_inicial_de_livros_renderiza(): void
    {
        $response = $this->get('/livros');

        $response->assertViewHas('livros');
        $response->assertViewIs('pages.livros.index');
        $response->assertStatus(200);
    }

    public function test_pagina_de_cadastro_de_livros_renderiza(): void
    {
        $response = $this->get('/livros/create');

        $response->assertSeeText('Cadastrar livro');
        $response->assertViewIs('pages.livros.create');
        $response->assertStatus(200);
    }

    public function test_valida_campos_obrigatorios_de_um_livro(): void
    {
        $data = [];
        $response = $this->post('/livros', $data);
        $response->assertRedirect();
        $response->assertSessionHasErrors([
            'titulo',
            'autor',
            'numero_registro',
            'generos',
        ]);
    }

    public function test_cria_um_livro(): void
    {
        $data = [
            'titulo' => 'Ficção',
            'autor' => 'Um livro de ficção',
            'numero_registro' => '1',
            'generos' => [1],
        ];
        $response = $this->post('/livros', $data);
        $response->assertStatus(201);
        $response->assertSessionHasNoErrors();
    }

    public function test_pagina_de_edicao_de_livros_renderiza(): void
    {
        $response = $this->get('/livros/edit');

        $response->assertSeeText('Alterar livro');
        $response->assertViewIs('pages.livros.edit');
        $response->assertStatus(200);
    }

    public function test_altera_o_titulo_de_um_livro(): void
    {
        $livro = Livro::factory()->create();

        $data = [
            'titulo' => 'Ficção Alterado',
        ];
        $response = $this->put(route('livros.update', [
            'livro' => $livro->id
        ]), $data);
        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
    }
}
