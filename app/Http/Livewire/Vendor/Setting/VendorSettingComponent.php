<?php

namespace App\Http\Livewire\Vendor\Setting;

use Carbon\Carbon;
use App\Models\Vendor;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class VendorSettingComponent extends Component
{
    use WithFileUploads;
    
    public $logo;
    public $cover_image;
    public $new_logo;
    public $new_cover_image;
    public $vendor_id;
    public $keywords;
    public $seo_title;
    public $seo_description;
    public $facebook;
    public $instagram;
    public $twitter;
    public $whatsapp;
    public $google;
    public $youtube;

    public function mount()
    {
        $vendor = Auth::guard('vendor')->user();
        $this->vendor_id = $vendor->id;
        $this->logo = $vendor->logo;
        $this->cover_image = $vendor->cover_image;
        $this->keywords = $vendor->keywords;
        $this->seo_title = $vendor->seo_title;
        $this->seo_description = $vendor->seo_description;
        $this->facebook = $vendor->facebook;
        $this->instagram = $vendor->instagram;
        $this->twitter = $vendor->twitter;
        $this->whatsapp = $vendor->whatsapp;
        $this->google = $vendor->google;
        $this->youtube = $vendor->youtube;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'new_logo' => 'required|mimes:png,jpg',
            'new_cover_image' => 'required|mimes:png,jpg',
            'keywords' => 'required|string',
            'seo_title' => 'required|string|max:60',
            'seo_description' => 'required|string|max:160',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'whatsapp' => 'required',
            'google' => 'required',
            'youtube' => 'required',
        ]);
    }

    public function updateImageSetting()
    {
        $vendor = Vendor::find($this->vendor_id);
        if ($this->new_logo) {
            if ($vendor->logo) {
                unlink(storage_path('app/public/vendor/logo/' . $vendor->logo));
            }
            $this->validate([
                'new_logo' => 'required|mimes:png,jpg'
            ]);
            $logoName = Carbon::now()->timestamp . '.' . $this->new_logo->extension();
            $this->new_logo->storeAS('public/vendor/logo', $logoName);
            $vendor->logo = $logoName;
        } else {
            $vendor->logo = $this->logo;
        }
        if ($this->new_cover_image) {
            if ($vendor->cover_image) {
                unlink(storage_path('app/public/vendor/cover_image/' . $vendor->cover_image));
            }
            $this->validate([
                'new_cover_image' => 'required|mimes:png,jpg'
            ]);
            $cover_imageName = Carbon::now()->timestamp . '.' . $this->new_cover_image->extension();
            $this->new_cover_image->storeAS('public/vendor/cover_image', $cover_imageName);
            $vendor->cover_image = $cover_imageName;
        } else {
            $vendor->cover_image = $this->cover_image;
        }
        $vendor->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Image Setting Updated Successfully!']
        );
    }

    public function updateSeoSetting()
    {
        $this->validate([
            'keywords' => 'required|string',
            'seo_title' => 'required|string',
            'seo_description' => 'required|string',
        ]);

        $vendor = Vendor::find($this->vendor_id);
        $vendor->keywords = $this->keywords;
        $vendor->seo_title = $this->seo_title;
        $vendor->seo_description = $this->seo_description;
        $vendor->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Seo Friendly Setting Updated Successfully!']
        );
        
    }

    public function updateSocialMedia()
    {
        $vendor = Vendor::find($this->vendor_id);
        if($this->facebook){
            $this->validate([
                'facebook' => 'required',
            ]);
            $vendor->facebook = $this->facebook;
        }
        if($this->instagram){
            $this->validate([
                'instagram' => 'required',
            ]);
            $vendor-> instagram = $this->instagram;
        }
        if($this->twitter){
            $this->validate([
                'twitter' => 'required',
            ]);
            $vendor->twitter = $this->twitter;
        }
        if($this->whatsapp){
            $this->validate([
                'whatsapp' => 'required',
            ]);
            $vendor->whatsapp = $this->whatsapp;
        }
        if($this->google){
            $this->validate([
                'google' => 'required',
            ]);
            $vendor->google = $this->google;
        }
        if($this->youtube){
            $this->validate([
                'youtube' => 'required',
            ]);
            $vendor->youtube = $this->youtube;
        }
        $vendor->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Social Media Setting Updated Successfully!']
        );
    }

    public function render()
    {
        return view('livewire.vendor.setting.vendor-setting-component')->layout('layouts.vendor');
    }
}
