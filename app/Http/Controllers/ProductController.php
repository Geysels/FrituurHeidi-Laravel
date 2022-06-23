<?php

namespace App\Http\Controllers;

use App\Category;
use App\Cart;
use App\Option;
use Illuminate\Http\Request;
use App\Product;
use App\OptionProduct;

class ProductController extends Controller
{
    public function index(Request $request, $category_id = -1)
    {
        $categories = Category::where('visible', '=', '1')->get();
        $products = [];
        if ($category_id != -1) {
            $products = Product::where('category_id', '=', $category_id)->get();
            foreach ($products as $product) {
                $productOptions = OptionProduct::where('product_id', '=', $product->id)->get();
                foreach ($productOptions as $option) {
                    $opt = Option::find($option->option_id);
                    $option->name = $opt->name;
                    $option->price = $opt->price;
                }
                $product->options = $productOptions;
            }
        }
        $cart = Cart::getInstance($request);
        return view('order.main', [
            'storedItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice(),
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
