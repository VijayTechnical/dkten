<?php

namespace App\Http\Livewire\Admin\Setting;

use App\Models\Ssetting;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;

class AdminSocialSettingComponent extends Component
{
    use RoleAndPermissionTrait;

    public $facebook;
    public $instagram;
    public $youtube;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|update-social-setting');
        $social_setting = Ssetting::find(1);
        if($social_setting)
        {
            $this->facebook = $social_setting->facebook;
            $this->instagram = $social_setting->instagram;
            $this->youtube = $social_setting->youtube;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'youtube' => 'required|string',
        ]);
    }

    public function updateSocialSetting()
    {
        $this->validate([
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'youtube' => 'required|string',
        ]);

        $social_setting = Ssetting::find(1);
        if(!$social_setting)
        {
            $social_setting = new Ssetting();
        }
        $social_setting->facebook = $this->facebook;
        $social_setting->instagram = $this->instagram;
        $social_setting->youtube = $this->youtube;
        $social_setting->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Social Setting Updated Successfully!']
        );
    }


    public function render()
    {
        return view('livewire.admin.setting.admin-social-setting-component')->layout('layouts.admin');
    }
}
