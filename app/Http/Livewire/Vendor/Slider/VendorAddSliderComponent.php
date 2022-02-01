<?php

namespace App\Http\Livewire\Vendor\Slider;

use Carbon\Carbon;
use App\Models\Vslider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class VendorAddSliderComponent extends Component
{
    use WithFileUploads;

    public $banner_image;
    public $button_color;
    public $text_color;
    public $text;
    public $link;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'banner_image' => 'required|mimes:png,jpg,svg',
            'text' => 'required|string',
            'link' => 'required|string',
        ]);
    }


    public function addSlider()
    {
        $this->validate([
            'banner_image' => 'required|mimes:png,jpg,svg',
            'text' => 'required|string',
            'link' => 'required|string',
        ]);

        $vslide = new Vslider();
        $banner_imageName = Carbon::now()->timestamp . '.' . $this->banner_image->extension();
        $this->banner_image->storeAS('public/vendor/slider/banner_image', $banner_imageName);
        $vslide->banner_image = $banner_imageName;
        $vslide->button_color = $this->button_color;
        $vslide->text_color = $this->text_color;
        $vslide->text = $this->text;
        $vslide->link = $this->link;
        $vslide->vendor_id = Auth::guard('vendor')->user()->id;
        $vslide->status = false;
        $vslide->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Slider Created Successfully!']
        );

    }
    public function render()
    {
        return view('livewire.vendor.slider.vendor-add-slider-component')->layout('layouts.vendor');
    }
}
