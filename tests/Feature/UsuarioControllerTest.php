<?php

namespace Tests\Feature;

use Tests\TestCase;

class UsuarioControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pagina_inicial_de_usuarios_renderiza(): void
    {
        $response = $this->get('/usuarios');

        $response->assertViewHas('usuarios');
        $response->assertViewIs('pages.usuarios.index');
        $response->assertStatus(200);
    }
}
