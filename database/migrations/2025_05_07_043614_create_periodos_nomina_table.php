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
        Schema::create('periodos_nomina', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental (id)
            $table->string('nombre')->nullable(); // Nombre descriptivo del periodo (ej: "Semana 1 Mayo 2025", "Quincena 1 Mayo 2025")
            $table->enum('tipo_periodo', ['semanal', 'quincenal', 'mensual']); // Tipo de periodo (semanal, quincenal, mensual)
            $table->date('fecha_inicio'); // Fecha de inicio del periodo
            $table->date('fecha_fin'); // Fecha de fin del periodo
            $table->enum('estado', ['abierto', 'cerrado', 'procesado'])->default('abierto'); // Estado del periodo (abierto, cerrado, procesado), por defecto 'abierto'
            $table->timestamps(); // Columnas 'created_at' y 'updated_at' para el seguimiento de tiempo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos_nomina');
    }
};
