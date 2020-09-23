<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductShowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_fails_when_product_cannot_be_found()
    {
        $this->json('GET', 'api/products/hey-wena')
            ->assertStatus(404);
    }

    public function test_it_finds_product_when_product_exists()
    {
        $product = Product::factory()->create();

        $this->json('GET', "api/products/{$product->slug}")
            ->assertStatus(200);

    }

}
