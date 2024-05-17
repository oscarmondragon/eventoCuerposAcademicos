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
        Schema::create('cuerpos_academicos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('espacio_academico_id')->nullable();
            $table->string('nombre', 150);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('espacio_academico_id')->references('id')->on('espacios_academicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuerpos_academicos');
    }
};
