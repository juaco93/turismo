<?php

use App\Http\Controllers\Admin\AlojamientosController;
use App\Http\Controllers\Admin\GastronomiasController;
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
Route::get('alojamientos', [AlojamientosController::class, 'getAlojamientos']);
Route::get('gastronomia', [GastronomiasController::class, 'getGastronomia']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
