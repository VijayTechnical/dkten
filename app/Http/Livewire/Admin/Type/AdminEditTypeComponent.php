<?php

namespace App\Http\Livewire\Admin\Type;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Brand;
use App\Models\SubType;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditTypeComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $status;
    public $type_id;
    public $category_id;
    public $sub_category_id;
    public $sel_brands = [];
    public $newimage;
    public $type_slug;
    public $sub_type_slug;
    public $parent_type_id;

    public function mount($type_slug, $sub_type_slug = null,)
    {
        if ($sub_type_slug) {
            $this->sub_type_slug = $sub_type_slug;
            $type = SubType::where('slug', $this->sub_type_slug)->first();
            $this->type_id = $type->id;
            $this->name = $type->name;
            $this->slug = $type->slug;
            $this->image = $type->image;
            $this->status = $type->status;
            $this->parent_type_id = $type->type_id;
            $brands = explode(',', $type->brands);
            if (count($brands) > 0) {
                foreach ($brands as $brand) {
                    $brandId = $brand;
                }
                $this->sel_brands[] = $brandId;
            }
        } else {
            $this->type_slug = $type_slug;
            $type = Type::where('slug', $this->type_slug)->first();
            $this->type_id = $type->id;
            $this->name = $type->name;
            $this->slug = $type->slug;
            $this->image = $type->image;
            $this->category_id = $type->category_id;
            $this->sub_category_id = $type->sub_category_id;
            $brands = explode(',', $type->brands);
            if (count($brands) > 0) {
                foreach ($brands as $brand) {
                    $brandId = $brand;
                }
                $this->sel_brands[] = $brandId;
            }
            $this->status = $type->status;
        }
    }


    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        if($this->sub_type_slug)
        {
            $this->validateOnly($fields, [
                'name' => 'required',
                'slug' => 'required|unique:sub_types,slug,'.$this->type_id,
                'newimage' => 'required|mimes:png,jpg'
            ]);
        }
        else{
            $this->validateOnly($fields, [
                'name' => 'required',
                'slug' => 'required|unique:types,slug,'.$this->type_id,
                'newimage' => 'required|mimes:png,jpg'
            ]);
        }
    }

    public function editType()
    {

        if ($this->type_id) {
            $this->validate([
                'name' => 'required',
                'slug' => 'required|unique:sub_types,slug,'.$this->type_id,
            ]);
            $type = SubType::find($this->type_id);
            $type->name = $this->name;
            $type->slug = $this->slug;
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/type', $imageName);
                $type->image = $imageName;
            }
            $type->type_id = $this->parent_type_id;
            if ($this->sel_brands) {
                $brandId = '';
                foreach ($this->sel_brands as $key => $brand) {
                    $brandId = $brandId . ',' . $brand;
                }
                $type->brands = $brandId;
            }
            $type->status = true;
            $type->save();
        } else {
            $this->validate([
                'name' => 'required',
                'slug' => 'required|unique:types,slug,'.$this->type_id,
            ]);
            $type = Type::find($this->type_id);
            $type->name = $this->name;
            $type->slug = $this->slug;
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($type->image) {
                    unlink(storage_path('app/public/type/' . $type->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/type', $imageName);
                $type->image = $imageName;
            } else {
                $type->image = $this->image;
            }
            $type->category_id = $this->category_id;
            $type->sub_category_id = $this->sub_category_id;
            if ($this->sel_brands) {
                $brandId = '';
                foreach ($this->sel_brands as $key => $brand) {
                    $brandId = $brandId . ',' . $brand;
                }
                $type->brands = $brandId;
            }
            $type->status = true;
            $type->save();
        }
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Type Updated Successfully!']);
    }

    public function render()
    {
        $types = Type::orderBy('created_at', 'DESC')->where('status', true)->get();
        $categories = Category::orderBy('created_at', 'DESC')->where('status', true)->get();
        $sub_categories = SubCategory::orderBy('created_at', 'DESC')->where('status', true)->where('category_id', $this->category_id)->get();
        $brands = Brand::orderBy('created_at', 'DESC')->where('status', true)->get();
        return view('livewire.admin.type.admin-edit-type-component', ['types' => $types, 'categories' => $categories, 'sub_categories' => $sub_categories, 'brands' => $brands])->layout('layouts.admin');
    }
}
