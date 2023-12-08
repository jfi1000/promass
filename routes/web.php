<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaViewController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('/entradas', [EntradaViewController::class, 'store']);
    Route::get('/entradas', [EntradaViewController::class, 'index']);
    Route::get('/entradas/create', [EntradaViewController::class, 'create']); 
    Route::get('/entradas/buscar-entradas', [EntradaViewController::class, 'buscar']);
    // Route::get('/entradas/{id}', [EntradaViewController::class, 'detalle']);

});
