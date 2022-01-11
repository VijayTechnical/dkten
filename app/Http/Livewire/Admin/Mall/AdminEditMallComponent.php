<?php

namespace App\Http\Livewire\Admin\Mall;

use Carbon\Carbon;
use App\Models\Mall;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditMallComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $description;
    public $newimage;
    public $mall_id;

    public function mount($mall_slug)
    {
        $mall = Mall::where('slug', $mall_slug)->first();
        $this->mall_id = $mall->id;
        $this->name = $mall->name;
        $this->slug = $mall->slug;
        $this->image = $mall->image;
        $this->description = $mall->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:malls,slug,' . $this->mall_id,
            'newimage' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }

    public function editMall()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:malls,slug,' . $this->mall_id,
            'description' => 'required',
        ]);


        $mall = Mall::find($this->mall_id);
        $mall->name = $this->name;
        $mall->slug = $this->slug;
        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
            if ($mall->image) {
                unlink(storage_path('app/public/mall/' . $mall->image));
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAS('public/mall', $imageName);
            $mall->image = $imageName;
        } else {
            $mall->image = $this->image;
        }
        $mall->description = $this->description;
        $mall->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Shopping Mall Updated Successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.mall.admin-edit-mall-component')->layout('layouts.admin');
    }
}
