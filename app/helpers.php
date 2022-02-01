<?php

use App\Classes\ProductImage;
use App\Classes\RecentlyViewedProduct;
use App\Classes\StockStatus;
use App\Classes\TotalPurchase;

if (!function_exists('product_status')) {
    function product_status($product_id)
    {
        return StockStatus::getStockReport($product_id);
    }
}

if (!function_exists('recently_viewed')) {
    function recently_viewed()
    {
        return RecentlyViewedProduct::getRecentProducts();
    }
}

if (!function_exists('product_image')) {
    function product_image($product_id)
    {
        return ProductImage::getProductImage($product_id);
    }
}
if (!function_exists('all_product_image')) {
    function all_product_image($product_id)
    {
        return ProductImage::getAllProductImage($product_id);
    }
}

if (!function_exists('get_totalPurchase')) {
    function get_totalPurchase($customer_id)
    {
        return TotalPurchase::getTotalPurchase($customer_id);
    }
}
