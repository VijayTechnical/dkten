<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBlogComponent extends Component
{
    use WithPagination;
    use RoleAndPermissionTrait;

    public $paginate;
    public $searchTerm;

    public function mount()
    {
        $this->paginate = 10;
    }


    public function deleteBlog($id)
    {
        $this->authorizeRoleOrPermission('master|delete-blog');
        $blog = Blog::find($id);
        if ($blog->image) {
            unlink(storage_path('app/public/blog/' . $blog->image));
        }
        $blog->delete();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'blog Deleted Successfully!']
        );
    }

    public function render()
    {
        $blogs = Blog::query()
            ->where('id', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('title', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('slug', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$this->searchTerm}%")
            ->orWhere('summary', 'LIKE', "%{$this->searchTerm}%")
            ->orderBy('created_at', 'ASC')->paginate($this->paginate);
        return view('livewire.admin.blog.admin-blog-component',['blogs'=>$blogs])->layout('layouts.admin');
    }
}
