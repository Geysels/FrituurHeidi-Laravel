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
    public function index(Request $request, ?int $category_id = null)
    {
        $categories = Category::where('visible', '=', '1')->get();
        $products = [];
        if ($category_id) {
            $products = Product::where('category_id', '=', $category_id)->get();
            // Add the products information into its category
            foreach ($products as $product) {
                $productOptions = OptionProduct::where('product_id', '=', $product->id)->get();
                // Add the available product options information into its product inside the category
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
            'cartItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice(),
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
