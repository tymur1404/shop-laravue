<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke() : \Illuminate\Contracts\View\View
    {
        return view('client.main.index',);
    }
}
