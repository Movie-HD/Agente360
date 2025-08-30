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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizacion_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // agente creador
            $table->foreignId('cliente_id')->nullable()->constrained()->cascadeOnDelete(); // propietario
            $table->string('title');
            $table->enum('tipo', ['casa', 'departamento', 'oficina', 'local']);
            $table->string('direccion');
            $table->decimal('precio', 12, 2);
            $table->foreignId('currency_id')->nullable()->constrained('currencies')->nullOnDelete();
            $table->decimal('area_total', 10, 2)->nullable();
            $table->decimal('area_construida', 10, 2)->nullable();
            $table->integer('dormitorios')->nullable();
            $table->integer('banos')->nullable();
            $table->integer('estacionamientos')->nullable();
            $table->integer('antiguedad')->nullable(); // en años
            $table->boolean('amoblado')->default(false);
            $table->boolean('exclusividad')->default(false);
            $table->enum('estado', ['disponible', 'en_negociacion', 'vendido', 'alquilado', 'retirado'])->default('disponible');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
