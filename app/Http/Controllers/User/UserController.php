<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function Register(Request $request)
    {
        $request->validate();
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5,max:30'
        ],[
            'email.exists' => 'This email does not exists.'
        ]);

        $creds = $request->only('email','password');
        if(Auth::attempt($creds)){
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect Credentials!!!');
        }
    }
}
