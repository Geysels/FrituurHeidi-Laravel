<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderProduct;
use App\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '=', 'created')
            ->where('pickuptime', '<', date('Y-m-d', strtotime('+1 days')))
            ->where('pickuptime', '>', date('Y-m-d', strtotime(now())))
            ->get();
        return view('public.pages.dashboard', ['orders' => $orders]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
