<?php

namespace App\Http\Livewire\User\SupportTicket;

use App\Models\Vendor;
use App\Models\Vticket;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserVendorSupportTicketComponent extends Component
{
    public $vendor_id;
    public $subject;
    public $message;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'vendor_id' => 'required|integer',
            'subject' => 'required|string',
            'message' => 'required',
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'vendor_id' => 'required|integer',
            'subject' => 'required|string',
            'message' => 'required',
        ]);

        $vticket = new Vticket();
        $vticket->vendor_id = $this->vendor_id;
        $vticket->subject = $this->subject;
        $vticket->message = $this->message;
        $vticket->user_id = Auth::guard('web')->user()->id;
        $vticket->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Ticket Send Successfully!']
        );
    }
    public function render()
    {
        $vtickets = Vticket::where('user_id',Auth::guard('web')->user()->id)->where('parent_id','=',null)->get();
        $vendors = Vendor::where('status',true)->get();
        return view('livewire.user.support-ticket.user-vendor-support-ticket-component',['vtickets'=>$vtickets,'vendors'=>$vendors])->layout('layouts.base');
    }
}
