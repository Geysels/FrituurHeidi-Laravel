<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProductToCart(Request $request)
    {
        // Get the product
        $selectedProduct_json = $request->input('selectedProduct');
        if (!$selectedProduct_json) abort(400); // There is no product to add
        $selectedProduct = json_decode($selectedProduct_json);

        // Get the product options
        $selectedOptions_json = $request->input('selectedOptions');
        // If the are no selectedOptions then json_decode will fail. This checks for the null
        $selectedOptions = $selectedOptions_json ? array_map('json_decode', $selectedOptions_json) : null;

        Cart::getInstance($request)->addProduct($request, $selectedProduct, $selectedOptions);

        return back();
    }

    public function removeProductFromCart(Request $request, $position)
    {
        Cart::getInstance($request)->removeProduct($request, $position);

        return back();
    }

    public function emptyCart(Request $request)
    {
        Cart::getInstance($request)->reset($request);

        return redirect()->route('order.main');
    }
}
