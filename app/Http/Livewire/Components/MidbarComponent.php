<?php

namespace App\Http\Livewire\Components;

use App\Models\Logo;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class MidbarComponent extends Component
{
    public $searchTerm;
    public $lang;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->searchTerm = '';
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

    public function setLanguage($lang)
    {
        App::setLocale($lang);
        session()->put('locale', $lang);
    }

    
    public function render()
    {
        if (Auth::guard('web')->user()) {
            Cart::instance('cart')->restore(Auth::guard('web')->user()->email);
            Cart::instance('wishlist')->restore(Auth::guard('web')->user()->email);
            Cart::instance('compare')->restore(Auth::guard('web')->user()->email);
        }
        if($this->lang == 'ne')
        {
            $this->setLanguage('ne');
        }
        else{
            $this->setLanguage('en');
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
