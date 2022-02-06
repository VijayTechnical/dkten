<?php 

namespace App\Classes;

use App\Models\Product;

class ProductOwner{

    public static function getOne($product_id)
    {
        $product = Product::where('id',$product_id)->first();
        if($product->vendor_id)
        {
            return $product->Vendor->email;
        }
    }
}