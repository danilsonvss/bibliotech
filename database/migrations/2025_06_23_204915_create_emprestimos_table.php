<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('livro_id')->constrained('livros')->onDelete('cascade');
            $table->boolean('devolvido')->default(false)->index();
            $table->timestamp('data_limite_devolucao')->index();
            $table->timestamp('data_emprestimo')->index();
            $table->timestamp('data_devolucao')->nullable()->index();
            $table->timestamps();

            $table->unique(['usuario_id', 'livro_id', 'data_emprestimo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
