<?php

namespace App\Traits;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

trait VendorSaleTrait
{
    public function getOrders()
    {
        $products = Product::where('vendor_id', Auth::guard('vendor')->user()->id)->where('status', true)->get();
        $product_ids = collect();
        foreach ($products as $product) {
            $product_id = $product->id;
            $product_ids->push($product_id);
        }
        return $product_ids;
    }
}
