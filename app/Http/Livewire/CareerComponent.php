<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Legality;

class CareerComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.career-component',['legality'=>$legality])->layout('layouts.base');
    }
}
