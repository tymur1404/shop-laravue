<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Group;
use App\Models\Tag;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index() : View
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create() : View
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $groups = Group::all();

        return view('product.create', compact('tags', 'colors', 'categories', 'groups'));
    }

    public function store(StoreRequest $request) : RedirectResponse
    {
        $data = $request->validated();
        $this->productService->createOrUpdate($data);

        return redirect()->route('product.index');
    }

    public function show(Product $product) : View
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product) : View
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $groups = Group::all();

        return view('product.edit', compact('product', 'tags', 'colors', 'categories', 'groups'));
    }

    public function update(UpdateRequest $request, Product $product) : View
    {
        $data = $request->validated();

        $this->productService->createOrUpdate($data, $product);

        return view('product.show', compact('product'));
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}

