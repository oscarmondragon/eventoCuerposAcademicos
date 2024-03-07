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
        Schema::create('subareas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('area_id')
                ->constrained()
                ->noActionOnUpdate()
                ->onDelete('cascade');
            $table->foreignUuid('grupo_id')
                ->constrained()
                ->noActionOnUpdate()
                ->onDelete('cascade');
            $table->string('nombre');
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subareas');
    }
};
