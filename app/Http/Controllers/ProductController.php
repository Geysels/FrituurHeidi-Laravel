<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();
        return view('order.main')->with(compact('products'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('order.main');
    }

    public function getCart(Request $request)
    {
        if (!$request->session()->has('cart')) {
            return view('order.pages.shopping-cart');
        }

        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);

        return view('order.pages.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
