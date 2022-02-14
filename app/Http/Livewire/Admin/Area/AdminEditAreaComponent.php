<?php

namespace App\Http\Livewire\Admin\Area;

use App\Models\Area;
use App\Models\City;
use App\Models\Region;
use Livewire\Component;

class AdminEditAreaComponent extends Component
{
    public $name;
    public $region_id;
    public $city_id;
    public $shipping_cost;
    public $area_id;

    public function mount($area_id)
    {
        $this->area_id = $area_id;
        $area = Area::findOrFail($this->area_id);
        if ($area) {
            $this->name = $area->name;
            $this->region_id = $area->region_id;
            $this->city_id = $area->city_id;
            $this->shipping_cost = $area->shipping_cost;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:cities,name,' . $this->area_id,
            'region_id' => 'required|integer|exists:regions,id',
            'city_id' => 'required|integer|exists:cities,id',
            'shipping_cost' => 'required|numeric'
        ]);
    }


    public function editShippingArea()
    {
        $this->validate([
            'name' => 'required|unique:cities,name,' . $this->area_id,
            'region_id' => 'required|integer|exists:regions,id',
            'city_id' => 'required|integer|exists:cities,id',
            'shipping_cost' => 'required|numeric'
        ]);

        $area = Area::findOrFail($this->area_id);
        $area->name = $this->name;
        $area->region_id = $this->region_id;
        $area->city_id = $this->city_id;
        $area->shipping_cost = $this->shipping_cost;
        $area->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Area Updated Successfully!']
        );
    }


    public function render()
    {
        $regions = Region::latest()->get();
        $cities = City::where('region_id', $this->region_id)->latest()->get();
        return view('livewire.admin.area.admin-edit-area-component', ['regions' => $regions, 'cities' => $cities])->layout('layouts.admin');
    }
}
