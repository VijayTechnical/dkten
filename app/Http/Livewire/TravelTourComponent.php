<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Legality;

class TravelTourComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.travel-tour-component',['legality'=>$legality])->layout('layouts.base');
    }
}
