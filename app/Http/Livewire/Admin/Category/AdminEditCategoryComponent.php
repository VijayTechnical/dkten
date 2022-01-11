<?php

namespace App\Http\Livewire\Admin\Category;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $status;
    public $category_id;
    public $sub_category_slug;
    public $newimage;
    public $parent_category_id;

    public function mount($category_slug, $sub_category_slug = null)
    {
        if ($sub_category_slug) {
            $this->sub_category_slug = $sub_category_slug;
            $category = SubCategory::where('slug', $this->sub_category_slug)->first();
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->image = $category->image;
            $this->status = $category->status;
            $this->parent_category_id = $category->category_id;
        } else {
            $category = Category::where('slug', $category_slug)->first();
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->image = $category->image;
            $this->status = $category->status;
        }
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        if($this->sub_category_slug)
        {
            $this->validateOnly($fields, [
                'name' => 'required',
                'slug' => 'required|unique:sub_categories,slug,' . $this->category_id,
                'newimage' => 'required|mimes:png,jpg'
            ]);
        }
        else{
            $this->validateOnly($fields, [
                'name' => 'required',
                'slug' => 'required|unique:categories,slug,' . $this->category_id,
                'newimage' => 'required|mimes:png,jpg'
            ]);
        }
    }

    public function editCategory()
    {

        if ($this->category_id) {
            $this->validate([
                'name' => 'required',
                'slug' => 'required|unique:sub_categories,slug,' . $this->category_id,
            ]);
            $category = SubCategory::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($category->image) {
                    unlink(storage_path('app/public/category/' . $category->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/category', $imageName);
                $category->image = $imageName;
            } else {
                $category->image = $this->image;
            }
            $category->category_id = $this->parent_category_id;
            $category->status = 'active';
            $category->save();
        } else {
            $this->validate([
                'name' => 'required',
                'slug' => 'required|unique:categories,slug,' . $this->category_id,
            ]);
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            if ($this->newimage) {
                $this->validate([
                    'newimage' => 'required|mimes:png,jpg'
                ]);
                if ($category->image) {
                    unlink(storage_path('app/public/category/' . $category->image));
                }
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAS('public/category', $imageName);
                $category->image = $imageName;
            } else {
                $category->image = $this->image;
            }
            $category->status = true;
            $category->save();
        }

        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Category Updated Successfully!']);
    }

    public function render()
    {
        $categories = Category::orderBy('created_at', 'DESC')->where('status',true)->get();
        return view('livewire.admin.category.admin-edit-category-component', ['categories' => $categories])->layout('layouts.admin');
    }
}
