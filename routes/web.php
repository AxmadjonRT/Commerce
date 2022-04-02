<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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


Route::get('/clients', [ClientsController::class, 'create']);
Route::post('/storeClient', [ClientsController::class, 'storeClient']);

Route::get('/', [OrderController::class, 'index']);
Route::post('/store', [OrderController::class, 'store']);


Route::get('clients/', [ClientsController::class, 'show']);
Route::get('currency/', [CurrencyController::class, 'stores']);


