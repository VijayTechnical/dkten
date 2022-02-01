<?php

namespace App\Http\Livewire\Components;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    protected $listeners = ['showCart' => 'loadCart', 'closeCart' => 'closeCart'];

    public function loadCart()
    {
        $this->dispatchBrowserEvent('showCart');
    }

    public function closeCart()
    {
        $this->dispatchBrowserEvent('closeCart');
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('components.midbar-component', 'refreshComponent');
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Product is removed successfully from your cart!']
        );
        return;
    }

    public function render()
    {
        if (Auth::guard('web')->check()) {
            Cart::instance('cart')->store(Auth::guard('web')->user()->email);
        }
        return view('livewire.components.cart-component');
    }
}
