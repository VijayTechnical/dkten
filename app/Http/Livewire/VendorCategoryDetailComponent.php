<?php

namespace App\Http\Livewire;

use App\Models\Vtype;
use App\Models\Vendor;
use Livewire\Component;
use App\Models\Vcategory;

class VendorCategoryDetailComponent extends Component
{
    public $vtype_name;
    public $vcategory_id;
    public $vtype_id;

    public function mount($vcategory_slug,$vtype_slug)
    {
        $vcategory = Vcategory::where('slug',$vcategory_slug)->first();
        $this->vcategory_id = $vcategory->id;
        $vtype = Vtype::where('slug',$vtype_slug)->first();
        $this->vtype_id = $vtype->id;
        $this->vtype_name = $vtype->name;

    }
    public function render()
    {
        $vendors = Vendor::where('vcategory_id',$this->vcategory_id)->where('vtype_id',$this->vtype_id)->get();
        return view('livewire.vendor-category-detail-component',['vendors'=>$vendors])->layout('layouts.base');
    }
}
