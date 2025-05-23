<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignacionUsersProductoController; // Asegúrate de importar el controlador
use App\Http\Controllers\ProduccionDiariaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('asignaciones', AsignacionUsersProductoController::class);

Route::post('/producciones', [ProduccionDiariaController::class, 'store'])->name('producciones.store');
