<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class IndexController extends Controller
{
    public function __invoke() {
        $orders = Order::with('user')->get();
        //dd($orders);
        return view('order.index', compact('orders'));
    }
}
