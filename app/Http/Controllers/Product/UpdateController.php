<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        ///TODO
        $data = $request->validated();
        $product->update($data);
//        foreach ($tagsIds as $tagId) {
//            ProductTag::firstOrCreate([
//                'product_id' => $product->id,
//                'tag_id' => $tagId,
//            ]);
//
//        }
//
//        foreach ($colorsIds as $colorId) {
//            ColorProduct::firstOrCreate([
//                'product_id' => $product->id,
//                'color_id' => $colorId,
//            ]);
//
//        }$colorId

        return view('product.show', compact('product'));
    }
}
