<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) : OrderResource
    {
        $data = $request->validated();

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


        return new OrderResource($order);
    }
}
