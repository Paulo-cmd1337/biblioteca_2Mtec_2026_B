<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('AUTORIA', function (Blueprint $table) {

            $table->unsignedBigInteger('ATRLIVRO');
            $table->unsignedBigInteger('ATRAUTOR');
            $table->boolean('ATRPRINCIPAL');

            $table->primary(['ATRLIVRO', 'ATRAUTOR']);

            $table->foreign('ATRLIVRO')
                  ->references('LVRCODIGO')
                  ->on('LIVROS')
                  ->onDelete('cascade');

            $table->foreign('ATRAUTOR')
                  ->references('AUTCODIGO')
                  ->on('AUTORES')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('AUTORIA');
    }
};
