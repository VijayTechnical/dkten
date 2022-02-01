<?php

namespace App\Http\Livewire\User\Dashboard;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UserDashboardComponent extends Component
{
    use WithFileUploads;

    public $image;

    public function setImage()
    {
        if($this->image)
        {
            $user = Auth::guard('web')->user();
            if ($user->image) {
                unlink(storage_path('app/public/user/' . $user->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/user/', $imageName);
            $user->image = $imageName;
            $user->save();
        }
    }
    public function render()
    {
        if($this->image)
        {
            $this->dispatchBrowserEvent('uploadImage');
        }
        return view('livewire.user.dashboard.user-dashboard-component')->layout('layouts.base');
    }
}
