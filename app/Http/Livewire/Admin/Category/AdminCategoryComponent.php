<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }

    public function statusUpdate($id)
    {
        $category = Category::findOrFail($id);
        $category->status = !$category->status;
        $category->save();
    }


    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            unlink(storage_path('app/public/category/' . $category->image));
        }
        $category->delete();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Category Deleted Successfully!']);
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
