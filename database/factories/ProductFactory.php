<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 3),
            'name'        => $this->faker->word(),
            'price'       => $this->faker->numberBetween(1000000, 100000000),
            'stock'       => $this->faker->numberBetween(1, 1000),
            'image'       => null, // Nullable field
        ];
    }
}