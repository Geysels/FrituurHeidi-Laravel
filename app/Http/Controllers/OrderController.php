<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProductOption;
use App\OrderProduct;
use App\Product;
use App\Category;
use App\Models\User;

class OrderController extends Controller
{
    public function show(Request $request,$id){
        $order = Order::find($id);
        $temp = User::find($order->user_id);
        $user = [
            'id'=>$temp->id,
            'name'=>$temp->name,
            'address'=>$temp->address,
            'place'=>$temp->place,
            'zipcode'=>$temp->zipcode,
            'telephone'=>$temp->telephone,
        ];
        $order->user = $user;
        $products = $order->products = OrderProduct::where('order_id','=',$id)->get();
        foreach($products as $product){
            $newProduct = Product::find($product->product_id);
            $product->name = $newProduct->name;
            $product->price = $newProduct->price;
            $product->category = Category::find($newProduct->category_id)->name;
            $product->remark = $newProduct->remark;
            OrderProductOption::where('order_product_id','=',$product->id);
        }
        return view('orders.index',['order'=>$order]);
    }
}
