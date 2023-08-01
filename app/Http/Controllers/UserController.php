<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index() : View
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create() : View
    {
        return view('user.create');
    }

    public function store(StoreRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        User::firstOrCreate($data);

        return redirect()->route('user.index');
    }

    public function show(User $user) : View
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user) : View
    {
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user) : View
    {
        $data = $request->validated();
        $user->update($data);

        return view('user.show', compact('user'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}

