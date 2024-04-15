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
        Schema::create('banners', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('registro_id')
                ->constrained()
                ->noActionOnUpdate()
                ->onDelete('cascade');
            $table->string('cuerpo_grupo_red', 150);
            $table->string('espacio_procedencia', 150);
            $table->string('area_tematica', 150);
            $table->json('integrantes');
            $table->text('descripcion_linea');
            $table->string('email');
            $table->string('telefono');
            $table->string('twitter', 50)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('youtube', 50)->nullable();
            $table->string('otra_red', 50)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
