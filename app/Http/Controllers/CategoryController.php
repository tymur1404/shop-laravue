<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index() : View
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create() : View
    {
        return view('category.create');
    }

    public function store(StoreRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        Category::firstOrCreate($data);

        return redirect()->route('category.index');
    }

    public function show(Category $category) : View
    {
        return view('category.show', compact('category'));
    }

    public function edit(Category $category) : View
    {
        return view('category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category) : View
    {
        $data = $request->validated();
        $category->update($data);

        return view('category.show', compact('category'));
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->route('category.index');
    }
}

