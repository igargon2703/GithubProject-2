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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();

            // 1º Definición de las columnas de clave foránea
            $table->foreignId('alumno_id')->constrained('alumno');
            $table->foreignId('modulo_id')->constrained('modulo')->onDelete('restrict');

            // 2º Nota decimal y curso
            $table->decimal('nota', 4, 2)->nullable();
            $table->unsignedBigInteger('curso');

            $table->timestamps();

            // 3º Clave única compuesta por alumno, módulo y curso
            $table->unique(['alumno_id', 'modulo_id', 'curso']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};