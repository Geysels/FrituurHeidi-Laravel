<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

use Illuminate\Http\Request;
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

Route::get('/bestellen', [
    ProductController::class,
    'index'
])->name('order.main');

Route::get('/add-to-cart/{id}', [
    CartController::class,
    'addProductToCart'
])->name('addToCart');

Route::get('/delete-from-cart/{id}', [
    CartController::class,
    'removeProductFromCart'
])->name('removeFromCart');

Route::get('/empty-cart', [
    CartController::class,
    'emptyCart'
])->name('emptyCart');

Route::get('/checkout', [
    CheckoutController::class,
    'displayCart'
])->name('checkout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('voyager.orders.show');
});
