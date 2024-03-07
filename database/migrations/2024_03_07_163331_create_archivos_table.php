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
        Schema::create('archivos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('registro_id')
                ->constrained()
                ->noActionOnUpdate()
                ->onDelete('cascade');
            $table->string('ruta');
            $table->enum('tipo', ['Video', 'Documento']);
            $table->uuid('user_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};