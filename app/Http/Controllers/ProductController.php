<?php

namespace App\Http\Controllers;

use App\Category;
use App\Cart;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();

        $cart = Cart::getInstance($request);

        return view('order.main', [
            'storedItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice(),
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
