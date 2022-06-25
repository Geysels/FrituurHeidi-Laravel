<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\OrderProduct;
use App\OrderProductOption;
use DateTime;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function displayCart(Request $request)
    {
        $cart = Cart::getInstance($request);

        return view('order.pages.checkout', [
            'cartItems' => $cart->getItems(),
            'totalPrice' => $cart->getTotalPrice(),
        ]);
    }

    public function submitOrder(Request $request)
    {
        // Check that there is something in the cart
        $cart = Cart::getInstance($request);
        if (!$cart || $cart->isEmpty()) abort(400); // Failure!

        // Create the order
        $time = request('pickuptime');
        $order_id = $this->createOrder($time);
        $this->addProductsToOrder($order_id, $cart->getItems());

        // Empty the cart
        $cart->reset($request);
        return redirect()->route('home')->with('toast_success', 'We hebben je bestelling goed ontvangen!');
    }

    // Creates and order and returns its id
    private function createOrder(string $time): int
    {
        // Format the pickuptime
        $date = new DateTime; // Today
        $date->setTimestamp(strtotime($time)); // Only change the time

        // Construct the order
        $order = new Order;
        $order->pickuptime = $date;
        $order->user_id = Auth::id();

        // Save in database
        $order->save();

        // Return the order id from database
        return $order->id;
    }

    private function addProductsToOrder(int $order_id, $cartItems)
    {
        foreach ($cartItems as $cartItem) {
            $order_product = new OrderProduct;
            $order_product->price = $cartItem->getSubtotal();
            $order_product->amount = $cartItem->getQuantity();
            // $order_product->remark = $cartItem->getRemark();
            $order_product->order_id = $order_id;
            $order_product->product_id = $cartItem->getProductId();;

            // Save in database
            $order_product->save();

            // Return the order_product id from database
            $order_product_id = $order_product->id;

            $this->addOptionsToProductInOrder($order_product_id, $cartItem->getOptionIDs());
        }
    }

    private function addOptionsToProductInOrder(int $order_product_id, $options)
    {
        if ($options == null) return;
        foreach ($options as $option) {
            $order_product_option = new OrderProductOption;
            $order_product_option->order_product_id = $order_product_id;
            $order_product_option->option_id = $option;

            // Save in database
            $order_product_option->save();
        }
    }
}
