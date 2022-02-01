<?php

namespace App\Http\Livewire\User\Wishlist;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class UserWishlistComponent extends Component
{
    public $qty;

    public function mount()
    {
        $this->qty = 1;
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
            return;
        }
    }

    public function removewishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'Product is removed successfully from your wishlist!']
                );
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.user.wishlist.user-wishlist-component')->layout('layouts.base');
    }
}
