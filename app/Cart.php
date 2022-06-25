<?php

namespace App;

use Illuminate\Http\Request;

class CartItem
{
    private $product;
    private ?array $options = [];
    private int $quantity = 0;
    private float $subTotal = 0.0;

    public function __construct($product, $options)
    {
        $this->product = $product;
        if ($options)
            $this->options = $options;
        $this->quantity = 1;
        $this->subTotal = $this->calculateSubtotal();
    }

    private function calculateSubtotal(): float
    {
        $options_total = array_reduce($this->options, function (float $accumulator, $option) {
            return $accumulator + $option->price;
        }, 0);
        return ($this->product->price + $options_total) * $this->quantity;
    }

    public function getSubtotal(): float
    {
        return $this->subTotal;
    }

    public function getOptionNames(): ?array
    {
        // Similar to foreach ($this->options as $option) return $option->name
        // array_map(fn ($array_item) => $array_item->name, $array)
        return array_map(fn ($option) => (string) $option->name, $this->options);
    }

    public function getOptionIDs(): ?array
    {
        return array_map(fn ($option) => $option->option_id, $this->options);
    }

    public function getProductName(): string
    {
        return (string) $this->product->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getProductId(): int
    {
        return $this->product->id;
    }
}

class Cart
{
    private $cartItems = [];

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

    public function getItems(): ?array
    {
        return $this->cartItems;
    }
    public function getTotalQty(): int
    {
        return count($this->cartItems);
    }

    public function isEmpty(): bool
    {
        return $this->getTotalQty() == 0;
    }

    public function getTotalPrice(): float
    {
        // Sum all the prices from the cart
        return array_reduce($this->cartItems, function (float $accumulator, $item) {
            return $accumulator + $item->getSubtotal();
        }, 0);
    }

    public function addProduct(Request $request, $selectedProduct, ?array $selectedOptions): void
    {
        $cartItem = new CartItem($selectedProduct, $selectedOptions);
        array_push($this->cartItems, $cartItem);

        $request->session()->put('cart', $this);
    }

    public function removeProduct(Request $request, $position): void
    {
        array_splice($this->cartItems, $position, 1);
        $request->session()->put('cart', $this);
    }

    // Empty the cart
    public function reset(Request $request): void
    {
        $this->cartItems = [];
        $request->session()->forget('cart');
    }
}
