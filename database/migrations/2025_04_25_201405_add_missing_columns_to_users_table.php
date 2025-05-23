<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'numero_tarjeta')) {
                $table->string('numero_tarjeta')->nullable();
            }
            if (!Schema::hasColumn('users', 'edad')) {
                $table->integer('edad')->unsigned()->nullable();
            }
            if (!Schema::hasColumn('users', 'turno')) {
                $table->string('turno')->nullable();
            }
            if (!Schema::hasColumn('users', 'rol')) {
                $table->string('rol')->nullable();
            }
            if (!Schema::hasColumn('users', 'telefono')) {
                $table->string('telefono')->nullable();
            }
            if (!Schema::hasColumn('users', 'area')) {
                 $table->string('area')->nullable();
            }
            // Agrega aquí cualquier otra columna faltante, definiendo sus tipos de datos y propiedades
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['numero_tarjeta', 'edad', 'turno', 'rol', 'telefono', 'area']);
        });
    }
};

