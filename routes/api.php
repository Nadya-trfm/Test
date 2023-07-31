<?php

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

Route::controller(ClientsController::class)->group(function () {
    Route::get('/clients/getAll', 'getAll');
});

Route::controller(ClientsController::class)->group(function () {
    Route::post('/clients/create', 'create');
});

Route::controller(ClientsController::class)->group(function () {
    Route::put('/clients/update/{id}', 'update');
});

Route::controller(ClientsController::class)->group(function () {
    Route::delete('/clients/delete/{id}', 'delete');
});
