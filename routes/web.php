<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/new_client', [\App\Http\Controllers\ClientController::class, 'newClientForm']);
Route::post('/new_client_request', [\App\Http\Controllers\ClientController::class, 'newClientRequest'])->name('new_client_request');
