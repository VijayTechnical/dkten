<?php

namespace App\Http\Livewire;

use App\Models\Vendor;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeComponent extends Component
{
    public $qty;

    public function mount()
    {
        $this->qty = 1;
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
            Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price, $this->sattr)->associate('App\Models\Product');
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
        $hot_deal_products = Product::TDeal()->Status()->orderBy('created_at', 'DESC')->get();
        $featured_products = Product::Featured()->Status()->orderBy('created_at', 'DESC')->get();
        $latest_products = Product::orderBy('created_at', 'DESC')->Status()->offset(0)->limit(3)->get();
        $most_viewed_products = Product::MostViewed()->orderBy('created_at', 'DESC')->Status()->offset(0)->limit(3)->get();
        $men_collection_products = Product::whereHas('Category', function ($query) {
            $query->where('slug', 'like', "%mens-collection");
        })->orderBy('created_at', 'DESC')->Status()->get();
        $women_collection_products = Product::whereHas('Category', function ($query) {
            $query->where('slug', 'like', "%womens-collection");
        })->orderBy('created_at', 'DESC')->Status()->get();
        $bags_and_laugage_products = Product::whereHas('Category', function ($query) {
            $query->where('slug', 'like', "%bags-and-laugage");
        })->orderBy('created_at', 'DESC')->Status()->get();
        $vendors = Vendor::where('status', true)->orderBy('created_at', 'DESC')->get();
        $women_category = Category::where('slug', 'womens-collection')->first();
        return view('livewire.home-component', ['hot_deal_products' => $hot_deal_products, 'featured_products' => $featured_products, 'latest_products' => $latest_products, 'men_collection_products' => $men_collection_products, 'women_collection_products' => $women_collection_products, 'bags_and_laugage_products' => $bags_and_laugage_products, 'vendors' => $vendors, 'women_category' => $women_category, 'most_viewed_products' => $most_viewed_products])->layout('layouts.base');
    }
}
