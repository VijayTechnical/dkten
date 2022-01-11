<?php

namespace App\Http\Livewire\Admin\Mall;

use Carbon\Carbon;
use App\Models\Mall;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddMallComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    public $description;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required|unique:malls',
            'image' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }

    public function addMall()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:malls',
            'description' => 'required',
        ]);

        $brand = new Mall();
        $brand->name = $this->name;
        $brand->slug = $this->slug;
        if ($this->image) {
            $this->validate([
                'image' => 'required|mimes:png,jpg'
            ]);
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAS('public/mall', $imageName);
            $brand->image = $imageName;
        }
        $brand->description = $this->description;
        $brand->save();
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Shopping Mall Created Successfully!']);
    }


    public function render()
    {
        return view('livewire.admin.mall.admin-add-mall-component')->layout('layouts.admin');
    }
}
