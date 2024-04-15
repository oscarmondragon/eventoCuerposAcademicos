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
        Schema::create('lineas_catalogos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cuerpo_academico_id');
            $table->string('nombre');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cuerpo_academico_id')->references('id')->on('cuerpos_academicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas_catalogos');
    }
};
