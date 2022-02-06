<?php

use App\Classes\GetItems;
use App\Classes\GetOrder;
use App\Classes\StockStatus;
use App\Classes\ProductImage;
use App\Classes\ProductOwner;
use App\Classes\ProductRating;
use App\Classes\TotalPurchase;
use App\Classes\RecentlyViewedProduct;

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

if (!function_exists('get_product_owner')) {
    function get_product_owner($product_id)
    {
        return ProductOwner::getOne($product_id);
    }
}

if (!function_exists('get_order')) {
    function get_order($order_id)
    {
        return GetOrder::get($order_id);
    }
}

if (!function_exists('get_order_items')) {
    function get_order_items($order_id)
    {
        return GetItems::getItems($order_id);
    }
}
if (!function_exists('get_item_title')) {
    function get_item_title($item_id)
    {
        return GetItems::getTitle($item_id);
    }
}
if (!function_exists('get_item_options')) {
    function get_item_options($item_id)
    {
        return GetItems::getOptions($item_id);
    }
}
if (!function_exists('get_product_rating')) {
    function get_product_rating($product_id)
    {
        return ProductRating::getProductRating($product_id);
    }
}
