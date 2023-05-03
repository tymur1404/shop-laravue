<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;

class ShowController extends Controller
{
    public function __invoke(Group $group) : \Illuminate\Contracts\View\View
    {
        return view('group.show', compact('group'));
    }
}
