<?php

namespace App\Http\Controllers\Api\Vendor\Product;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VendorProductController extends Controller
{
    public function getProduct()
    {
        try {
            $products = Product::with('Category', 'SubCategory', 'Type', 'SubType', 'Brand', 'AttributeValue', 'Vendor', 'OrderItem', 'Stock')->where('vendor_id', auth()->user()->id)->latest()->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Products found sucessfully!',
            'data' => $products
        ]);
    }

    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'slug' => 'required|string|unique:products',
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'type_id' => 'required|integer|exists:types,id',
            'unit' => 'required|string',
            'tags' => 'required|string',
            'images' => 'required',
            'description' => 'required',
            'seo_title' => 'required|string|unique:products',
            'seo_description' => 'required',
            'sale_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'shipping_cost' => 'required|numeric',
            'tax' => 'required|numeric',
            'discount' => 'required|numeric',
            'brand_id' => 'required|integer|exists:brands,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $product = new Product();
            $product->title = $request->title;
            $product->slug = $request->slug;
            $product->vendor_id = auth()->user()->id;
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->type_id = $request->type_id;
            $product->brand_id = $request->brand_id;
            $product->sub_type_id = $request->sub_type_id;
            $product->unit = $request->unit;
            $product->tags = $request->tags;
            $images = implode(',', $request->images);
            if ($images) {
                $imagesName = '';
                foreach ($request->images as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('public/product', $imgName);
                    $imagesName = $imagesName . ',' . $imgName;
                }
                $product->images = $imagesName;
            }
            $product->description = $request->description;
            $product->seo_title = $request->seo_title;
            $product->seo_description = $request->seo_description;
            $product->sale_price = $request->sale_price;
            $product->purchase_price = $request->purchase_price;
            $product->shipping_cost = $request->shipping_cost;
            $product->tax = $request->tax;
            $product->discount = $request->discount;
            $product->status = $request->status;
            $product->t_deal = $request->t_deal;
            $product->featured = $request->featured;
            $product->save();
            if ($request->attribute_values) {
                foreach ($request->attribute_values as $key => $attribute_value) {
                    $avalues = explode(",", $attribute_value);
                    foreach ($avalues as $avalue) {
                        $attr_value =  new AttributeValue();
                        $attr_value->attribute_id = $key;
                        $attr_value->value = $avalue;
                        $attr_value->product_id = $product->id;
                        $attr_value->save();
                    }
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Product added sucessfully!',
            'data' => $product
        ]);
    }

    public function editProduct(Request $request, $product_id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'slug' => 'required|string|unique:products,slug,' . $product_id,
            'category_id' => 'required|integer|exists:categories,id',
            'sub_category_id' => 'required|integer|exists:sub_categories,id',
            'type_id' => 'required|integer|exists:types,id',
            'unit' => 'required|string',
            'tags' => 'required|string',
            'description' => 'required',
            'seo_title' => 'required|string|unique:products,seo_title,' . $product_id,
            'seo_description' => 'required',
            'sale_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'shipping_cost' => 'required|numeric',
            'tax' => 'required|numeric',
            'discount' => 'required|numeric',
            'brand_id' => 'required|integer|exists:brands,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }

        try {
            $product = Product::find($product_id);
            $product->title = $request->title;
            $product->slug = $request->slug;
            if ($product->vendor_id) {
                $product->vendor_id = $product->vendor_id;
            }
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->type_id = $request->type_id;
            $product->brand_id = $request->brand_id;
            $product->sub_type_id = $request->sub_type_id;
            $product->unit = $request->unit;
            $product->tags = $request->tags;
            if ($request->newimages) {
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
                foreach ($request->newimages as $key => $image) {
                    $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                    $image->storeAs('public/product', $imgName);
                    $imagesName = $imagesName . ',' . $imgName;
                }
                $product->images = $imagesName;
            } else {
                if ($product->images) {
                    $oldimages = explode(',', $product->images);
                    $product->images = implode(',', $oldimages);
                }
            }
            $product->description = $request->description;
            $product->seo_title = $request->seo_title;
            $product->seo_description = $request->seo_description;
            $product->sale_price = $request->sale_price;
            $product->purchase_price = $request->purchase_price;
            $product->shipping_cost = $request->shipping_cost;
            $product->tax = $request->tax;
            $product->discount = $request->discount;
            $product->status = $request->status;
            $product->t_deal = $request->t_deal;
            $product->featured = $request->featured;
            $product->save();
            if ($request->attribute_values) {
                foreach ($request->attribute_values as $key => $attribute_value) {
                    $avalues = explode(",", $attribute_value);
                    foreach ($avalues as $avalue) {
                        $attr_value =  new AttributeValue();
                        $attr_value->attribute_id = $key;
                        $attr_value->value = $avalue;
                        $attr_value->product_id = $product->id;
                        $attr_value->save();
                    }
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Product Updated sucessfully!',
            'data' => $product
        ]);
    }

    public function editProductFeatured(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $product = Product::where(['id' => $request->product_id, 'vendor_id' => auth()->user()->id])->first();
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found!!!',
                    'data' => $product
                ], 404);
            }
            $product->featured = !$product->featured;
            $product->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Product featured sucessfully!',
            'data' => $product
        ]);
    }

    public function editProductStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $product = Product::where(['id' => $request->product_id, 'vendor_id' => auth()->user()->id])->first();
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found!!!',
                    'data' => $product
                ], 404);
            }
            $product->status = !$product->status;
            $product->save();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Product status updated sucessfully!',
            'data' => $product
        ]);
    }

    public function deleteProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' =>  $validator->messages()->all(), 'data' => $validator->getMessageBag()], 422);
        }
        try {
            $product = Product::where(['id' => $request->product_id, 'vendor_id' => auth()->user()->id])->first();
            if (!$product) {
                return response()->json([
                    'message' => 'Product not found!!!',
                    'data' => $product
                ], 404);
            }
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
            $product->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        return response()->json([
            'message' => 'Product deleted sucessfully!',
            'data' => $product
        ]);
    }
}
