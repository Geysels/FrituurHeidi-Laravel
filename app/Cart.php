<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Cart
{
    private $items = [];

    // Singleton pattern. Restricts the instantiation of a class to one "single" instance
    private static ?Cart $instance = null; // Cart|null

    // This is the only way to get the Cart
    public static function getInstance(Request $request): Cart
    {
        // If a cart already exists, it will return it
        if (static::$instance != null) return static::$instance;
        // Else it will check if there is one saved in the session
        // Lastly it will create a new one if none of the above applies
        static::$instance =
            $request->session()->has('cart') ?
            $request->session()->get('cart') :
            new static();

        $request->session()->put('cart',  static::$instance);
        return static::$instance;
    }

    // Prevent the class from being constructed externally
    private function __construct()
    {
    }

    public function getItems(): array
    {
        return $this->items;
    }
    public function getTotalQty(): int
    {
        return count($this->items);
    }

    public function getTotalPrice(): float
    {
        // Sum all the prices from the cart
        return array_reduce($this->items, function (float $accumulator, $item) {
            return $accumulator + $item['product']->price * $item['qty'];
        }, 0);
    }

    public function addProduct(Request $request, $product, $product_id): void
    {
        // If the same product is in the cart, just add an extra one
        if (array_key_exists($product_id, $this->items)) {
            $storedItem = $this->items[$product_id];
            $storedItem['qty']++;
            $storedItem['subTotal'] = $product->price * $storedItem['qty'];
        } else {
            $storedItem = ['qty' => 1, 'subTotal' => $product->price, 'product' => $product];
        }

        $this->items[$product_id] = $storedItem;

        $request->session()->put('cart', $this);
    }

    public function removeProduct(Request $request, $product_id): void
    {
        if (array_key_exists($product_id, $this->items)) {
            $storedItem = $this->items[$product_id];
            // If there is only 1 product is in the cart, remove it completely
            if ($storedItem['qty'] == 1) {
                $this->items = Arr::except($this->items, [$product_id]);
            } else { // If the are more than 1 of the same product in the cart, remove 1
                $storedItem['qty']--;
                $storedItem['subTotal'] = $storedItem['product']->price * $storedItem['qty'];
                $this->items[$product_id] = $storedItem;
            }
            $request->session()->put('cart', $this);
        }
    }

    // Empty the cart
    public function reset(Request $request): void
    {
        $this->items = [];
        $request->session()->forget('cart');
    }
}
