<?php

namespace App\Http\Livewire\Admin\Slider;

use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $text_content;
    public $button_content;
    public $button_color;
    public $text_color;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'image' => 'required|mimes:png,jpg,svg,gif',
            'text_content' => 'required|string',
            'button_content' => 'required|string',
            'button_color' => 'required|string',
            'text_color' => 'required|string',
        ]);
    }


    public function addSlider()
    {
        $this->validate([
            'image' => 'required|mimes:png,jpg,svg,gif',
            'text_content' => 'required|string',
            'button_content' => 'required|string',
            'button_color' => 'required|string',
            'text_color' => 'required|string',
        ]);

        $slider = new Slider();
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAS('public/slider', $imageName);
        $slider->image = $imageName;
        $slider->text_content = $this->text_content;
        $slider->button_content = $this->button_content;
        $slider->button_color = $this->button_color;
        $slider->text_color = $this->text_color;
        $slider->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Slider Created Successfully!']);
    }
    public function render()
    {
        return view('livewire.admin.slider.admin-add-slider-component')->layout('layouts.admin');
    }
}
