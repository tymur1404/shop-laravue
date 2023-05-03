<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Color\StoreRequest;
use App\Models\Color;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) : \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        Color::firstOrCreate($data);

        return redirect()->route('color.index');
    }
}
