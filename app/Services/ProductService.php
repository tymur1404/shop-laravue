<?php

namespace App\Services;

use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function createOrUpdate(array $data, Product $product = null): void
    {
        if(isset($data['preview_image']))
        {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];

        unset($data['tags'], $data['colors']);

        if ($product) {
            $product->update($data);
        } else {
            $product = Product::firstOrCreate([
                'title' => $data['title'],

            ], $data);
        }

        foreach ($tagsIds as $tagId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId,
            ]);

        }

        foreach ($colorsIds as $colorId) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId,
            ]);
        }
    }
}
