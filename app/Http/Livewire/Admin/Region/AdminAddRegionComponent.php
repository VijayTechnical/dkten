<?php

namespace App\Http\Livewire\Admin\Region;

use App\Models\Region;
use Livewire\Component;

class AdminAddRegionComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:regions'
        ]);
    }

    public function addShippingRegion()
    {
        $this->validate([
            'name' => 'required|unique:regions'
        ]);

        $region = new Region();
        $region->name = $this->name;
        $region->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Region Created Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.region.admin-add-region-component')->layout('layouts.admin');
    }
}
