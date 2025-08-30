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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('propiedad_cliente_id')->constrained('propiedad_clientes')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // agente asignado
            $table->dateTime('fecha_hora');
            $table->enum('estado', ['pendiente', 'realizada', 'cancelada', 'reprogramada'])->default('pendiente');
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
