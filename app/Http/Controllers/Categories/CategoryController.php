<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryCollection;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::with('children')->parents()->ordered()->get();

    	return new CategoryCollection($categories);
    }
}
