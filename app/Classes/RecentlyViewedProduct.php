<?php

namespace App\Classes;

use App\Models\Product;

class RecentlyViewedProduct
{
    public static function getRecentProducts()
    {
        $products = session()->get('products.recently_viewed');
        if($products)
        {
            $recent_products = Product::whereIn('id', $products)->take(10)->get();
            return $recent_products;
        }
    }
}