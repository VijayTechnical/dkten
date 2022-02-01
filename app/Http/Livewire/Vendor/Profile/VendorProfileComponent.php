<?php

namespace App\Http\Livewire\Vendor\Profile;

use Carbon\Carbon;
use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VendorProfileComponent extends Component
{
    public $vendor_id;
    public $name;
    public $display_name;
    public $email;
    public $phone;
    public $company;
    public $line1;
    public $line2;
    public $city;
    public $state;
    public $country;
    public $zip;
    public $about;
    public $description;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $vendor = Auth::guard('vendor')->user();
        $this->vendor_id = $vendor->id;
        $this->name = $vendor->name;
        $this->display_name = $vendor->display_name;
        $this->email = $vendor->email;
        $this->phone = $vendor->phone;
        $this->company = $vendor->company;
        $this->line1 = $vendor->line1;
        $this->line2 = $vendor->line2;
        $this->city = $vendor->city;
        $this->state = $vendor->state;
        $this->country = $vendor->country;
        $this->zip = $vendor->zip;
        $this->about = $vendor->about;
        $this->description = $vendor->description;
    }



    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'display_name' => 'required',
            'email' => 'required|email|unique:vendors,email,' . Auth::guard('vendor')->user()->id,
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);
    }

    public function updateProfile()
    {

        $this->validate([
            'name' => 'required',
            'display_name' => 'required',
            'email' => 'required|email|unique:vendors,email,' . Auth::guard('vendor')->user()->id,
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
        ]);

        $vendor = Vendor::findOrFail($this->vendor_id);
        $vendor->name = $this->name;
        $vendor->display_name = $this->display_name;
        $vendor->email = $this->email;
        if($this->phone)
        {
            $vendor->phone = $this->phone;
        }
        if($this->company)
        {
            $vendor->company = $this->company;
        }
        $vendor->line1 = $this->line1;
        $vendor->line2 = $this->line2;
        $vendor->city = $this->city;
        $vendor->state = $this->state;
        $vendor->country = $this->country;
        $vendor->zip = $this->zip;
        if($this->about)
        {
            $vendor->about = $this->about;
        }
        if($this->description)
        {
            $vendor->description = $this->description;
        }
        $vendor->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Profile Updated Successfully!']
        );
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);

        if (Hash::check($this->current_password, Auth::guard('vendor')->user()->password)) {
            $vendor = vendor::findOrFail($this->vendor_id);
            $vendor->password = Hash::make($this->password);
            $vendor->save();
            $this->clear();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Password Updated Successfully!']
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Password does not match with old one.!']
            );
        }
    }

    public function clear()
    {
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';

        return redirect('/vendor/profile');
    }


    public function render()
    {
        $vendor = Auth::guard('vendor')->user();
        return view('livewire.vendor.profile.vendor-profile-component',['vendor'=>$vendor])->layout('layouts.vendor');
    }
}
