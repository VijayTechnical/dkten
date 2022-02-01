<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileComponent extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $line1;
    public $line2;
    public $city;
    public $state;
    public $country;
    public $zip;

    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->line1 = $user->line1;
        $this->line2 = $user->line2;
        $this->city = $user->city;
        $this->state = $user->state;
        $this->country = $user->country;
        $this->zip = $user->zip;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
             'email' => 'required|email|unique:users,email,' . Auth::guard('web')->user()->id,
            'phone' => 'required|string',
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
             'email' => 'required|email|unique:users,email,' . Auth::guard('web')->user()->id,
            'phone' => 'required|string',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
        ]);

        $user = User::find(Auth::guard('web')->user()->id);
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->line1 = $this->line1;
        $user->line2 = $this->line2;
        $user->city = $this->city;
        $user->state = $this->state;
        $user->country = $this->country;
        $user->zip = $this->zip;
        $user->save();
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

        if (Hash::check($this->current_password, Auth::guard('web')->user()->password)) {
            $user = User::findOrFail(Auth::guard('web')->user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
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
    }




    public function render()
    {
        return view('livewire.user.profile.user-profile-component')->layout('layouts.base');
    }
}
