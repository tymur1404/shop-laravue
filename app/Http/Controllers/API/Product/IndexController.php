<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request) : \Illuminate\Http\Resources\Json\ResourceCollection
    {
        $data = $request->validated();

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);

        $products = Product::filter($filter)->paginate(6, ['*'], 'page', $data['page']);
        return ProductResource::collection($products);
    }
}
