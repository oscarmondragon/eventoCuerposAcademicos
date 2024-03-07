<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('integrantes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('registro_id')
                ->constrained()
                ->noActionOnUpdate()
                ->onDelete('cascade');
            $table->string('nombre', 30);
            $table->string('apellido_paterno', 30);
            $table->string('apellido_materno', 30)->nullable();
            $table->string('grado_academico', 100);
            $table->string('grado_academico_abreviado', 10);
            $table->enum('sexo', ['Hombre', 'Mujer', 'Indistinto']);
            $table->enum('genero', ['Masculino', 'Femenino', 'No binario']);
            $table->string('email', 100)->unique();
            $table->string('telefono', 20);
            $table->enum('tipo', ['Lider', 'Integrante']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrantes');
    }
};