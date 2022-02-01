<?php

namespace App\Http\Livewire\User\SupportTicket;

use App\Models\Aticket;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserAdminSupportTicketComponent extends Component
{
    public $subject;
    public $message;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'subject' => 'required',
            'message' => 'required'
        ]);
    }

    public function sendTicket()
    {
        $this->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $aticket = new Aticket();
        $aticket->subject = $this->subject;
        $aticket->message = $this->message;
        $aticket->user_id = Auth::guard('web')->user()->id;
        $aticket->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Ticket Send Successfully!']
        );
    }
    public function render()
    {
        $atickets = Aticket::where('user_id', Auth::guard('web')->user()->id)->where('parent_id','=',null)->get();
        return view('livewire.user.support-ticket.user-admin-support-ticket-component', ['atickets' => $atickets])->layout('layouts.base');
    }
}
