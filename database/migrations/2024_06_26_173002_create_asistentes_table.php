<?php

use App\Enums\TiposForm;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asistentes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nombre', 50);
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('email');
            $table->string('telefono');
            $table->string('lugar_origen', 150);
            $table->string('dependencia', 150);
            $table->enum('tipo', TiposForm::forMigration());
            $table->string('otro_tipo', 100)->nullable();
            $table->string('interes', 150);
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
        Schema::dropIfExists('asistentes');
    }
};
