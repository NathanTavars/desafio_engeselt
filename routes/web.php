<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function() {
    return view('clients.index');
});
Route::resource('/', ClientController::class);
Route::resource('clients', ClientController::class);
Route::get('/show', [ClientController::class, 'show'])->name('clients.show');


Route::get('/orders', function() {
    return view('orders.index');
});
Route::resource('/orders', OrderController::class);
Route::resource('orders', OrderController::class);
Route::get('/export', [OrderController::class, 'export'])->name('orders.export');
Route::get('/filter', [OrderController::class, 'filter'])->name('orders.filter');



