<?php

namespace App\Http\Livewire\Vendor\Ticket;

use App\Models\Vticket;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class VendorTicketComponent extends Component
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
        $tickets = Vticket::query()
        ->where('vendor_id',Auth::guard('vendor')->user()->id)
        ->where('subject','LIKE','%'.$this->searchTerm.'%')
        ->whereHas('User',function($query){
            $query->where('first_name','LIKE','%'.$this->searchTerm.'%')
                  ->where('last_name','LIKE','%'.$this->searchTerm.'%');
        })->orderBy('created_at','DESC')->paginate($this->paginate);
        return view('livewire.vendor.ticket.vendor-ticket-component',['tickets'=>$tickets])->layout('layouts.vendor');
    }
}
