<?php

namespace Database\Factories;

use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductVariationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductVariation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory()->create()->id,
            'name' => $this->faker->name,
            'product_variation_type_id' => ProductVariationType::factory()->create()->id
        ];
    }
}
