<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user) : \Illuminate\Contracts\View\View
    {
        return view('user.show', compact('user'));
    }
}
