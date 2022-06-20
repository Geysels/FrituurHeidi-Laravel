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
    public function index(Request $request)
    {
        $categories = Category::where('visible', '=', '1')->get();

        foreach ($categories as $category) {
            $products = Product::where('category_id', '=', $category->id)->get();
            foreach ($products as $product) {
                $prod = Product::find($product->id);
                $productOptions = OptionProduct::where('product_id', '=', $product->id)->get();
                foreach ($productOptions as $option) {
                    $opt = Option::find($option->option_id);
                    $option->name = $opt->name;
                    $option->price = $opt->price;
                }
                $product->options = $productOptions;
                $product->id = $prod->id;
                $product->name = $prod->name;
                $product->visible = $prod->visible;
                $product->price = $prod->price;
                $product->remark = $prod->remark;
            }
            $category->products = $products;
        }

        $cart = Cart::getInstance($request);

        return view('order.main', [
            'storedItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice(),
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
