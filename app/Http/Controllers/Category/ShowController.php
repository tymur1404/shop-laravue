<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShowController extends Controller
{
    public function __invoke(Category $category) : \Illuminate\Contracts\View\View
    {
        return view('category.show', compact('category'));
    }
}
