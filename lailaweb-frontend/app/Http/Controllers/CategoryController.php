<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($slug,$category_id) {
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::where('category_id',$category_id)->paginate(12);
        return view('product.category.list', compact('categories','products'));
    }
}
