<?php

namespace App\Http\Livewire\Vendor\Components;

use App\Models\Logo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VendorHeaderComponent extends Component
{
    public function Logout()
    {
        Auth::guard('vendor')->logout();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Logged Out Successfully!']
        );
        return redirect('/vendor/login');
    }
    
    public function render()
    {
        $logo = Logo::find(1);
        return view('livewire.vendor.components.vendor-header-component',['logo'=>$logo]);
    }
}
