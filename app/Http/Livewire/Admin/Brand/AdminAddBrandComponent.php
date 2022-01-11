<?php

namespace App\Http\Livewire\Admin\Brand;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddBrandComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $status;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'required|mimes:png,jpg'
        ]);
    }

    public function addBrand()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $brand = new Brand();
        $brand->name = $this->name;
        $brand->slug = $this->slug;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/brand', $imageName);
            $brand->image = $imageName;
        }
        $brand->status = true;
        $brand->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Brand Created Successfully!']);
    }

    public function render()
    {
        $categories = Category::orderBy('created_at','DESC')->where('status',true)->get();
        return view('livewire.admin.brand.admin-add-brand-component',['categories'=>$categories])->layout('layouts.admin');
    }
}
