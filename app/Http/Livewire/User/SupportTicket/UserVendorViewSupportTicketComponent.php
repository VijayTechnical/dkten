<?php

namespace App\Http\Livewire\User\SupportTicket;

use App\Models\Vticket;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserVendorViewSupportTicketComponent extends Component
{
    public $ticket_id;
    public $vendor_id;
    public $ticket_subject;
    public $message;

    public function mount($ticket_id,$vendor_id)
    {
        $this->ticket_id = $ticket_id;
        $this->vendor_id = $vendor_id;
        $ticket = Vticket::find($this->ticket_id);
        $this->ticket_subject = $ticket->subject;
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'required'
        ]);

        $ticket = new Vticket();
        $ticket->user_id = Auth::guard('web')->user()->id;
        $ticket->vendor_id = $this->vendor_id;
        $ticket->parent_id = $this->ticket_id;
        $ticket->message = $this->message;
        $ticket->reply_by = 'user';
        $ticket->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Ticket Send Successfully!']
        );
    }

    public function render()
    {
        $tickets = Vticket::where('id',$this->ticket_id)
        ->where('user_id',Auth::guard('web')->user()->id)
        ->where('vendor_id',$this->vendor_id)
        ->orWhere('parent_id',$this->ticket_id)->get();
        return view('livewire.user.support-ticket.user-vendor-view-support-ticket-component',['tickets'=>$tickets])->layout('layouts.base');
    }
}
