<?php

namespace App\Http\Livewire\Admin\Logo;

use Carbon\Carbon;
use App\Models\Logo;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminLogoComponent extends Component
{
    use WithFileUploads;

    public $admin_logo;
    public $home_header_logo;
    public $home_footer_logo;
    public $mobile_logo;

    public $new_admin_logo;
    public $new_home_header_logo;
    public $new_home_footer_logo;
    public $new_mobile_logo;

    public function mount()
    {
        $logo = Logo::find(1);
        if ($logo) {
            $this->admin_logo = $logo->admin_logo;
            $this->home_header_logo = $logo->home_header_logo;
            $this->home_footer_logo = $logo->home_footer_logo;
            $this->mobile_logo = $logo->mobile_logo;
        }
    }

    public function updateLogo()
    {
        $logo = Logo::find(1);
        if (!$logo) {
            $logo = new Logo();
        }
        if ($this->new_admin_logo) {
            $this->validate([
                'new_admin_logo' => 'required|mimes:png,jpg,svg'
            ]);
            if ($logo->new_admin_logo) {
                unlink(storage_path('app/public/logo/' . $logo->new_admin_logo));
            }
            $new_admin_logoName = Carbon::now()->timestamp . '.' . $this->new_admin_logo->extension();
            $this->new_admin_logo->storeAS('public/logo', $new_admin_logoName);
            $logo->admin_logo = $new_admin_logoName;
        } else {
            $logo->admin_logo = $this->admin_logo;
        }
        if ($this->new_home_header_logo) {
            $this->validate([
                'new_home_header_logo' => 'required|mimes:png,jpg,svg'
            ]);
            if ($logo->new_home_header_logo) {
                unlink(storage_path('app/public/logo/' . $logo->new_home_header_logo));
            }
            $new_home_header_logoName = Carbon::now()->timestamp . '.' . $this->new_home_header_logo->extension();
            $this->new_home_header_logo->storeAS('public/logo', $new_home_header_logoName);
            $logo->home_header_logo = $new_home_header_logoName;
        } else {
            $logo->home_header_logo = $this->home_header_logo;
        }
        if ($this->new_home_footer_logo) {
            $this->validate([
                'new_home_footer_logo' => 'required|mimes:png,jpg,svg'
            ]);
            if ($logo->new_home_footer_logo) {
                unlink(storage_path('app/public/logo/' . $logo->new_home_footer_logo));
            }
            $new_home_footer_logoName = Carbon::now()->timestamp . '.' . $this->new_home_footer_logo->extension();
            $this->new_home_footer_logo->storeAS('public/logo', $new_home_footer_logoName);
            $logo->home_footer_logo = $new_home_footer_logoName;
        } else {
            $logo->home_footer_logo = $this->home_footer_logo;
        }
        if ($this->new_mobile_logo) {
            $this->validate([
                'new_mobile_logo' => 'required|mimes:png,jpg,svg'
            ]);
            if ($logo->new_mobile_logo) {
                unlink(storage_path('app/public/logo/' . $logo->new_mobile_logo));
            }
            $new_mobile_logoName = Carbon::now()->timestamp . '.' . $this->new_mobile_logo->extension();
            $this->new_mobile_logo->storeAS('public/logo', $new_mobile_logoName);
            $logo->mobile_logo = $new_mobile_logoName;
        } else {
            $logo->mobile_logo = $this->mobile_logo;
        }
        $logo->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Logo Updated Successfully!']
        );
    }


    public function render()
    {
        return view('livewire.admin.logo.admin-logo-component')->layout('layouts.admin');
    }
}
