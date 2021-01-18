<?php

use App\Http\Controllers\API\PermisoController;
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
    Route::resource('usuarios', UserController::class);
    Route::resource('roles', RolController::class);
    Route::resource('permisos', PermisoController::class);
});