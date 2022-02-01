<?php

namespace App\Http\Livewire\Admin\Components;

use App\Models\Gsetting;
use App\Models\Logo;
use Livewire\Component;

class AdminHeadComponent extends Component
{
    public function render()
    {
        $logo = Logo::find(1);
        $gsetting = Gsetting::find(1);
        return view('livewire.admin.components.admin-head-component',['logo'=>$logo,'gsetting'=>$gsetting]);
    }
}
