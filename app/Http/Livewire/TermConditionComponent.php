<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Legality;

class TermConditionComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.term-condition-component',['legality'=>$legality])->layout('layouts.base');
    }
}
