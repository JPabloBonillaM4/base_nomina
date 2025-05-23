<?php

namespace App\Http\Controllers;

use App\Models\AsignacionUsersProducto;
use App\Models\User; // Necesitarás el modelo User para el formulario
use App\Models\Proceso; // Necesitarás el modelo Proceso para el formulario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; // Para las redirecciones

class AsignacionUsersProductoController extends Controller
{
    /**
     * Muestra una lista de las asignaciones.
     */
    public function index()
    {
        $asignaciones = AsignacionUsersProducto::all(); // Obtiene todas las asignaciones
        return view('asignaciones.index', compact('asignaciones')); // Pasa las asignaciones a una vista
    }

    /**
     * Muestra el formulario para crear una nueva asignación.
     */
    public function create()
    {
        $usuarios = User::all(); // Obtiene todos los usuarios para el select
        $procesos = Proceso::all(); // Obtiene todos los procesos para el select
        return view('asignaciones.create', compact('usuarios', 'procesos'));
    }

    /**
     * Guarda una nueva asignación en la base de datos.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'proceso_id' => 'required|exists:procesos,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after:fecha_inicio',
            'tarifa_asignada' => 'nullable|numeric|min:0',
            'activo' => 'boolean',
        ]);

        // Crea una nueva asignación usando los datos del formulario
        AsignacionUsersProducto::create($request->all());

        // Redirige a la página de índice con un mensaje de éxito
        return Redirect::route('asignaciones.index')->with('success', 'Asignación creada exitosamente.');
    }

    /**
     * Muestra los detalles de una asignación específica.
     */
    public function show(AsignacionUsersProducto $asignacion)
    {
        return view('asignaciones.show', compact('asignacion'));
    }

    /**
     * Muestra el formulario para editar una asignación existente.
     */
    public function edit(AsignacionUsersProducto $asignacion)
    {
        $usuarios = User::all(); // Obtiene todos los usuarios para el select
        $procesos = Proceso::all(); // Obtiene todos los procesos para el select
        return view('asignaciones.edit', compact('asignacion', 'usuarios', 'procesos'));
    }

    /**
     * Actualiza una asignación existente en la base de datos.
     */
    public function update(Request $request, AsignacionUsersProducto $asignacion)
    {
        // Valida los datos del formulario
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'proceso_id' => 'required|exists:procesos,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after:fecha_inicio',
            'tarifa_asignada' => 'nullable|numeric|min:0',
            'activo' => 'boolean',
        ]);

        // Actualiza la asignación con los datos del formulario
        $asignacion->update($request->all());

        // Redirige a la página de índice con un mensaje de éxito
        return Redirect::route('asignaciones.index')->with('success', 'Asignación actualizada exitosamente.');
    }

    /**
     * Elimina una asignación de la base de datos.
     */
    public function destroy(AsignacionUsersProducto $asignacion)
    {
        $asignacion->delete();

        // Redirige a la página de índice con un mensaje de éxito
        return Redirect::route('asignaciones.index')->with('success', 'Asignación eliminada exitosamente.');
    }
}
