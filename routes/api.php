<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//#########################################
//                  SIRECOB
//#########################################

Route::apiResource('libros', App\Http\Controllers\sirecob\LibroController::class)->only('index', 'show', 'destroy', 'store');
Route::apiResource('Estudiante', App\Http\Controllers\sirecob\EstudanteController::class)->only('index', 'show', 'destroy', 'store', 'update');
//Route::apiResource('Docente', App\Http\Controllers\DocenteController::class)->only('index', 'show', 'destroy', 'store', 'update');
//Route::apiResource('Tutor', App\Http\Controllers\TutorController::class)->only('index', 'show', 'destroy', 'store', 'update');
Route::apiResource('Prestamo_Libros', App\Http\Controllers\sirecob\PestamolibrosController::class)->only('index', 'show', 'destroy', 'store', 'update');
Route::apiResource('Proyectos_Grado', App\Http\Controllers\sirecob\ProyectoGradoController::class)->only('index', 'show', 'destroy', 'store', 'update');