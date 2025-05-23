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
        Schema::create('produccion_diaria', function (Blueprint $table) {
            $table->id('id_produccion'); // Clave primaria
            $table->unsignedBigInteger('usuario_id'); // Cambiado para seguir la convención de 'users'
            $table->unsignedBigInteger('proceso_id'); // Asociado a la tabla 'procesos'
            $table->date('fecha_produccion');
            $table->integer('cantidad_producida');
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('proceso_id')->references('id')->on('procesos')->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccion_diaria');
    }
};
