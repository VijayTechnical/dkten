<?php

namespace App\Http\Livewire\Admin\Slider;

use Carbon\Carbon;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $text_content;
    public $button_content;
    public $button_color;
    public $text_color;
    public $newimage;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider = Slider::find($slider_id);
        if($slider)
        {
            $this->slider_id = $slider->id;
            $this->image = $slider->image;
            $this->text_content = $slider->text_content;
            $this->button_content = $slider->button_content;
            $this->button_color = $slider->button_color;
            $this->text_color = $slider->text_color;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'newimage' => 'required|mimes:png,jpg,svg,gif',
            'text_content' => 'required|string',
            'button_content' => 'required|string',
            'button_color' => 'required|string',
            'text_color' => 'required|string',
        ]);
    }


    public function editSlider()
    {
        $this->validate([
            'text_content' => 'required|string',
            'button_content' => 'required|string',
            'button_color' => 'required|string',
            'text_color' => 'required|string',
        ]);

        $slider = Slider::find($this->slider_id);
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg,svg,gif'
            ]);
            if ($slider->image) {
                unlink(storage_path('app/public/slider/' . $slider->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/slider', $imageName);
            $slider->image = $imageName;
        } else {
            $slider->image = $this->image;
        }
        $slider->text_content = $this->text_content;
        $slider->button_content = $this->button_content;
        $slider->button_color = $this->button_color;
        $slider->text_color = $this->text_color;
        $slider->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Slider Updated Successfully!']
        );
    }

    public function render()
    {
        return view('livewire.admin.slider.admin-edit-slider-component')->layout('layouts.admin');
    }
}
