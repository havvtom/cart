<?php

namespace Tests\Unit\Models\Categories;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Product;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_it_has_many_children()
    {
    	$category = Category::factory()->create(['parent_id' => null]);

    	$category->children()->save(
    		Category::factory()->create(['parent_id' => 1])
    	);

    	$this->assertInstanceOf(Category::class, $category->children->first());
    }

    public function test_it_can_fetch_only_parents()
    {
    	$category = Category::factory()->create();

    	$category->children()->save(
    		Category::factory()->create(['order' => 2])
    	);

    	$this->assertEquals(1, Category::parents()->count());
    }

    public function test_it_is_orderable_by_numbered_order()
    {
    	$category = Category::factory()->create(['order' => 2]);

    	$anotherCategory = Category::factory()->create();

    	$this->assertEquals($anotherCategory->name, Category::ordered()->first()->name);
    }

    public function test_it_has_many_products()
    {
        $category = Category::factory()->create();

        $category->products()->attach( Product::factory()->create() );

        $this->assertEquals(1, $category->products()->count());
    }
}
