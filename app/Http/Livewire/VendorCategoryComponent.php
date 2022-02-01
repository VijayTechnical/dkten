<?php

namespace App\Http\Livewire;

use App\Models\Vtype;
use Livewire\Component;
use App\Models\Vcategory;

class VendorCategoryComponent extends Component
{
    public $vcategory_id;
    public $vcategory_name;

    public function mount($vcategory_slug)
    {
        $vcategory = Vcategory::where('slug',$vcategory_slug)->first();
        $this->vcategory_id = $vcategory->id;
        $this->vcategory_name = $vcategory->name;

    }
    public function render()
    {
        $vtypes = Vtype::where('vcategory_id',$this->vcategory_id)->get();
        return view('livewire.vendor-category-component',['vtypes'=>$vtypes])->layout('layouts.base');
    }
}
