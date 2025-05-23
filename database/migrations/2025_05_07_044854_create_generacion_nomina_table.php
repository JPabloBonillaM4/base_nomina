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
        Schema::create('generacion_nomina', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental
            $table->foreignId('periodo_nomina_id')->constrained('periodos_nomina')->onDelete('cascade'); // Relación con la tabla 'periodos_nomina'
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); // Relación con la tabla 'users' (empleados)
            $table->decimal('total_percepciones', 12, 2)->default(0.00); // Suma total de las percepciones
            $table->decimal('total_deducciones', 12, 2)->default(0.00); // Suma total de las deducciones
            $table->decimal('impuesto_sobre_la_renta', 12, 2)->default(0.00); // Impuesto sobre la renta retenido
            $table->decimal('seguridad_social', 12, 2)->default(0.00); // Deducciones de seguridad social (IMSS, etc.)
            $table->decimal('otros_impuestos', 12, 2)->default(0.00); // Otros impuestos retenidos
            $table->decimal('neto_pagado', 12, 2)->default(0.00); // Cantidad neta a pagar al empleado
            $table->date('fecha_pago')->nullable(); // Fecha en que se realizó el pago
            $table->string('metodo_pago')->nullable(); // Método de pago (transferencia, efectivo, etc.)
            $table->string('referencia_pago')->nullable(); // Número de referencia del pago (si aplica)
            $table->timestamps(); // Columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generacion_nomina');
    }
};
