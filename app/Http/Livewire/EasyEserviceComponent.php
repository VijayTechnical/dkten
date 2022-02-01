<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Legality;

class EasyEserviceComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.easy-eservice-component',['legality'=>$legality])->layout('layouts.base');
    }
}
