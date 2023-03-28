<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::factory(5)->create();
        \App\Models\Group::factory(5)->create();

        $tags = \App\Models\Tag::factory(5)->create();
        $colors = \App\Models\Color::factory(5)->create();
        $products = \App\Models\Product::factory(5)->create();

        foreach ($products as $product) {
            $tagsIds = $tags->random(3)->pluck('id');
            $colorsIds = $colors->random(3)->pluck('id');

            $product->tags()->attach($tagsIds);
            $product->colors()->attach($colorsIds);
        }

        \App\Models\User::factory(3)->create();
    }
}
