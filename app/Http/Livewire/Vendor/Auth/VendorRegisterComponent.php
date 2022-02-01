<?php

namespace App\Http\Livewire\Vendor\Auth;

use App\Models\Logo;
use App\Models\Vtype;
use App\Models\Vendor;
use Livewire\Component;
use App\Models\Vcategory;
use Illuminate\Support\Facades\Hash;

class VendorRegisterComponent extends Component
{
    public $vcategory_id;
    public $vtype_id;
    public $name;
    public $display_name;
    public $email;
    public $password;
    public $password_confirmation;
    public $company;
    public $line1;
    public $line2;
    public $city;
    public $state;
    public $country;
    public $zip;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'vcategory_id' => 'required|integer',
            'vtype_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|string|unique:vendors',
            'display_name' => 'required|string',
            'password' => 'required|confirmed|min:8,max:20',
            'company' => 'required|string',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
        ]);
    }

    public function Register()
    {
        $this->validate([
            'vcategory_id' => 'required|integer',
            'vtype_id' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|string|unique:vendors',
            'display_name' => 'required|string',
            'password' => 'required|confirmed|min:8,max:20',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
        ]);

        $vendor = new Vendor();
        $vendor->vcategory_id = $this->vcategory_id;
        $vendor->vtype_id = $this->vtype_id;
        $vendor->name = $this->name;
        $vendor->display_name = $this->display_name;
        $vendor->email = $this->email;
        $vendor->password = Hash::make($this->password);
        if ($this->company) {
            $vendor->company = $this->company;
        }
        $vendor->line1 = $this->line1;
        $vendor->line2 = $this->line2;
        $vendor->city = $this->city;
        $vendor->state = $this->state;
        $vendor->country = $this->country;
        $vendor->zip = $this->zip;
        $vendor->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Registered Successfully!']
        );
        return redirect('/vendor/login');
    }
    public function render()
    {
        $vcategories = Vcategory::orderBy('created_at', 'DESC')->get();
        $vtypes = Vtype::where('vcategory_id', $this->vcategory_id)->get();
        $logo = Logo::find(1);
        return view('livewire.vendor.auth.vendor-register-component', ['vcategories' => $vcategories, 'vtypes' => $vtypes,'logo'=>$logo])->layout('layouts.base');
    }
}
