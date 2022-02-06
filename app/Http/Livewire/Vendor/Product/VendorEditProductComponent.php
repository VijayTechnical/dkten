<?php

namespace App\Http\Livewire\Vendor\Product;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Brand;
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

class VendorEditProductComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
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
    public $newimages;
    public $product_id;
    public $brand_id;

    public $attr;
    public $inputs = [];
    public $attribute_arr = [];
    public $attribute_values;

    public function mount($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $this->product_id = $product->id;
        $this->title = $product->title;
        $this->slug = $product->slug;
        $this->category_id = $product->category_id;
        $this->sub_category_id = $product->sub_category_id;
        $this->type_id = $product->type_id;
        $this->brand_id = $product->brand_id;
        $this->sub_type_id = $product->sub_type_id;
        $this->unit = $product->unit;
        $this->tags = $product->tags;
        $this->images = all_product_image($this->product_id);
        $this->images = $product->images;
        $this->description = $product->description;
        $this->seo_title = $product->seo_title;
        $this->seo_description = $product->seo_description;
        $this->sale_price = $product->sale_price;
        $this->purchase_price = $product->purchase_price;
        $this->shipping_cost = $product->shipping_cost;
        $this->tax = $product->tax;
        $this->discount = $product->discount;
        $this->status = $product->status;
        $this->t_deal = $product->t_deal;
        $this->featured = $product->featured;
        $this->inputs = $product->AttributeValue->where('product_id')->unique('attribute_id')->pluck('attribute_id');
        $this->attribute_arr = $product->AttributeValue->where('product_id')->unique('attribute_id')->pluck('attribute_id');

        foreach ($this->attribute_arr as $a_arr) {
            $allattributeValue = AttributeValue::where('product_id', $product->id)->where('attribute_id', $a_arr)->get()->pluck('value');
            $valueString = '';
            foreach ($allattributeValue as $value) {
                $valueString = $valueString . $value . ',';
            }
            $this->attribute_values[$a_arr] = rtrim($valueString, ",");
        }
    }

    public function add()
    {
        if (!$this->attribute_arr->contains($this->attr)) {
            $this->inputs->push($this->attr);
            $this->attribute_arr->push($this->attr);
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
        $this->validateOnly($fields, [
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$this->product_id,
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'type_id' => 'required|integer',
            'unit' => 'required',
            'tags' => 'required',
            'images' => 'required',
            'description' => 'required',
            'seo_title' => 'required|unique:products,seo_title,'.$this->product_id,
            'seo_description' => 'required',
            'sale_price' => 'required',
            'purchase_price' => 'required',
            'shipping_cost' => 'required',
            'tax' => 'required',
            'discount' => 'required',
            'brand_id' => 'required',
        ]);
    }

    public function editProduct()
    {
        $this->validate([
            'title' => 'required',
            'slug' => 'required|unique:products,slug,'.$this->product_id,
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'type_id' => 'required|integer',
            'unit' => 'required',
            'tags' => 'required',
            'images' => 'required',
            'description' => 'required',
            'seo_title' => 'required|unique:products,seo_title,'.$this->product_id,
            'seo_description' => 'required',
            'sale_price' => 'required',
            'purchase_price' => 'required',
            'shipping_cost' => 'required',
            'tax' => 'required',
            'discount' => 'required',
            'brand_id' => 'required',
        ]);

        $product = Product::find($this->product_id);
        $product->title = $this->title;
        $product->slug = $this->slug;
        $product->vendor_id = Auth::guard('vendor')->user()->id;
        $product->category_id = $this->category_id;
        $product->sub_category_id = $this->sub_category_id;
        $product->type_id = $this->type_id;
        $product->brand_id = $this->brand_id;
        if($this->sub_type_id)
        {
            $product->sub_type_id = $this->sub_type_id;
        }
        $product->unit = $this->unit;
        $product->tags = $this->tags;
        if ($this->newimages) {
            if ($product->images) {
                $images = explode(",", $product->images);
                if ($images) {
                    foreach ($images as $key => $image) {
                        if ($image) {
                            unlink(storage_path('app/public/product/' . $image));
                        }
                    }
                }
            }
            $imagesName = '';
            foreach ($this->newimages as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('public/product', $imgName);
                $imagesName = $imagesName . ',' . $imgName;
            }
            $product->images = $imagesName;
        } else {
            if ($this->images) {
                $oldimages = explode(',', $this->images);
                $product->images = implode(',', $oldimages);
            }
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
        foreach ($this->attribute_values as $key => $attribute_value) {
            $avalues = explode(",", $attribute_value);
            foreach ($avalues as $avalue) {
                $attr_value =  new AttributeValue();
                $attr_value->attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }
        $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Product Updated Successfully!']);
    }


    public function render()
    {
        $categories = Category::where('status',true)->orderBy('created_at','DESC')->get();
        $sub_categories = SubCategory::where('status',true)->where('category_id',$this->category_id)->orderBy('created_at','DESC')->get();
        $types = Type::where('status',true)->where('category_id',$this->category_id)->where('sub_category_id',$this->sub_category_id)->orderBy('created_at','DESC')->get();
        $sub_types = SubType::where('status',true)->where('type_id',$this->type_id)->orderBy('created_at','DESC')->get();
        $parrributes = Attribute::all();
        $brands = Brand::where('status',true)->orderBy('created_at','DESC')->get();
        return view('livewire.vendor.product.vendor-edit-product-component',['categories'=>$categories,'sub_categories'=>$sub_categories,'types'=>$types,'sub_types'=>$sub_types,'pattributes'=>$parrributes,'brands'=>$brands])->layout('layouts.vendor');
    }
}
