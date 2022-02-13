<?php

namespace App\Http\Livewire\Components;

use App\Models\Logo;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class MidbarComponent extends Component
{
    public $searchTerm;
    public $locale;
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->searchTerm = '';
        $this->locale = session()->get('locale');
    }

    public function submitSearch()
    {
        if ($this->searchTerm) {
            $product = Product::where('title','LIKE', '%' . $this->searchTerm . '%')->orWhere('slug', 'LIKE', '%' . $this->searchTerm . '%')->first();
            if ($product) {
                return redirect()->route('product.detail', $product->slug);
            }
        } else {
            return redirect()->back();
        }
    }

    public function Logout()
    {
        Auth::guard('web')->logout();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Logged Out Successfully!']
        );
        return redirect('/user/login');
    }

    public function setLocale()
    {
        App::setLocale($this->locale);
        session()->put('locale', $this->locale);
        $this->emitSelf('refreshComponent');
        $this->emitTo('components.header-component','refreshComponent');
        return redirect()->to(URL::previous());
    }
    
    public function render()
    {
        if (Auth::guard('web')->user()) {
            Cart::instance('cart')->restore(Auth::guard('web')->user()->email);
            Cart::instance('wishlist')->restore(Auth::guard('web')->user()->email);
            Cart::instance('compare')->restore(Auth::guard('web')->user()->email);
        }
        $logo = Logo::find(1);
        $search_products = Product::query()
            ->where('title', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('slug', 'LIKE', '%' . $this->searchTerm . '%')
            ->orWhere('seo_title', 'LIKE', '%' . $this->searchTerm . '%')
            ->get();
        return view('livewire.components.midbar-component',['logo'=>$logo,'search_products'=>$search_products]);
    }
}
