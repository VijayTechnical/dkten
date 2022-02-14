<?php

namespace App\Http\Livewire\Admin\Area;

use App\Models\Area;
use App\Models\City;
use App\Models\Region;
use Livewire\Component;

class AdminAddAreaComponent extends Component
{
    public $name;
    public $region_id;
    public $city_id;
    public $shipping_cost;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:cities',
            'region_id' => 'required|integer|exists:regions,id',
            'city_id' => 'required|integer|exists:cities,id',
            'shipping_cost' => 'required|numeric'
        ]);
    }


    public function addShippingArea()
    {
        $this->validate([
            'name' => 'required|unique:cities',
            'region_id' => 'required|integer|exists:regions,id',
            'city_id' => 'required|integer|exists:cities,id',
            'shipping_cost' => 'required|numeric'
        ]);

        $area = new Area();
        $area->name = $this->name;
        $area->region_id = $this->region_id;
        $area->city_id = $this->city_id;
        $area->shipping_cost = $this->shipping_cost;
        $area->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Area Created Successfully!']
        );
    }


    public function render()
    {
        $regions = Region::latest()->get();
        $cities = City::where('region_id',$this->region_id)->latest()->get();
        return view('livewire.admin.area.admin-add-area-component',['regions'=>$regions,'cities'=>$cities])->layout('layouts.admin');
    }
}
