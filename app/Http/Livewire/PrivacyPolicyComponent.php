<?php

namespace App\Http\Livewire;

use App\Models\Legality;
use Livewire\Component;

class PrivacyPolicyComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.privacy-policy-component',['legality'=>$legality])->layout('layouts.base');
    }
}
