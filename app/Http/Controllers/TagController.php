<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreRequest;
use App\Http\Requests\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index() : View
    {
        $tags = Tag::all();

        return view('tag.index', compact('tags'));
    }

    public function create() : View
    {
        return view('tag.create');
    }

    public function store(StoreRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        Tag::firstOrCreate($data);

        return redirect()->route('tag.index');
    }

    public function show(Tag $tag) : View
    {
        return view('tag.show', compact('tag'));
    }

    public function edit(Tag $tag) : View
    {
        return view('tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag) : View
    {
        $data = $request->validated();
        $tag->update($data);

        return view('tag.show', compact('tag'));
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()->route('tag.index');
    }
}

