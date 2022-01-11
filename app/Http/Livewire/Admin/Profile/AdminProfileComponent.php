<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileComponent extends Component
{

    use WithFileUploads;

    public $image;
    public $newimage;
    public $admin_id;
    public $name;
    public $email;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $admin = Auth::guard('admin')->user();
        $this->image = $admin->image;
        $this->admin_id = $admin->id;
        $this->name = $admin->name;
        $this->email = $admin->email;
    }



    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'newimage' => 'required|mimes:png,jpg',
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . Auth::guard('admin')->user()->id,
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);
    }

    public function updateProfile()
    {

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . Auth::guard('admin')->user()->id,
        ]);

        $admin = Admin::findOrFail($this->admin_id);
        if ($this->newimage) {
            if ($admin->image) {
                unlink(storage_path('app/public/admin/' . $admin->image));
            }
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/admin', $imageName);
            $admin->image = $imageName;
        } else {
            $admin->image = $this->image;
        }
        $admin->name = $this->name;
        $admin->email = $this->email;
        $admin->save();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Profile Updated Successfully!']
        );
    }

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed|different:current_password',
        ]);

        if (Hash::check($this->current_password, Auth::guard('admin')->user()->password)) {
            $admin = Admin::findOrFail($this->admin_id);
            $admin->password = Hash::make($this->password);
            $admin->save();
            $this->clear();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => 'Password Updated Successfully!']
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => 'Password does not match with old one.!']
            );
        }
    }

    public function clear()
    {
        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';

        return redirect('/admin/profile');
    }



    public function render()
    {
        $admin = Auth::guard('admin')->user();
        return view('livewire.admin.profile.admin-profile-component', ['admin' => $admin])->layout('layouts.admin');
    }
}
