<?php

use App\Models\Product;
use App\Models\Setting;

function getConfigValueFromSettingTable($configKey)
{
    $setting = Setting::where('config_key', $configKey)->first();
    if (!empty($setting)) {
        return $setting->config_value;
    }
    return null;
}

function getCartItemCount()
{
    $carts = session()->get('cart');
    $totalQuantity = 0;

    if ($carts) {
        foreach ($carts as $cartItem) {
            $totalQuantity += (int)$cartItem['quantity'];
        }
    }

    return $totalQuantity;
}

function getProductOfCategory($parent_id)
{
    $productTag = Product::whereHas('category', function($query) use ($parent_id) {
        $query->where('parent_id', $parent_id)->where('stock',1);
    })->take(8)->get();
    return $productTag;
}
