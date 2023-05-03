<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke() : \Illuminate\Contracts\View\View
    {
        return view('user.create');
    }
}
