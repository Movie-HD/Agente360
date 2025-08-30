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
        Schema::create('propiedad_agentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propiedad_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // agente invitado
            $table->decimal('porcentaje_comision', 5, 2)->nullable(); // 50.00 = 50%
            $table->enum('tipo', ['invitado', 'compartido'])->default('invitado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedad_agentes');
    }
};
