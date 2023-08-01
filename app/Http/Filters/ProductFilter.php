<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const CATEGORIES = 'categories';
    const COLORS = 'colors';
    const PRICES = 'prices';
    const TAGS = 'tags';

    protected function getCallback(): array
    {
        return [
            self::CATEGORIES => [$this, 'categories'],
            self::COLORS => [$this, 'colors'],
            self::PRICES => [$this, 'prices'],
            self::TAGS => [$this, 'tags'],
        ];
    }

    protected function categories(Builder $builder, int $value) : void
    {
        $builder->whereIn('category_id', $value);
    }

    protected function colors(Builder $builder, $value) : void
    {
        $builder->whereHas('colors', function($b) use ($value){
            $b->whereIn('color_id', $value);
        });
    }


    protected function prices(Builder $builder, array $value) : void
    {
        $builder->whereBetween('price', $value);
    }

    protected function tags(Builder $builder, $value) : void
    {
        $builder->whereHas('tags', function($b) use ($value){
            $b->whereIn('tag_id', $value);
        });
    }

}
