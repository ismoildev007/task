<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('register', [AuthController::class, 'register_store'])->name('register_store');

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::resource('/product', ProductController::class);
Route::get('/customer', [CustomerController::class, 'index'])->name('customer');
Route::resource('/customer', CustomerController::class);
Route::get('/items', [OrderItemController::class, 'index'])->name('items');
Route::resource('/items', OrderItemController::class);
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::resource('/order', OrderController::class);
Route::get('/category', [MainController::class, 'category'])->name('category');
Route::get('/log', [LogController::class, 'index'])->name('log');
