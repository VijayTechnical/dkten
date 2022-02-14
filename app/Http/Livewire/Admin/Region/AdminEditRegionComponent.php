<?php

namespace App\Http\Livewire\Admin\Region;

use App\Models\Region;
use Livewire\Component;

class AdminEditRegionComponent extends Component
{
    public $name;
    public $region_id;

    public function mount($region_id)
    {
        $this->region_id = $region_id;
        $region =  Region::findOrFail($this->region_id);
        if($region)
        {
            $this->name = $region->name;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:regions,name,'.$this->region_id
        ]);
    }

    public function editShippingRegion()
    {
        $this->validate([
            'name' => 'required|unique:regions,name,'.$this->region_id
        ]);

        $region = Region::findOrFail($this->region_id);
        $region->name = $this->name;
        $region->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Region Created Successfully!']);
    }


    public function render()
    {
        return view('livewire.admin.region.admin-edit-region-component')->layout('layouts.admin');
    }
}
