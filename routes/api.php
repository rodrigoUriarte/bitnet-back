<?php

use App\Http\Controllers\API\ForoController;
use App\Http\Controllers\API\ForoPreguntasController;
use App\Http\Controllers\API\PermisoController;
use App\Http\Controllers\API\PreguntaController;
use App\Http\Controllers\API\RespuestaController;
use App\Http\Controllers\API\RolController;
use App\Http\Controllers\API\UserController;
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

// Route::middleware('auth:api')->get('/usuarios', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => ['api'],
], function(){
    Route::apiResource('usuarios', UserController::class);
    Route::apiResource('roles', RolController::class);
    Route::apiResource('permisos', PermisoController::class);
    Route::apiResource('foros', ForoController::class);
    Route::apiResource('foros.preguntas', PreguntaController::class)->shallow();
    Route::apiResource('respuestas', RespuestaController::class);
});