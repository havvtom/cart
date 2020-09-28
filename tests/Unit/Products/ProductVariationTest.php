<?php

namespace Tests\Unit\Products;

use Tests\TestCase;
use App\Models\ProductVariation;
use App\Models\Product;
use App\Models\ProductVariationType;
use App\Cart\Money;

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

    public function test_it_returns_a_money_instance_for_the_price()
    {
        $variation = Product::factory()->create();

        $this->assertInstanceOf(Money::class, $variation->price);
    }

    public function test_it_returns_the_product_price_if_price_is_missing()
    {
        $product = Product::factory()->create([
            'price' => 1000
        ]);

        $variation = ProductVariation::factory()->create([
            'price' => null,
            'product_id' => $product->id
        ]);

        $this->assertEquals($variation->price->amount(), $variation->price->amount());
    }

    public function test_it_check_if_the_product_price_is_different_to_the_variable_price()
    {
        $product = Product::factory()->create([
            'price' => 1000
        ]);

        $variation = ProductVariation::factory()->create([
            'price' => 2000,
            'product_id' => $product->id
        ]);

        $this->assertTrue($variation->priceVaries());
    }
}
