<?php

namespace App\Http\Livewire;

use App\Models\Gsetting;
use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        $setting = Gsetting::find(1);
        return view('livewire.about-component',['setting'=>$setting])->layout('layouts.base');
    }
}
