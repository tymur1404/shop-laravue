<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(User  $user) : \Illuminate\Contracts\View\View
    {
        return view('user.edit', compact('user'));
    }
}
