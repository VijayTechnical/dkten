<?php

namespace App\Http\Livewire\Admin\Region;

use App\Models\Region;
use Livewire\Component;

class AdminRegionComponent extends Component
{

    public function deleteRegion($id)
    {
        $region = Region::find($id);
        $region->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Region Deleted Successfully!']);
    }

    public function render()
    {
        $regions = Region::latest()->get();
        return view('livewire.admin.region.admin-region-component',['regions'=>$regions])->layout('layouts.admin');
    }
}
