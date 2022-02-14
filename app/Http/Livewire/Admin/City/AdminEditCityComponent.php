<?php

namespace App\Http\Livewire\Admin\City;

use App\Models\City;
use App\Models\Region;
use Livewire\Component;

class AdminEditCityComponent extends Component
{
    public $name;
    public $region_id;
    public $city_id;

    public function mount($city_id)
    {
        $this->city_id = $city_id;
        $city = City::findOrFail($this->city_id);
        if ($city) {
            $this->name = $city->name;
            $this->region_id = $city->region_id;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:cities,name,' . $this->city_id,
            'region_id' => 'required|integer|exists:regions,id'
        ]);
    }


    public function editShippingCity()
    {
        $this->validate([
            'name' => 'required|unique:cities,name,' . $this->city_id,
            'region_id' => 'required|integer|exists:regions,id'
        ]);

        $city = City::findOrFail($this->city_id);
        $city->name = $this->name;
        $city->region_id = $this->region_id;
        $city->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'City Updated Successfully!']
        );
    }


    public function render()
    {
        $regions = Region::latest()->get();
        return view('livewire.admin.city.admin-edit-city-component', ['regions' => $regions])->layout('layouts.admin');
    }
}
