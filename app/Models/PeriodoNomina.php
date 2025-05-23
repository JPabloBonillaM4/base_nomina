<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoNomina extends Model
{
    use HasFactory;

    protected $table = 'periodos_nomina'; // Especifica el nombre de la tabla

    protected $fillable = [
        'nombre',
        'tipo_periodo',
        'fecha_inicio',
        'fecha_fin',
        'estado',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public $timestamps = true; // Indica que la tabla tiene las columnas 'created_at' y 'updated_at'
}
