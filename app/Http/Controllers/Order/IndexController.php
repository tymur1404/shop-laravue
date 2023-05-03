<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class IndexController extends Controller
{
    public function __invoke()  : \Illuminate\Contracts\View\View
    {
        $orders = Order::with('user')->get();

        return view('order.index', compact('orders'));
    }
}
