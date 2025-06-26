<?php

namespace Tests\Feature;

use App\Models\Livro;
use Tests\TestCase;

class LivroControllerTest extends TestCase
{
    public function test_pagina_inicial_de_livros_renderiza(): void
    {
        $response = $this->get(route('livros.index'));
        $response->assertViewHas('livros');
        $response->assertViewIs('pages.livros.index');
        $response->assertStatus(200);
    }

    public function test_pagina_de_cadastro_de_livros_renderiza(): void
    {
        $response = $this->get(route('livros.create'));
        $response->assertSeeText('Cadastrar livro');
        $response->assertViewIs('pages.livros.create');
        $response->assertStatus(200);
    }

    public function test_valida_campos_obrigatorios_de_um_livro(): void
    {
        $data = [];
        $response = $this->post(route('livros.store'), $data);
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
        $response = $this->post(route('livros.store'), $data);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
    }

    public function test_pagina_de_edicao_de_livros_renderiza(): void
    {
        $livro = Livro::factory()->create([
            'titulo' => 'Livro 1',
            'autor' => 'Autor',
            'numero_registro' => '1',
        ]);
        $response = $this->get(route('livros.edit', ['livro' => $livro->id]));
        $response->assertSeeText('Alterar livro');
        $response->assertViewIs('pages.livros.edit');
        $response->assertStatus(200);
    }

    public function test_altera_o_titulo_de_um_livro(): void
    {
        $livro = Livro::factory()->create([
            'titulo' => 'Livro 2',
            'autor' => 'Autor',
            'numero_registro' => '2',
        ]);

        $livro->generos()->sync([1]);

        $data = [
            'titulo' => 'Test',
            'autor' => 'Test',
            'numero_registro' => '2',
            'generos' => [1],
        ];
        $response = $this->put(route('livros.update', [
            'livro' => $livro->id
        ]), $data);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
    }
}
