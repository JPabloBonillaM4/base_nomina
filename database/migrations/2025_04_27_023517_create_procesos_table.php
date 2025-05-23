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
        Schema::create('procesos', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' autoincremental (clave primaria)
            $table->string('nombre'); // Nombre del proceso (ej. Ensamble de manga)
            $table->text('descripcion')->nullable(); // Descripción del proceso (opcional)
            $table->string('unidad_medida')->nullable(); // Unidad de medida (ej. Pieza, Docena)
            $table->decimal('tarifa_por_unidad', 10, 2)->nullable(); // Tarifa por unidad producida
            $table->boolean('activo')->default(true); // Indica si el proceso está activo (valor por defecto: true)
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at' para el seguimiento de tiempo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos'); // Elimina la tabla 'procesos' si se revierte la migración
    }
};
