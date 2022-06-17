<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;

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

Route::post(
    '/checkout/submit',
    [CheckoutController::class, 'submitOrder']
);

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store']);


Route::get('/login', function () {
    return view('login');
})->name('login');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Voyager::routes();
    Route::get('/', [DashboardController::class, 'index'])->name('voyager.dashboard');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('voyager.orders.show');
});
