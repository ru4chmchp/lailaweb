<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addToCart($id) {
        // session()->forget('cart');
        // dd('end');
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) 
        {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }
        session()->put('cart',$cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ],200);
    }
    public function showCart() {
        $categories = Category::where('parent_id', 0)->get();
        return view('product.cart.showcart',compact('categories'));
    }
}
