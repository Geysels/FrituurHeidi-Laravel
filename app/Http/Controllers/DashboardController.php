<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\OrderProduct;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $productM = OrderProduct::where('created_at','>',date('Y-m-d', strtotime('-1 months')))->get();
        $productW = OrderProduct::where('created_at','>',date('Y-m-d', strtotime('-1 weeks')))->get();
        $totalM = 0;
        foreach($productM as $product){
            $totalM+=$product->price*$product->amount;
        }
        $totalW = 0;
        foreach($productW as $product){
            $totalW+=$product->price*$product->amount;
        }
        //dd('Monthly revenue: €'.$totalM,'Weekly revenue: €'.$totalW);
        return view('public.pages.dashboard',['m'=>$totalM,'w'=>$totalW]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('voyager.login');
    }
}
