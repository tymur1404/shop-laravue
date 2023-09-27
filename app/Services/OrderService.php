<?php

namespace App\Services;

use App\Models\ColorProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OrderService
{
    public static function store(array $data): Order
    {
        $password = Hash::make('1235334');

        $user = User::firstOrCreate([
            'email' => $data['email']
        ], [
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'password' => $password,
        ]);

        $order = Order::create([
            'products' => json_encode($data['products']),
            'user_id' => $user->id,
            'total_price' => $data['total_price'],
        ]);

        return $order;
    }
}
