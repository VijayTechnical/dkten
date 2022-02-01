<?php

namespace App\Http\Livewire\Vendor\Slider;

use Carbon\Carbon;
use App\Models\Vslider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class VendorEditSliderComponent extends Component
{
    use WithFileUploads;

    public $banner_image;
    public $new_banner_image;
    public $button_color;
    public $text_color;
    public $text;
    public $link;
    public $slider_id;

    public function mount($slider_id)
    {
        $vslide = Vslider::where('id',$slider_id)->first();
        $this->slider_id = $vslide->id;
        $this->banner_image = $vslide->banner_image;
        $this->button_color = $vslide->button_color;
        $this->text_color = $vslide->text_color;
        $this->text = $vslide->text;
        $this->link = $vslide->link;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'new_banner_image' => 'required|mimes:png,jpg,svg',
            'button_color' => 'required|string',
            'text_color' => 'required|string',
            'text' => 'required|string',
            'link' => 'required|string',
        ]);
    }


    public function addSlider()
    {
        $this->validate([
            'button_color' => 'required|string',
            'text_color' => 'required|string',
            'text' => 'required|string',
            'link' => 'required|string',
        ]);

        $vslide = Vslider::find($this->slider_id);
        if ($this->new_banner_image) {
            if ($vslide->banner_image) {
                unlink(storage_path('app/public/vendor/slider/banner_image/' . $vslide->banner_image));
            }
            $this->validate([
                'new_banner_image' => 'required|mimes:png,jpg'
            ]);
            $banner_imageName = Carbon::now()->timestamp . '.' . $this->new_banner_image->extension();
            $this->new_banner_image->storeAS('public/vendor/slider/banner_image', $banner_imageName);
            $vslide->banner_image = $banner_imageName;
        } else {
            $vslide->banner_image = $this->banner_image;
        }
        $vslide->button_color = $this->button_color;
        $vslide->text_color = $this->text_color;
        $vslide->text = $this->text;
        $vslide->link = $this->link;
        $vslide->vendor_id = Auth::guard('vendor')->user()->id;
        $vslide->status = false;
        $vslide->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Slider Updated Successfully!']
        );

    }

    public function render()
    {
        return view('livewire.vendor.slider.vendor-edit-slider-component')->layout('layouts.vendor');
    }
}
