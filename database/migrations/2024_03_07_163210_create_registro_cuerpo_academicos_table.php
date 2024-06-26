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
        Schema::create('registros', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('tipo_solicitante', ['Externo', 'Interno', 'Red']);
            $table->string('cuerpo_grupo_red', 200);
            $table->text('productos_logrados');
            $table->text('casos_exito');
            $table->text('servicios_proyectos');
            $table->string('pais', 50);
            $table->string('espacio_procedencia', 150);
            $table->foreignUuid('user_id')->nullable()
                ->constrained()
                ->noActionOnUpdate()
                ->nullOnDelete();
            $table->boolean('aprobacion')->default(null)->nullable();
            $table->string('observaciones')->nullable();
            $table->string('email', 100)->unique();
            $table->string('telefono', 20);
            $table->boolean('adjuntoPago')->default(false);
            $table->boolean('checkFactura')->default(false)->nullable();
            $table->boolean('checkBanner')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
