<?php

namespace App\Http\Livewire\Admin\Attribute;

use Livewire\Component;
use App\Models\Attribute;
use App\Traits\RoleAndPermissionTrait;

class AdminEditAttributeComponent extends Component
{
    public $name;
    public $attribute_name;
    public $attribute_id;

    use RoleAndPermissionTrait;

    public function mount($attribute_name)
    {
        $this->authorizeRoleOrPermission('master|edit-attribute');
        $this->attribute_name = $attribute_name;
        $attribute = Attribute::where('name',$this->attribute_name)->first();
        $this->name = $attribute->name;
        $this->attribute_id = $attribute->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:attributes,name,'.$this->attribute_id,
        ]);
    }

    public function editAttribute()
    {
        $this->validate([
            'name' => 'required|unique:attributes,name,'.$this->attribute_id,
        ]);

        $attribute = Attribute::find($this->attribute_id);
        $attribute->name = $this->name;
        $attribute->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Attribute Updated Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.attribute.admin-edit-attribute-component')->layout('layouts.admin');
    }
}
