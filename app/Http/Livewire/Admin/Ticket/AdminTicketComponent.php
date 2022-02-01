<?php

namespace App\Http\Livewire\Admin\Ticket;

use App\Models\Aticket;
use App\Models\Vticket;
use Livewire\Component;
use Livewire\WithPagination;

class AdminTicketComponent extends Component
{
    use WithPagination;


    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }


    public function render()
    {
        $tickets = Aticket::query()
        ->where('parent_id','=',null)
        ->where('subject','LIKE','%'.$this->searchTerm.'%')
        ->whereHas('User',function($query){
            $query->where('first_name','LIKE','%'.$this->searchTerm.'%')
                  ->where('last_name','LIKE','%'.$this->searchTerm.'%');
        })->orderBy('created_at','DESC')->paginate($this->paginate);
        return view('livewire.admin.ticket.admin-ticket-component',['tickets'=>$tickets])->layout('layouts.admin');
    }
}
