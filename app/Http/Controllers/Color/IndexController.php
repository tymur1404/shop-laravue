<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class IndexController extends Controller
{
    public function __invoke() : \Illuminate\Contracts\View\View
    {
        $colors = Color::all();
        return view('color.index', compact('colors'));
    }
}
