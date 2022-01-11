<?php

namespace App\Http\Livewire\Admin\Gvendor;

use Carbon\Carbon;
use App\Models\Gvendor;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditGvendorComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $description;
    public $newimage;
    public $gvendor_id;

    public function mount($gvendor_slug)
    {
        $gvendor = Gvendor::where('slug', $gvendor_slug)->first();
        $this->gvendor_id = $gvendor->id;
        $this->name = $gvendor->name;
        $this->slug = $gvendor->slug;
        $this->image = $gvendor->image;
        $this->description = $gvendor->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:gvendors,slug,' . $this->gvendor_id,
            'newimage' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }

    public function editGvendor()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:gvendors,slug,' . $this->gvendor_id,
            'description' => 'required',
        ]);


        $gvendor = Gvendor::find($this->gvendor_id);
        $gvendor->name = $this->name;
        $gvendor->slug = $this->slug;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if ($gvendor->image) {
                unlink(storage_path('app/public/gvendor/' . $gvendor->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/gvendor', $imageName);
            $gvendor->image = $imageName;
        } else {
            $gvendor->image = $this->image;
        }
        $gvendor->description = $this->description;
        $gvendor->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'General Vendor Updated Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.gvendor.admin-edit-gvendor-component')->layout('layouts.admin');
    }
}
