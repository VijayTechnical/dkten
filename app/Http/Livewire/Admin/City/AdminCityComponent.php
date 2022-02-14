<?php

namespace App\Http\Livewire\Admin\City;

use App\Models\City;
use Livewire\Component;

class AdminCityComponent extends Component
{
    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteCity($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'City Deleted Successfully!']
        );
    }

    public function render()
    {
        $cities = City::where('name', 'LIKE', '%' . $this->searchTerm . '%')->latest()->paginate($this->paginate);
        return view('livewire.admin.city.admin-city-component', ['cities' => $cities])->layout('layouts.admin');
    }
}
