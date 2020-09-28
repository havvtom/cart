<?php

namespace Tests\Unit\Products;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductVariation;
use App\Cart\Money;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_uses_slug_for_route_key_name()
    {
    	$product = new Product();

        $this->assertEquals('slug', $product->getRouteKeyName());
    }

    public function test_it_has_many_categories()
    {
        $product = Product::factory()->create();

        $product->categories()->attach(
            Category::factory()->create()
        );

        $this->assertInstanceOf(Category::class, $product->categories->first());
    }

    public function test_it_has_many_variations()
    {
        $product = Product::factory()->create();

        $product->variations()->save(
            ProductVariation::factory()->create()
        );

        $this->assertInstanceOf(ProductVariation::class, $product->variations->first());
    }

    public function test_it_returns_a_money_instance_for_the_price()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf(Money::class, $product->price);
    }

}
