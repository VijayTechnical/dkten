<?php 

namespace App\Classes;

use App\Models\Product;

class ProductRating{
    public static function getProductRating($product_id)
    {
        $product = Product::where('id',$product_id)->first();
        $avgrating = 0;
        foreach ($product->OrderItem->where('rstatus', 1) as $orderItem)
        {
            $avgrating = $avgrating + $orderItem->Review->rating;
        }
        return $avgrating;
    }
}