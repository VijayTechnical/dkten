<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Gsetting;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;

class AdminGeneralSettingComponent extends Component
{
    use RoleAndPermissionTrait;
    
    public $name;
    public $email;
    public $phone;
    public $head_office;
    public $corporate_office;
    public $hub_center;
    public $description;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|update-general-setting');
        $gsetting = Gsetting::find(1);
        if($gsetting)
        {
            $this->name = $gsetting->name;
            $this->email = $gsetting->email;
            $this->phone = $gsetting->phone;
            $this->head_office = $gsetting->head_office;
            $this->corporate_office = $gsetting->corporate_office;
            $this->hub_center = $gsetting->hub_center;
            $this->description = $gsetting->description;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'head_office' => 'required|string',
            'corporate_office' => 'required|string',
            'hub_center' => 'required|string',
            'description' => 'required',
        ]);
    }

    public function updateGsetting()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'head_office' => 'required|string',
            'corporate_office' => 'required|string',
            'hub_center' => 'required|string',
            'description' => 'required',
        ]);

        $gsetting = Gsetting::find(1);
        if (!$gsetting) {
            $gsetting = new Gsetting();
        }
        $gsetting->name = $this->name;
        $gsetting->email = $this->email;
        $gsetting->phone = $this->phone;
        $gsetting->head_office = $this->head_office;
        $gsetting->corporate_office = $this->corporate_office;
        $gsetting->hub_center = $this->hub_center;
        $gsetting->description = $this->description;
        $gsetting->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'General Setting Updated Sucessfully!']
        );
    }


    public function render()
    {
        return view('livewire.admin.setting.admin-general-setting-component')->layout('layouts.admin');
    }
}
