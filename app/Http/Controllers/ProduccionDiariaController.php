<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProduccionDiaria;
use App\Models\User;
use App\Models\Proceso;

class ProduccionDiariaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'proceso_id' => 'required|exists:procesos,id',
            'fecha_produccion' => 'required|date',
            'cantidad_producida' => 'required|integer',
            'observaciones' => 'nullable|string',
        ]);

        ProduccionDiaria::create($request->all());

        return response()->json(['message' => 'Producción registrada correctamente']);
    }
}

