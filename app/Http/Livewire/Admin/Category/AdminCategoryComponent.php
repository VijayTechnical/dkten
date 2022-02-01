<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\WithPagination;
use App\Traits\RoleAndPermissionTrait;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function changeStatus($id)
    {
        $this->authorizeRoleOrPermission('master|change-category-status');
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
    }


    public function deleteCategory($id)
    {
        $this->authorizeRoleOrPermission('master|delete-category');
        $category = Category::find($id);
        if ($category->image) {
            unlink(storage_path('app/public/category/' . $category->image));
        }
        $category->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Category Deleted Successfully!']);
    }

    public function deleteSubCategory($id)
    {
        $this->authorizeRoleOrPermission('master|delete-sub-category');
        $subcategory = SubCategory::find($id);
        if ($subcategory->image) {
            unlink(storage_path('app/public/category/' . $subcategory->image));
        }
        $subcategory->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'subcategory Deleted Successfully!']);
    }


    public function render()
    {

        $categories = Category::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('name', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('status', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')
            ->with('SubCategory')->paginate($this->paginate);
        return view('livewire.admin.category.admin-category-component', ['categories' => $categories])->layout('layouts.admin');
    }
}
