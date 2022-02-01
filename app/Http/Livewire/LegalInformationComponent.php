<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Legality;

class LegalInformationComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.legal-information-component',['legality'=>$legality])->layout('layouts.base');
    }
}
