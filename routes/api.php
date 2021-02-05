<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ConfigurationController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas de usuario-cliente
Route::get('/customers',[CustomerController::class, 'index']);
Route::post('/customers/create',[CustomerController::class, 'store']);
Route::get('/customers/{id}',[CustomerController::class, 'show']);
Route::put('/customers/{id}',[CustomerController::class, 'update']);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);





