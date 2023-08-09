<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
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

Route::get('/', [OrderController::class, 'show_tovars'])->name('tovars');
Route::get('/orders', [OrderController::class, 'show_orders'])->name('orders');
Route::post('/make_order', [OrderController::class, 'make_order'])->name('make_order');

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
