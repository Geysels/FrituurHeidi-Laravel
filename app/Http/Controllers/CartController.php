<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProductToCart(Request $request)
    {
        $selectedProduct = json_decode($request->input('selectedProduct'));
        // If the are no selectedOptions then json_decode will fail. This checks for the null
        $selectedOptions_json = $request->input('selectedOptions');
        if ($selectedOptions_json) {
            $selectedOptions = array_map('json_decode', $request->input('selectedOptions'));
        } else {
            $selectedOptions = null;
        }

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
