<?php

namespace App\Http\Controllers;

use App\Category;
use App\Cart;
use App\Option;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();
        $options = Option::all();

        $cart = Cart::getInstance($request);

        return view('order.main', [
            'storedItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice(),
            'products' => $products,
            'categories' => $categories,
            'options' => $options,
        ]);
    }
}
