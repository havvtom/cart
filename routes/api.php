<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Products\ProductController;

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);