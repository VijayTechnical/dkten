<?php

namespace App\Http\Livewire\Admin\Category;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $status;
    public $category_id;

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

    public function addCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $category = new Category();
        if ($this->category_id) {
            $category = new SubCategory();
            $category->category_id = $this->category_id;
        }
        $category->name = $this->name;
        $category->slug = $this->slug;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/category', $imageName);
            $category->image = $imageName;
        }
        $category->status = true;
        $category->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Category Created Successfully!']);
    }
    public function render()
    {
        $categories = Category::orderBy('created_at', 'DESC')->where('status',true)->get();
        return view('livewire.admin.category.admin-add-category-component', ['categories' => $categories])->layout('layouts.admin');
    }
}
