<?php

namespace App\Http\Livewire\Admin\Gvendor;

use Carbon\Carbon;
use App\Models\Gvendor;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddGvendorComponent extends Component
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
            'slug' => 'required|unique:gvendors',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }

    public function addGvendor()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:gvendors',
            'description' => 'required',
        ]);

        $gvendor = new Gvendor();
        $gvendor->name = $this->name;
        $gvendor->slug = $this->slug;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/gvendor', $imageName);
            $gvendor->image = $imageName;
        }
        $gvendor->description = $this->description;
        $gvendor->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'General Vendor Created Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.gvendor.admin-add-gvendor-component')->layout('layouts.admin');
    }
}
