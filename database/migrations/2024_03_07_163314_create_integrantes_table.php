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
        Schema::create('integrantes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('registro_id')
                ->constrained()
                ->noActionOnUpdate()
                ->onDelete('cascade');
            $table->string('nombre', 50);
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50)->nullable();
            $table->string('grado_academico', 100);
            $table->string('grado_academico_abreviado', 30);
            $table->enum('sexo', ['Hombre', 'Mujer', 'Indistinto']);
            $table->enum('genero', ['Masculino', 'Femenino', 'Otro']);
            $table->string('email', 100);
            $table->string('telefono', 20);
            $table->enum('tipo', ['Lider', 'Integrante', 'Colaborador']);
            $table->foreignUuid('tipo_lider')
                ->nullable()
                ->constrained(table: 'tipos_lider')
                ->noActionOnUpdate()
                ->nullOnDelete();
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
