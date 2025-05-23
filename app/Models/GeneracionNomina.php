<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GeneracionNomina extends Model
{
    use HasFactory;

    protected $table = 'generacion_nomina';

    protected $fillable = [
        'periodo_nomina_id',
        'usuario_id',
        'total_percepciones',
        'total_deducciones',
        'impuesto_sobre_la_renta',
        'seguridad_social',
        'otros_impuestos',
        'neto_pagado',
        'fecha_pago',
        'metodo_pago',
        'referencia_pago',
    ];

    protected $casts = [
        'fecha_pago' => 'date',
        'total_percepciones' => 'decimal:2',
        'total_deducciones' => 'decimal:2',
        'impuesto_sobre_la_renta' => 'decimal:2',
        'seguridad_social' => 'decimal:2',
        'otros_impuestos' => 'decimal:2',
        'neto_pagado' => 'decimal:2',
    ];

    public function periodoNomina(): BelongsTo
    {
        return $this->belongsTo(PeriodoNomina::class);
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

