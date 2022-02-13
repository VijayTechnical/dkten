<?php

namespace App\Http\Livewire\Admin\Language;

use App\Models\Type;
use App\Models\SubType;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vcategory;
use App\Models\SubCategory;

class AdminEditLanguageComponent extends Component
{
    public $field;
    public $name;
    public $nepali_name;
    public $field_id;

    public function mount($field, $id)
    {
        $this->field = $field;
        $this->field_id = $id;
        if ($this->field == 'category') {
            $datas = Category::findOrFail($this->field_id);
            $this->nepali_name = $datas->nepali_name;
            $this->name = $datas->name;
        } elseif ($this->field == 'sub_category') {
            $datas = SubCategory::findOrFail($this->field_id);
            $this->nepali_name = $datas->nepali_name;
            $this->name = $datas->name;
        } elseif ($this->field == 'type') {
            $datas = Type::findOrFail($this->field_id);
            $this->nepali_name = $datas->nepali_name;
            $this->name = $datas->name;
        } elseif ($this->field == 'sub_type') {
            $datas = SubType::findOrFail($this->field_id);
            $this->nepali_name = $datas->nepali_name;
            $this->name = $datas->name;
        } elseif ($this->field == 'vendor_category') {
            $datas = Vcategory::findOrFail($this->field_id);
            $this->nepali_name = $datas->nepali_name;
            $this->name = $datas->name;
        }
    }

    public function editLanguage()
    {
        try {
            if ($this->field == 'category') {
                $datas = Category::findOrFail($this->field_id);
                $datas->nepali_name = $this->nepali_name;
                $datas->save();
            } elseif ($this->field == 'sub_category') {
                $datas = SubCategory::findOrFail($this->field_id);
                $datas->nepali_name = $this->nepali_name;
                $datas->save();
            } elseif ($this->field == 'type') {
                $datas = Type::findOrFail($this->field_id);
                $datas->nepali_name = $this->nepali_name;
                $datas->save();
            } elseif ($this->field == 'sub_type') {
                $datas = SubType::findOrFail($this->field_id);
                $datas->nepali_name = $this->nepali_name;
                $datas->save();
            } elseif ($this->field == 'vendor_category') {
                $datas = Vcategory::findOrFail($this->field_id);
                $datas->nepali_name = $this->nepali_name;
                $datas->save();
            }
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error',  'message' => $e->getMessage()]
            );
        }
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Language Updated Successfully!']
        );
    }


    public function render()
    {
        return view('livewire.admin.language.admin-edit-language-component')->layout('layouts.admin');
    }
}
