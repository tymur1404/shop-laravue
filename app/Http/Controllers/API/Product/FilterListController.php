<?php

namespace App\Http\Controllers\API\Product;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class FilterListController
{
    public function __invoke(Product $product)
    {
        $categries = Category::all();
        $colors = Color::all();
        $tags = Tag::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first()->price;
        $minPrice = Product::orderBy('price', 'ASC')->first()->price;

        $result = [
            'categories' => $categries,
            'colors' => $colors,
            'tags' => $tags,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice,
            ],
        ];

        return response()->json($result);
    }
}
