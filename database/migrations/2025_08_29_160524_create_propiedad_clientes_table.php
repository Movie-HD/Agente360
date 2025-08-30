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
        Schema::create('propiedad_clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizacion_id')->constrained()->cascadeOnDelete();
            $table->foreignId('propiedad_id')->constrained('propiedades')->cascadeOnDelete();
            $table->foreignId('cliente_id')->constrained()->cascadeOnDelete();
            $table->enum('nivel_interes', ['alto', 'medio', 'bajo'])->nullable();
            $table->enum('estado_contacto', ['llamada', 'visita', 'oferta', 'otros'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedad_clientes');
    }
};
