<?php

namespace App\Http\Livewire;

use App\Mail\SendRefferCode;
use App\Models\Reffer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RefferComponent extends Component
{
    public $from;
    public $email;
    public $code;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'email' => 'required|email|unique:reffers,to',
            'code' => 'required|string|unique:reffers,code',
        ]);
    }

    public function sendReffer()
    {
        $this->validate([
            'email' => 'required|email|unique:reffers,to',
            'code' => 'required|string|unique:reffers,code',
        ]);

        
        $reffer = new Reffer();
        $reffer->from = Auth::guard('web')->user()->email;
        $reffer->to = $this->email;
        $reffer->code  = $this->code;
        $reffer->save();

        $message = [
            'subject' => 'Reffer code from '.Auth::guard('web')->user()->email,
            'message' => 'Your reffer code is '.$this->code,
            'url' => ''.config('app.url').':8000/user/register'
        ];

        Mail::to($this->email)->send(new SendRefferCode($message));

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Reffer code is sent sucessfully!']
        );

        $this->clear();
    }

    public function clear()
    {
        $this->email = '';
        $this->code = '';
    }

    public function verifyAuth()
    {
        if(!Auth::guard('web')->check())
        {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        $this->verifyAuth();
        return view('livewire.reffer-component')->layout('layouts.base');
    }
}
