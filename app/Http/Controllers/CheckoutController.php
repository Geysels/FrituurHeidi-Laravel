<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Category;

class CheckoutController extends Controller
{
    public function displayCart(Request $request)
    {
        $cart = Cart::getInstance($request);
        $categories = Category::all();

        return view('order.pages.checkout', [
            'storedItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice(),
            'categories' => $categories,
        ]);
    }
}
