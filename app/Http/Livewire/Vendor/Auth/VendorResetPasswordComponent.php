<?php

namespace App\Http\Livewire\Vendor\Auth;

use App\Models\Vendor;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VendorResetPasswordComponent extends Component
{
    
    public $email;
    public $token;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'email' => 'required|email|exists:vendors',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
    }

    public function updatePassword()
    {

        $this->validate([
            'email' => 'required|email|exists:vendors',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $this->email, 'token' => $this->token])
            ->first();

        if (!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

        $vendor = Vendor::where('email', $this->email)
            ->update(['password' => Hash::make($this->password)]);

        DB::table('password_resets')->where(['email' => $this->email])->delete();

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Password was reset sucessfully!']
        );

        return redirect()->route('vendor.login');
    }

    public function render()
    {
        return view('livewire.vendor.auth.vendor-reset-password-component')->layout('layouts.base');
    }
}
