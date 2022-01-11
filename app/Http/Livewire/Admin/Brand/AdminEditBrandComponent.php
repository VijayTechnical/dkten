<?php

namespace App\Http\Livewire\Admin\Brand;

use Carbon\Carbon;
use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditBrandComponent extends Component
{

    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $status;
    public $newimage;
    public $brand_id;

    public function mount($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        $this->brand_id = $brand->id;
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->image = $brand->image;
        $this->status = $brand->status;
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $this->brand_id,
            'newimage' => 'required|mimes:png,jpg'
        ]);
    }

    public function editBrand()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $this->brand_id,
        ]);


        $brand = Brand::find($this->brand_id);
        $brand->name = $this->name;
        $brand->slug = $this->slug;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if ($brand->image) {
                unlink(storage_path('app/public/brand/' . $brand->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/brand', $imageName);
            $brand->image = $imageName;
        } else {
            $brand->image = $this->image;
        }
        $brand->status = true;
        $brand->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Brand Updated Successfully!']);
    }

    public function render()
    {
        $categories = Category::orderBy('created_at','DESC')->where('status',true)->get();
        return view('livewire.admin.brand.admin-edit-brand-component',['categories'=>$categories])->layout('layouts.admin');
    }
}
