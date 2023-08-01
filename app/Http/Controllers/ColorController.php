<?php

namespace App\Http\Controllers;

use App\Http\Requests\Color\StoreRequest;
use App\Http\Requests\Color\UpdateRequest;
use App\Models\Color;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ColorController extends Controller
{
    public function index() : View
    {
        $colors = Color::all();
        return view('color.index', compact('colors'));
    }

    public function create() : View
    {
        return view('color.create');
    }

    public function store(StoreRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        Color::firstOrCreate($data);

        return redirect()->route('color.index');
    }

    public function show(Color $color) : View
    {
        return view('color.show', compact('color'));
    }

    public function edit(Color $color) : View
    {
        return view('color.edit', compact('color'));
    }

    public function update(UpdateRequest $request, Color $color) : View
    {
        $data = $request->validated();
        $color->update($data);

        return view('color.show', compact('color'));
    }

    public function destroy(Color $color): RedirectResponse
    {
        $color->delete();

        return redirect()->route('color.index');
    }
}

