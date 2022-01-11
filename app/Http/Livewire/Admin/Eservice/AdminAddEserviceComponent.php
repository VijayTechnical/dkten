<?php

namespace App\Http\Livewire\Admin\Eservice;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Eservice;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddEserviceComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $description;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:eservices',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }

    public function addEservice()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:eservices',
            'description' => 'required',
        ]);

        $eservice = new Eservice();
        $eservice->name = $this->name;
        $eservice->slug = $this->slug;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/eservice', $imageName);
            $eservice->image = $imageName;
        }
        $eservice->description = $this->description;
        $eservice->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Eservice Created Successfully!']);
    }


    public function render()
    {
        return view('livewire.admin.eservice.admin-add-eservice-component')->layout('layouts.admin');
    }
}
