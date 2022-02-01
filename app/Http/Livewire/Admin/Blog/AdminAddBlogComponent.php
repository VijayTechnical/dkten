<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Bcategory;
use Carbon\Carbon;
use App\Models\Blog;
use App\Traits\RoleAndPermissionTrait;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class AdminAddBlogComponent extends Component
{
    use WithFileUploads;
    use RoleAndPermissionTrait;

    public $title;
    public $slug;
    public $bcategory_id;
    public $summary;
    public $description;
    public $image;

    public function mount()
    {
        $this->authorizeRoleOrPermission('master|add-blog');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required|unique:blogs',
            'image' => 'required|mimes:png,jpg',
            'summary' => 'required',
            'description' => 'required',
        ]);
    }

    public function addBlog()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs',
            'summary' => 'required',
            'description' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $this->title;
        $blog->slug = $this->slug;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/blog', $imageName);
            $blog->image = $imageName;
        }
        $blog->description = $this->description;
        $blog->summary = $this->summary;
        $blog->bcategory_id = $this->bcategory_id;
        $blog->admin_id = Auth::guard('admin')->user()->id;
        $blog->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Blog Created Successfully!']);
    }


    public function render()
    {
        $bcategories = Bcategory::orderBy('created_at','DESC')->get();
        return view('livewire.admin.blog.admin-add-blog-component',['bcategories'=>$bcategories])->layout('layouts.admin');
    }
}
