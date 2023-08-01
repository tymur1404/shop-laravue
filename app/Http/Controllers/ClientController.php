<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function __invoke() : \Illuminate\Contracts\View\View
    {
        return view('client.main.index',);
    }
}
