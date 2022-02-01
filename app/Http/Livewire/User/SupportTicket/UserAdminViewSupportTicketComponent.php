<?php

namespace App\Http\Livewire\User\SupportTicket;

use App\Models\Aticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserAdminViewSupportTicketComponent extends Component
{
    public $ticket_id;
    public $ticket_subject;
    public $message;

    public function mount($ticket_id)
    {
        $this->ticket_id = $ticket_id;
        $ticket = Aticket::find($this->ticket_id);
        $this->ticket_subject = $ticket->subject;
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required'
        ]);

        $ticket = new Aticket();
        $ticket->user_id = Auth::guard('web')->user()->id;
        $ticket->parent_id = $this->ticket_id;
        $ticket->message = $this->message;
        $ticket->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Ticket Send Successfully!']
        );
    }

    public function render()
    {
        $tickets = Aticket::where('id',$this->ticket_id)
        ->where('user_id',Auth::guard('web')->user()->id)
        ->orWhere('parent_id',$this->ticket_id)->get();
        return view('livewire.user.support-ticket.user-admin-view-support-ticket-component',['tickets'=>$tickets])->layout('layouts.base');
    }
}
