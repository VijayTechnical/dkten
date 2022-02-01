<?php

namespace App\Http\Livewire\Admin\Vtype;

use Carbon\Carbon;
use App\Models\Vtype;
use Livewire\Component;
use App\Models\Vcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Traits\RoleAndPermissionTrait;

class AdminEditVtypeComponent extends Component
{
    use WithFileUploads;
    use RoleAndPermissionTrait;

    public $name;
    public $slug;
    public $image;
    public $description;
    public $newimage;
    public $vtype_id;
    public $vcategory_id;

    public function mount($vtype_slug)
    {
        $this->authorizeRoleOrPermission('master|edit-vtype');
        $vtype = Vtype::where('slug', $vtype_slug)->first();
        $this->vtype_id = $vtype->id;
        $this->vcategory_id = $vtype->vcategory_id;
        $this->name = $vtype->name;
        $this->slug = $vtype->slug;
        $this->image = $vtype->image;
        $this->description = $vtype->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:vtypes,slug,' . $this->vtype_id,
            'newimage' => 'required|mimes:png,jpg',
            'description' => 'required',
            'vcategory_id' => 'required|integer'
        ]);
    }

    public function editvtype()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:vtypes,slug,' . $this->vtype_id,
            'description' => 'required',
            'vcategory_id' => 'required|integer'
        ]);


        $vtype = vtype::find($this->vtype_id);
        $vtype->vcategory_id = $this->vcategory_id;
        $vtype->name = $this->name;
        $vtype->slug = $this->slug;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if ($vtype->image) {
                unlink(storage_path('app/public/vtype/' . $vtype->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/vtype', $imageName);
            $vtype->image = $imageName;
        } else {
            $vtype->image = $this->image;
        }
        $vtype->description = $this->description;
        $vtype->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Vendor Type Updated Successfully!']);
    }

    public function render()
    {
        $vcategories = Vcategory::orderBy('created_at','DESC')->get();
        return view('livewire.admin.vtype.admin-edit-vtype-component',['vcategories'=>$vcategories])->layout('layouts.admin');
    }
}
