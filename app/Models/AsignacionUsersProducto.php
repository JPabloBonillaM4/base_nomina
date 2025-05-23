<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsignacionUsersProducto extends Model
{
    use HasFactory;

    protected $table = 'asignacion_users_producto'; // Especifica el nombre de la tabla si no sigue la convención

    protected $primaryKey = 'id_asignacion'; // Especifica la clave primaria si no es 'id'

    public $timestamps = true; // Indica si la tabla tiene las columnas 'created_at' y 'updated_at'

    protected $fillable = [
        'usuario_id',
        'proceso_id',
        'tarifa_asignada',
        'fecha_inicio',
        'fecha_fin',
        'activo',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'activo' => 'boolean',
        'tarifa_asignada' => 'decimal:2',
    ];

    /**
     * Define la relación con el modelo User.
     *
     * @return BelongsTo
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define la relación con el modelo Proceso.
     *
     * @return BelongsTo
     */
    public function proceso(): BelongsTo
    {
        return $this->belongsTo(Proceso::class);
    }
}
