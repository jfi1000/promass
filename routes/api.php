<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EntradaApiController;

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
Route::get('/v1/entradas', [EntradaApiController::class, 'index']);
Route::get('/v1/entradas/{id}', [EntradaApiController::class, 'show']);
Route::get('/v1/buscar-entradas', [EntradaApiController::class, 'buscar']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
