<?php

use App\Enums\InteresesForm;
use App\Enums\MotivosInteresadosForm;
use App\Enums\SectoresForm;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interesados', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('area_id')
                ->constrained()
                ->noActionOnUpdate()
                ->restrictOnDelete();
            $table->string('cuerpo_red_grupo');
            $table->string('representante_contacto', 150);
            $table->string('nombre_interesado', 150);
            $table->string('institucion');
            $table->string('puesto', 150);
            $table->string('email', 100);
            $table->string('telefono', 20);
            $table->enum('sector', SectoresForm::forMigration());
            $table->string('otro_sector')->nullable();
            $table->enum('interes', InteresesForm::forMigration());
            $table->json('motivos');
            $table->string('otro_motivo')->nullable();
            $table->string('comentario')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interesados');
    }
};
