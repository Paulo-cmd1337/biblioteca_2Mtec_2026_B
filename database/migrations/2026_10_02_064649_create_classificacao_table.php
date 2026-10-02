<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CLASSIFICACAO', function (Blueprint $table) {
            // Colunas
            $table->unsignedBigInteger('CLSLIVRO');
            $table->unsignedBigInteger('CLSGENERO');
            $table->boolean('CLSPRINCIPAL');

            // Chave Primária Composta
            $table->primary(['CLSLIVRO', 'CLSGENERO']);

            // Chaves Estrangeiras (FKs) com onDelete cascade
            $table->foreign('CLSLIVRO')
                ->references('LVRCODIGO')
                ->on('LIVROS')
                ->onDelete('cascade');

            $table->foreign('CLSGENERO')
                ->references('GNRCODIGO')
                ->on('GENEROS')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CLASSIFICACAO');
    }
};
