<?php

namespace App\Http\Livewire\Vendor\Components;

use App\Models\Logo;
use Livewire\Component;
use App\Models\Gsetting;

class VendorHeadComponent extends Component
{
    public function render()
    {
        $logo = Logo::find(1);
        $gsetting = Gsetting::find(1);
        return view('livewire.vendor.components.vendor-head-component',['logo'=>$logo,'gsetting'=>$gsetting]);
    }
}
