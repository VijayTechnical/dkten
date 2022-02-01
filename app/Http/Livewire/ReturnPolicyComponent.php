<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Legality;

class ReturnPolicyComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.return-policy-component',['legality'=>$legality])->layout('layouts.base');
    }
}
