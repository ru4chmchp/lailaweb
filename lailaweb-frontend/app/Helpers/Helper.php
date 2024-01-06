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
function iconFontAwsomeware($key)
{
    switch ($key) {
        case 0:
            return "fa-solid fa-fish dark-grey-text mr-2";
        case 1:
            return "fa-solid fa-whiskey-glass dark-grey-text mr-2";
        case 2:
            return "fa-solid fa-toolbox dark-grey-text mr-2";
        case 3:
            return "fa-solid fa-water dark-grey-text mr-2";
        case 4:
            return "fa-solid fa-utensils dark-grey-text mr-2";
        case 5:
            return "fa-solid fa-square-plus dark-grey-text mr-2";
        default:
            return ""; // Trả về chuỗi rỗng nếu không có khóa tương ứng
    }
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
    $productTag = Product::whereHas('category', function ($query) use ($parent_id) {
        $query->where('parent_id', $parent_id)->where('stock', 1);
    })->take(8)->get();
    return $productTag;
}
