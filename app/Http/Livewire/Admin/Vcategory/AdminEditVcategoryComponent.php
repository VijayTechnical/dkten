<?php

namespace App\Http\Livewire\Admin\Vcategory;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Vcategory;
use App\Traits\RoleAndPermissionTrait;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditVcategoryComponent extends Component
{
    use WithFileUploads;
    use RoleAndPermissionTrait;

    public $name;
    public $slug;
    public $image;
    public $description;
    public $newimage;
    public $vcategory_id;

    public function mount($vcategory_slug)
    {
        $this->authorizeRoleOrPermission('master|edit-vcategory');
        $vcategory = Vcategory::where('slug', $vcategory_slug)->first();
        $this->vcategory_id = $vcategory->id;
        $this->name = $vcategory->name;
        $this->slug = $vcategory->slug;
        $this->image = $vcategory->image;
        $this->description = $vcategory->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:vcategories,slug,' . $this->vcategory_id,
            'newimage' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }

    public function editVcategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:vcategories,slug,' . $this->vcategory_id,
            'description' => 'required',
        ]);


        $vcategory = Vcategory::find($this->vcategory_id);
        $vcategory->name = $this->name;
        $vcategory->slug = $this->slug;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if ($vcategory->image) {
                unlink(storage_path('app/public/vcategory/' . $vcategory->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/vcategory', $imageName);
            $vcategory->image = $imageName;
        } else {
            $vcategory->image = $this->image;
        }
        $vcategory->description = $this->description;
        $vcategory->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Vendor Category Updated Successfully!']);
    }


    public function render()
    {
        return view('livewire.admin.vcategory.admin-edit-vcategory-component')->layout('layouts.admin');
    }
}
