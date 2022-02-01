<?php

namespace App\Http\Livewire\Admin\Components;

use App\Models\Logo;
use Livewire\Component;

class AdminHeaderLogoComponent extends Component
{
    public function render()
    {
        $logo = Logo::find(1);
        return view('livewire.admin.components.admin-header-logo-component',['logo'=>$logo]);
    }
}
