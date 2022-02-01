<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use App\Models\Vcategory;
use Livewire\Component;

class HeaderComponent extends Component
{
    public function render()
    {
        $categories = Category::where('status',true)->get();
        $vcategories = Vcategory::orderBy('created_at','DESC')->get();
        return view('livewire.components.header-component',['categories'=>$categories,'vcategories'=>$vcategories]);
    }
}
