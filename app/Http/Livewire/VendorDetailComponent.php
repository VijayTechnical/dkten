<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use App\Models\Product;
use Livewire\Component;

class VendorDetailComponent extends Component
{
    public $vendor_id;
    public function mount($vendor_display_name)
    {
        $vendor = Vendor::where('display_name',$vendor_display_name)->first();
        $this->vendor_id = $vendor->id;
    }
    public function render()
    {
        $vendor = Vendor::where('id',$this->vendor_id)->first();
        $products = Product::where('vendor_id',$this->vendor_id)->where('status',true)->latest();
        $featured_products = Product::where('vendor_id',$this->vendor_id)->where('status',true)->where('featured',true)->latest();
        return view('livewire.vendor-detail-component',['vendor'=>$vendor,'products'=>$products,'featured_products'=>$featured_products])->layout('layouts.base');
    }
}
