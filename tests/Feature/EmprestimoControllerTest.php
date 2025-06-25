<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmprestimoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pagina_inicial_de_emprestimos_renderiza(): void
    {
        $response = $this->get('/emprestimos');

        $response->assertViewHas('emprestimos');
        $response->assertViewIs('pages.emprestimos.index');
        $response->assertStatus(200);
    }
}
