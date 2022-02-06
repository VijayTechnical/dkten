<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeComponent extends Component
{
    public $qty;

    public function mount()
    {
        $this->qty = 1;
    }

    public function addToCompare(){
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product added sucessfully to compare!']
        );
    }

    public function store($product_id, $product_name, $product_price)
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
            Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('App\Models\Product');
            $this->emitTo('components.midbar-component', 'refreshComponent');
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Product added to  your cart!']
            );
            return;
        }
    }

    public function wishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product added to  your wishlist!']
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
        $hot_deal_products = Product::TDeal()->Status()->latest()->get();
        $featured_products = Product::Featured()->Status()->latest()->get();
        $latest_products = Product::latest()->Status()->offset(0)->limit(3)->get();
        $most_viewed_products = Product::MostViewed()->latest()->Status()->offset(0)->limit(3)->get();
        $men_collection_products = Product::whereHas('Category', function ($query) {
            $query->where('slug', 'LIKE', "%mens-collection%");
        })->latest()->Status()->get();
        $women_collection_products = Product::whereHas('Category', function ($query) {
            $query->where('slug', 'LIKE', "%womens-collection%");
        })->latest()->Status()->get();
        $bags_and_laugage_products = Product::whereHas('Category', function ($query) {
            $query->where('slug', 'LIKE', "%bags-and-laugage%");
        })->latest()->Status()->get();
        $vendors = Vendor::where('status', true)->latest()->get();
        $women_category = Category::where('slug', 'womens-collection')->first();
        return view('livewire.home-component', ['hot_deal_products' => $hot_deal_products, 'featured_products' => $featured_products, 'latest_products' => $latest_products, 'men_collection_products' => $men_collection_products, 'women_collection_products' => $women_collection_products, 'bags_and_laugage_products' => $bags_and_laugage_products, 'vendors' => $vendors, 'women_category' => $women_category, 'most_viewed_products' => $most_viewed_products])->layout('layouts.base');
    }
}
