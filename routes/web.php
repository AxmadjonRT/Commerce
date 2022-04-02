<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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
Route::post('/store', [ClientsController::class, 'store']);

Route::post('/store', [OrderController::class, 'store']);



Route::get('clients/', [ClientsController::class, 'show']);
Route::get('currency/', [CurrencyController::class, 'stores']);
Route::get('/', [OrderController::class, 'index']);

