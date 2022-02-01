<?php

namespace App\Http\Livewire\Admin\Vcategory;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Vcategory;
use App\Traits\RoleAndPermissionTrait;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddVcategoryComponent extends Component
{
    use RoleAndPermissionTrait;
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $description;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-vcategory');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:vcategories',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }

    public function addVcategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:vcategories',
            'description' => 'required',
        ]);

        $vcategory = new Vcategory();
        $vcategory->name = $this->name;
        $vcategory->slug = $this->slug;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/vcategory', $imageName);
            $vcategory->image = $imageName;
        }
        $vcategory->description = $this->description;
        $vcategory->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Vendor Category Created Successfully!']);
    }


    public function render()
    {
        return view('livewire.admin.vcategory.admin-add-vcategory-component')->layout('layouts.admin');
    }
}
