<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
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

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/pay', [ProductController::class, 'pay'])->name('pay')->middleware('asaas.client');
Route::get('/new_client', [ClientController::class, 'newClientForm'])->name('new_client_form');
Route::post('/new_client_request', [ClientController::class, 'newClientRequest'])->name('new_client_request');
Route::get('/pix', [PaymentController::class, 'pix'])->name('pix');
