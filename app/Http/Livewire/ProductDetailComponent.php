<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Classes\StockStatus;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductDetailComponent extends Component
{
    use WithPagination;

    public $product_id;
    public $qty;
    public $sattr = [];
    public $paginate;


    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->product_id = $product->id;
        $this->qty = 1;
        $this->paginate = 12;

        $productKey = 'product_' . $this->product_id;
        if (!Session::has($productKey)) {
            Product::where('id', $this->product_id)->increment('views');
            Session::put($productKey, $this->product_id);
        }

        session()->push('products.recently_viewed', $product->getKey());
    }

    public function increaseQuantity()
    {

        $status = StockStatus::getStockStatus($this->product_id, $this->qty);
        if ($status == true) {
            $this->qty++;
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Product is out of stock!']
            );
            return;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }

    public function buyNow($product_id, $product_name, $product_price)
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
            return redirect()->route('checkout');
        }
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
        $product = Product::find($this->product_id);
        $r_products = Product::where('status', true)->where('category_id', $product->category_id)->limit(12)->get();
        if (Auth::guard('web')->user()) {
            Cart::instance('cart')->restore(Auth::guard('web')->user()->email);
            Cart::instance('wishlist')->restore(Auth::guard('web')->user()->email);
            Cart::instance('compare')->restore(Auth::guard('web')->user()->email);
        }
        $orderItems = $product->OrderItem()->where('rstatus', 1)->get();
        return view('livewire.product-detail-component', ['product' => $product, 'r_products' => $r_products, 'orderItems' => $orderItems])->layout('layouts.base');
    }
}
