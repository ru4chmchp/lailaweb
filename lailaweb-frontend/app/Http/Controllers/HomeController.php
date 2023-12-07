<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::all();
        $productsFeature = Product::latest()->take(6)->get();
        $productsRecommend = Product::latest('view_count', 'desc')->take(12)->get();
        $newsletters = Newsletter::where('id', '!=', 3)->latest()->take(2)->get();
        $newslettersid3 = Newsletter::where('id',3)->first();
        return view('home.home', compact('sliders', 'categories', 'products', 'productsFeature', 'productsRecommend', 'newsletters','newslettersid3'));
    }
}
