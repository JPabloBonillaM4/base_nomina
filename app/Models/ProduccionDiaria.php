<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduccionDiaria extends Model
{
    use HasFactory;

    protected $table = 'produccion_diaria';
    protected $primaryKey = 'id_produccion';

    protected $fillable = [
        'usuario_id',
        'proceso_id',
        'fecha_produccion',
        'cantidad_producida',
        'observaciones',
    ];

    // Relación con User
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relación con Proceso
    public function proceso()
    {
        return $this->belongsTo(Proceso::class, 'proceso_id');
    }
}
