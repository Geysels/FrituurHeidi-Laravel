<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProductOption;
use App\OrderProduct;
use App\Product;
use App\Category;
use App\Option;
use App\Models\User;

class OrderController extends Controller
{
    public function show(Request $request,$id){
        $order = Order::find($id);
        $temp = User::find($order->user_id);
        $user = (object)[
            'id'=>$temp->id,
            'name'=>$temp->name,
            'address'=>$temp->address,
            'place'=>$temp->place,
            'zipcode'=>$temp->zipcode,
            'telephone'=>$temp->telephone,
        ];
        $order->user = $user;
        $products = $order->products = OrderProduct::where('order_id','=',$id)->get();
        $totaal = 0;
        foreach($products as $product){
            $newProduct = Product::find($product->product_id);
            $product->name = $newProduct->name;
            $product->price = $newProduct->price;
            $product->category = Category::find($newProduct->category_id)->name;
            $product->remark = $newProduct->remark;
            $options = OrderProductOption::where('order_product_id','=',$product->id)->get();
            $newOptions = [];
            foreach($options as $option){
                $option = Option::find($option->option_id);
                array_push($newOptions,$option);
                $totaal += $option->price;
            }
            $product->options = $newOptions;
            $totaal += $product->price*$product->amount;
        }
        return view('orders.index',['order'=>$order,'totaal'=>$totaal]);
    }
    public function complete($id){
        $order = Order::find($id);
        $order->status = "completed";
        $order->save();
        return redirect()->back();
    }
}
