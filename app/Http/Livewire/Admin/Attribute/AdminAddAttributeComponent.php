<?php

namespace App\Http\Livewire\Admin\Attribute;

use App\Models\Attribute;
use Livewire\Component;

class AdminAddAttributeComponent extends Component
{

    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|unique:attributes',
        ]);
    }

    public function addAttribute()
    {
        $this->validate([
            'name' => 'required|unique:attributes',
        ]);

        $attribute = new Attribute();
        $attribute->name = $this->name;
        $attribute->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Attribute Created Successfully!']);
    }
    public function render()
    {
        return view('livewire.admin.attribute.admin-add-attribute-component')->layout('layouts.admin');
    }
}
