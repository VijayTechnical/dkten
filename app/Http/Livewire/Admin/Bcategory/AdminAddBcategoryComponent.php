<?php

namespace App\Http\Livewire\Admin\Bcategory;

use Livewire\Component;
use App\Models\Bcategory;
use Illuminate\Support\Str;

class AdminAddBcategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:bcategories',
        ]);
    }

    public function addBcategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:bcategories',
        ]);

        $bcategory = new Bcategory();
        $bcategory->name = $this->name;
        $bcategory->slug = $this->slug;
        $bcategory->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Blog Category Created Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.bcategory.admin-add-bcategory-component')->layout('layouts.admin');
    }
}
