<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke() : \Illuminate\Contracts\View\View
    {
        return view('group.create');
    }
}
