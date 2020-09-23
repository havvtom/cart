<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariationType;
use App\Models\Product;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name'
    ];

    public function type ()
    {
    	return $this->hasOne(ProductVariationType::class, 'id', 'product_variation_type_id');
    }

    public function product ()
    {
    	return $this->belongsTo(Product::class);
    }
}
