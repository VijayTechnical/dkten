<?php

namespace App\Http\Livewire\Components;

use App\Models\Logo;
use Livewire\Component;
use App\Models\Gsetting;

class HeadComponent extends Component
{
    public function render()
    {
        $logo = Logo::find(1);
        $gsetting = Gsetting::find(1);
        return view('livewire.components.head-component',['logo'=>$logo,'gsetting'=>$gsetting]);
    }
}
