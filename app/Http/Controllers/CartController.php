<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProductToCart(Request $request)
    {
        $product_id = $request->input('productId');
        $selectedOptions = $request->input('selectedOptions');

        Cart::getInstance($request)->addProduct($request, $product_id, $selectedOptions);

        return back();
    }

    public function removeProductFromCart(Request $request, $product_id)
    {
        Cart::getInstance($request)->removeProduct($request, $product_id);

        return back();
    }

    // public function getCart(Request $request)
    // {
    //     $cart = Cart::getInstance($request);
    //     $categories = Category::all();

    //     return view('order.pages.shopping-cart', [
    //         'storedItems' => $cart->getItems(),
    //         'totalPrice' => $cart->getTotalPrice(),
    //         'categories' => $categories,
    //     ]);
    // }

    public function emptyCart(Request $request)
    {
        Cart::getInstance($request)->reset($request);

        return redirect()->route('order.main');
    }
}
