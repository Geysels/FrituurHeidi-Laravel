<?php

namespace App;

use Illuminate\Http\Request;

class Cart
{
    private $items = [];
    private $totalQty = 0;
    private $totalPrice = 0;

    // Singleton
    private static $instance = null;
    public static function getInstance(Request $request)
    {
        if (static::$instance != null) return static::$instance;

        static::$instance =
            $request->session()->has('cart') ?
            $request->session()->get('cart') :
            new static();

        return static::$instance;
    }

    // Prevent the class from being constructed externally
    private function __construct()
    {
    }

    public function getItems()
    {
        return $this->items;
    }
    public function getTotalQty()
    {
        return $this->totalQty;
    }
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function addProduct(Request $request, $product, $product_id)
    {
        if (array_key_exists($product_id, $this->items)) {
            $storedItem = $this->items[$product_id];
            $storedItem['qty']++;
            $storedItem['subTotal'] = $product->price * $storedItem['qty'];
        } else {
            $storedItem = ['qty' => 1, 'subTotal' => $product->price, 'product' => $product];
        }

        $this->items[$product_id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $product->price;

        $request->session()->put('cart', $this);
    }

    public function removeProduct(Request $request, $product_id)
    {
        if (array_key_exists($product_id, $this->items)) {
            $storedItem = $this->items[$product_id];
            if ($storedItem['qty'] == 1) {
                unset($this->items[$product_id]);
            } else {
                $storedItem['qty']--;
                $storedItem['subTotal'] = $storedItem['product']->price * $storedItem['qty'];
            }
        } else {
            // TODO: Not possible
        }

        $this->items[$product_id] = $storedItem;
        $this->totalQty--;
        $this->totalPrice -= $storedItem['product']->price;

        $request->session()->put('cart', $this);
    }

    public function reset(Request $request)
    {
        $this->items = [];
        $this->totalQty = 0;
        $this->totalPrice = 0;
        $request->session()->put('cart', $this);
    }
}
