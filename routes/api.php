<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\ClientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ClientsController::class)->prefix('clients')->group(function () {
    Route::get('/getAll', 'getAll');
    Route::get('/getAllWithCars','getAllWithCars');
    Route::post('/create', 'create');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});



Route::controller(CarsController::class)->prefix('cars')->group(function () {
    Route::get('/getAll', 'getAll');
    Route::get('/getAllIsParked', 'getAllIsParked');
    Route::get('/getAllByOwner/{ownerId}', 'getAllByOwner');
    Route::post('/create', 'create');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});


