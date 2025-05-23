<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'unidad_medida', 'tarifa_por_unidad', 'activo'];

    // Un proceso puede tener muchas producciones
    public function producciones()
    {
        return $this->hasMany(ProduccionDiaria::class, 'proceso_id');
    }
}
