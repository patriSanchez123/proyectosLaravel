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
        Schema::create('alumno_modulo', function (Blueprint $table) {
           
            $table->foreignId('modulo_id')->constrained('modulos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('alumno_id')->constrained('alumnos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unique(['modulo_id', 'alumno_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumno_modulo');
    }
};
