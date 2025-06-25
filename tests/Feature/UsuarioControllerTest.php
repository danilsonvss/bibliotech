<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    public function test_pagina_inicial_de_usuarios_renderiza(): void
    {
        $response = $this->get(route('usuarios.index'));
        $response->assertViewHas('usuarios');
        $response->assertViewIs('pages.usuarios.index');
        $response->assertStatus(200);
    }

    public function test_pagina_de_cadastro_de_usuarios_renderiza(): void
    {
        $response = $this->get(route('usuarios.create'));
        $response->assertSeeText('Cadastrar usuário');
        $response->assertViewIs('pages.usuarios.create');
        $response->assertStatus(200);
    }

    public function test_valida_campos_obrigatorios_de_um_usuario(): void
    {
        $data = [];
        $response = $this->post(route('usuarios.store'), $data);
        $response->assertRedirect();
        $response->assertSessionHasErrors([
            'nome',
            'email',
            'numero_cadastro',
        ]);
    }

    public function test_cria_um_usuario(): void
    {
        $data = [
            'nome' => 'Danilson',
            'email' => 'danilsonvss@gmail.com',
            'numero_cadastro' => '1234',
        ];
        $response = $this->post(route('usuarios.store'), $data);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
    }

    public function test_pagina_de_edicao_de_usuarios_renderiza(): void
    {
        $usuario = Usuario::factory()->create();
        $response = $this->get(route('usuarios.edit', ['usuario' => $usuario->id]));
        $response->assertSeeText('Alterar usuário');
        $response->assertViewIs('pages.usuarios.edit');
        $response->assertStatus(200);
    }

    public function test_altera_um_usuario(): void
    {
        $usuario = Usuario::factory()->create([
            'nome' => 'Danilson',
            'email' => 'danilsonvss@gmail.com',
            'numero_cadastro' => '1234',
        ]);

        $data = [
            'nome' => 'Danilson Santos',
            'email' => 'danilsonvss@gmail.com',
            'numero_cadastro' => '1234',
        ];
        $response = $this->put(route('usuarios.update', [
            'usuario' => $usuario->id
        ]), $data);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
    }
}
