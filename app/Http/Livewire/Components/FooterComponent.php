<?php

namespace App\Http\Livewire\Components;

use App\Models\Gsetting;
use App\Models\Ssetting;
use Livewire\Component;

class FooterComponent extends Component
{
    public function render()
    {
        $gsetting = Gsetting::find(1);
        $ssetting = Ssetting::find(1);
        return view('livewire.components.footer-component',['gsetting'=>$gsetting,'ssetting'=>$ssetting]);
    }
}
