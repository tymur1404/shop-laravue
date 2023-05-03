<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke() : \Illuminate\Contracts\View\View
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
}
