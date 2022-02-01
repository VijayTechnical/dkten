<?php

namespace App\Http\Livewire\Admin\Legality;

use App\Models\Legality;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;

class AdminLegalityComponent extends Component
{
    use RoleAndPermissionTrait;
    
    public $return_policy;
    public $mission_and_vision;
    public $legal_information;
    public $careers;
    public $terms_and_condition;
    public $privacy_and_policy;
    public $travel_and_tours;
    public $employee_aid;
    public $shipping;
    public $easy_eservice;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|update-legality');
        $legality = Legality::find(1);
        if($legality)
        {
            $this->return_policy = $legality->return_policy;
            $this->mission_and_vision = $legality->mission_and_vision;
            $this->legal_information = $legality->legal_information;
            $this->careers = $legality->careers;
            $this->terms_and_condition = $legality->terms_and_condition;
            $this->privacy_and_policy = $legality->privacy_and_policy;
            $this->travel_and_tours = $legality->travel_and_tours;
            $this->employee_aid = $legality->employee_aid;
            $this->shipping = $legality->shipping;
            $this->easy_eservice = $legality->easy_eservice;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'return_policy' => 'required',
            'mission_and_vision' => 'required',
            'legal_information' => 'required',
            'careers' => 'required',
            'terms_and_condition' => 'required',
            'privacy_and_policy' => 'required',
            'travel_and_tours' => 'required',
            'employee_aid' => 'required',
            'shipping' => 'required',
            'easy_eservice' => 'required',
        ]);
    }

    public function updateLegality()
    {
        $this->validate([
            'return_policy' => 'required',
            'mission_and_vision' => 'required',
            'legal_information' => 'required',
            'careers' => 'required',
            'terms_and_condition' => 'required',
            'privacy_and_policy' => 'required',
            'travel_and_tours' => 'required',
            'employee_aid' => 'required',
            'shipping' => 'required',
            'easy_eservice' => 'required',
        ]);

        $legality = Legality::find(1);
        if(!$legality)
        {
            $legality = new Legality();
        }
        $legality->return_policy = $this->return_policy;
        $legality->mission_and_vision = $this->mission_and_vision;
        $legality->legal_information = $this->legal_information;
        $legality->careers = $this->careers;
        $legality->terms_and_condition = $this->terms_and_condition;
        $legality->privacy_and_policy = $this->privacy_and_policy;
        $legality->travel_and_tours = $this->travel_and_tours;
        $legality->employee_aid = $this->employee_aid;
        $legality->shipping = $this->shipping;
        $legality->easy_eservice = $this->easy_eservice;
        $legality->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Legality Updated Successfully!']
        );
    }
    public function render()
    {
        return view('livewire.admin.legality.admin-legality-component')->layout('layouts.admin');
    }
}
