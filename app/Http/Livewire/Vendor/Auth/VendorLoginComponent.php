<?php

namespace App\Http\Livewire\Vendor\Auth;

use App\Models\Vendor;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VendorLoginComponent extends Component
{
    public $email;
    public $password;
    public $remember_me;

    public function Login()
    {
        $this->validate([
            'email' => 'required|email|exists:vendors,email',
            'password' => 'required|min:5,max:30'
        ], [
            'email.exists' => 'This email does not exists.'
        ]);

        $vendor = Vendor::where('email', $this->email)->firstOrFail();
        if ($vendor->status == true) {
            if (Auth::guard('vendor')->attempt(['email' => $this->email, 'password' => $this->password, 'status' => 1])) {
                if ($this->remember_me === true) {
                    $vendor->createToken('remember_token')->plainTextToken;
                }
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => 'Logged In Successfully!']
                );
                return redirect('/vendor/dashboard');
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'error',  'message' => 'Invalid credentials!!!']
                );
            }
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Your account is not approved yet!!!']
            );
        }
    }

    public function render()
    {
        return view('livewire.vendor.auth.vendor-login-component')->layout('layouts.auth');
    }
}
