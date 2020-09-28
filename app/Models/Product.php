<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Category;
use App\Models\ProductVariation;
use App\Scoping\Scoper;
use App\Models\Traits\CanBeScoped;
use App\Models\Traits\HasPrice;


class Product extends Model
{
    use HasFactory, HasPrice, CanBeScoped;

    protected $fillable = [
    	'price',
    	'name',
    	'slug',
    	'description'
    ];

    public function getRouteKeyName()
    {
    	return 'slug';
    }    

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function variations()
    {
        return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
    }

    
}
