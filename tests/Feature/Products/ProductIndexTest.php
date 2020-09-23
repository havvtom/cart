<?php

namespace Tests\Feature\Products;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductIndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_it_returns_a_collection_of_products()
    {
        $product = Product::factory()->create();

        $this->json('GET', 'api/products')
            ->assertJsonFragment([
                'id' => $product->id
            ]);
    }

    public function test_it_has_paginated_data()
    {
        $this->json('GET', 'api/products')
            ->assertJsonStructure([
                'links'
            ]);
    }
}
