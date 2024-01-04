<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = intval($cart[$id]['quantity']) + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'feature_image_path' => $product->feature_image_path,
                'quantity' => 1

            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }
    public function showCart()
    {
        $categories = Category::where('parent_id', 0)->get();
        $carts = session()->get('cart');
        if (empty($carts)) {
            $carts = [];
        }
        return view('product.cart.showcart', compact('categories', 'carts'));
    }
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cart_component = view('product.cart.components.cartupdate', compact('carts'))->render();
            return response()->json([
                'cart_component' => $cart_component,
                'code' => 200
            ], 200);
        }
    }
    public function deleteCart(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cart_component = view('product.cart.components.cartupdate', compact('carts'))->render();
            return response()->json([
                'cart_component' => $cart_component,
                'code' => 200
            ], 200);
        }
    }
    public function detail($slug, $id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $product = Product::find($id);
        $product->view_count++;
        $product->save();
        return view('product.detail.index', compact('categories', 'product'));
    }

    public function storeReview(Request $request, $id)
    {
        if (auth()->check()) {
            $review = ProductReview::create([
                'rating' => $request->get('rating'),
                'comment' => $request->get('comment'),
                'customer_id' => auth()->user()->id, // Lấy ID của người dùng đang đăng nhập
                'product_id' => $id,
            ]);
            $review->save();
            return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi.');
        } else {
            return redirect()->route('login');
        }
    }
}
