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
        Schema::create('empleado_servicio', function (Blueprint $table) {
            $table->foreignId('empleado_id')->constrained('empleados')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('servicio_id')->constrained('servicios')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unique(['servicio_id', 'empleado_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_servicio');
    }
};
