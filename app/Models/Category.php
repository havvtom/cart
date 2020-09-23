<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catergory;
use App\Models\Product;
use App\Models\Traits\HasChildren;
use App\Models\Traits\IsOrderable;

class Category extends Model
{
	protected $fillable = ['name', 'parent_id', 'order', 'slug'];

    use HasFactory, HasChildren, IsOrderable;     

    public function children()
    {
    	return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
    	return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }
}
