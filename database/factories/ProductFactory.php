<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    protected $model = \App\Models\Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->text,
            'content' => $this->faker->text,
            'price' => $this->faker->numberBetween($min = 49, $max = 2999),
            'count' => $this->faker->numberBetween($min = 3, $max = 99),
            'is_published' => $this->faker->randomElement([0, 1]),
            'category_id' => \App\Models\Category::get()->random()->id,
            'group_id' => \App\Models\Group::get()->random()->id,
            'preview_image' => $this->faker->imageUrl(),
        ];
    }
}
