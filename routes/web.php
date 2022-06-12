<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('public.home');
});

Route::get('/bestellen', [ProductController::class, 'getIndex'])->name('order.main');

Route::get('/add-to-cart/{id}', [
    ProductController::class, 'addToCart'
])->name('product.addToCart');

Route::get('/winkelmandje', [
    ProductController::class, 'getCart'
])->name('shoppingCart');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('voyager.orders.show');
});
