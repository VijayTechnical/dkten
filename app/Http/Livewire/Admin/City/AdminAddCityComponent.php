<?php

namespace App\Http\Livewire\Admin\City;

use App\Models\City;
use App\Models\Region;
use Livewire\Component;

class AdminAddCityComponent extends Component
{
    public $name;
    public $region_id;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:cities',
            'region_id' => 'required|integer|exists:regions,id'
        ]);
    }


    public function addShippingCity()
    {
        $this->validate([
            'name' => 'required|unique:cities',
            'region_id' => 'required|integer|exists:regions,id'
        ]);

        $city = new City();
        $city->name = $this->name;
        $city->region_id = $this->region_id;
        $city->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'City Created Successfully!']
        );
    }


    public function render()
    {
        $regions = Region::latest()->get();
        return view('livewire.admin.city.admin-add-city-component',['regions'=>$regions])->layout('layouts.admin');
    }
}
