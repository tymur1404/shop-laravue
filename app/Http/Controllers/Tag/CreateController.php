<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke() : \Illuminate\Contracts\View\View
    {
        return view('tag.create');
    }
}
