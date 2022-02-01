<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Legality;

class MissionVisionComponent extends Component
{
    public function render()
    {
        $legality = Legality::find(1);
        return view('livewire.mission-vision-component',['legality'=>$legality])->layout('layouts.base');
    }
}
