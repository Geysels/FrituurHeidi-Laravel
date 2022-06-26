<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RandomItemController;

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
})->name('home');

Route::get('/bestellen', [
    ProductController::class,
    'index'
])->middleware('auth')->name('order.main');

Route::get('/bestellen/{id}', [
    ProductController::class,
    'index'
])->middleware('auth')->name('getProductsFromCategory');

Route::post('/add-to-cart', [
    CartController::class,
    'addProductToCart'
])->middleware('auth')->name('addToCart');

Route::get('/delete-from-cart/{id}', [
    CartController::class,
    'removeProductFromCart'
])->middleware('auth')->name('removeFromCart');

Route::get('/empty-cart', [
    CartController::class,
    'emptyCart'
])->middleware('auth')->name('emptyCart');

Route::get('/checkout', [
    CheckoutController::class,
    'displayCart'
])->middleware('auth')->name('checkout');

Route::post(
    '/checkout/submit',
    [CheckoutController::class, 'submitOrder']
);

Route::get('/register', [RegistrationController::class, 'create'])->name('register');
Route::post('register', [RegistrationController::class, 'store']);

Route::get('/random', [RandomItemController::class, 'randomitem'])->name('random');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::group(['middleware' => 'authVoyager:management'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('voyager.dashboard');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('voyager.orders.show');
        Route::get('/orders/{id}/complete', [OrderController::class, 'complete'])->name('voyager.orders.complete');
    });
});
