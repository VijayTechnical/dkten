<?php

namespace App\Http\Livewire\Vendor\Ticket;

use App\Models\Vticket;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VendorViewTicketComponent extends Component
{
    public $ticket_subject;
    public $ticket_id;
    public $user_id;
    public $message;

    public function mount($ticket_id,$user_id)
    {
        $this->ticket_id = $ticket_id;
        $this->user_id = $user_id;
        $ticket = Vticket::find($this->ticket_id);
        $this->ticket_subject = $ticket->subject;
    }

    public function sendMessage()
    {
        if($this->message)
        {
            $aticket = new Vticket();
            $aticket->parent_id = $this->ticket_id;
            $aticket->message = $this->message;
            $aticket->user_id = $this->user_id;
            $aticket->vendor_id = Auth::guard('vendor')->user()->id;
            $aticket->reply_by = 'vendor';
            $aticket->save();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Ticket Send Successfully!']
            );
            return;
        }
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'error',  'message' => 'Type some message!!!']
        );

    }

    public function render()
    {
        $vtickets = Vticket::query()
        ->where('vendor_id',Auth::guard('vendor')->user()->id)
        ->where('id',$this->ticket_id)
        ->where('user_id',$this->user_id)
        ->orWhere('parent_id',$this->ticket_id)->get();
        return view('livewire.vendor.ticket.vendor-view-ticket-component',['vtickets'=>$vtickets])->layout('layouts.vendor');
    }
}
