<?php

namespace App\Http\Livewire\Admin\Eservice;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Eservice;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditEserviceComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $description;
    public $newimage;
    public $eservice_id;

    public function mount($eservice_slug)
    {
        $eservice = Eservice::where('slug', $eservice_slug)->first();
        $this->eservice_id = $eservice->id;
        $this->name = $eservice->name;
        $this->slug = $eservice->slug;
        $this->image = $eservice->image;
        $this->description = $eservice->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:eservices,slug,' . $this->eservice_id,
            'newimage' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }

    public function editEservice()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:eservices,slug,' . $this->eservice_id,
            'description' => 'required',
        ]);


        $eservice = Eservice::find($this->eservice_id);
        $eservice->name = $this->name;
        $eservice->slug = $this->slug;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if ($eservice->image) {
                unlink(storage_path('app/public/eservice/' . $eservice->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/eservice', $imageName);
            $eservice->image = $imageName;
        } else {
            $eservice->image = $this->image;
        }
        $eservice->description = $this->description;
        $eservice->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Eservice Updated Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.eservice.admin-edit-eservice-component')->layout('layouts.admin');
    }
}
