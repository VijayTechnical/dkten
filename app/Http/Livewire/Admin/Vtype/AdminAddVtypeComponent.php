<?php

namespace App\Http\Livewire\Admin\Vtype;

use Carbon\Carbon;
use App\Models\Vtype;
use Livewire\Component;
use App\Models\Vcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Traits\RoleAndPermissionTrait;

class AdminAddVtypeComponent extends Component
{
    use WithFileUploads;
    use RoleAndPermissionTrait;

    public $name;
    public $slug;
    public $image;
    public $description;
    public $vcategory_id;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-vtype');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:vtypes',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required',
            'vcategory_id' => 'required|integer'
        ]);
    }

    public function addVtype()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:vtypes',
            'description' => 'required',
            'vcategory_id' => 'required|integer'
        ]);

        $vtype = new Vtype();
        $vtype->vcategory_id = $this->vcategory_id;
        $vtype->name = $this->name;
        $vtype->slug = $this->slug;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/vtype', $imageName);
            $vtype->image = $imageName;
        }
        $vtype->description = $this->description;
        $vtype->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Vendor Type Created Successfully!']);
    }
    
    public function render()
    {
        $vcategories = Vcategory::orderBy('created_at','DESC')->get();
        return view('livewire.admin.vtype.admin-add-vtype-component',['vcategories'=>$vcategories])->layout('layouts.admin');
    }
}
