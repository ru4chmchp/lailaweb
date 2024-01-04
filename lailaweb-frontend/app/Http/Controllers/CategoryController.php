<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($slug, $category_id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $category = Category::find($category_id);
        if ($category->parent_id === 0) {
            $products = Product::whereHas('category', function ($query) use($category_id){
                $query->where('parent_id', $category_id);
            })->paginate(12);
        } else {
            $products = Product::where('category_id', $category_id)->paginate(12);
        }
        
        return view('product.category.list', compact('categories', 'products'));
    }
}
