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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->index();
            $table->string('autor')->index();
            $table->string('numero_registro')->unique()->index();
            $table->timestamps();

            $table->unique(['titulo', 'autor', 'numero_registro']);
        });

        Schema::create('genero_livro', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genero_id')->constrained('generos')->onDelete('cascade');
            $table->foreignId('livro_id')->constrained('livros')->onDelete('cascade');
            $table->timestamps();

            $table->unique(['genero_id', 'livro_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('genero_livro');
        Schema::dropIfExists('livros');
    }
};
