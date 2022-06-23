<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Cart
{
    private $items = [];

    // Singleton
    private static ?Cart $instance = null;
    public static function getInstance(Request $request): Cart
    {
        if (static::$instance != null) return static::$instance;

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
        return array_reduce($this->items, function (float $accumulator, $item) {
            return $accumulator + $item['product']->price * $item['qty'];
        }, 0);
    }

    public function addProduct(Request $request, $product, $product_id): void
    {
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
            if ($storedItem['qty'] == 1) {
                $this->items = Arr::except($this->items, [$product_id]);
            } else {
                $storedItem['qty']--;
                $storedItem['subTotal'] = $storedItem['product']->price * $storedItem['qty'];
            }
            $request->session()->put('cart', $this);
        }
    }

    public function reset(Request $request): void
    {
        $this->items = [];
        $request->session()->forget('cart');
    }
}
