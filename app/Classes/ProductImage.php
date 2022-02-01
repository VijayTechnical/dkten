<?php

namespace App\Classes;

use App\Models\Product;

class ProductImage{
    public static function getProductImage($product_id)
    {
        $product = Product::where('id',$product_id)->first();
        $product_image = explode(',',$product->images);
        if(count($product_image) > 0)
        {
            foreach ($product_image as $key=>$product_image){
                if($key == 1){
                return $product_image;
                }
            }
        }
    }
    public static function getAllProductImage($product_id)
    {
        $product = Product::where('id',$product_id)->first();
        $product_image = explode(',',$product->images);
        return $product_image;
    }
}