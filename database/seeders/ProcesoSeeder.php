<?php

namespace Database\Seeders;

use App\Models\Proceso;
use Illuminate\Database\Seeder;

class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proceso::create(['nombre' => 'bordadora', 'unidad_medida' => 'pieza', 'tarifa_por_unidad' => 5.00, 'activo' => true]);
        Proceso::create(['nombre' => 'mesa de corte', 'unidad_medida' => 'metro', 'tarifa_por_unidad' => 2.00, 'activo' => true]);
        Proceso::create(['nombre' => 'ensamblado', 'unidad_medida' => 'prenda', 'tarifa_por_unidad' => 8.00, 'activo' => true]);
        Proceso::create(['nombre' => 'manual', 'unidad_medida' => 'hora', 'tarifa_por_unidad' => 15.00, 'activo' => true]);
        Proceso::create(['nombre' => 'bordadora', 'unidad_medida' => 'diseño', 'tarifa_por_unidad' => 3.00, 'activo' => true]);
        // Agrega más procesos según sea necesario
    }
}
