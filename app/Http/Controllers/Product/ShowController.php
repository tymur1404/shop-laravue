<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ShowController extends Controller
{
    public function __invoke(Product $product) : \Illuminate\Contracts\View\View
    {
        return view('product.show', compact('product'));
    }
}
