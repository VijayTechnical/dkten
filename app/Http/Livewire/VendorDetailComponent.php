<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class VendorDetailComponent extends Component
{
    public $vendor_id;
    public function mount($vendor_display_name)
    {
        $vendor = Vendor::where('display_name', $vendor_display_name)->first();
        $this->vendor_id = $vendor->id;
    }

    public function addToCompare()
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product added sucessfully to compare!']
        );
    }

    public function store($product_id, $product_title, $product_price)
    {
        $cart_items = Cart::instance('cart')
            ->content()
            ->pluck('id');
        if ($cart_items->contains($product_id)) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Product is already in your cart!']
            );
        } else {
            Cart::instance('cart')->add($product_id, $product_title, $this->qty, $product_price)->associate('App\Models\Product');
            $this->emitTo('components.midbar-component', 'refreshComponent');
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Product is added successfully to cart!']
            );
        }
    }

    public function wishlist($product_id, $product_title, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product is added successfully to your wishlist!']
        );
        return;
    }

    public function render()
    {
        if (Auth::guard('web')->user()) {
            Cart::instance('cart')->restore(Auth::guard('web')->user()->email);
            Cart::instance('wishlist')->restore(Auth::guard('web')->user()->email);
            Cart::instance('compare')->restore(Auth::guard('web')->user()->email);
        }
        $vendor = Vendor::where('id', $this->vendor_id)->first();
        $products = Product::where('vendor_id', $vendor->id)->where('status', true)->latest()->get();
        $featured_products = Product::where('vendor_id', $vendor->id)->where('status', true)->where('featured', true)->latest()->get();
        return view('livewire.vendor-detail-component', ['vendor' => $vendor, 'products' => $products, 'featured_products' => $featured_products])->layout('layouts.base');
    }
}
