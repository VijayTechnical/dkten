<?php

namespace App\Http\Livewire\Admin\Ticket;

use App\Models\Aticket;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminViewTicketComponent extends Component
{
    public $user_id;
    public $ticket_id;
    public $ticket_subject;
    public $message;

    public function mount($user_id,$ticket_id)
    {
        $this->user_id = $user_id;
        $this->ticket_id = $ticket_id;
        $ticket = Aticket::find($this->ticket_id);
        $this->ticket_subject = $ticket->subject;
    }

    public function sendMessage()
    {
        if($this->message)
        {
            $aticket = new Aticket();
            $aticket->message = $this->message;
            $aticket->user_id = $this->user_id;
            $aticket->parent_id = $this->ticket_id;
            $aticket->admin_id = Auth::guard('admin')->user()->id;
            $aticket->save();
            $this->message = '';
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
        $atickets = Aticket::query()
        ->where('user_id',$this->user_id)
        ->where('id',$this->ticket_id)
        ->orWhere('parent_id',$this->ticket_id)->get();
        return view('livewire.admin.ticket.admin-view-ticket-component',['atickets'=>$atickets])->layout('layouts.admin');
    }
}
