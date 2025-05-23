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
        Schema::create('asignacion_users_producto', function (Blueprint $table) {
            $table->id('id_asignacion');
            $table->unsignedBigInteger('usuario_id'); // Cambiado a usuario_id
            $table->unsignedBigInteger('proceso_id'); // Cambiado a proceso_id
            $table->decimal('tarifa_asignada', 8, 2)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('proceso_id')->references('id')->on('procesos')->onDelete('cascade');
        });
    }
};
