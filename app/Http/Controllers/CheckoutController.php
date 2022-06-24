<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Category;
use App\Order;
use App\OrderProduct;
use App\OrderProductOption;
use DateTime;

class CheckoutController extends Controller
{
    public function displayCart(Request $request)
    {
        $cart = Cart::getInstance($request);

        return view('order.pages.checkout', [
            'storedItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice(),
        ]);
    }

    public function submitOrder(Request $request)
    {
        // Check that there is something in the cart
        $cart = Cart::getInstance($request);
        if ($cart == null || $cart->getTotalQty() == 0) return;

        // Create the order and add the products
        $order_id = $this->createOrder();
        $this->addProductsToOrder($order_id, $cart->getItems());

        // Empty the cart
        $cart->reset($request);
        return redirect('/');
    }

    public function createOrder(): int
    {
        $order = new Order;
        $order->user_id = 7; // TODO: Get the user_id from the login
        // Format the pickuptime to YYYY-MM-DD hh:mm:ss
        $time = request('pickuptime');
        $date = new DateTime;
        $date->setTimestamp(strtotime($time));
        $order->pickuptime = $date;

        $order->save();
        return $order->id;
    }

    public function addProductsToOrder(int $order_id, $cartItems)
    {
        foreach ($cartItems as $cartItem) {
            $order_product = new OrderProduct;
            $order_product->price = $cartItem['product']->price;
            $order_product->amount = $cartItem['qty'];
            // $order_product->remark = $cartItem['product']->remark;
            $order_product->order_id = $order_id;
            $order_product->product_id = $cartItem['product']->id;

            $order_product->save();
            $order_product_id = $order_product->id;

            $this->addOptionsToProductInOrder($order_product_id, $cartItem['product']->options);
        }
    }

    public function addOptionsToProductInOrder(int $order_product_id, $options)
    {
        if ($options == null) return;
        foreach ($options as $option) {
            $order_product_option = new OrderProductOption;
            $order_product_option->order_product_id = $order_product_id;
            $order_product_option->option_id = $option->id;

            $order_product_option->save();
        }
    }
}
