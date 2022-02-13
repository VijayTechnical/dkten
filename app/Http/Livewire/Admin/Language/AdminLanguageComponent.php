<?php

namespace App\Http\Livewire\Admin\Language;

use App\Models\Type;
use App\Models\SubType;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Vcategory;
use Livewire\WithPagination;

class AdminLanguageComponent extends Component
{
    use WithPagination;

    public $field;
    public $searchTerm;
    public $paginate;

    public function mount()
    {
        $this->field = 'category';
        $this->paginate = 10;
    }


    public function render()
    {
        if($this->field == 'category')
        {
            $datas = Category::where('status',true)->latest()->paginate($this->paginate);
        }
        elseif($this->field == 'sub_category')
        {
            $datas = SubCategory::where('status',true)->latest()->paginate($this->paginate);
        }
        elseif($this->field == 'type')
        {
            $datas = Type::where('status',true)->latest()->paginate($this->paginate);
        }
        elseif($this->field == 'sub_type')
        {
            $datas = SubType::where('status',true)->latest()->paginate($this->paginate);
        }
        elseif($this->field == 'vendor_category')
        {
            $datas = Vcategory::latest()->paginate($this->paginate);
        }
        return view('livewire.admin.language.admin-language-component',['datas'=>$datas])->layout('layouts.admin');
    }
}
