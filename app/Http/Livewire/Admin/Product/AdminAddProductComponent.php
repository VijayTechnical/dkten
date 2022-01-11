<?php

namespace App\Http\Livewire\Admin\Product;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Product;
use App\Models\SubType;
use Livewire\Component;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Auth;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $user_id;
    public $category_id;
    public $sub_category_id;
    public $type_id;
    public $sub_type_id;
    public $unit;
    public $tags;
    public $images;
    public $description;
    public $seo_title;
    public $seo_description;
    public $sale_price;
    public $purchase_price;
    public $shipping_cost;
    public $tax;
    public $discount;
    public $status;
    public $t_deal;
    public $featured;
    public $brand_id;

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;

    public function mount()
    {
        $this->t_deal = 0;
        $this->status = 0;
        $this->featured = 0;
        $this->unit = 1;
    }

    public function add()
    {
        if(!in_array($this->attr,$this->attribute_arr))
        {
            array_push($this->inputs,$this->attr);
            array_push($this->attribute_arr,$this->attr);
        }
    }

    public function remove($attr)
    {
        unset($this->inputs[$attr]);
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->title, '-');
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'slug' => 'required|unique:products',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'type_id' => 'required|integer',
            'sub_type_id' => 'required|integer',
            'unit' => 'required',
            'tags' => 'required',
            'images' => 'required',
            'description' => 'required',
            'seo_title' => 'required|unique:products',
            'seo_description' => 'required',
            'sale_price' => 'required',
            'purchase_price' => 'required',
            'shipping_cost' => 'required',
            'tax' => 'required',
            'discount' => 'required',
            'brand_id' => 'required|integer'
        ]);
    }

    public function addProduct()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:products',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'type_id' => 'required|integer',
            'sub_type_id' => 'required|integer',
            'unit' => 'required',
            'tags' => 'required',
            'images' => 'required',
            'description' => 'required',
            'seo_title' => 'required|unique:products',
            'seo_description' => 'required',
            'sale_price' => 'required',
            'purchase_price' => 'required',
            'shipping_cost' => 'required',
            'tax' => 'required',
            'discount' => 'required',
            'brand_id' => 'required|integer'
        ]);

        $product = new Product();
        $product->title = $this->title;
        $product->slug = $this->slug;
        $product->user_id = Auth::guard('admin')->user()->id;
        $product->category_id = $this->category_id;
        $product->sub_category_id = $this->sub_category_id;
        $product->type_id = $this->type_id;
        $product->brand_id = $this->brand_id;
        $product->sub_type_id = $this->sub_type_id;
        $product->unit = $this->unit;
        $product->tags = $this->tags;
        if($this->images)
        {
            $imagesName = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key. '.' .$image->extension();
                $image->storeAs('public/product',$imgName);
                $imagesName = $imagesName.','. $imgName;
            }
            $product->images = $imagesName;
        }
        $product->description = $this->description;
        $product->seo_title = $this->seo_title;
        $product->seo_description = $this->seo_description;
        $product->sale_price = $this->sale_price;
        $product->purchase_price = $this->purchase_price;
        $product->shipping_cost = $this->shipping_cost;
        $product->tax = $this->tax;
        $product->discount = $this->discount;
        $product->status = $this->status;
        $product->t_deal = $this->t_deal;
        $product->featured = $this->featured;
        $product->save();
        foreach($this->attribute_values as $key=>$attribute_value)
        {
            $avalues = explode(",",$attribute_value);
            foreach($avalues as $avalue)
            {
                $attr_value =  new AttributeValue();
                $attr_value->attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Product Created Successfully!']);
    }


    public function render()
    {
        $categories = Category::where('status','active')->orderBy('created_at','DESC')->get();
        $sub_categories = SubCategory::where('status','active')->where('category_id',$this->category_id)->orderBy('created_at','DESC')->get();
        $types = Type::where('status','active')->where('category_id',$this->category_id)->where('sub_category_id',$this->sub_category_id)->orderBy('created_at','DESC')->get();
        $sub_types = SubType::where('status','active')->where('type_id',$this->type_id)->orderBy('created_at','DESC')->get();
        $parrributes = Attribute::all();
        return view('livewire.admin.product.admin-add-product-component',['categories'=>$categories,'sub_categories'=>$sub_categories,'types'=>$types,'sub_types'=>$sub_types,'pattributes'=>$parrributes])->layout('layouts.admin');
    }
}
