<?php

namespace App\Http\Livewire\Admin\Blog;

use Carbon\Carbon;
use App\Models\Blog;
use Livewire\Component;
use App\Models\Bcategory;
use App\Traits\RoleAndPermissionTrait;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AdminEditBlogComponent extends Component
{
    use WithFileUploads;
    use RoleAndPermissionTrait;

    public $title;
    public $slug;
    public $bcategory_id;
    public $summary;
    public $description;
    public $image;
    public $newimage;
    public $blog_id;

    public function mount($blog_slug)
    {
        $this->authorizeRoleOrPermission('master|edit-blog');
        $blog = Blog::where('slug',$blog_slug)->first();
        $this->blog_id = $blog->id;
        $this->title = $blog->title;
        $this->slug = $blog->slug;
        $this->bcategory_id = $blog->bcategory_id;
        $this->summary = $blog->summary;
        $this->description = $blog->description;
        $this->image = $blog->image;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$this->blog_id,
            'image' => 'required|mimes:png,jpg',
            'summary' => 'required',
            'description' => 'required',
        ]);
    }

    public function editBlog()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$this->blog_id,
            'summary' => 'required',
            'description' => 'required',
        ]);

        $blog = Blog::find($this->blog_id);
        $blog->title = $this->title;
        $blog->slug = $this->slug;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/blog', $imageName);
            $blog->image = $imageName;
        }
        else{
            $blog->image = $this->image;
        }
        $blog->description = $this->description;
        $blog->summary = $this->summary;
        $blog->bcategory_id = $this->bcategory_id;
        $blog->admin_id = Auth::guard('admin')->user()->id;
        $blog->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Blog Updated Successfully!']);
    }

    public function render()
    {
        $bcategories = Bcategory::orderBy('created_at','DESC')->get();
        return view('livewire.admin.blog.admin-edit-blog-component',['bcategories'=>$bcategories])->layout('layouts.admin');
    }
}
