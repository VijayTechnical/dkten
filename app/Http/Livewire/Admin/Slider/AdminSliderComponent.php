<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;

class AdminSliderComponent extends Component
{
    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function deleteSlider($slider_id)
    {
        $slider  = Slider::find($slider_id);
        if ($slider->image) {
            unlink(storage_path('app/public/slider/' . $slider->image));
        }
        $slider->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Slider Deleted Successfully!']
        );
    }

    public function render()
    {
        $sliders = Slider::latest()->paginate($this->paginate);
        return view('livewire.admin.slider.admin-slider-component', ['sliders' => $sliders])->layout('layouts.admin');
    }
}
