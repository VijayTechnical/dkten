<?php

namespace App\Http\Livewire\User\Auth;

use App\Models\Logo;
use App\Models\Reffer;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserRegisterComponent extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public $password_confirmation;
    public $line1;
    public $line2;
    public $city;
    public $state;
    public $country;
    public $zip;
    public $reffer_code;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|confirmed|min:8,max:20',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
            'phone' => 'required'
        ]);
    }

    public function Register()
    {
        $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|confirmed|min:8,max:20',
            'line1' => 'required|string',
            'line2' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'zip' => 'required|string',
            'phone' => 'required'
        ]);

        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->password = Hash::make($this->password);
        $user->line1 = $this->line1;
        $user->line2 = $this->line2;
        $user->city = $this->city;
        $user->state = $this->state;
        $user->country = $this->country;
        $user->zip = $this->zip;
        $user->save();

        if($this->reffer_code){
            $reffer = Reffer::where('code',$this->reffer_code)->first();
            if($reffer)
            {
                $email = $reffer->from;
                $user = User::where('email',$email)->first();
                if($user)
                {
                    $user->deposit(10);
                    $reffer->delete();
                }
            }
        }

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Registered Successfully!']
        );
        return redirect('/user/login');
    }
    public function render()
    {
        $logo = Logo::find(1);
        return view('livewire.user.auth.user-register-component',['logo'=>$logo])->layout('layouts.base');
    }
}
