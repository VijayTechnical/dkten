<?php

namespace App\Http\Livewire\Vendor\Slider;

use App\Models\Vslider;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VendorSliderComponent extends Component
{

    
    public $paginate;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function changeStatus($id)
    {
        $vslide = Vslider::find($id);
        if($vslide)
        {
            $vslide->status = !$vslide->status;
            $vslide->save();
        }
    }

    public function render()
    {
        $vslides = Vslider::where('vendor_id',Auth::guard('vendor')->user()->id)->orderBy('created_at', 'DESC')->paginate($this->paginate);
        return view('livewire.vendor.slider.vendor-slider-component',['vslides'=>$vslides])->layout('layouts.vendor');
    }
}
