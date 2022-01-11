<?php

namespace App\Http\Livewire\Admin\Bcategory;

use Livewire\Component;
use App\Models\Bcategory;
use Illuminate\Support\Str;

class AdminEditBcategoryComponent extends Component
{

    public $name;
    public $slug;
    public $bcategory_id;

    public function mount($bcategory_slug)
    {
        $vcategory = Bcategory::where('slug', $bcategory_slug)->first();
        $this->bcategory_id = $vcategory->id;
        $this->name = $vcategory->name;
        $this->slug = $vcategory->slug;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:bcategories,slug,' . $this->bcategory_id,
        ]);
    }

    public function editBcategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:bcategories,slug,' . $this->bcategory_id,
        ]);


        $vcategory = Bcategory::find($this->bcategory_id);
        $vcategory->name = $this->name;
        $vcategory->slug = $this->slug;
        $vcategory->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Blog Category Updated Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.bcategory.admin-edit-bcategory-component')->layout('layouts.admin');
    }
}
