<?php

namespace App\Http\Livewire;

use App\Models\Legality;
use Livewire\Component;

class EmployeeAidComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.employee-aid-component',['legality'=>$legality])->layout('layouts.base');
    }
}
