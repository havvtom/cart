<?php

namespace Tests\Unit\Products;

use Tests\TestCase;
use App\Models\ProductVariation;
use App\Models\Product;
use App\Models\ProductVariationType;

class ProductVariationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_has_one_variation_type()
    {
        $productVariation = ProductVariation::factory()->create();

        $this->assertInstanceOf(ProductVariationType::class, $productVariation->type);
    }

    public function test_has_belongs_to_a_product()
    {
        $productVariation = ProductVariation::factory()->create();

        $this->assertInstanceOf(Product::class, $productVariation->product);
    }
}
