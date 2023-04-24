<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsignaturaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{id}', 'CategoryController@show');
Route::post('/categories', 'CategoryController@store');
Route::put('/categories/{id}', 'CategoryController@update');
Route::delete('/categories/{id}', 'CategoryController@destroy');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    Route::post('/asignaturas', [AsignaturaController::class, 'store']);
    Route::put('/asignaturas/{id}', [AsignaturaController::class, 'update']);
    Route::delete('/asignaturas/{id}', [AsignaturaController::class, 'destroy']); 
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('asignaturas', AsignaturaController::class)->except([
        'create', 'edit'
    ]);
    Route::get('/asignaturas', [AsignaturaController::class, 'index']);
    Route::get('/asignaturas/{id}', [AsignaturaController::class, 'show']);
    Route::post('/asignaturas', [AsignaturaController::class, 'store']);
    Route::put('/asignaturas/{id}', [AsignaturaController::class, 'update']);
    Route::delete('/asignaturas/{id}', [AsignaturaController::class, 'destroy']);
    Route::get('/asignaturas', [AsignaturaController::class, 'index']);
    Route::get('/asignaturas/{id}', [AsignaturaController::class, 'show']);
});

Route::get('asignaturas', [AsignaturaController::class, 'index']);
Route::get('asignaturas/{id}', [AsignaturaController::class, 'show']);
