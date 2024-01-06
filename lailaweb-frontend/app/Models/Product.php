<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    const paginates = 5;
    use SoftDeletes;
    protected $table = 'products';
    // Trong model Product
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }
    // public function getProductSearch($request)
    // {
    //     $products = new Product();
    //     if (!empty($request->product_id)) {
    //         $products = $products->where('products.id', $request->product_id);
    //     }
    //     if (!empty($request->name)) {
    //         $products = $products->where('products.name', 'like', '%' . $request->name . '%');
    //     }
    //     if (!empty($request->category_id)) {
    //         $products = $products->where('products.category_id', $request->category_id);
    //     }
    //     if (!empty($request->tags)) {
    //         $products = $products->join('product_tags', 'products.id', 'product_tags.product_id')
    //             ->join('tags', 'product_tags.tag_id', 'tags.id')
    //             ->where('tags.name', 'like', '%' . $request->tags . '%');
    //     }
    //     $products = $products
    //         ->groupBy('products.id')
    //         ->select('products.*')
    //         ->latest('products.created_at');
    //     return $products;
    // }
}
