<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke() : \Illuminate\Contracts\View\View
    {

        return view('main.index');
    }
}
