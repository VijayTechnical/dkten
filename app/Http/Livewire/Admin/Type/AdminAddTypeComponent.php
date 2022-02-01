<?php

namespace App\Http\Livewire\Admin\Type;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Brand;
use App\Models\SubType;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\RoleAndPermissionTrait;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddTypeComponent extends Component
{
    use RoleAndPermissionTrait;
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $status;
    public $type_id;
    public $category_id;
    public $sub_category_id;
    public $sel_brands = [];

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-type');
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'required|mimes:png,jpg',
            'sel_brands' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required'
        ]);
    }

    public function addType()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'sel_brands' => 'required'
        ]);

        if ($this->type_id) {
            $type = new SubType();
            $type->name = $this->name;
            $type->slug = $this->slug;
            if ($this->image) {
                $this->validate([
                    'image' => 'required|mimes:png,jpg'
                ]);
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAS('public/type', $imageName);
                $type->image = $imageName;
            }
            $type->type_id = $this->type_id;
            if($this->sel_brands)
            {
                $brandId = '';
                foreach($this->sel_brands as $key=>$brand)
                {
                    $brandId = $brandId.','. $brand;
                }
                $type->brands = $brandId;
            }
            $type->status = true;
            $type->save();
        } else {
            $this->validate([
                'category_id' => 'required',
                'sub_category_id' => 'required'
            ]);
            $type = new Type();
            $type->name = $this->name;
            $type->slug = $this->slug;
            if ($this->image) {
                $this->validate([
                    'image' => 'required|mimes:png,jpg'
                ]);
                $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAS('public/type', $imageName);
                $type->image = $imageName;
            }
            $type->category_id = $this->category_id;
            $type->sub_category_id = $this->sub_category_id;
            if($this->sel_brands)
            {
                $brandId = '';
                foreach($this->sel_brands as $key=>$brand)
                {
                    $brandId = $brandId.','. $brand;
                }
                $type->brands = $brandId;
            }
            $type->status = true;
            $type->save();
        }
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Type Created Successfully!']);
    }

    public function render()
    {
        $types = Type::orderBy('created_at','DESC')->where('status',true)->get();
        $categories = Category::orderBy('created_at','DESC')->where('status',true)->get();
        $sub_categories = SubCategory::orderBy('created_at','DESC')->where('status',true)->where('category_id',$this->category_id)->get();
        $brands = Brand::orderBy('created_at','DESC')->where('status',true)->get();
        return view('livewire.admin.type.admin-add-type-component',['types'=>$types,'categories'=>$categories,'sub_categories'=>$sub_categories,'brands'=>$brands])->layout('layouts.admin');
    }
}
