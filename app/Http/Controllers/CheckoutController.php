<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Category;
use App\Order;

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

    public function submitOrder()
    {
        $order = new Order;

        $order->name = request('name');
        $order->email = request('email');
        $order->telephone = request('telephone');
        dd($order);
        // $order->save();
    }
}
