<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function index() : View
    {
        $orders = Order::with('user')->get();

        return view('order.index', compact('orders'));
    }

    public function show(Order $order) : View
    {
        $order = $order->load('user');
        $products = json_decode($order->products, true);

        return view('order.show', compact('order', 'products'));
    }
}

